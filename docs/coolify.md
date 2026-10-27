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

O código da aplicação e os arquivos públicos do Nginx são copiados para as
imagens durante o build; os containers de produção não dependem de bind mounts
do checkout do Coolify. O Compose cria os volumes nomeados `ogame-dbdata`, para
os dados do MariaDB, e `ogamex-vendor`, compartilhado pelos containers PHP para
as dependências do Composer. Não remova nem troque `ogame-dbdata` ao atualizar.

## Proxy do Coolify

O Compose não publica portas no host. Configure os domínios no Coolify para
encaminhar às portas **internas**:
   - Site: serviço `ogamex-webserver`, porta `80`.
   - WebSocket: serviço `ogamex-reverb`, porta `8090`.
Ative HTTPS nos domínios pelo proxy do Coolify. O Nginx do projeto atende
somente HTTP interno; não configure domínio público para MariaDB (`ogamex-db`)
nem para PHP-FPM (`ogamex-app`).

## Variáveis de ambiente

Cadastre no Coolify, como variáveis do Compose:

| Variável | Valor / orientação |
| --- | --- |
| `APP_KEY` | Chave Laravel forte e persistente. Gere uma vez e mantenha-a entre implantações. |
| `APP_URL` | URL HTTPS pública do jogo, por exemplo `https://game.exemplo.com` |
| `DB_ROOT_PASSWORD` | Senha forte do MariaDB. A aplicação usa a mesma senha para conectar como `root`. |
| `BROADCAST_CONNECTION` | `reverb` para recursos em tempo real; use `log` se não configurar o Reverb. O padrão é `log`. |

`APP_KEY`, `APP_URL` e `DB_ROOT_PASSWORD` são obrigatórias para iniciar o
Compose. `REVERB_APP_KEY` e `REVERB_APP_SECRET` também são obrigatórias porque
o serviço Reverb está incluído no Compose; use `BROADCAST_CONNECTION=reverb`
para ativar o broadcast via WebSocket.

As variáveis Laravel são passadas aos serviços PHP pelo Compose. `APP_ENV`,
`APP_DEBUG`, banco de dados, cache, sessão e fila já têm valores de produção
definidos pelo Compose. O entrypoint usa `APP_ENV` e `APP_KEY` do ambiente
injetado pelo Coolify, sem gerar uma chave nova quando `APP_KEY` está definido.

### Senha do MariaDB

`DB_ROOT_PASSWORD` é obrigatório e usado tanto na inicialização do MariaDB
quanto na conexão da aplicação. Nunca publique o MariaDB numa porta do host.

O MariaDB só aplica `MARIADB_DATABASE` e `MARIADB_ROOT_PASSWORD` quando inicializa
um diretório de dados vazio. Se o volume `ogame-dbdata` já tiver sido criado,
alterar essas variáveis não troca a senha existente; faça a rotação da senha no
banco e atualize `DB_ROOT_PASSWORD` de forma coordenada.

### Observação sobre `.env` e inicialização

O entrypoint ainda cria `.env` a partir de `.env.example` se necessário, mas as
variáveis de ambiente configuradas no Coolify prevalecem durante a execução.
O serviço `ogamex-app` executa as migrações no início e usa
`composer install --no-dev` em produção. A biblioteca Rust é compilada na
imagem PHP, que é compartilhada pelos serviços PHP via o mesmo Dockerfile.

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
- O container Reverb é iniciado pelo Compose; configure seu domínio e use
  `BROADCAST_CONNECTION=reverb` para habilitar o broadcast via WebSocket.

Os serviços PHP, fila, scheduler e Reverb são construídos a partir do mesmo
Dockerfile; o Nginx usa `Dockerfile.nginx`. Planeje espaço e tempo de build,
especialmente no primeiro deploy.

## Persistência, segurança e atualizações

- Preserve o volume `ogame-dbdata` e faça backups regulares do MariaDB antes de
  atualizações.
- Se estiver migrando de uma versão anterior do Compose, faça backup do banco
  antes do primeiro deploy desta versão. O volume de dados, antes comentado,
  agora é ativado; um volume novo começa vazio e não recupera dados que só
  existiam no filesystem de um container anterior.
- As imagens contêm o código da versão publicada; dados em `storage` não são
  persistidos entre recriações dos containers. Configure backups externos se
  precisar preservar uploads ou outros arquivos gravados pela aplicação.
- Use `APP_DEBUG=false`, uma `APP_KEY` permanente e segredos fortes. Não publique
  credenciais em logs, no Git ou em documentação.
- O `ogamex-app` executa `php artisan migrate --force` ao iniciar. Faça backup
  antes de atualizar e confira os logs se a migração ou a primeira inicialização
  falhar.

## Verificação após o deploy

1. Confirme no Coolify que os serviços de banco, aplicação, Nginx, scheduler e
   fila estão ativos; confira também o Reverb se habilitado.
2. Abra o domínio HTTPS do jogo e confirme que a página carrega sem erro 502.
3. Verifique os logs de `ogamex-app` para `composer install`, migrações e
   inicialização do PHP-FPM. A compilação Rust ocorre durante o build da imagem.
4. Se habilitou Reverb, confirme no navegador que a conexão WebSocket usa
   `wss://<host-configurado>:443` e que o proxy direciona ao serviço na porta
   interna 8090.
5. Cadastre a primeira conta pelo site. Conforme o README, a primeira conta
   recebe o papel de administrador.
