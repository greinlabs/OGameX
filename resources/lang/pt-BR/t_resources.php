<?php

return [
    'metal_mine' => [
        'title'            => 'Mina de Metal',
        'description'      => 'Usada na extração de minério de metal, as minas de metal são de importância primária para todos os impérios emergentes e estabelecidos.',
        'description_long' => 'O metal é o recurso primário usado na fundação do seu Império. Em maiores profundidades, as minas podem produzir mais metal viável para uso na construção de edifícios, naves, sistemas de defesa e pesquisas. À medida que as minas perfuram mais fundo, mais energia é necessária para a produção máxima. Como o metal é o mais abundante de todos os recursos disponíveis, seu valor é considerado o menor de todos os recursos para comércio.',
    ],

    'crystal_mine' => [
        'title'            => 'Mina de Cristal',
        'description'      => 'Cristais são o principal recurso usado para construir circuitos eletrônicos e formar certos compostos de liga.',
        'description_long' => 'As minas de cristal fornecem o principal recurso usado para produzir circuitos eletrônicos e certos compostos de liga. Minerar cristal consome uma vez e meia mais energia do que minerar metal, tornando o cristal mais valioso. Quase todas as naves e todos os edifícios requerem cristal. A maioria dos cristais necessários para construir naves espaciais, no entanto, é muito rara e, como o metal, só pode ser encontrada em certas profundidades. Portanto, construir minas em estratos mais profundos aumentará a quantidade de cristal produzida.',
    ],

    'deuterium_synthesizer' => [
        'title'            => 'Sintetizador de Deutério',
        'description'      => 'Os Sintetizadores de Deutério extraem o teor residual de Deutério da água de um planeta.',
        'description_long' => 'O Deutério também é chamado de hidrogênio pesado. É um isótopo estável do hidrogênio com abundância natural nos oceanos das colônias de aproximadamente um átomo em 6500 de hidrogênio (~154 PPM). O Deutério representa, portanto, aproximadamente 0,015% (em base de peso, 0,030%) de todo o hidrogênio. O Deutério é processado por sintetizadores especiais que podem separar a água do Deutério usando centrífugas especialmente projetadas. A atualização do sintetizador permite aumentar a quantidade de depósitos de Deutério processados. O Deutério é usado ao realizar varreduras de falange de sensores, visualizar galáxias, como combustível para naves e realizar atualizações de pesquisa especializadas.',
    ],

    'solar_plant' => [
        'title'            => 'Usina Solar',
        'description'      => 'As usinas solares absorvem energia da radiação solar. Todas as minas precisam de energia para operar.',
        'description_long' => 'Enormes arranjos solares são usados para gerar energia para as minas e o sintetizador de deutério. À medida que a usina solar é atualizada, a área de superfície das células fotovoltaicas que cobrem o planeta aumenta, resultando em maior produção de energia nas redes elétricas do seu planeta.',
    ],

    'fusion_plant' => [
        'title'            => 'Reator de Fusão',
        'description'      => 'O reator de fusão usa deutério para produzir energia.',
        'description_long' => 'Nas usinas de fusão, núcleos de hidrogênio são fundidos em núcleos de hélio sob temperatura e pressão enormes, liberando tremendas quantidades de energia. Para cada grama de Deutério consumido, até 41,32*10^-13 Joule de energia podem ser produzidos; com 1 g você é capaz de produzir 172 MWh de energia.

Complexos de reatores maiores usam mais deutério e podem produzir mais energia por hora. O efeito de energia pode ser aumentado pesquisando tecnologia de energia.

A produção de energia da usina de fusão é calculada assim:
30 * [Nível Usina de Fusão] * (1,05 + [Nível Tecnologia de Energia] * 0,01) ^ [Nível Usina de Fusão]',
    ],

    'metal_store' => [
        'title'            => 'Armazenamento de Metal',
        'description'      => 'Fornece armazenamento para metal excedente.',
        'description_long' => 'Esta instalação gigante de armazenamento é usada para armazenar minério de metal. Cada nível de atualização aumenta a quantidade de minério de metal que pode ser armazenada. Se os armazéns estiverem cheios, nenhum metal adicional será minerado.

O Armazenamento de Metal protege uma certa porcentagem da produção diária da mina (máx. 10 por cento).',
    ],

    'crystal_store' => [
        'title'            => 'Armazenamento de Cristal',
        'description'      => 'Fornece armazenamento para cristal excedente.',
        'description_long' => 'O cristal não processado será armazenado nestes enormes salões de armazenamento enquanto isso. Com cada nível de atualização, aumenta a quantidade de cristal que pode ser armazenada. Se os armazéns de cristal estiverem cheios, nenhum cristal adicional será minerado.

O Armazenamento de Cristal protege uma certa porcentagem da produção diária da mina (máx. 10 por cento).',
    ],

    'deuterium_store' => [
        'title'            => 'Tanque de Deutério',
        'description'      => 'Tanques gigantes para armazenar deutério recém-extraído.',
        'description_long' => 'O tanque de deutério é para armazenar deutério recém-sintetizado. Uma vez processado pelo sintetizador, ele é canalizado para este tanque para uso posterior. Com cada atualização do tanque, a capacidade total de armazenamento é aumentada. Uma vez atingida a capacidade, nenhum deutério adicional será sintetizado.

O Tanque de Deutério protege uma certa porcentagem da produção diária do sintetizador (máx. 10 por cento).',
    ],

    // -------------------------------------------------------------------------
    // Station / Facilities objects (from StationObjects.php)
    // -------------------------------------------------------------------------

    'robot_factory' => [
        'title'            => 'Fábrica de Robôs',
        'description'      => 'Fábricas robóticas fornecem robôs de construção para auxiliar na construção de edifícios. Cada nível aumenta a velocidade de atualização dos edifícios.',
        'description_long' => 'O objetivo principal da Fábrica de Robôs é a produção de robôs de construção de última geração. Cada atualização da fábrica de robôs resulta na produção de robôs mais rápidos, que são usados para reduzir o tempo necessário para construir edifícios.',
    ],

    'shipyard' => [
        'title'            => 'Estaleiro',
        'description'      => 'Todos os tipos de naves e instalações defensivas são construídos no estaleiro planetário.',
        'description_long' => 'O estaleiro planetário é responsável pela construção de espaçonaves e mecanismos defensivos. À medida que o estaleiro é atualizado, ele pode produzir uma variedade maior de veículos em uma taxa de velocidade muito maior. Se uma fábrica de nanites estiver presente no planeta, a velocidade com que as naves são construídas aumenta massivamente.',
    ],

    'research_lab' => [
        'title'            => 'Laboratório de Pesquisa',
        'description'      => 'Um laboratório de pesquisa é necessário para conduzir pesquisas em novas tecnologias.',
        'description_long' => 'Uma parte essencial de qualquer império, os Laboratórios de Pesquisa são onde novas tecnologias são descobertas e tecnologias antigas são aprimoradas. Com cada nível do Laboratório de Pesquisa construído, a velocidade com que novas tecnologias são pesquisadas aumenta, além de desbloquear tecnologias mais novas para pesquisar. Para conduzir pesquisas o mais rápido possível, cientistas de pesquisa são imediatamente despachados para a colônia para começar o trabalho e desenvolvimento. Dessa forma, o conhecimento sobre novas tecnologias pode ser facilmente disseminado por todo o império.',
    ],

    'alliance_depot' => [
        'title'            => 'Depósito da Aliança',
        'description'      => 'O depósito da aliança fornece combustível para frotas amigas em órbita ajudando na defesa.',
        'description_long' => 'O depósito da aliança fornece combustível para frotas amigas em órbita ajudando na defesa. Para cada nível de atualização do depósito da aliança, uma demanda especial de deutério por hora pode ser enviada para uma frota em órbita.',
    ],

    'missile_silo' => [
        'title'            => 'Silo de Mísseis',
        'description'      => 'Silos de mísseis são usados para armazenar mísseis.',
        'description_long' => 'Silos de mísseis são usados para construir, armazenar e lançar mísseis interplanetários e anti-balísticos. Com cada nível do silo, cinco mísseis interplanetários ou dez mísseis anti-balísticos podem ser armazenados. Um míssil interplanetário usa o mesmo espaço que dois mísseis anti-balísticos. O armazenamento de ambos os mísseis interplanetários e anti-balísticos no mesmo silo é permitido.',
    ],

    'nano_factory' => [
        'title'            => 'Fábrica de Nanites',
        'description'      => 'Esta é a tecnologia robótica definitiva. Cada nível reduz o tempo de construção de edifícios, naves e defesas.',
        'description_long' => 'Uma nanomáquina, também chamada de nanite, é um dispositivo mecânico ou eletromecânico cujas dimensões são medidas em nanômetros (milionésimos de milímetro, ou unidades de 10^-9 metro). O tamanho microscópico das nanomáquinas se traduz em maior velocidade operacional. Esta fábrica produz nanomáquinas que são a evolução definitiva na tecnologia robótica. Uma vez construída, cada atualização diminui significativamente o tempo de produção para edifícios, naves e estruturas defensivas.',
    ],

    'terraformer' => [
        'title'            => 'Terraformador',
        'description'      => 'O terraformador aumenta a superfície utilizável dos planetas.',
        'description_long' => 'Com a construção crescente nos planetas, até o espaço vital para a colônia está se tornando cada vez mais limitado. Métodos tradicionais como construção de arranha-céus e construção subterrânea estão se tornando cada vez mais insuficientes. Um pequeno grupo de físicos de alta energia e engenheiros nano eventualmente chegou à solução: terraformação.
Fazendo uso de tremendas quantidades de energia, o terraformador pode tornar trechos inteiros de terra ou até continentes aráveis. Este edifício abriga a produção de nanites criados especificamente para este propósito, que garantem uma qualidade de solo consistente.

Cada nível de terraformador permite cultivar 5 campos. Com cada nível, o terraformador ocupa um campo. A cada 2 níveis de terraformador você receberá 1 campo bônus.

Uma vez construído, o terraformador não pode ser desmontado.',
    ],

    'space_dock' => [
        'title'            => 'Doca Espacial',
        'description'      => 'Estragos podem ser reparados na Doca Espacial.',
        'description_long' => 'A Doca Espacial oferece a possibilidade de reparar naves destruídas em batalha que deixaram destroços. O tempo de reparo leva no máximo 12 horas, mas leva pelo menos 30 minutos até que as naves possam ser colocadas de volta em serviço.

Os reparos devem começar dentro de 3 dias da criação dos destroços. As naves reparadas devem ser retornadas ao serviço manualmente após a conclusão dos reparos. Se isso não for feito, naves individuais de qualquer tipo serão retornadas ao serviço após 3 dias.

Destroços só aparecem se mais de 150.000 unidades forem destruídas, incluindo as próprias naves que participaram do combate com um valor de pelo menos 5% dos pontos da nave.

Como a Doca Espacial flutua em órbita, ela não requer um campo de planeta.',
    ],

    'lunar_base' => [
        'title'            => 'Base Lunar',
        'description'      => 'Como a lua não tem atmosfera, uma base lunar é necessária para gerar espaço habitável.',
        'description_long' => 'Uma lua não tem atmosfera, então uma base lunar deve ser construída primeiro antes que um assentamento possa ser estabelecido. Isso então fornece oxigênio, aquecimento e gravidade. Com cada nível construído, uma área maior de vida e desenvolvimento é fornecida dentro da biosfera. Cada nível construído permite três campos para outros edifícios. Com cada nível, a Base Lunar ocupa um campo.
Uma vez construída, a base lunar não pode ser demolida.',
    ],

    'sensor_phalanx' => [
        'title'            => 'Falange de Sensores',
        'description'      => 'Usando a falange de sensores, frotas de outros impérios podem ser descobertas e observadas. Quanto maior a matriz da falange de sensores, maior o alcance que ela pode escanear.',
        'description_long' => 'Utilizando sensores de alta resolução, a Falange de Sensores primeiro escaneia o espectro de luz, composição de gases e emissões de radiação de um mundo distante e transmite os dados para um supercomputador para processamento. Uma vez obtida a informação, o supercomputador compara mudanças no espectro, composição de gases e emissões de radiação a um gráfico de linha de base de mudanças conhecidas do espectro criadas por vários movimentos de naves. Os dados resultantes então exibem a atividade de qualquer frota dentro do alcance da falange. Para evitar que o supercomputador superaqueça durante o processo, ele é resfriado utilizando 5k de Deutério processado.
Para usar a Falange, clique em qualquer planeta na Visualização da Galáxia dentro do alcance dos seus sensores.',
    ],

    'jump_gate' => [
        'title'            => 'Porta de Salto',
        'description'      => 'Portas de salto são transceptores gigantes capazes de enviar até a maior frota em nenhum momento para uma porta de salto distante.',
        'description_long' => 'Uma Porta de Salto é um sistema de transceptores gigantes capazes de enviar até as maiores frotas para uma Porta receptora em qualquer lugar do universo sem perda de tempo. Utilizando tecnologia semelhante à de um Buraco de Minhoca para realizar o salto, deutério não é necessário. Um período de recarga de alguns minutos deve passar entre saltos para permitir a regeneração. Transportar recursos através da Porta também não é possível. Com cada nível de atualização, o tempo de recarga da porta de salto pode ser reduzido.',
    ],

    // -------------------------------------------------------------------------
    // Research objects (from ResearchObjects.php)
    // -------------------------------------------------------------------------

    'energy_technology' => [
        'title'            => 'Tecnologia de Energia',
        'description'      => 'O comando de diferentes tipos de energia é necessário para muitas novas tecnologias.',
        'description_long' => 'À medida que vários campos de pesquisa avançaram, descobriu-se que a tecnologia atual de distribuição de energia não era suficiente para começar certas pesquisas especializadas. Com cada atualização de sua Tecnologia de Energia, novas pesquisas podem ser conduzidas, desbloqueando o desenvolvimento de naves e defesas mais sofisticadas.',
    ],

    'laser_technology' => [
        'title'            => 'Tecnologia a Laser',
        'description'      => 'Focar a luz produz um feixe que causa dano quando atinge um objeto.',
        'description_long' => 'Lasers (amplificação de luz por emissão estimulada de radiação) produzem uma emissão intensa e rica em energia de luz coerente. Esses dispositivos podem ser usados em todos os tipos de áreas, desde computadores ópticos até armas a laser pesadas, que cortam a tecnologia de armadura sem esforço. A tecnologia a laser fornece uma base importante para a pesquisa de outras tecnologias de armas.',
    ],

    'ion_technology' => [
        'title'            => 'Tecnologia de Íons',
        'description'      => 'A concentração de íons permite a construção de canhões, que podem infligir danos enormes e reduzir os custos de desconstrução por nível em 4%.',
        'description_long' => 'Íons podem ser concentrados e acelerados em um feixe mortal. Esses feixes podem então infligir danos enormes. Nossos cientistas também desenvolveram uma técnica que reduzirá claramente os custos de desconstrução para edifícios e sistemas. Para cada nível de pesquisa, os custos de desconstrução cairão 4%.',
    ],

    'hyperspace_technology' => [
        'title'            => 'Tecnologia de Hiperespaço',
        'description'      => 'Integrando a 4ª e 5ª dimensões, agora é possível pesquisar um novo tipo de propulsão que é mais econômica e eficiente.',
        'description_long' => 'Em teoria, a ideia de viagem no hiperespaço depende da existência de uma dimensão separada e adjacente. Quando ativada, uma propulsão de hiperespaço lança a nave estelar nessa outra dimensão, onde ela pode cobrir vastas distâncias em uma quantidade de tempo muito reduzida comparada ao tempo que levaria no espaço "normal". Uma vez que atinge o ponto no hiperespaço correspondente ao seu destino no espaço real, ela reaparece.
Uma vez que um nível suficiente de Tecnologia de Hiperespaço é pesquisado, a Propulsão de Hiperespaço não é mais apenas teoria. Cada melhoria nessa propulsão aumenta a capacidade de carga de suas naves em 5% do valor base.',
    ],

    'plasma_technology' => [
        'title'            => 'Tecnologia de Plasma',
        'description'      => 'Um desenvolvimento adicional da tecnologia de íons que acelera plasma de alta energia, que então inflige danos devastadores e adicionalmente otimiza a produção de metal, cristal e deutério (1%/0,66%/0,33% por nível).',
        'description_long' => 'Um desenvolvimento adicional da tecnologia de íons que não acelera íons, mas plasma de alta energia, que pode então infligir danos devastadores no impacto com um objeto. Nossos cientistas também encontraram uma maneira de melhorar notavelmente a mineração de metal e cristal usando esta tecnologia.

A produção de metal aumenta 1%, a de cristal 0,66% e a de deutério 0,33% por nível de construção da tecnologia de plasma.',
    ],

    'combustion_drive' => [
        'title'            => 'Propulsão a Combustão',
        'description'      => 'O desenvolvimento desta propulsão torna algumas naves mais rápidas, embora cada nível aumente a velocidade em apenas 10% do valor base.',
        'description_long' => 'A Propulsão a Combustão é a mais antiga das tecnologias, mas ainda está em uso. Com a Propulsão a Combustão, o escapamento é formado a partir de propelentes transportados dentro da nave antes do uso. Em uma câmara fechada, as pressões são iguais em cada direção e nenhuma aceleração ocorre. Se uma abertura for fornecida na parte inferior da câmara, a pressão não será mais oposta nesse lado. A pressão restante fornece um impulso resultante no lado oposto à abertura, que impulsiona a nave para frente expelindo o escapamento para trás em velocidade extrema.

Com cada nível da Propulsão a Combustão desenvolvido, a velocidade de naves de carga pequenas e grandes, caças leves, recicladores e sondas de espionagem aumentam 10%.',
    ],

    'impulse_drive' => [
        'title'            => 'Propulsão a Impulso',
        'description'      => 'A propulsão a impulso é baseada no princípio de reação. O desenvolvimento adicional desta propulsão torna algumas naves mais rápidas, embora cada nível aumente a velocidade em apenas 20% do valor base.',
        'description_long' => 'A propulsão a impulso é baseada no princípio de recuo, pelo qual a emissão estimulada de radiação é produzida principalmente como produto residual da fusão do núcleo para ganhar energia. Além disso, outras massas podem ser injetadas. Com cada nível da Propulsão a Impulso desenvolvido, a velocidade de bombardeiros, cruzadores, caças pesados e naves de colonização aumentam 20% do valor base. Além disso, os transportadores pequenos são equipados com propulsão a impulso assim que seu nível de pesquisa atinge 5. Assim que a pesquisa de Propulsão a Impulso atinge o nível 17, os Recicladores são reequipados com Propulsão a Impulso.

Mísseis interplanetários também viajam mais longe com cada nível.',
    ],

    'hyperspace_drive' => [
        'title'            => 'Propulsão de Hiperespaço',
        'description'      => 'A propulsão de hiperespaço dobra o espaço ao redor de uma nave. O desenvolvimento desta propulsão torna algumas naves mais rápidas, embora cada nível aumente a velocidade em apenas 30% do valor base.',
        'description_long' => 'Nas imediações da nave, o espaço é dobrado para que longas distâncias possam ser percorridas muito rapidamente. Quanto mais a Propulsão de Hiperespaço é desenvolvida, mais forte a natureza dobrada do espaço, fazendo com que a velocidade das naves equipadas com ela (Cruzadores de Batalha, Encouraçados, Destróieres, Estrelas da Morte, Desbravadores e Ceifadores) aumente 30% por nível. Além disso, o bombardeiro é construído com uma Propulsão de Hiperespaço assim que a pesquisa atinge o nível 8. Assim que a pesquisa de Propulsão de Hiperespaço atinge o nível 15, o Reciclador é reequipado com uma Propulsão de Hiperespaço.',
    ],

    'espionage_technology' => [
        'title'            => 'Tecnologia de Espionagem',
        'description'      => 'Informações sobre outros planetas e luas podem ser obtidas usando esta tecnologia.',
        'description_long' => 'A Tecnologia de Espionagem é, em primeiro lugar, um avanço da tecnologia de sensores. Quanto mais avançada esta tecnologia, mais informações o usuário recebe sobre atividades em seu ambiente.
A diferença entre seu próprio nível de espionagem e os níveis de espionagem opostos é crucial para as sondas. Quanto mais avançada sua própria tecnologia de espionagem, mais informações o relatório pode reunir e menor a chance de suas atividades de espionagem serem descobertas. Quanto mais sondas você envia em uma missão, mais detalhes elas podem coletar do planeta alvo. Mas ao mesmo tempo, também aumenta a chance de descoberta.
A tecnologia de espionagem também melhora a chance de localizar frotas estrangeiras. O nível de espionagem é vital para determinar isso. A partir do nível 2, o número total exato de naves atacantes é exibido junto com a notificação de ataque normal. E a partir do nível 4, o tipo de naves atacantes e o número total são mostrados e a partir do nível 8 o número exato de diferentes tipos de naves é mostrado.
Esta tecnologia é indispensável para um ataque iminente, pois informa se a frota vítima tem defesa disponível ou não. Por isso, esta tecnologia deve ser pesquisada muito cedo.',
    ],

    'computer_technology' => [
        'title'            => 'Tecnologia de Computação',
        'description'      => 'Mais frotas podem ser comandadas aumentando as capacidades de computação. Cada nível de tecnologia de computação aumenta o número máximo de frotas em um.',
        'description_long' => 'Uma vez lançadas em qualquer missão, as frotas são controladas principalmente por uma série de computadores localizados no planeta de origem. Esses computadores massivos calculam o tempo exato de chegada, controlam correções de curso conforme necessário, calculam trajetórias e regulam velocidades de voo.
Com cada nível pesquisado, o computador de voo é atualizado para permitir que um slot adicional seja lançado. A tecnologia de computação deve ser continuamente desenvolvida durante a construção do seu império.',
    ],

    'astrophysics' => [
        'title'            => 'Astrofísica',
        'description'      => 'Com um módulo de pesquisa de astrofísica, naves podem realizar longas expedições. A cada segundo nível desta tecnologia, você poderá colonizar um planeta extra.',
        'description_long' => 'Descobertas adicionais no campo da astrofísica permitem a construção de laboratórios que podem ser equipados em mais e mais naves. Isso torna expedições longas em áreas inexploradas do espaço possíveis. Além disso, esses avanços podem ser usados para colonizar ainda mais o universo. Para cada dois níveis desta tecnologia, um planeta adicional pode ser tornado utilizável.',
    ],

    'intergalactic_research_network' => [
        'title'            => 'Rede de Pesquisa Intergaláctica',
        'description'      => 'Pesquisadores em diferentes planetas se comunicam através desta rede.',
        'description_long' => 'Esta é sua rede de espaço profundo para comunicar resultados de pesquisa às suas colônias. Com a RPI, tempos de pesquisa mais rápidos podem ser alcançados vinculando os laboratórios de pesquisa de nível mais alto iguais ao nível da RPI desenvolvida.
Para funcionar, cada colônia deve ser capaz de conduzir a pesquisa independentemente.',
    ],

    'graviton_technology' => [
        'title'            => 'Tecnologia de Gráviton',
        'description'      => 'Disparar uma carga concentrada de partículas de gráviton pode criar um campo gravitacional artificial, que pode destruir naves ou até luas.',
        'description_long' => 'Um gráviton é uma partícula elementar sem massa e sem carga. Ele determina a potência gravitacional. Ao disparar uma carga concentrada de grávitons, um campo gravitacional artificial pode ser construído. Não muito diferente de um buraco negro, ele atrai massa para si. Assim, pode destruir naves e até luas inteiras. Para produzir uma quantidade suficiente de grávitons, enormes quantidades de energia são necessárias. A Pesquisa de Gráviton é necessária para construir uma Estrela da Morte destrutiva.',
    ],

    'weapon_technology' => [
        'title'            => 'Tecnologia de Armas',
        'description'      => 'A tecnologia de armas torna os sistemas de armas mais eficientes. Cada nível de tecnologia de armas aumenta a força das armas das unidades em 10% do valor base.',
        'description_long' => 'A Tecnologia de Armas é uma tecnologia de pesquisa chave e é crítica para sua sobrevivência contra impérios inimigos. Com cada nível de Tecnologia de Armas pesquisado, os sistemas de armas nas naves e seus mecanismos de defesa tornam-se cada vez mais eficientes. Cada nível aumenta a força base de suas armas em 10% do valor base.',
    ],

    'shielding_technology' => [
        'title'            => 'Tecnologia de Escudos',
        'description'      => 'A tecnologia de escudos torna os escudos nas naves e instalações defensivas mais eficientes. Cada nível de tecnologia de escudos aumenta a força dos escudos em 10% do valor base.',
        'description_long' => 'Com a invenção do gerador de magnetosfera, os cientistas descobriram que um escudo artificial poderia ser produzido para proteger a tripulação em naves espaciais não apenas do ambiente de radiação solar severo no espaço profundo, mas também fornecer proteção contra fogo inimigo durante um ataque. Uma vez que os cientistas finalmente aperfeiçoaram a tecnologia, um gerador de magnetosfera foi instalado em todas as naves e sistemas de defesa.
À medida que a tecnologia avança para cada nível, o gerador de magnetosfera é atualizado, o que fornece 10% de força adicional ao valor base dos escudos.',
    ],

    'armor_technology' => [
        'title'            => 'Tecnologia de Blindagem',
        'description'      => 'Ligas especiais melhoram a blindagem nas naves e estruturas defensivas. A eficácia da blindagem pode ser aumentada em 10% por nível.',
        'description_long' => 'O ambiente do espaço profundo é severo. Pilotos e tripulação em várias missões não apenas enfrentaram radiação solar intensa, mas também enfrentaram a perspectiva de serem atingidos por detritos espaciais ou destruídos por fogo inimigo em um ataque. Com a descoberta de uma liga de carbeto de titânio alumínio-lítio, que foi considerada leve e durável, isso proporcionou à tripulação certo grau de proteção. Com cada nível de Tecnologia de Blindagem desenvolvido, uma liga de maior qualidade é produzida, o que aumenta a força da blindagem em 10%.',
    ],

    // ---- Civil Ships ----

    'small_cargo' => [
        'title'            => 'Transporte Pequeno',
        'description'      => 'O transporte pequeno é uma nave ágil que pode transportar recursos rapidamente para outros planetas.',
        'description_long' => 'Transportadores são tão grandes quanto caças, porém abrem mão de propulsores de alto desempenho e armamento a bordo em favor de ganhos em sua capacidade de carga. Como resultado, um transportador só deve ser enviado em batalhas quando acompanhado por naves prontas para combate.

Assim que a Propulsão a Impulso atinge o nível de pesquisa 5, o transportador pequeno viaja com velocidade base aumentada e é equipado com uma Propulsão a Impulso.',
    ],

    'large_cargo' => [
        'title'            => 'Transporte Grande',
        'description'      => 'Esta nave de carga tem uma capacidade de carga muito maior que o transporte pequeno e é geralmente mais rápida graças a um propulsor aprimorado.',
        'description_long' => 'Conforme o tempo evoluiu, os ataques a colônias resultaram em quantidades cada vez maiores de recursos sendo capturados. Como resultado, Transportes Pequenos eram enviados em massa para compensar as capturas maiores. Rapidamente percebeu-se que uma nova classe de nave era necessária para maximizar os recursos capturados em ataques, mas também ser custo-efetiva. Após muito desenvolvimento, o Transporte Grande nasceu.

Para maximizar os recursos que podem ser armazenados nos porões, esta nave tem pouco em termos de armas ou blindagem. Graças ao motor de combustão altamente desenvolvido instalado, serve como o fornecedor de recursos mais econômico entre planetas e mais eficaz em ataques a mundos hostis.',
    ],

    'colony_ship' => [
        'title'            => 'Nave de Colonização',
        'description'      => 'Planetas vagos podem ser colonizados com esta nave.',
        'description_long' => 'No século 20, o homem decidiu ir para as estrelas. Primeiro, foi o pouso na Lua. Depois, uma estação espacial foi construída. Marte foi colonizado logo depois. Logo se determinou que nosso crescimento dependia da colonização de outros mundos. Cientistas e engenheiros de todo o mundo se reuniram para desenvolver a maior conquista do homem. A Nave de Colonização nasceu.

Esta nave é usada para preparar um planeta recém-descoberto para colonização. Uma vez que chega ao destino, a nave é instantaneamente transformada em espaço habitável para auxiliar na povoação e mineração do novo mundo. O número máximo de planetas é, assim, determinado pelo progresso na pesquisa de astrofísica. Dois novos níveis de Astrotecnologia permitem a colonização de um planeta adicional.',
    ],

    'recycler' => [
        'title'            => 'Reciclador',
        'description'      => 'Recicladores são as únicas naves capazes de colher campos de destroços flutuando na órbita de um planeta após o combate.',
        'description_long' => 'O combate no espaço assumiu escalas cada vez maiores. Milhares de naves foram destruídas e os recursos de seus restos pareciam perdidos para os campos de destroços para sempre. Naves de carga normais não conseguiam se aproximar o suficiente desses campos sem arriscar danos substanciais.
Um desenvolvimento recente em tecnologias de escudo contornou eficientemente este problema. Uma nova classe de naves foi criada, semelhante aos Transportadores: os Recicladores. Seus esforços ajudaram a reunir os recursos considerados perdidos e depois recuperá-los. Os destroços não representavam mais perigo real graças aos novos escudos.

Assim que a pesquisa de Propulsão a Impulso atingiu o nível 17, os Recicladores são reequipados com Propulsão a Impulso. Assim que a pesquisa de Propulsão de Hiperespaço atingiu o nível 15, os Recicladores são reequipados com Propulsão de Hiperespaço.',
    ],

    'espionage_probe' => [
        'title'            => 'Sonda de Espionagem',
        'description'      => 'Sondas de espionagem são pequenos drones ágeis que fornecem dados sobre frotas e planetas a grandes distâncias.',
        'description_long' => 'Sondas de espionagem são pequenos drones ágeis que fornecem dados sobre frotas e planetas. Equipadas com motores especialmente projetados, permitem que cubram vastas distâncias em apenas alguns minutos. Uma vez em órbita ao redor do planeta alvo, elas coletam rapidamente os dados e transmitem o relatório de volta via sua Rede de Espaço Profundo para avaliação. Mas há um risco no aspecto de coleta inteligente. Durante o tempo em que o relatório é transmitido de volta à sua rede, o sinal pode ser detectado pelo alvo e as sondas podem ser destruídas.',
    ],

    'solar_satellite' => [
        'title'            => 'Satélite Solar',
        'description'      => 'Satélites solares são plataformas simples de células solares, localizadas em uma órbita alta e estacionária. Eles coletam luz solar e a transmitem à estação terrestre via laser.',
        'description_long' => 'Cientistas descobriram um método de transmitir energia elétrica para a colônia usando satélites especialmente projetados em órbita geoestacionária. Satélites Solares coletam energia solar e a transmitem para uma estação terrestre usando tecnologia a laser avançada. A eficiência de um satélite solar depende da força da radiação solar que recebe. Em princípio, a produção de energia em órbitas mais próximas do sol é maior do que para planetas em órbitas distantes do sol.
Devido à sua boa relação custo/benefício, satélites solares podem resolver muitos problemas de energia. Mas cuidado: satélites solares podem ser facilmente destruídos em batalha.',
    ],

    'crawler' => [
        'title'            => 'Rastreador',
        'description'      => 'Rastreadores aumentam a produção de metal, cristal e Deutério em seu planeta designado em 0,02%, 0,02% e 0,02%, respectivamente. Como coletor, a produção também aumenta. O bônus total máximo depende do nível geral de suas minas.',
        'description_long' => 'O Rastreador é um grande veículo de trincheira que aumenta a produção de minas e sintetizadores. Ele é mais ágil do que parece, mas não é particularmente robusto. Cada Rastreador aumenta a produção de metal em 0,02%, a de cristal em 0,02% e a de Deutério em 0,02%. Como coletor, a produção também aumenta. O bônus total máximo depende do nível geral de suas minas.',
    ],

    'pathfinder' => [
        'title'            => 'Desbravador',
        'description'      => 'O Desbravador é uma nave rápida e ágil, construída para expedições em setores desconhecidos do espaço.',
        'description_long' => 'O Desbravador é o mais recente desenvolvimento em tecnologia de exploração. Esta nave foi especialmente projetada para membros da classe Descobridor para maximizar seu potencial. Equipada com sistemas avançados de escaneamento e um grande porão de carga para recuperar recursos, o Desbravador se destaca em expedições. Seus sensores sofisticados podem detectar recursos valiosos e anomalias que passariam despercebidos por outras naves. A nave combina alta velocidade com boa capacidade de carga, tornando-a perfeita para missões de exploração rápida e coleta de recursos de setores distantes.',
    ],

    // ---- Military Ships ----

    'light_fighter' => [
        'title'            => 'Caça Leve',
        'description'      => 'Esta é a primeira nave de combate que todos os imperadores construirão. O caça leve é uma nave ágil, mas vulnerável por conta própria. Em grandes números, podem se tornar uma grande ameaça a qualquer império. São os primeiros a acompanhar transportes pequenos e grandes a planetas hostis com defesas menores.',
        'description_long' => 'Esta é a primeira nave de combate que todos os imperadores construirão. O caça leve é uma nave ágil, mas vulnerável quando está sozinho. Em grandes números, podem se tornar uma grande ameaça a qualquer império. São os primeiros a acompanhar transportes pequenos e grandes a planetas hostis com defesas menores.',
    ],

    'heavy_fighter' => [
        'title'            => 'Caça Pesado',
        'description'      => 'Este caça é mais bem blindado e tem maior força de ataque que o caça leve.',
        'description_long' => 'No desenvolvimento do caça pesado, os pesquisadores chegaram a um ponto em que propulsores convencionais não forneciam mais desempenho suficiente. Para mover a nave de forma ótima, a propulsão a impulso foi usada pela primeira vez. Isso aumentou os custos, mas também abriu novas possibilidades. Ao usar esta propulsão, sobrou mais energia para armas e escudos; além disso, materiais de alta qualidade foram usados para esta nova família de caças. Com essas mudanças, o caça pesado representa uma nova era na tecnologia de naves e é a base para a tecnologia de cruzadores.

Ligeiramente maior que o caça leve, o caça pesado tem cascos mais grossos, proporcionando mais proteção, e armamento mais forte.',
    ],

    'cruiser' => [
        'title'            => 'Cruzador',
        'description'      => 'Cruzadores são blindados quase três vezes mais que caças pesados e têm mais que o dobro do poder de fogo. Além disso, são muito rápidos.',
        'description_long' => 'Com o desenvolvimento do laser pesado e do canhão de íons, caças leves e pesados encontraram um número alarmante de derrotas que aumentava a cada ataque. Apesar de muitas modificações, mudanças na força das armas e blindagem, não foi possível aumentá-las rápido o suficiente para contra-atacar efetivamente essas novas medidas defensivas. Portanto, decidiu-se construir uma nova classe de nave que combinasse mais blindagem e mais poder de fogo. Como resultado de anos de pesquisa e desenvolvimento, o Cruzador nasceu.

Cruzadores são blindados quase três vezes mais que os caças pesados e possuem mais que o dobro do poder de fogo de qualquer nave de combate existente. Eles também possuem velocidades que superam em muito qualquer espaçonave já feita. Por quase um século, cruzadores dominaram o universo. No entanto, com o desenvolvimento de canhões Gauss e torres de plasma, seu predomínio terminou. Eles ainda são usados hoje contra grupos de caças, mas não tão predominantemente como antes.',
    ],

    'battle_ship' => [
        'title'            => 'Encouraçado',
        'description'      => 'Encouraçados formam a espinha dorsal de uma frota. Seus canhões pesados, alta velocidade e grandes porões de carga os tornam oponentes a serem levados a sério.',
        'description_long' => 'Uma vez que ficou aparente que o cruzador estava perdendo terreno para o número crescente de estruturas de defesa que enfrentava, e com a perda de naves em missões em níveis inaceitáveis, decidiu-se construir uma nave que pudesse enfrentar aqueles mesmos tipos de estruturas de defesa com o mínimo de perdas possível. Após extenso desenvolvimento, o Encouraçado nasceu. Construído para suportar as maiores batalhas, o Encouraçado possui grandes espaços de carga, canhões pesados e alta velocidade de hiperpropulsão. Uma vez desenvolvido, acabou se tornando a espinha dorsal de toda frota de imperadores invasores.',
    ],

    'battlecruiser' => [
        'title'            => 'Cruzador de Batalha',
        'description'      => 'O Cruzador de Batalha é altamente especializado na interceptação de frotas hostis.',
        'description_long' => 'Esta nave é uma das mais avançadas naves de combate já desenvolvidas, e é particularmente mortal quando se trata de destruir frotas atacantes. Com seus canhões a laser aprimorados a bordo e motor de Hiperespaço avançado, o Cruzador de Batalha é uma força séria a ser considerada em qualquer ataque. Devido ao design da nave e seu grande sistema de armas, os porões de carga tiveram que ser reduzidos, mas isso é compensado pelo menor consumo de combustível.',
    ],

    'bomber' => [
        'title'            => 'Bombardeiro',
        'description'      => 'O bombardeiro foi desenvolvido especialmente para destruir as defesas planetárias de um mundo.',
        'description_long' => 'Ao longo dos séculos, à medida que as defesas começavam a ficar maiores e mais sofisticadas, frotas começaram a ser destruídas a uma taxa alarmante. Decidiu-se que uma nova nave era necessária para romper as defesas e garantir resultados máximos. Após anos de pesquisa e desenvolvimento, o Bombardeiro foi criado.

Usando equipamento de direcionamento a laser e Bombas de Plasma, o Bombardeiro procura e destrói qualquer mecanismo de defesa que possa encontrar. Assim que a propulsão de hiperespaço é desenvolvida até o Nível 8, o Bombardeiro é retrofitado com o motor de hiperespaço e pode voar em velocidades maiores.',
    ],

    'destroyer' => [
        'title'            => 'Destróier',
        'description'      => 'O destróier é o rei das naves de guerra.',
        'description_long' => 'O Destróier é o resultado de anos de trabalho e desenvolvimento. Com o desenvolvimento das Estrelas da Morte, decidiu-se que uma classe de nave era necessária para se defender contra uma arma tão massiva. Graças a seus sensores de rastreamento aprimorados, canhões de íons multi-falange, Canhões Gauss e Torres de Plasma, o Destróier se mostrou uma das naves mais temíveis criadas.

Como o destróier é muito grande, sua manobrabilidade é severamente limitada, o que o torna mais uma estação de batalha do que uma nave de combate. A falta de manobrabilidade é compensada por seu poder de fogo puro, mas também custa quantidades significativas de deutério para construir e operar.',
    ],

    'deathstar' => [
        'title'            => 'Estrela da Morte',
        'description'      => 'O poder destrutivo da Estrela da Morte é inigualável.',
        'description_long' => 'A Estrela da Morte é a nave mais poderosa já criada. Esta nave do tamanho de uma lua é a única que pode ser vista a olho nu no solo. No momento em que você a avista, infelizmente, já é tarde demais para fazer algo.

Armada com um canhão de gráviton gigantesco, o sistema de armas mais avançado já criado no Universo, esta nave massiva não só tem a capacidade de destruir frotas e defesas inteiras, mas também a capacidade de destruir luas inteiras. Apenas os impérios mais avançados têm a capacidade de construir uma nave de tamanho tão mamute.',
    ],

    'reaper' => [
        'title'            => 'Ceifador',
        'description'      => 'O Ceifador é uma poderosa nave de combate especializada em incursões agressivas e colheita de campos de destroços.',
        'description_long' => 'O Ceifador representa o auge da engenharia militar da classe General. Esta nave fortemente armada foi projetada para comandantes que valorizam tanto a destreza no combate quanto a flexibilidade tática. Embora seu papel principal seja o combate, o Ceifador possui porões de carga reforçados que permitem colher campos de destroços após a batalha. Seus sistemas avançados de direcionamento e blindagem pesada o tornam um oponente formidável, enquanto seu design de duplo propósito significa que ele pode tanto criar quanto lucrar com a carnificina do campo de batalha. A nave é equipada com tecnologia de armas de ponta e pode se sustentar contra naves muito maiores.',
    ],

    // ---- Defense ----

    'rocket_launcher' => [
        'title'            => 'Lançador de Foguetes',
        'description'      => 'O lançador de foguetes é uma opção defensiva simples e custo-efetiva.',
        'description_long' => 'Sua primeira linha básica de defesa. São instalações de lançamento baseadas em solo que disparam mísseis convencionais com ogivas em alvos inimigos atacantes. Como são baratos de construir e nenhuma pesquisa é necessária, são adequados para defender contra ataques, mas perdem eficácia na defesa de ataques em maior escala. Uma vez que você começa a construir sistemas de armas defensivas mais avançados, os Lançadores de Foguetes se tornam simples iscas para permitir que suas armas mais danosas infligam maior dano por um período mais longo.

Após uma batalha, há até 70% de chance de que instalações defensivas falhadas possam ser retornadas ao uso.',
    ],

    'light_laser' => [
        'title'            => 'Laser Leve',
        'description'      => 'Disparo concentrado em um alvo com fótons pode produzir dano significativamente maior que armas balísticas padrão.',
        'description_long' => 'À medida que a tecnologia se desenvolveu e naves mais sofisticadas foram criadas, determinou-se que uma linha de defesa mais forte era necessária para contrabalancear os ataques. À medida que a Tecnologia a Laser avançou, uma nova arma foi projetada para fornecer o próximo nível de defesa. Lasers Leves são armas simples baseadas em solo que utilizam sistemas especiais de direcionamento para rastrear o inimigo e disparar um laser de alta intensidade projetado para cortar o casco do alvo. Para serem mantidos custo-efetivos, foram equipados com um sistema de blindagem aprimorado, no entanto, a integridade estrutural é a mesma do Lançador de Foguetes.

Após uma batalha, há até 70% de chance de que instalações defensivas falhadas possam ser retornadas ao uso.',
    ],

    'heavy_laser' => [
        'title'            => 'Laser Pesado',
        'description'      => 'O laser pesado é o desenvolvimento lógico do laser leve.',
        'description_long' => 'O Laser Pesado é uma versão prática e aprimorada do Laser Leve. Sendo mais equilibrado que o Laser Leve com composição de liga melhorada, utiliza feixes mais fortes e densamente empacotados, e sistemas de direcionamento a bordo ainda melhores.

Após uma batalha, há até 70% de chance de que instalações defensivas falhadas possam ser retornadas ao uso.',
    ],

    'gauss_cannon' => [
        'title'            => 'Canhão Gauss',
        'description'      => 'O Canhão Gauss dispara projéteis pesando toneladas em altas velocidades.',
        'description_long' => 'Por muito tempo, armas de projétil foram consideradas antiquadas na esteira da tecnologia termonuclear e de energia moderna e devido ao desenvolvimento da hiperpropulsão e blindagem aprimorada. Isso até que a exata tecnologia de energia que uma vez a envelheceu, ajudou-a a reconquistar sua posição estabelecida.
Um canhão gauss é uma versão em grande escala do acelerador de partículas. Mísseis extremamente pesados são acelerados com uma enorme força eletromagnética e têm velocidades de boca que fazem a terra ao redor do míssil queimar nos céus. Esta arma é tão poderosa quando disparada que cria um estrondo sônico. Blindagens e escudos modernos mal conseguem suportar a força, frequentemente o alvo é completamente penetrado pelo poder do míssil. Estruturas defensivas desativam assim que foram excessivamente danificadas.

Após uma batalha, há até 70% de chance de que instalações defensivas falhadas possam ser retornadas ao uso.',
    ],

    'ion_cannon' => [
        'title'            => 'Canhão de Íons',
        'description'      => 'O Canhão de Íons dispara um feixe contínuo de íons acelerados, causando danos consideráveis aos objetos que atinge.',
        'description_long' => 'Um canhão de íons é uma arma que dispara feixes de íons (partículas carregadas positiva ou negativamente). O Canhão de Íons é na verdade um tipo de Canhão de Partículas; apenas as partículas usadas são ionizadas. Devido às suas cargas elétricas, eles também têm o potencial de desativar dispositivos eletrônicos e qualquer outra coisa que tenha uma fonte de energia elétrica ou similar, usando um fenômeno conhecido como Pulso Eletromagnético (efeito EMP). Devido ao sistema de blindagem altamente aprimorado do canhão, este canhão fornece proteção aprimorada para suas armas defensivas maiores e mais destrutivas.

Após uma batalha, há até 70% de chance de que instalações defensivas falhadas possam ser retornadas ao uso.',
    ],

    'plasma_turret' => [
        'title'            => 'Torre de Plasma',
        'description'      => 'Torres de Plasma liberam a energia de uma erupção solar e superam até o destróier em efeito destrutivo.',
        'description_long' => 'Um dos sistemas de armas defensivas mais avançados já desenvolvidos, a Torre de Plasma usa uma grande célula de combustível de reator nuclear para alimentar um acelerador eletromagnético que dispara um pulso, ou toroide, de plasma. Durante a operação, a torre de plasma primeiro trava em um alvo e inicia o processo de disparo. Uma esfera de plasma é criada no núcleo da torre pelo superaquecimento e compressão de gases, retirando seus íons. Uma vez que o gás é superaquecido, comprimido e uma esfera de plasma é criada, ela é então carregada no acelerador eletromagnético que é energizado. Uma vez totalmente energizado, o acelerador é ativado, o que resulta no lançamento da esfera de plasma a uma taxa de velocidade extremamente alta para o alvo pretendido. Da perspectiva do alvo, a bola de plasma azulada se aproximando é impressionante, mas uma vez que atinge, causa destruição instantânea.

Instalações defensivas desativam assim que são excessivamente danificadas. Após uma batalha, há até 70% de chance de que instalações defensivas falhadas possam ser retornadas ao uso.',
    ],

    'small_shield_dome' => [
        'title'            => 'Pequena Cúpula de Escudo',
        'description'      => 'A pequena cúpula de escudo cobre um planeta inteiro com um campo que pode absorver uma quantidade tremenda de energia.',
        'description_long' => 'A colonização de novos mundos trouxe um novo perigo: detritos espaciais. Um grande asteroide poderia facilmente destruir o mundo e todos os habitantes. Avanços na tecnologia de escudos forneceram aos cientistas uma maneira de desenvolver um escudo para proteger um planeta inteiro não apenas de detritos espaciais, mas, como se descobriu, de um ataque inimigo. Criando um grande campo eletromagnético ao redor do planeta, detritos espaciais que normalmente destruiriam o planeta eram desviados, e ataques de impérios inimigos eram frustrados. Os primeiros geradores eram grandes e o escudo fornecia proteção moderada, mas mais tarde descobriu-se que escudos pequenos não ofereciam proteção contra ataques de maior escala. A pequena cúpula de escudo foi o prelúdio de um sistema de proteção planetária mais forte e avançado que viria.

Após uma batalha, há até 70% de chance de que instalações defensivas falhadas possam ser retornadas ao uso.',
    ],

    'large_shield_dome' => [
        'title'            => 'Grande Cúpula de Escudo',
        'description'      => 'A evolução da pequena cúpula de escudo pode empregar significativamente mais energia para resistir a ataques.',
        'description_long' => 'A Grande Cúpula de Escudo é o próximo passo no avanço dos escudos planetários, é o resultado de anos de trabalho melhorando a Pequena Cúpula de Escudo. Construída para suportar uma barragem maior de fogo inimigo fornecendo um campo eletromagnético mais energizado, cúpulas grandes fornecem um período mais longo de proteção antes de colapsar.

Após uma batalha, há até 70% de chance de que instalações defensivas falhadas possam ser retornadas ao uso.',
    ],

    'anti_ballistic_missile' => [
        'title'            => 'Mísseis Anti-Balísticos',
        'description'      => 'Mísseis Anti-Balísticos destroem mísseis interplanetários atacantes.',
        'description_long' => 'Mísseis Anti-Balísticos (MAB) são sua única linha de defesa quando atacado por Mísseis Interplanetários (MIP) em seu planeta ou lua. Quando um lançamento de MIPs é detectado, esses mísseis armam automaticamente, processam um código de lançamento em seus computadores de voo, visam o MIP de entrada e lançam para interceptar. Durante o voo, o MIP alvo é constantemente rastreado e correções de curso são aplicadas até que o MAB alcance o alvo e destrua o MIP atacante. Cada MAB destrói um MIP de entrada.',
    ],

    'interplanetary_missile' => [
        'title'            => 'Mísseis Interplanetários',
        'description'      => 'Mísseis Interplanetários destroem defesas inimigas.',
        'description_long' => 'Mísseis Interplanetários (MIP) são sua arma ofensiva para destruir as defesas do seu alvo. Usando tecnologia de rastreamento de última geração, cada míssil visa um certo número de defesas para destruição. Equipados com uma bomba de antimatéria, eles fornecem uma força destrutiva tão severa que escudos e defesas destruídos não podem ser reparados. A única maneira de contra-atacar esses mísseis é com MABs.',
    ],

    // ---- Shop Booster Items ----

    'kraken' => [
        'title'       => 'KRAKEN',
        'description' => 'Reduz o tempo de construção de edifícios atualmente em construção em <b>:duration</b>.',
    ],

    'detroid' => [
        'title'       => 'DETROID',
        'description' => 'Reduz o tempo de construção de contratos atuais do estaleiro em <b>:duration</b>.',
    ],

    'newtron' => [
        'title'       => 'NEWTRON',
        'description' => 'Reduz o tempo de pesquisa para todas as pesquisas atualmente em andamento em <b>:duration</b>.',
    ],
];