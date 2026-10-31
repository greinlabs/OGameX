<?php

return [
    // ------------------------
    'welcome_message' => [
        'from' => 'OGameX',
        'subject' => 'Bem-vindo ao OGameX!',
        'body' => 'Saudações, Imperador :player!

Parabéns por iniciar sua ilustre carreira. Estarei aqui para guiá-lo em seus primeiros passos.

À esquerda você pode ver o menu que permite supervisionar e governar seu império galáctico.

Você já viu a Visão Geral. Recursos e Instalações permitem construir edifícios para ajudar a expandir seu império. Comece construindo uma Usina Solar para coletar energia para suas minas.

Depois, expanda sua Mina de Metal e Mina de Cristal para produzir recursos vitais. Caso contrário, simplesmente explore por conta própria. Tenho certeza de que se sentirá em casa em breve.

Você pode encontrar mais ajuda, dicas e táticas aqui:

Discord Chat: Servidor Discord
Fórum: Fórum OGameX
Suporte: Suporte do Jogo

Você só encontrará anúncios atuais e mudanças no jogo nos fóruns.

Agora você está pronto para o futuro. Boa sorte!

Esta mensagem será excluída em 7 dias.',
    ],

    // ------------------------
    'return_of_fleet_with_resources' => [
        'from' => 'Comando da Frota',
        'subject' => 'Retorno de uma frota',
        'body' => 'Sua frota está retornando de :from para :to e entregou seus bens:

Metal: :metal
Cristal: :crystal
Deutério: :deuterium',
    ],

    // ------------------------
    'return_of_fleet' => [
        'from' => 'Comando da Frota',
        'subject' => 'Retorno de uma frota',
        'body' => 'Sua frota está retornando de :from para :to.

A frota não entrega mercadorias.',
    ],

    // ------------------------
    'fleet_deployment_with_resources' => [
        'from' => 'Comando da Frota',
        'subject' => 'Retorno de uma frota',
        'body' => 'Uma de suas frotas de :from chegou a :to e entregou seus bens:

Metal: :metal
Cristal: :crystal
Deutério: :deuterium',
    ],

    // ------------------------
    'fleet_deployment' => [
        'from' => 'Comando da Frota',
        'subject' => 'Retorno de uma frota',
        'body' => 'Uma de suas frotas de :from chegou a :to. A frota não entrega mercadorias.',
    ],

    // ------------------------
    'transport_arrived' => [
        'from' => 'Comando da Frota',
        'subject' => 'Chegada a um planeta',
        'body' => 'Sua frota de :from alcança :to e entrega seus bens:
Metal: :metal Cristal: :crystal Deutério: :deuterium',
    ],

    // ------------------------
    'transport_received' => [
        'from' => 'Comando da Frota',
        'subject' => 'Frota chegando',
        'body' => 'Uma frota chegando de :from chegou ao seu planeta :to e entregou seus bens:
Metal: :metal Cristal: :crystal Deutério: :deuterium',
    ],

    // ------------------------
    'acs_defend_arrival_host' => [
        'from' => 'Monitoramento Espacial',
        'subject' => 'Frota está parando',
        'body' => 'Uma frota chegou a :to.',
    ],

    // ------------------------
    'acs_defend_arrival_sender' => [
        'from' => 'Comando da Frota',
        'subject' => 'Frota está parando',
        'body' => 'Uma frota chegou a :to.',
    ],

    // ------------------------
    'colony_established' => [
        'from' => 'Comando da Frota',
        'subject' => 'Relatório de Colonização',
        'body' => 'A frota chegou às coordenadas designadas :coordinates, encontrou um novo planeta lá e começou a desenvolvê-lo imediatamente.',
    ],

    // ------------------------
    'colony_establish_fail_astrophysics' => [
        'from' => 'Colonos',
        'subject' => 'Relatório de Colonização',
        'body' => 'A frota chegou às coordenadas designadas :coordinates e constatou que o planeta é viável para colonização. Logo após começar a desenvolver o planeta, os colonos perceberam que seu conhecimento de astrofísica não é suficiente para completar a colonização de um novo planeta.',
    ],

    // ------------------------
    'espionage_report' => [
        'from' => 'Comando da Frota',
        'subject' => 'Relatório de espionagem de :planet',
    ],

    // ------------------------
    'espionage_detected' => [
        'from' => 'Comando da Frota',
        'subject' => 'Relatório de espionagem do Planeta :planet',
        'body' => "Uma frota estrangeira do planeta :planet (:attacker_name) foi avistada perto do seu planeta\n:defender\nChance de contra-espionagem: :chance%",
    ],

    // ------------------------
    'battle_report' => [
        'from' => 'Comando da Frota',
        'subject' => 'Relatório de combate :planet',
    ],

    // ------------------------
    'fleet_lost_contact' => [
        'from' => 'Comando da Frota',
        'subject' => 'Contato com a frota atacante foi perdido. :coordinates',
        'body' => '(Isso significa que foi destruída na primeira rodada.)',
    ],

    // ------------------------
    'debris_field_harvest' => [
        'from' => 'Frota',
        'subject' => 'Relatório de colheita de CD em :coordinates',
        'body' => 'Sua :ship_name (:ship_amount naves) tem capacidade total de armazenamento de :storage_capacity. No alvo :to, :metal Metal, :crystal Cristal e :deuterium Deutério estão flutuando no espaço. Você colheu :harvested_metal Metal, :harvested_crystal Cristal e :harvested_deuterium Deutério.',
    ],

    // ------------------------
    // Expedition generic message parts
    'expedition_resources_captured' => ':resource_type :resource_amount foram capturados.',
    'expedition_dark_matter_captured' => '(:dark_matter_amount Matéria Escura)',
    'expedition_units_captured' => 'As seguintes naves agora fazem parte da frota:',

    'expedition_unexplored_statement' => 'Entrada do diário do oficial de comunicações: Parece que esta parte do universo ainda não foi explorada.',

    // Expedition Failed
    'expedition_failed' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionFailed class.
        'body' => [
            '1' => 'Devido a uma falha nos computadores centrais da capitânia, a missão de expedição teve que ser abortada. Infelizmente, como resultado da falha do computador, a frota retorna para casa de mãos vazias.',
            '2' => 'Sua expedição quase entrou no campo gravitacional de uma estrela de nêutrons e precisou de algum tempo para se libertar. Por causa disso, muito Deutério foi consumido e a frota de expedição teve que voltar sem nenhum resultado.',
            '3' => 'Por razões desconhecidas, o salto da expedição deu totalmente errado. Quase pousou no coração de um sol. Felizmente pousou em um sistema conhecido, mas o salto de volta vai demorar mais do que o esperado.',
            '4' => 'Uma falha no núcleo do reator da capitânia quase destrói toda a frota de expedição. Felizmente os técnicos eram mais que competentes e puderam evitar o pior. Os reparos levaram bastante tempo e forçaram a expedição a retornar sem ter atingido seu objetivo.',
            '5' => 'Um ser vivo feito de pura energia entrou a bordo e induziu todos os membros da expedição a um estranho transe, fazendo com que apenas olhassem para os padrões hipnóticos nas telas dos computadores. Quando a maioria finalmente saiu do estado hipnótico, a missão de expedição precisou ser abortada, pois tinham muito pouco Deutério.',
            '6' => 'O novo módulo de navegação ainda está com bugs. O salto da expedição não apenas os levou na direção errada, mas usou todo o combustível de Deutério. Felizmente, o salto da frota os trouxe perto da lua do planeta de partida. Um pouco decepcionados, a expedição agora retorna sem potência de impulso. A viagem de volta vai demorar mais que o esperado.',
            '7' => 'Sua expedição aprendeu sobre a extensa vacuidade do espaço. Não havia nem um pequeno asteroide, radiação ou partícula que pudesse tornar esta expedição interessante.',
            '8' => 'Bem, agora sabemos que aquelas anomalias vermelhas, classe 5, não apenas têm efeitos caóticos nos sistemas de navegação das naves, mas também geram alucinações massivas na tripulação. A expedição não trouxe nada de volta.',
            '9' => 'Sua expedição tirou fotos lindas de uma supernova. Nada novo pôde ser obtido da expedição, mas pelo menos há boa chance de ganhar a competição "Melhor Foto do Universo" na edição do mês que vem da revista OGame.',
            '10' => 'Sua frota de expedição seguiu sinais estranhos por algum tempo. No final, perceberam que esses sinais estavam sendo enviados por uma sonda antiga enviada gerações atrás para saudar espécies estrangeiras. A sonda foi salva e alguns museus do seu planeta natal já manifestaram interesse.',
            '11' => 'Apesar das primeiras varreduras muito promissoras deste setor, infelizmente retornamos de mãos vazias.',
            '12' => 'Além de alguns pequenos e peculiares animais de estimação de um planeta pantanoso desconhecido, esta expedição não traz nada emocionante de volta da viagem.',
            '13' => 'A capitânia da expedição colidiu com uma nave estrangeira quando ela entrou na frota sem aviso. A nave estrangeira explodiu e o dano à capitânia foi substancial. A expedição não pode continuar nestas condições, e a frota começará a voltar assim que os reparos necessários forem realizados.',
            '14' => 'Nossa equipe de expedição encontrou uma colônia estranha abandonada há eras. Após o pouso, nossa tripulação começou a sofrer de febre alta causada por um vírus alienígena. Descobriu-se que este vírus exterminou toda a civilização no planeta. Nossa equipe de expedição está voltando para casa para tratar os membros da tripulação doentes. Infelizmente tivemos que abortar a missão e voltamos de mãos vazias.',
            '15' => 'Um estranho vírus de computador atacou o sistema de navegação logo após partir de nosso sistema natal. Isso fez com que a frota de expedição voasse em círculos. Diga-se de passagem que a expedição não foi realmente bem-sucedida.',
        ],
    ],

    // Gain Resources
    'expedition_gain_resources' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionGainResources class.
        // Ids are append-only: message_variation_id is persisted on sent messages, so existing ids must keep
        // their text and new messages must be added at the end. The find-variant tier (normal/rare/exceptional)
        // of each id is defined in the ExpeditionGainResources class.
        'body' => [
            '1' => 'Em um planetoide isolado encontramos alguns campos de recursos de fácil acesso e colhemos alguns com sucesso.', // normal
            '2' => 'Sua expedição descobriu um pequeno asteroide do qual alguns recursos puderam ser colhidos.', // normal
            '3' => 'Sua frota de expedição relata a descoberta de um comboio de cargueiros antigo, totalmente carregado, mas abandonado. Alguns dos recursos puderam ser resgatados.', // rare
            '4' => 'Sua frota de expedição relata a descoberta de um enorme destroço de nave alienígena. Não conseguiram aprender com suas tecnologias, mas conseguiram dividir a nave em seus componentes principais e produzir alguns recursos úteis.', // normal
            '5' => 'Em uma minúscula lua com sua própria atmosfera, sua expedição encontrou um enorme armazenamento de recursos brutos. A equipe em terra está tentando levantar e carregar esse tesouro natural.', // rare
            '6' => 'Cinturões minerais ao redor de um planeta desconhecido continham incontáveis recursos. As naves da expedição estão voltando e seus depósitos estão cheios!', // exceptional
            '7' => 'Sua expedição encontrou destroços de naves espaciais de uma velha batalha. Alguns dos componentes puderam ser salvos e reciclados.', // normal
            '8' => 'Encontramos um pequeno comboio de naves civis que precisavam desesperadamente de comida e remédios. Em troca, recebemos montes de recursos úteis.', // rare
            '9' => 'A expedição encontrou um planetoide radioativo com atmosfera extremamente tóxica. Após múltiplas varreduras, mostra que tem montes de recursos. Com a ajuda de drones automatizados, tentamos colher o máximo de recursos possível.', // rare
        ],
    ],

    // Gain Dark Matter
    'expedition_gain_dark_matter' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionGainDarkMatter class.
        // Ids are append-only: message_variation_id is persisted on sent messages, so existing ids must keep
        // their text and new messages must be added at the end. The find-variant tier (normal/rare/exceptional)
        // of each id is defined in the ExpeditionGainDarkMatter class.
        'body' => [
            '1' => 'A expedição seguiu alguns sinais estranhos até um asteroide. No núcleo do asteroide foi encontrada uma pequena quantidade de Matéria Escura. O asteroide foi levado e os exploradores estão tentando extrair a Matéria Escura.', // normal
            '2' => 'A expedição conseguiu capturar e armazenar um pouco de Matéria Escura.', // normal
            '3' => 'Encontramos um alienígena estranho na prateleira de uma pequena nave que nos deu uma caixa com Matéria Escura em troca de alguns cálculos matemáticos simples.', // normal
            '4' => 'Encontramos os restos de uma nave alienígena. Encontramos um pequeno recipiente com Matéria Escura em uma prateleira no porão de carga!', // normal
            '5' => 'Nossa expedição fez o primeiro contato com uma raça especial. Parece que uma criatura feita de pura energia, que se chamava Legorian, voou através das naves da expedição e depois decidiu ajudar nossa espécie subdesenvolvida. Uma caixa contendo material de Matéria Escura materializou-se na ponte da nave!', // normal
            '6' => 'Nossa expedição assumiu uma nave fantasma que transportava uma pequena quantidade de Matéria Escura. Não encontramos indícios do que aconteceu com a tripulação original da nave, mas nossos técnicos conseguiram resgatar a Matéria Escura.', // normal
            '7' => 'Nossa expedição realizou um experimento único. Conseguiram colher Matéria Escura de uma estrela moribunda.', // rare
            '8' => 'Nossa expedição localizou uma estação espacial enferrujada, que parecia flutuar descontrolada pelo espaço sideral há muito tempo. A estação em si era totalmente inútil, no entanto, descobriu-se que alguma Matéria Escura está armazenada no reator. Nossos técnicos estão tentando salvar o máximo que podem.', // normal
            '9' => 'Nossa expedição relata um fenômeno espetacular. O acúmulo de Matéria Escura nos depósitos de energia dos escudos da nave. Nossos técnicos tentam armazenar o máximo de Matéria Escura possível enquanto o fenômeno dura.', // rare
            '10' => 'Uma deformação espontânea do hiperespaço permitiu que sua expedição colhesse grande quantidade de Matéria Escura!', // exceptional
        ],
    ],

    // Gain Ships
    'expedition_gain_ships' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionGainShips class.
        // Ids are append-only: message_variation_id is persisted on sent messages, so existing ids must keep
        // their text and new messages must be added at the end. The find-variant tier (normal/rare/exceptional)
        // of each id is defined in the ExpeditionGainShips class.
        'body' => [
            '1' => 'Nossa expedição encontrou um planeta que foi quase destruído durante uma certa cadeia de guerras. Há diferentes naves flutuando na órbita. Os técnicos estão tentando reparar algumas delas. Talvez também obtenhamos informações sobre o que aconteceu aqui.', // normal
            '2' => 'Encontramos uma estação pirata abandonada. Há algumas naves antigas no hangar. Nossos técnicos estão descobrendo se algumas ainda são úteis.', // normal
            '3' => 'Sua expedição encontrou os estaleiros de uma colônia abandonada eras atrás. No hangar do estaleiro descobriram algumas naves que poderiam ser recuperadas. Os técnicos estão tentando fazer algumas voarem novamente.', // normal
            '4' => 'Encontramos os restos de uma expedição anterior! Nossos técnicos tentarão fazer algumas das naves funcionarem novamente.', // normal
            '5' => 'Encontramos um estaleiro automático antigo. Algumas das naves ainda estão na fase de produção e nossos técnicos estão tentando reativar os geradores de energia do estaleiro.', // normal
            '6' => 'Encontramos os restos de uma armada. Os técnicos foram diretamente para as naves quase intactas para tentar fazê-las funcionar novamente.', // rare
            '7' => 'Encontramos o planeta de uma civilização extinta. Conseguimos ver uma enorme estação espacial intacta em órbita. Alguns de seus técnicos e pilotos foram à superfície procurar naves que ainda pudessem ser usadas.', // rare
            '8' => 'Encontramos um enorme cemitério de naves espaciais. Alguns dos técnicos da frota de expedição conseguiram fazer algumas naves funcionarem novamente.', // exceptional
        ],
    ],

    // Gain Item
    'expedition_gain_item' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionGainItem class.
        'body' => [
            '1' => 'Uma frota fugindo deixou um item para trás, a fim de nos distrair em auxílio à sua fuga.',
        ],
    ],

    // Failed and Speedup
    'expedition_failed_and_speedup' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionSpeedup class.
        'body' => [
            '1' => 'Sua expedição não relata anomalias no setor explorado. Mas a frota encontrou alguns ventos solares ao retornar. Isso resultou na viagem de retorno sendo acelerada. Sua expedição retorna para casa um pouco mais cedo.',
            '2' => 'O novo e ousado comandante viajou com sucesso através de um buraco de minhoca instável para encurtar o voo de volta! No entanto, a expedição em si não trouxe nada novo.',
            '3' => 'Um acoplamento reverso inesperado nas bobinas de energia dos motores acelerou o retorno da expedição, ela retorna para casa antes do esperado. Os primeiros relatórios dizem que não têm nada emocionante para relatar.',
        ],
    ],

    // Failure and Delay
    'expedition_failed_and_delay' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionDelay class.
        'body' => [
            '1' => 'Sua expedição entrou em um setor cheio de tempestades de partículas. Isso sobrecarregou os depósitos de energia e a maioria dos sistemas principais das naves caiu. Seus mecânicos conseguiram evitar o pior, mas a expedição vai retornar com um grande atraso.',
            '2' => 'Seu navegador cometeu um erro grave em seus cálculos, fazendo com que o salto da expedição fosse mal calculado. Não apenas a frota errou o alvo completamente, mas a viagem de retorno levará muito mais tempo do que o planejado originalmente.',
            '3' => 'O vento solar de uma gigante vermelha arruinou o salto da expedição e levará um bom tempo para calcular o salto de retorno. Não havia nada além do vazio do espaço entre as estrelas naquele setor. A frota retornará mais tarde do que o esperado.',
        ],
    ],

    // Battle
    'expedition_battle' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionBattle class.
        'body' => [
            '1' => 'Alguns bárbaros primitivos estão nos atacando com naves que nem podem ser chamadas de tal. Se o fogo ficar sério, seremos forçados a revidar.',
            '2' => 'Precisamos lutar contra alguns piratas que, felizmente, eram apenas alguns.',
            '3' => 'Captamos algumas transmissões de rádio de piratas bêbados. Parece que seremos atacados em breve.',
            '4' => 'Nossa expedição foi atacada por um pequeno grupo de naves desconhecidas!',
            '5' => 'Alguns piratas espaciais realmente desesperados tentaram capturar nossa frota de expedição.',
            '6' => 'Algumas naves de aparência exótica atacaram a frota de expedição sem aviso!',
            '7' => 'Sua frota de expedição teve um primeiro contato hostil com uma espécie desconhecida.',
        ],
    ],

    // Battle - Pirates
    'expedition_battle_pirates' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        'body' => [
            '1' => 'Alguns bárbaros primitivos estão nos atacando com naves que nem podem ser chamadas de tal. Se o fogo ficar sério, seremos forçados a revidar.',
            '2' => 'Precisamos lutar contra alguns piratas que, felizmente, eram apenas alguns.',
            '3' => 'Captamos algumas transmissões de rádio de piratas bêbados. Parece que seremos atacados em breve.',
            '4' => 'Nossa expedição foi atacada por um pequeno grupo de piratas espaciais!',
            '5' => 'Alguns piratas espaciais realmente desesperados tentaram capturar nossa frota de expedição.',
            '6' => 'Piratas emboscaram a frota de expedição sem aviso!',
            '7' => 'Uma frota maltrapilha de piratas espaciais nos interceptou, exigindo tributo.',
        ],
    ],

    // Battle - Aliens
    'expedition_battle_aliens' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        'body' => [
            '1' => 'Captamos sinais estranhos de naves desconhecidas. Elas se revelaram hostis!',
            '2' => 'Uma patrulha alienígena detectou nossa frota de expedição e atacou imediatamente!',
            '3' => 'Sua frota de expedição teve um primeiro contato hostil com uma espécie desconhecida.',
            '4' => 'Algumas naves de aparência exótica atacaram a frota de expedição sem aviso!',
            '5' => 'Uma frota de naves de guerra alienígenas emergiu do hiperespaço e nos engajou!',
            '6' => 'Encontramos uma espécie alienígena tecnologicamente avançada que não era pacífica.',
            '7' => 'Nossos sensores detectaram assinaturas de energia desconhecidas antes que naves alienígenas atacassem!',
        ],
    ],

    // Loss of Fleet
    'expedition_loss_of_fleet' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionLossOfFleet class.
        'body' => [
            '1' => 'Um colapso do núcleo da nave líder leva a uma reação em cadeia, que destrói toda a frota de expedição em uma explosão espetacular.',
        ],
    ],

    // Merchant Found
    'expedition_merchant_found' => [
        'from' => 'Comando da Frota',
        'subject' => 'Resultado da Expedição',
        // An expedition message can have different variations which are parsed by the ExpeditionMerchantFound class.
        'body' => [
            '1' => 'Sua frota de expedição fez contato com uma raça alienígena amigável. Eles anunciaram que enviariam um representante com mercadorias para comerciar em seus mundos.',
            '2' => 'Uma misteriosa nave mercante se aproximou de sua expedição. O comerciante ofereceu visitar seus planetas e fornecer serviços comerciais especiais.',
            '3' => 'A expedição encontrou um comboio mercante intergaláctico. Um dos comerciantes concordou em visitar seu mundo natal para oferecer oportunidades de comércio.',
        ],
    ],

    // ------------------------
    // Buddy Request Received
    'buddy_request_received' => [
        'from' => 'Amigos',
        'subject' => 'Solicitação de amigo',
        'body' => 'Você recebeu uma nova solicitação de amigo de :sender_name.<span style="display:none;">:buddy_request_id</span>',
    ],

    // ------------------------
    // Buddy Request Accepted
    'buddy_request_accepted' => [
        'from' => 'Amigos',
        'subject' => 'Solicitação de amigo aceita',
        'body' => 'O jogador :accepter_name adicionou você à lista de amigos dele.',
    ],

    // ------------------------
    // Buddy Removed
    'buddy_removed' => [
        'from' => 'Amigos',
        'subject' => 'Você foi removido de uma lista de amigos',
        'body' => 'O jogador :remover_name removeu você da lista de amigos dele.',
    ],

    // ------------------------
    // Missile Attack Report (Attacker)
    'missile_attack_report' => [
        'from' => 'Comando da Frota',
        'subject' => 'Ataque de mísseis em :target_coords',
        'body' => 'Seus mísseis interplanetários de :origin_planet_name :origin_planet_coords (ID: :origin_planet_id) alcançaram seu alvo em :target_planet_name :target_coords (ID: :target_planet_id, Tipo: :target_type).

Mísseis lançados: :missiles_sent
Mísseis interceptados: :missiles_intercepted
Mísseis acertaram: :missiles_hit

Defesas destruídas: :defenses_destroyed',
    ],

    // ------------------------
    // Missile Defense Report (Defender)
    'missile_defense_report' => [
        'from' => 'Comando de Defesa',
        'subject' => 'Ataque de mísseis em :planet_coords',
        'body' => 'Seu planeta :planet_name em :planet_coords (ID: :planet_id) foi atacado por mísseis interplanetários de :attacker_name!

Mísseis recebidos: :missiles_incoming
Mísseis interceptados: :missiles_intercepted
Mísseis acertaram: :missiles_hit

Defesas destruídas: :defenses_destroyed',
    ],

    // ------------------------
    // Alliance Broadcast
    'alliance_broadcast' => [
        'from' => ':sender_name',
        'subject' => '[:alliance_tag] Transmissão da aliança de :sender_name',
        'body' => ':message',
    ],

    // ------------------------
    // Alliance Application Received
    'alliance_application_received' => [
        'from' => 'Gerenciamento de Aliança',
        'subject' => 'Nova aplicação de aliança',
        'body' => 'O jogador :applicant_name solicitou ingressar na sua aliança.

Mensagem da aplicação:
:application_message',
    ],

    // Planet relocation messages
    'bot_activity' => [
        'from' => 'Controle de Bot',
        'subject' => 'Atividade do bot: :bot_name',
        'body' => ':action

Bot: :bot_name
Coordenadas: :coordinates',
    ],

    'planet_relocation_success' => [
        'from' => 'Gerenciar colônias',
        'subject' => 'A relocação de :planet_name foi bem-sucedida',
        'body' => 'O planeta :planet_name foi relocado com sucesso das coordenadas [coordinates]:old_coordinates[/coordinates] para [coordinates]:new_coordinates[/coordinates].',
    ],

    // Fleet union invite
    'fleet_union_invite' => [
        'from' => 'Comando da Frota',
        'subject' => 'Convite para combate de aliança',
        'body' => ':sender_name convidou você para a missão :union_name contra :target_player em [:target_coords], a frota foi cronometrada para :arrival_time.

CUIDADO: O horário de chegada pode mudar devido à entrada de frotas. Cada nova frota pode estender este tempo em no máximo 30%, caso contrário não será permitido entrar.

NOTA: A força total de todos os participantes comparada à força total dos defensores determina se será uma batalha honrosa ou não.',
    ],

    // Building upgrade messages
    'Shipyard is being upgraded.' => 'Estaleiro está sendo atualizado.',
    'Nanite Factory is being upgraded.' => 'Fábrica de Nanites está sendo atualizada.',

    // ------------------------
    // Moon destruction messages (attacker)
    // TODO: these moon destruction messages are not correct and should be updated with
    // real official messages from the original game. These are just placeholders for now.
    'moon_destruction_success' => [
        'from' => 'Comando da Frota',
        'subject' => 'Lua :moon_name [:moon_coords] foi destruída!',
        'body' => 'Com uma probabilidade de destruição de :destruction_chance e uma probabilidade de perda de Estrela da Morte de :loss_chance, sua frota destruiu com sucesso a lua :moon_name em :moon_coords.',
    ],

    // ------------------------
    'moon_destruction_failure' => [
        'from' => 'Comando da Frota',
        'subject' => 'Destruição de lua em :moon_coords falhou',
        'body' => 'Com uma probabilidade de destruição de :destruction_chance e uma probabilidade de perda de Estrela da Morte de :loss_chance, sua frota falhou em destruir a lua :moon_name em :moon_coords. A frota está retornando.',
    ],

    // ------------------------
    'moon_destruction_catastrophic' => [
        'from' => 'Comando da Frota',
        'subject' => 'Perda catastrófica durante destruição de lua em :moon_coords',
        'body' => 'Com uma probabilidade de destruição de :destruction_chance e uma probabilidade de perda de Estrela da Morte de :loss_chance, sua frota falhou em destruir a lua :moon_name em :moon_coords. Além disso, todas as Estrelas da Morte foram perdidas na tentativa. Não há destroços.',
    ],

    // ------------------------
    'moon_destruction_mission_failed' => [
        'from' => 'Comando da Frota',
        'subject' => 'Missão de destruição de lua falhou em :coordinates',
        'body' => 'Sua frota chegou em :coordinates mas nenhuma lua foi encontrada no local alvo. A frota está retornando.',
    ],

    // ------------------------
    // Moon destruction messages (defender)
    'moon_destruction_repelled' => [
        'from' => 'Monitoramento Espacial',
        'subject' => 'Tentativa de destruição da lua :moon_name [:moon_coords] repelida',
        'body' => ':attacker_name atacou sua lua :moon_name em :moon_coords com uma probabilidade de destruição de :destruction_chance e uma probabilidade de perda de Estrela da Morte de :loss_chance. Sua lua sobreviveu ao ataque!',
    ],

    // ------------------------
    'moon_destroyed' => [
        'from' => 'Monitoramento Espacial',
        'subject' => 'Lua :moon_name [:moon_coords] foi destruída!',
        'body' => 'Sua lua :moon_name em :moon_coords foi destruída por uma frota de Estrelas da Morte pertencente a :attacker_name!',
    ],

    // ------------------------
    // Wreck field repair completed
    'wreck_field_repair_completed' => [
        'from' => 'Mensagem do Sistema',
        'subject' => 'Reparo concluído',
        'body' => 'Seu pedido de reparo no planeta :planet foi concluído.
:ship_count naves foram colocadas de volta em serviço.',
    ],
];