# Plano: Mobile First sem regressao no desktop

## Status da implementacao

- Fase 1 concluida.
- Fase 2 concluida.
- Viewport foi adicionado aos layouts in-game e out-game.
- Foi criada uma camada CSS mobile separada e progressiva.
- A classe `is-mobile` detecta telas abaixo de 768 px sem alterar o layout desktop.
- O shell in-game mobile inclui header, barra de planetas, drawer, recursos compactos e navegacao inferior.
- O drawer fecha por botao, backdrop, Escape e selecao de rota, preserva o foco anterior e libera o scroll ao fechar.

## Objetivo

Fazer o OGameX abrir corretamente em celulares, com leitura sem necessidade de zoom, controles tocaveis e atualizacoes visuais sem piscadas ou perda da posicao da tela.

O desktop deve continuar com o layout atual como prioridade, usando melhorias progressivas apenas para larguras menores.

## Diagnostico atual

1. O layout principal nao declara a meta viewport.
   - O arquivo `resources/views/ingame/layouts/main.blade.php` nao possui `<meta name="viewport">`.
   - Sem viewport, alguns celulares renderizam uma pagina desktop larga e exibem apenas parte dela em escala reduzida.
   - A pagina de informacoes da alianca possui viewport, mas esta meta nao existe globalmente.

2. A estrutura central usa larguras fixas.
   - `#pageContent` e definido como `990px`.
   - `.maincontent` e definido como `670px`.
   - Varias telas reutilizam larguras como `670px`, `654px`, `490px`, `430px` e `220px`.
   - Tambem existem menus, tabelas e overlays com dimensoes fixas.

3. Os estilos legados sao fragmentados.
   - O arquivo principal importa multiplos CSS antigos em `resources/css/ingame.css`.
   - Parte do layout esta em `resources/css/ingame/02base.css`.
   - Outros componentes usam arquivos historicos, modulos e overrides espalhados.

4. Atualizacoes parciais e recarregamentos precisam ser protegidos.
   - A frota e a caixa de eventos usam atualizacoes AJAX.
   - Existem varios `location.reload()`, redirecionamentos e re-renderizacoes de componentes.
   - Em celular, um refresh pode piscar a tela, voltar o scroll e anular o zoom quando a pagina real eh recarregada.

5. Existem poucos estilos responsivos dedicados.
   - Ha poucos media queries voltados a dispositivos moveis.
   - Nao existe um shell mobile oficial reutilizando componentes e mantendo a logica desktop.

## Estrategia geral

Adotar uma abordagem de sobrescritas responsivas em camada separada, sem substituir de imediato os arquivos CSS legados. Isso permite preservar o desktop e reduzir o risco de regressao.

Regras:

- Desktop acima de 1024 px: manter o layout existente.
- Tablet entre 768 px e 1024 px: compactar barras, menus e colunas.
- Mobile abaixo de 768 px: criar navegacao e organizacao verticais.
- Mobile pequeno abaixo de 480 px: priorizar recursos, conteudo principal e acoes essenciais.
- Landcape celular: manter dois niveis de navegacao quando houver largura suficiente, sem obrigar zoom.

## Arquivos envolvidos

### Shell principal

- `resources/views/ingame/layouts/main.blade.php`
  - Adicionar viewport global.
  - Adicionar classes do tipo `data-device` ou `is-mobile` sem sobrescrever classes legado.
  - Tornar barra superior, recursos, comunicacao, planetas e menu acessiveis por toque.
  - Acrescentar gatilhos para o menu mobile.
  - Unificar dimensoes de overlays com a largura da viewport.
  - Preservar todas as variaveis globais JavaScript existentes.

- `resources/views/outgame/layouts/main.blade.php`
  - Adicionar viewport.
  - Tornar login, registro e recuperacao de senha fluidos.
  - Corrigir formularios, botoes e mensagens em telas pequenas.

- `resources/views/ingame/layouts/admin-menu.blade.php`
  - Transformar o menu administrativo lateral em dropdown ou drawer no celular.
  - Nao alterar os links ou permissoes.

- `resources/views/ingame/galaxy/index.blade.php`
  - A tela de galaxia deve virar o caso principal de validacao no mobile.
  - Compactar coordenadas, status de planetas e acoes sem remover viagem, espionagem, ataque ou informacoes existentes.

### CSS

- `resources/css/ingame.css`
  - Importar uma folha responsiva nova ao final da cadeia.
  - Manter imports atuais para desktop.

- `resources/css/outgame.css`
  - Importar uma folha responsiva nova ao final da cadeia.

- `resources/css/ingame/02base.css`
  - Mudar apenas regras estruturais amplas: `#pageContent`, `.maincontent`, menus, conteudo central.
  - Evitar alterar estilos de componentes antigos dentro de cada tela.

- `resources/css/ingame/469500b3cd5158332fb20a56b14b2c.css`
- `resources/css/ingame/990d5d349ed6e981658ff4e2e3444c.css`
- Modulos em `resources/css/ingame/modules/*.css`
  - Receber media queries ou overrides direcionados apenas apos mapeamento.
  - Nao editar CSS inline indiscriminadamente.

- Novos arquivos planejados:
  - `resources/css/mobile-shell.css`: layout principal, barra superior, recursos e navegacao.
  - `resources/css/mobile-components.css`: cards, tabelas, overlays, formularios, botoes e tooltips.
  - `resources/css/mobile-pages.css`: edificio, fabrica, frota, galaxia, mensagens, alianza e admin.
  - `resources/css/mobile-outgame.css`: telas de login e registro.

Os nomes finais podem variar, mas a separacao precisa manter os overrides mobile isolados dos arquivos legados.

### JavaScript

- `resources/js/ingame/e7c74974620fa35b197315ebdbb8c2.js`
  - Remover dependencias de viewport desktop fixo em overlays.
  - Atualizar `isMobile`, dimensoes de popup e comportamento de toque.
  - Substituir hover/tooltip por comportamento adequado a toque.

- `resources/js/ingame/jquery-1.12.4.min.js`, `jquery.js`, `vendor/jquery-ui-1.12.1.js`
  - Nao substituir as bibliotecas nesta fase.
  - Ajustar inicializacao somente quando necessario para dialogs, overlays e menus responsivos.

- `resources/js/ingame/inventory.js`
  - Manter atualizacao parcial dos recursos.
  - Nao iniciar reload de pagina completo apos compras ou construcoes.

- `resources/js/ingame/timerhandler.js`
  - Continuar calculando countdown local sem redraw de toda a pagina.
  - Pausar timers inativos quando a aba estiver oculta.

- `resources/js/ingame/chat.js`
  - Pausar polling ou proteger reconexao com `visibilitychange`.
  - Evitar anexar atualizacoes visuais que movem o scroll ou redimensionam a tela.

- `resources/js/ingame/messages.js`
- `resources/js/ingame/messages-pagination.js`
  - Manter paginas e selecoes em memoria.
  - Evitar reload da aba inteira ao apagar, mover ou atualizar mensagens.

- Novo arquivo planejado: `resources/js/ingame/mobile.js`
  - Detector de largura e orientacao.
  - Menu lateral/drawer.
  - Aria state, fechamento por gesto ou backdrop.
  - Preservacao de scroll durante refresh parcial.
  - Definicao de classes mobile sem alterar identificacao desktop.

- `vite.config.js`
  - Incluir novos CSS e JS mobile nos bundles.
  - Validar desenvolvimento e producao.

## Mudancas previstas no layout

### 1. Meta viewport

Adicionar em todas as paginas:

```html
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
```

Nao usar `maximum-scale`, pois isso impediria acessibilidade.

### 2. Shell central

Alterar apenas em media query:

- `#pageContent`: de `990px` para `width: min(990px, 100%)`.
- `.maincontent`: de `670px` para fluid width.
- Remover larguras fixas internas que causem overflow horizontal.
- Usar `overflow-x` apenas em tabelas ou areas tecnicas e nunca esconder controles importantes.

### 3. Barra superior e recursos

No mobile:

- Player, ranking, opcoes e logout vao para menu hamburguer ou drawer.
- Recursos Metal, Crystal, Deuterium e Energy ficam em uma barra compacta fixa ou sticky no topo.
- Dark Matter continua visivel sem ocupar uma segunda linha excessiva.
- Valores usam abreviacao responsiva, com valor completo em tooltip ou detalhe no toque.

### 4. Navegacao principal

Criar menu inferior ou drawer com:

- Overview
- Resources
- Research
- Ships
- Fleet
- Galaxy
- Messages
- Communication

Manter o menu desktop exatamente como esta em larguras maiores.

### 5. Planetas

Converter o seletor de planetas em:

- Lista horizontal compacta no mobile pequeno.
- Dropdown/lista acessivel no celular estreito.
- Componentes existentes continuam apontando para o mesmo planeta selecionado.

### 6. Lista de construcoes

As boxes de 220 px e 100 px devem virar:

- Grade de uma coluna abaixo de 480 px.
- Grade de duas colunas entre 480 px e 767 px.
- Layout atual entre 768 px e desktop.

Cada item deve manter:

- Imagem
- Nome
- Nivel
- Producao
- Tempo
- Botao construir/upgrading
- Requisitos faltantes

### 7. Galaxia

- Coordenadas nao podem ultrapassar a largura da tela.
- Cada linha pode virar card ou usar scroll horizontal controlado.
- Acoes devem ter 44 px ou mais no minimo.
- Expansao/ataque/espiao usam dialog grande o suficiente no mobile.

### 8. Frota

- Desktop: manter tabelas e sequencia atual.
- Mobile: dividir a pagina em passos ou cards.
- Naves e quantidades devem permitir:
  - Multiplicadores
  - Maximo
  - Entrada numerica
  - Confirmacao
- Coordenadas e velocidade permanecem visiveis durante a confirmacao.

### 9. Mensagens

- Pasta e lista ficam empilhadas quando nao houver largura.
- Ao selecionar uma mensagem, usar tela ou drawer em vez de comprimir tres colunas.
- Acoes como responder, arquivar e apagar precisam permanecer acessiveis.
- Nunca apagar estado da pagina ao receber novas mensagens.

### 10. Tabelas

Para tabelas sem significado tabular complexo:

- Transformar linhas em cards.
- Adicionar labels via `<thead>` ou atributos `data-label`.

Para tabelas tecnicas, como frota ou admin:

- Scroll horizontal dentro de um wrapper.
- Primeira coluna sticky apenas onde for seguro.
- Manter cabecalho e controles visiveis.

### 11. Dialogs e overlays

- `overlayWidth` e `overlayHeight` atuais nao devem escapar da viewport.
- Usar `max-width: calc(100vw - 16px)` e `max-height: calc(100vh - 16px)`.
- Ativar backdrop, fechar por botao grande e bloquear scroll do fundo.
- Restaurar o elemento que abriu o overlay ao fechar.

## Estabilidade de refresh e zoom

### Problemas a eliminar

- Recarregar toda a pagina para atualizar um pequeno recurso.
- Trocar HTML no topo durante polling sem preservar scroll.
- Recriar dialogs ou menus em refresh.
- Executar timers e polling duplicados.
- Resetar a classe mobile ao navegar entre planetas ou overlays.

### Regras novas

1. Usar viewport meta em todas as paginas.
2. Usar AJAX para atualizar recursos, caixas de eventos, mensagens, chat e contadores.
3. Recarregamento completo deve acontecer somente quando for funcionalmente necessario.
4. Antes de qualquer refresh parcial, registrar:
   - `window.scrollX` e `window.scrollY`
   - Foco do campo
   - Posicao de lista/tabela
   - Overlay aberto
   - Estado do menu
5. Restaurar scroll e foco quando o DOM parcial mudar.
6. Usar `document.visibilityState` para pausar polling em segundo plano.
7. Abortar requests duplicados ou fora de ordem.
8. Atualizar o eventbox sem substituir a estrutura externa.
9. Nunca alterar viewport, escala ou CSS de zoom via JavaScript.
10. Usar transicoes minimas e evitar piscar skeletons em atualizacoes de poucos segundos.

Rotas existentes que podem se beneficiar:

- `/ajax/fleet/eventbox/fetch`
- `/ajax/fleet/eventlist/fetch`
- `/ajax/fleet/eventlist/checkevents`
- Endpoints de chat
- Endpoints de recursos utilizados por `inventory.js`

## Menu e navegacao mobile

Implementar um unico shell mobile responsavel por:

- Abrir/fechar menu
- Informar estado via `aria-expanded`
- Fechar ao selecionar rota
- Fechar ao pressionar Escape
- Bloquear scroll do fundo com o menu aberto
- Evitar abrir junto com dialogs ou overlays

Manter todas as rotas Blade atuais e criar apenas wrappers CSS/JS; nao duplicar controllers ou regras de jogo.

## Acessibilidade e toque

- Alvos clicaveis com pelo menos 44 px.
- Separacao entre botao de ataque, confirmar, cancelar e remover.
- Hover nao pode ser o unico meio para mostrar informacao.
- Tooltips mostram detalhes no toque, em painel ou texto visivel.
- Inputs usam `type`, `inputmode` e autocomplete apropriados.
- Tabelas, cards e botoes precisam de labels ARIA traduzidos.
- Contraste e estado ativo devem permanecer visiveis.

## Validacao visual por area

Cada fase deve ser validada nestes cenarios:

- Login, registro e recuperacao de senha.
- Overview com evento de frota.
- Resources e upgrades.
- Station, edificios e pesquisas.
- Ships e requisicoes de construcoes.
- Fleet dispatch em tres passos.
- Galaxy scan, espionagem, ataque e missel.
- Messages.
- Alliance.
- Options.
- Admin menu.
- Dark matter, character class e traders.

Larguras base de teste:

- 320 x 568
- 360 x 800
- 390 x 844
- 430 x 932
- 768 x 1024
- 1024 x 768
- 1280 x 720
- 1440 x 900
- 1920 x 1080

Orientacoes retrato e paisagem devem ser validadas.

## Fases de implementacao

### Fase 1: Fundacao

1. Adicionar viewport nas layouts in-game e out-game.
2. Criar CSS mobile separado.
3. Corrigir body, html e `#pageContent` para nao ultrapassar largura.
4. Adicionar classes mobile detectadas por CSS e JS.
5. Criar testes visuais de smoke.

Critério de conclusao: nenhuma tela principal exige zoom para abrir e nenhum overflow horizontal global aparece.

### Fase 2: Shell do jogo

1. Compactar header superior em `resources/views/ingame/layouts/main.blade.php`.
2. Criar barra compacta de recursos no mobile.
3. Criar drawer/menu mobile com links existentes, mensagem, administracao e logout.
4. Compactar planetas em barra horizontal.
5. Adicionar navegacao inferior para acoes principais.
6. Finalizar abertura, fechamento, foco, backdrop, Escape e bloqueio de scroll.
7. Adaptar dialogs e overlays jQuery a viewport e suporte a safe areas.

Critério de conclusao: navegacao principal, recursos, planetas, mensagens e logout funcionam por toque.

### Fase 3: Telas de alto uso

1. Overview.
2. Galaxy.
3. Fleet.
4. Messages.
5. Buildings.
6. Research.

Critério de conclusao: todas as acoes principais podem ser executadas sem zoom.

### Fase 4: Telas secundarias

1. Alliance.
2. Highscore.
3. Search.
4. Options.
5. Chat.
6. Admin.
7. Merchant, jumpgate e premium/merchant modules restantes.

Critério de conclusao: todas as funcionalidades existentes continuam disponiveis em mobile e desktop.

### Fase 5: Polimento

1. Corrigir piscadas de refresh.
2. Adicionar estados de loading por componente.
3. Preservar scroll.
4. Melhorar toque, contraste e orientacao.
5. Medir performance em celular.

## Arquivos a criar ou testar

Além dos novos CSS/JS, esta suite pode ser criada:

- `tests/Browser/MobileLayoutTest.php`
- `tests/Browser/MobileGalaxyTest.php`
- `tests/Browser/MobileFleetTest.php`
- Screenshots externos versionados somente se o projeto ja possuir uma convencao de visual testing.

Como alternativa, usar Playwright para smoke visual e Lazy fixture browsers sem alterar o runtime da aplicacao.

## Riscos

1. CSS legado com `!important`, IDs e seletores globais pode vencer media queries.
2. Larguras fixas de cada Blade podem continuar causando overflow fora de #pageContent.
3. Dialogs jQuery usam largura calculada para desktop.
4. Imagens de nav/background podem estar dimensionadas para largura historica.
5. Table layouts podem perder labels ao virar cards.
6. Refresh parcial precisa distinguir atualizacao util de polling inativo.
7. CSS mobile aplicado a tablet pode alterar densidade visual indevidamente.

Cada risco deve ser corrigido com override localizado e nunca com mudanças de regra de jogo ou de backend.

## Nao escopo desta entrega

Esta fase e apenas documentacao. Ela nao inclui:

- Mudanca de regras do jogo
- Novos endpoints obrigatorios
- Reescrita de controllers
- Mudanca de banco de dados
- Remocao do desktop
- Transformacao em aplicativo nativo
- Remocao de funcionalidades existentes

## Resultado esperado

Ao final da implementacao:

- O celular abre o jogo em escala real, sem zoom inicial.
- Recursos, menus e acoes essenciais cabem na largura.
- Page refreshs de desktop nao dependem de zoom manual.
- Atualizacoes AJAX nao piscam a interface inteira.
- Scroll, foco, overlays e filtros nao sao resetados sem necessidade.
- Administradores, jogadores humanos e bots continuam operando exatamente com o mesmo backend.
- O browser desktop mantem o layout amplo, os mesmos atalhos, menus e funcionalidades.
