# Implantar OGameX no Coolify

Este guia descreve o que configurar para publicar o OGameX no Coolify usando
Docker Compose. Ele se baseia no `docker-compose.prod.yml` e no fluxo de
inicialização atual do projeto.

## Antes de começar

- Um servidor com Coolify instalado e espaço para construir a imagem PHP e
  compilar os módulos Rust. A primeira inicialização pode demorar vários
  minutos.
- Um domínio apontando para o servidor e as portas 80 e 443 disponíveis para
  o proxy do Coolify.
- O repositório do OGameX acessível pela conexão Git configurada no Coolify.
- Um local e uma rotina para backups do banco MariaDB.

## Criar o recurso no Coolify

1. Crie um recurso do tipo **Docker Compose** e conecte o repositório Git.
2. Selecione a branch ou tag que será publicada.
3. Informe `docker-compose.prod.yml` como arquivo Compose.
4. Mantenha os serviços `ogamex-db`, `ogamex-app`, `ogamex-webserver`,
   `ogamex-scheduler`, `ogamex-queue-worker` e `ogamex-reverb`.
5. Não publique o serviço `ogamex-phpmyadmin` na internet. Se não for necessário,
   remova-o ou desative-o no Compose.

O Compose já cria uma rede interna e um volume nomeado para os dados do MariaDB.
Não remova nem troque o volume `ogame-dbdata` ao atualizar o jogo: isso apagaria
o banco persistido. Ele também cria `ogamex-vendor`, compartilhado pelos
containers PHP para guardar as dependências do Composer fora do bind mount do
código. Esse volume não contém dados do jogo e pode ser reconstruído se
necessário.

## Ajustes necessários no Compose para o proxy do Coolify

O arquivo atual publica portas diretamente no servidor:

- `ogamex-webserver`: portas 80 e 443.
- `ogamex-reverb`: porta 8090.
- `ogamex-phpmyadmin`: porta 8080.

Esses mapeamentos podem competir com o proxy do Coolify e expor serviços sem
passar pelas regras de domínio e TLS do proxy. Antes de publicar:

1. Remova as entradas `ports` do `ogamex-webserver` e do `ogamex-reverb`.
2. Remova `ogamex-phpmyadmin` do Compose ou, no mínimo, seu mapeamento `ports`.
3. Configure os domínios no Coolify apontando para as portas **internas**:
   - Site: serviço `ogamex-webserver`, porta `80`.
   - WebSocket: serviço `ogamex-reverb`, porta `8090`.
4. Ative HTTPS nos domínios pelo proxy do Coolify. O Nginx do projeto também
   escuta na porta 443, mas usa um certificado próprio/self-signed; não direcione
   o proxy do Coolify para essa porta.

O proxy do Coolify deve ser o único componente publicando 80/443 no host. Não
configure domínio público para MariaDB (`ogamex-db`) nem para PHP-FPM
(`ogamex-app`).

## Variáveis de ambiente

Configure os valores abaixo para a aplicação e disponibilize as variáveis
Laravel aos serviços `ogamex-app`, `ogamex-scheduler`, `ogamex-queue-worker` e
`ogamex-reverb`. No Compose atual, as variáveis de ambiente de aplicação não
estão todas declaradas em `environment`; confirme que o método escolhido no
Coolify realmente as injeta nos containers, ou forneça o arquivo `.env` no
caminho que os containers montam como `/var/www/.env`.

| Variável | Valor / orientação |
| --- | --- |
| `APP_NAME` | `OGameX` |
| `APP_ENV` | `production` |
| `APP_KEY` | Chave Laravel forte e persistente. Gere uma vez e mantenha-a entre implantações. |
| `APP_DEBUG` | `false` |
| `APP_URL` | URL HTTPS pública do jogo, por exemplo `https://game.exemplo.com` |
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | `ogamex-db` (nome do serviço Compose) |
| `DB_PORT` | `3306` |
| `DB_DATABASE` | `laravel`, igual a `MYSQL_DATABASE` no serviço MariaDB |
| `DB_USERNAME` | `root`, de acordo com o Compose atual; prefira um usuário de aplicação com privilégios restritos se preparar o banco para isso |
| `DB_PASSWORD` | A mesma senha configurada para MariaDB. Não use a senha padrão `toor`. |
| `SESSION_DRIVER` | `database` |
| `CACHE_DRIVER` | `file` |
| `QUEUE_CONNECTION` | `database` |
| `BROADCAST_CONNECTION` | `reverb` para habilitar os recursos em tempo real; use `log` se não configurar o Reverb |

Gere `APP_KEY` uma única vez com `php artisan key:generate --show` e armazene o
resultado como segredo persistente no Coolify e no `.env` efetivamente lido pelos
containers. Não gere uma chave nova a cada deploy. Use `BROADCAST_CONNECTION` e
`QUEUE_CONNECTION`: `BROADCAST_DRIVER` e `QUEUE_DRIVER` do
`.env.example-prod` são nomes antigos e não substituem as variáveis esperadas
pela configuração Laravel atual.

### Senha do MariaDB

No Compose atual, `MYSQL_ROOT_PASSWORD` está definido como `toor`. Troque esse
valor por uma senha forte antes da primeira inicialização e configure o mesmo
valor em `DB_PASSWORD`. Nunca publique o MariaDB numa porta do host.

O MariaDB só aplica `MYSQL_DATABASE` e `MYSQL_ROOT_PASSWORD` quando inicializa
um diretório de dados vazio. Se o volume `ogame-dbdata` já tiver sido criado,
alterar essas variáveis não troca a senha existente; faça a rotação da senha no
banco e atualize `DB_PASSWORD` de forma coordenada.

### Observação sobre `.env` e inicialização

O `.env` está ignorado pelo Git. O `docker/entrypoint.sh` copia
`.env.example` para `/var/www/.env` quando o arquivo não existe, verifica
`APP_ENV` e `APP_KEY` lendo esse arquivo, e executa migrações no início do
serviço `ogamex-app`. Em produção, também usa esse arquivo para decidir se
executa `composer install --no-dev` e o cache de configuração.

Use `.env.example-prod` como base para criar o `.env` de produção; o entrypoint
não lê `.env.example-prod` diretamente. Apenas cadastrar variáveis no painel do
Coolify pode não ser suficiente para o fluxo de produção: o Compose monta o
código em `/var/www`, e o script consulta o arquivo `.env` nesse diretório.
Garanta que o `.env` correto esteja disponível no caminho montado antes da
inicialização, com as permissões apropriadas e sem adicioná-lo ao Git. Não deixe
o arquivo ser sobrescrito por `.env.example` com `APP_ENV=local` ou
`APP_DEBUG=true`.

## WebSocket e chat em tempo real

Para habilitar o Reverb, configure um segundo domínio no proxy do Coolify para
`ogamex-reverb`, porta interna `8090`, com WebSocket habilitado. Exemplo:
`ws.exemplo.com`.

Use estes valores, ajustando o host ao domínio público configurado:

```dotenv
BROADCAST_CONNECTION=reverb
REVERB_APP_ID=ogamex
REVERB_APP_KEY=<chave-publica-do-reverb>
REVERB_APP_SECRET=<segredo-forte-e-privado>
REVERB_HOST=ws.exemplo.com
REVERB_PORT=443
REVERB_SCHEME=https
REVERB_SERVER_HOST=0.0.0.0
REVERB_SERVER_PORT=8090
```

`REVERB_PORT` é a porta HTTPS/WSS pública usada pelo navegador; `REVERB_SERVER_PORT`
é a porta em que o processo Reverb escuta dentro do container. Use o mesmo
`REVERB_APP_ID`, `REVERB_APP_KEY` e `REVERB_APP_SECRET` em todos os serviços
Laravel. Se não usar um subdomínio separado, o domínio principal também pode ser
roteado para o serviço Reverb, desde que o proxy encaminhe WebSocket à porta 8090.

## Serviços de execução contínua

- Mantenha `ogamex-scheduler` ativo: ele executa `php artisan schedule:run` a
  cada minuto.
- Mantenha `ogamex-queue-worker` ativo para processar tarefas da fila configurada
  em `QUEUE_CONNECTION`.
- Mantenha `ogamex-reverb` ativo somente se `BROADCAST_CONNECTION=reverb`.

Os serviços de aplicação, fila, scheduler e Reverb são construídos a partir do
mesmo Dockerfile. Planeje espaço e tempo de build para eles, especialmente no
primeiro deploy.

## Persistência, segurança e atualizações

- Preserve o volume `ogame-dbdata` e faça backups regulares do MariaDB antes de
  atualizações.
- O Compose monta o repositório em `/var/www`; não trate o filesystem efêmero
  do container como backup. Verifique como o Coolify mantém os arquivos entre
  implantações, em particular o `.env` gerado e os dados em `storage`.
- Use `APP_DEBUG=false`, uma `APP_KEY` permanente e segredos fortes. Não publique
  credenciais em logs, no Git ou em documentação.
- O serviço PhpMyAdmin do Compose de produção publica a porta 8080 por padrão.
  Mantenha-o desativado ou restrinja o acesso a uma rede privada; não o exponha
  publicamente sem autenticação e controles de acesso.
- O `ogamex-app` executa `php artisan migrate --force` ao iniciar. Faça backup
  antes de atualizar e confira os logs se a migração ou a primeira inicialização
  falhar.

## Verificação após o deploy

1. Confirme no Coolify que os serviços de banco, aplicação, Nginx, scheduler e
   fila estão ativos; confira também o Reverb se habilitado.
2. Abra o domínio HTTPS do jogo e confirme que a página carrega sem erro 502.
3. Verifique os logs de `ogamex-app` para `composer install`, compilação Rust,
   migrações e inicialização do PHP-FPM.
4. Se habilitou Reverb, confirme no navegador que a conexão WebSocket usa
   `wss://<host-configurado>:443` e que o proxy direciona ao serviço na porta
   interna 8090.
5. Cadastre a primeira conta pelo site. Conforme o README, a primeira conta
   recebe o papel de administrador.
