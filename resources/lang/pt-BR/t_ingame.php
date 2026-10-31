<?php

return [
    // -------------------------------------------------------------------------
    // Overview page
    // -------------------------------------------------------------------------

    'overview' => [
        // Planet stats panel (typewriter animation)
        'diameter'             => 'Diâmetro',
        'temperature'          => 'Temperatura',
        'position'             => 'Posição',
        'points'               => 'Pontos',
        'honour_points'        => 'Pontos de honra',
        'score_place'          => 'Colocação',
        'score_of'             => 'de',

        // Page / section headings
        'page_title'           => 'Visão Geral',
        'buildings'            => 'Edifícios',
        'research'             => 'Pesquisa',

        // Planet header buttons
        'switch_to_moon'       => 'Alternar para lua',
        'switch_to_planet'     => 'Alternar para planeta',
        'abandon_rename'       => 'Abandonar/Renomear',
        'abandon_rename_title' => 'Abandonar/Renomear Planeta',
        'abandon_rename_modal' => 'Abandonar/Renomear :planet_name',
    ],

    // -------------------------------------------------------------------------
    // Planet relocation / planet move
    // -------------------------------------------------------------------------

    'planet_move' => [
        'resettle_title' => 'Reassentar Planeta',
        'cancel_confirm' => 'Tem certeza de que deseja cancelar esta relocação de planeta? A posição reservada será liberada.',
        'cancel_success' => 'A relocação do planeta foi cancelada com sucesso.',
        'blockers_title' => 'As seguintes coisas estão atualmente impedindo sua relocação de planeta:',
        'no_blockers'    => 'Nada pode atrapalhar a relocação planejada do planeta agora.',
        'cooldown_title' => 'Tempo até a próxima relocação possível',
        'to_galaxy'      => 'Para galáxia',
        'relocate'       => 'Relocar',
        'cancel'         => 'cancelar',
        'explanation'    => 'A relocação permite mover seus planetas para outra posição em um sistema distante de sua escolha.<br /><br />A relocação real ocorre 24 horas após a ativação. Nesse tempo, você pode usar seus planetas normalmente. Uma contagem regressiva mostra quanto tempo resta antes da relocação.<br /><br />Quando a contagem regressiva terminar e o planeta for movido, nenhuma de suas frotas estacionadas lá pode estar ativa. Neste momento, também não deve haver nada em construção, nada sendo reparado e nada sendo pesquisado. Se houver uma tarefa de construção, reparo ou frota ainda ativa no vencimento da contagem, a relocação será cancelada.<br /><br />Se a relocação for bem-sucedida, você será cobrado 240.000 Matéria Escura. Os planetas, edifícios e recursos armazenados, incluindo a lua, serão movidos imediatamente. Suas frotas viajam para as novas coordenadas automaticamente com a velocidade da nave mais lenta. O portal de salto para uma lua relocada é desativado por 24 horas.',
    ],

    // -------------------------------------------------------------------------
    // Shared UI strings (buttons, dialog labels)
    // -------------------------------------------------------------------------

    'shared' => [
        'caution' => 'Cuidado',
        'yes'     => 'sim',
        'no'      => 'não',
        'error'   => 'Erro',
        'dark_matter' => 'Matéria Escura',
    ],

    // -------------------------------------------------------------------------
    // Shared building page strings (resources, facilities, research, shipyard, defense)
    // -------------------------------------------------------------------------

    'buildings' => [
        // Building icon status tooltips
        'under_construction'     => 'Em construção',
        'vacation_mode_error'    => 'Erro, jogador está em modo de férias',
        'requirements_not_met'   => 'Requisitos não atendidos!',
        'missing_requirement_hint' => ':name: nível :current/:required',
        'wrong_class'            => 'Você não tem a classe de personagem necessária para este edifício.',
        'wrong_class_general'    => 'Para construir esta nave, você precisa ter selecionado a classe General.',
        'wrong_class_collector'  => 'Para construir esta nave, você precisa ter selecionado a classe Coletor.',
        'wrong_class_discoverer' => 'Para construir esta nave, você precisa ter selecionado a classe Descobridor.',
        'no_moon_building'       => "Você não pode construir esse edifício em uma lua!",
        'not_enough_resources'   => 'Recursos insuficientes!',
        'queue_full'             => 'Fila cheia',
        'not_enough_fields'      => 'Campos insuficientes!',
        'shipyard_busy'          => 'O estaleiro ainda está ocupado',
        'research_in_progress'   => 'Pesquisa em andamento!',
        'research_lab_expanding' => 'Laboratório de Pesquisa está sendo expandido.',
        'shipyard_upgrading'     => 'Estaleiro está sendo atualizado.',
        'nanite_upgrading'       => 'Fábrica de Nanites está sendo atualizada.',
        'max_amount_reached'     => 'Número máximo atingido!',
        // Expand upgrade button (named params: :title, :level)
        'expand_button'          => 'Expandir :title no nível :level',
        // JS loca object strings
        'loca_notice'            => 'Referência',
        'loca_demolish'          => 'Realmente rebaixar NOME_TECNOLOGIA em um nível?',
        'loca_lifeform_cap'      => 'Um ou mais bônus associados já estão no máximo. Deseja continuar a construção mesmo assim?',
        'last_inquiry_error'     => 'Sua última ação não pôde ser processada. Tente novamente.',
        'planet_move_warning'    => 'Cuidado! Esta missão pode ainda estar em execução quando o período de relocação começar e, se for o caso, o processo será cancelado. Você realmente deseja continuar com este trabalho?',
        'building_started' => 'Construção do edifício iniciada.',
    ],

    // -------------------------------------------------------------------------
    // Resources page (mines / storage buildings)
    // -------------------------------------------------------------------------

    'resources_page' => [
        'page_title'    => 'Recursos',
        'settings_link' => 'Configurações de recursos',
        'section_title' => 'Edifícios de recursos',
    ],

    // -------------------------------------------------------------------------
    // Facilities page
    // -------------------------------------------------------------------------

    'facilities_page' => [
        'page_title'     => 'Instalações',
        'section_title'  => 'Edifícios de instalações',
        'use_jump_gate'  => 'Usar Portal de Salto',
        'jump_gate'      => 'Portal de Salto',
        'alliance_depot' => 'Depósito da Aliança',
        'burn_confirm'   => 'Tem certeza de que deseja queimar este campo de destroços? Esta ação não pode ser desfeita.',
    ],

    // -------------------------------------------------------------------------
    // Research page
    // -------------------------------------------------------------------------

    'research_page' => [
        'basic'    => 'Pesquisa básica',
        'drive'    => 'Pesquisa de propulsão',
        'advanced' => 'Pesquisas avançadas',
        'combat'   => 'Pesquisa de combate',
    ],

    // -------------------------------------------------------------------------
    // Shipyard page
    // -------------------------------------------------------------------------

    'shipyard_page' => [
        'battleships' => 'Naves de batalha',
        'civil_ships' => 'Naves civis',
        'no_units_idle'         => 'Nenhuma nave/defesa em construção.',
        'no_units_idle_tooltip' => 'No momento não há naves ou defesas sendo construídas neste planeta. Clique aqui para ir ao estaleiro.',
        'to_shipyard'           => '(Para estaleiro)',
    ],

    // -------------------------------------------------------------------------
    // Defense page
    // -------------------------------------------------------------------------

    'defense_page' => [
        'page_title'    => 'Defesa',
        'section_title' => 'Estruturas defensivas',
    ],

    // -------------------------------------------------------------------------
    // Resource settings page
    // -------------------------------------------------------------------------

    'resource_settings' => [
        'production_factor'  => 'Fator de produção',
        'recalculate'        => 'Recalcular',
        'metal'              => 'Metal',
        'crystal'            => 'Cristal',
        'deuterium'          => 'Deutério',
        'energy'             => 'Energia',
        'basic_income'       => 'Renda básica',
        'level'              => 'Nível',
        'number'             => 'Quantidade:',
        'items'              => 'Itens',
        'geologist'          => 'Geólogo',
        'mine_production'    => 'produção de minas',
        'engineer'           => 'Engenheiro',
        'energy_production'  => 'produção de energia',
        'character_class'    => 'Classe de personagem',
        'commanding_staff'   => 'Estado-maior',
        'storage_capacity'   => 'Capacidade de armazenamento',
        'total_per_hour'     => 'Total por hora:',
        'total_per_day'      => 'Total por dia',
        'total_per_week'     => 'Total por semana:',
    ],

    // -------------------------------------------------------------------------
    // Destroy rockets dialog (facilities page)
    // -------------------------------------------------------------------------

    'facilities_destroy' => [
        'silo_description'  => 'Silos de mísseis são usados para construir, armazenar e lançar mísseis interplanetários e anti-balísticos. Com cada nível do silo, cinco mísseis interplanetários ou dez mísseis anti-balísticos podem ser armazenados. Um míssil interplanetário usa o mesmo espaço que dois mísseis anti-balísticos. O armazenamento de ambos os mísseis interplanetários e anti-balísticos no mesmo silo é permitido.',
        'silo_capacity'     => 'Um silo de mísseis no nível :level pode comportar :ipm mísseis interplanetários ou :abm mísseis anti-balísticos.',
        'type'              => 'Tipo',
        'number'            => 'Quantidade',
        'tear_down'         => 'desmontar',
        'proceed'           => 'Prosseguir',
        'enter_minimum'     => 'Por favor, insira pelo menos um míssil para destruir',
        'not_enough_abm'    => 'Você não tem tantos Mísseis Anti-Balísticos',
        'not_enough_ipm'    => 'Você não tem tantos Mísseis Interplanetários',
        'destroyed_success' => 'Mísseis destruídos com sucesso',
        'destroy_failed'    => 'Falha ao destruir mísseis',
        'error'             => 'Ocorreu um erro. Tente novamente.',
    ],

    // -------------------------------------------------------------------------
    // Fleet pages (dispatch + movement)
    // -------------------------------------------------------------------------

    'fleet' => [
        // Page / step headers
        'dispatch_1_title'         => 'Despacho de Frota I',
        'dispatch_2_title'         => 'Despacho de Frota II',
        'dispatch_3_title'         => 'Despacho de Frota III',
        'movement_title'           => 'Movimento de frota',
        'to_movement'              => 'Para movimento de frota',

        // Status bar
        'fleets'                   => 'Frotas',
        'expeditions'              => 'Expedições',
        'reload'                   => 'Recarregar',
        'clock'                    => 'Relógio',
        'load_dots'                => 'carregando...',
        'never'                    => 'Nunca',

        // Fleet slot info
        'tooltip_slots'            => 'Slots de frota usados/totais',
        'no_free_slots'            => 'Nenhum slot de frota disponível',
        'tooltip_exp_slots'        => 'Slots de expedição usados/totais',
        'market_slots'             => 'Ofertas',
        'tooltip_market_slots'     => 'Frotas de comércio usadas/totais',

        // Warning / impossible states
        'fleet_dispatch'           => 'Despacho de frota',
        'dispatch_impossible'      => 'Despacho de frota impossível',
        'no_ships'                 => 'Não há naves neste planeta.',
        'in_combat'                => 'A frota está atualmente em combate.',
        'vacation_error'           => 'Nenhuma frota pode ser enviada do modo de férias!',
        'not_enough_deuterium'     => 'Deutério insuficiente!',
        'no_target'                => 'Você deve selecionar um alvo válido.',
        'cannot_send_to_target'    => 'Frotas não podem ser enviadas a este alvo.',
        'cannot_start_mission'     => 'Você não pode iniciar esta missão.',

        // Status bar labels (no trailing colon — add : in template where needed)
        'mission_label'            => 'Missão',
        'target_label'             => 'Alvo',
        'player_name_label'        => "Nome do jogador",
        'no_selection'             => 'Nada foi selecionado',
        'no_mission_selected'      => 'Nenhuma missão selecionada!',

        // Step 1 – ship selection
        'combat_ships'             => 'Naves de combate',
        'civil_ships'              => 'Naves civis',
        'standard_fleets'          => 'Frotas padrão',
        'edit_standard_fleets'     => 'Editar frotas padrão',
        'select_all_ships'         => 'Selecionar todas as naves',
        'reset_choice'             => 'Redefinir escolha',
        'api_data'                 => 'Estes dados podem ser inseridos em um simulador de combate compatível:',
        'tactical_retreat'         => 'Recuo tático',
        'tactical_retreat_tooltip' => 'Mostrar consumo de Deutério por recuo tático',
        'continue'                 => 'Continuar',
        'back'                     => 'Voltar',

        // Step 2 – destination
        'origin'                   => 'Origem',
        'destination'              => 'Destino',
        'planet'                   => 'Planeta',
        'moon'                     => 'Lua',
        'coordinates'              => 'Coordenadas',
        'distance'                 => 'Distância',
        'debris_field'             => 'Campo de destroços',
        'debris_field_lower'       => 'campo de destroços',
        'shortcuts'                => 'Atalhos',
        'combat_forces'            => 'Forças de combate',
        'player_label'             => 'Jogador',
        'player_name'              => "Nome do jogador",

        // Step 3 – mission selection
        'select_mission'           => 'Selecionar missão para o alvo',
        'bashing_disabled'         => 'Missões de ataque foram desativadas como resultado de muitos ataques no alvo.',

        // Mission names
        'mission_expedition'       => 'Expedição',
        'mission_colonise'         => 'Colonização',
        'mission_recycle'          => 'Reciclar Campo de Destroços',
        'mission_transport'        => 'Transporte',
        'mission_deploy'           => 'Desdobramento',
        'mission_espionage'        => 'Espionagem',
        'mission_acs_defend'       => 'Defesa ACS',
        'mission_attack'           => 'Ataque',
        'mission_acs_attack'       => 'Ataque ACS',
        'mission_destroy_moon'     => 'Destruição de Lua',

        // Mission descriptions
        'desc_attack'              => 'Ataca a frota e a defesa do seu oponente.',
        'desc_acs_attack'          => 'Batalhas honrosas podem se tornar desonrosas se jogadores fortes entrarem através do ACS. A soma dos pontos militares totais do atacante em comparação com a soma dos pontos militares totais do defensor é o fator decisivo aqui.',
        'desc_transport'           => 'Transporta seus recursos para outros planetas.',
        'desc_deploy'              => 'Envia sua frota permanentemente para outro planeta do seu império.',
        'desc_acs_defend'          => 'Defende o planeta do seu companheiro de equipe.',
        'desc_espionage'           => 'Espiona os mundos de imperadores estrangeiros.',
        'desc_colonise'            => 'Coloniza um novo planeta.',
        'desc_recycle'             => 'Envia seus recicladores a um campo de destroços para coletar os recursos flutuando lá.',
        'desc_destroy_moon'        => 'Destrói a lua do seu inimigo.',
        'desc_expedition'          => 'Envie suas naves aos confins do espaço para completar missões emocionantes.',

        // ACS Attack – federation overlay
        'fleet_union'              => 'União de frota',
        'union_created'            => 'União de frota criada com sucesso.',
        'union_edited'             => 'União de frota editada com sucesso.',
        'err_union_max_fleets'     => 'No máximo 16 frotas podem atacar.',
        'err_union_max_players'    => 'No máximo 5 jogadores podem atacar.',
        'err_union_too_slow'        => 'Você está muito lento para entrar nesta frota.',
        'err_union_target_mismatch' => 'Sua frota deve alvejar o mesmo local da união de frota.',
        'union_name'               => 'Nome da união',
        'buddy_list'               => 'Lista de amigos',
        'buddy_list_loading'       => 'Carregando...',
        'buddy_list_empty'         => 'Nenhum amigo disponível',
        'buddy_list_error'         => 'Falha ao carregar amigos',
        'search_user'              => 'Buscar usuário',
        'search'                   => 'Buscar',
        'union_user'               => 'Usuário da união',
        'invite'                   => 'Convidar',
        'kick'                     => 'Expulsar',
        'ok'                       => 'Ok',
        'own_fleet'                => 'Própria frota',

        // Briefing section (no trailing colons — add : in template where needed)
        'briefing'                 => 'Briefing',
        'load_resources'           => 'Carregar recursos',
        'load_all_resources'       => 'Carregar todos os recursos',
        'all_resources'            => 'todos os recursos',
        'flight_duration'          => 'Duração do voo (ida)',
        'federation_duration'      => 'Duração do voo (união de frota)',
        'arrival'                  => 'Chegada',
        'return_trip'              => 'Retorno',
        'speed'                    => 'Velocidade:',
        'max_abbr'                 => 'máx.',
        'hour_abbr'                => 'h',
        'deuterium_consumption'    => 'Consumo de deutério',
        'empty_cargobays'          => 'Porões vazios',
        'hold_time'                => 'Tempo de espera',
        'expedition_duration'      => 'Duração da expedição',
        'cargo_bay'                => 'porão de carga',
        'cargo_space'              => 'Espaço disponível / Capacidade máx. de carga',
        'send_fleet'               => 'Enviar frota',
        'retreat_on_defender'      => 'Retornar ao recuo dos defensores',
        'retreat_tooltip'          => 'Se esta opção estiver ativada, sua frota também se retirará sem luta se o oponente fugir.',
        'plunder_food'             => 'Pilhagem de alimentos',

        // Resources labels (for loca object)
        'metal'                    => 'Metal',
        'crystal'                  => 'Cristal',
        'deuterium'                => 'Deutério',

        // Movement page
        'fleet_details'            => 'Detalhes da frota',
        'ships'                    => 'Naves',
        'shipment'                 => 'Remessa',
        'recall'                   => 'Recall',
        'start_time'               => 'Hora de início',
        'time_of_arrival'          => 'Hora de chegada',
        'deep_space'               => 'Espaço profundo',

        // Target / player status indicators
        'uninhabited_planet'       => 'Planeta desabitado',
        'no_debris_field'          => 'Nenhum campo de destroços',
        'player_vacation'          => 'Jogador em modo de férias',
        'admin_gm'                 => 'Admin ou GM',
        'noob_protection'          => 'Proteção de novato',
        'player_too_strong'        => 'Este planeta não pode ser atacado pois o jogador é muito forte!',
        'no_moon'                  => 'Nenhuma lua disponível.',
        'no_recycler'              => 'Nenhum reciclador disponível.',
        'no_events'                => 'Atualmente não há eventos em execução.',
        'planet_already_reserved'  => 'Este planeta já foi reservado para uma relocação.',
        'max_planet_warning'       => 'Atenção! Nenhum outro planeta pode ser colonizado no momento. Dois níveis de pesquisa de astrotecnologia são necessários para cada nova colônia. Você ainda deseja enviar sua frota?',

        // Galaxy / network
        'empty_systems'            => 'Sistemas vazios',
        'inactive_systems'         => 'Sistemas inativos',
        'network_on'               => 'Ligado',
        'network_off'              => 'Desligado',

        // Error codes (used in errorCodeMap)
        'err_generic'              => 'Ocorreu um erro',
        'err_no_moon'              => 'Erro, não há lua',
        'err_newbie_protection'    => "Erro, jogador não pode ser abordado devido à proteção de novato",
        'err_too_strong'           => 'Jogador forte demais para ser atacado',
        'err_vacation_mode'        => 'Erro, jogador está em modo de férias',
        'err_own_vacation'         => 'Nenhuma frota pode ser enviada do modo de férias!',
        'err_not_enough_ships'     => 'Erro, naves insuficientes disponíveis, enviar número máximo:',
        'err_no_ships'             => 'Erro, nenhuma nave disponível',
        'err_no_slots'             => 'Erro, nenhum slot de frota livre disponível',
        'err_no_deuterium'         => "Erro, você não tem deutério suficiente",
        'err_no_planet'            => 'Erro, não há planeta lá',
        'err_no_cargo'             => 'Erro, capacidade de carga insuficiente',
        'err_multi_alarm'          => 'Multi-alarme',
        'err_attack_ban'           => 'Proibição de ataque',
        'add_new_template'                 => 'Adicionar novo modelo',
        'admiral_slot_bonus'               => '+ 2 Slots de frota por causa do Almirante',
        'bash_warning'                     => 'Neste universo, 0 ataques são permitidos dentro de um período de 24 horas. Este ataque provavelmente excederia este limite. Você realmente deseja lançá-lo?',
        'general_slot_bonus'               => '+ 2 Slots de frota por causa do General',
        'tactical_retreat_admiral_tooltip' => 'Recuo tático|Use o Almirante para permitir que suas frotas recuem de forças três vezes maiores que a sua.',
        'tactical_retreat_full_tooltip'    => "Recuo tático|Frotas podem recuar automaticamente se atacadas por uma força superior cinco vezes mais forte. O fator crucial são os pontos de frota do atacante em comparação aos seus pontos de frota. Instalações defensivas não são consideradas.<br />\n<br />\nNaves civis contam apenas 25%, satélites solares e sondas de espionagem não são considerados. <br />\n<br />\nSelecione a opção *nunca* se desejar desativar o recuo automático.<br />\n<br />\nFrotas retidas em princípio não podem recuar. Estrelas da Morte, Sondas de Espionagem e Satélites Solares também não podem recuar.<br />\n<br />\nUse o Almirante para permitir que suas frotas recuem de forças três vezes maiores que a sua.<br />\n<br />\nA opção de &#96;recuo tático&#96; termina com 500.000 pontos.",
        'tactical_retreat_label'           => 'Recuo tático:',
    ],

    // -------------------------------------------------------------------------
    // Galaxy page
    // -------------------------------------------------------------------------

    'galaxy' => [
        // Vacation mode
        'vacation_error'               => 'Você não pode usar a visualização da galáxia enquanto estiver em modo de férias!',

        // Navigation / header
        'system'                       => 'Sistema',
        'go'                           => 'Ir!',

        // System action buttons
        'system_phalanx'               => 'Falange do Sistema',
        'system_espionage'             => 'Espionagem do Sistema',
        'discoveries'                  => 'Descobertas',
        'discoveries_tooltip'          => 'Enviar missão de descoberta para todos os locais possíveis',

        // Header stats row labels
        'probes_short'                 => 'Sonda Esp.',
        'recycler_short'               => 'Recic.',
        'ipm_short'                    => 'MIP.',
        'used_slots'                   => 'Slots usados',

        // Table header columns
        'planet_col'                   => 'Planeta',
        'name_col'                     => 'Nome',
        'moon_col'                     => 'Lua',
        'debris_short'                 => 'CD',
        'player_status'                => 'Jogador (Status)',
        'alliance'                     => 'Aliança',
        'action'                       => 'Ação',

        // Expedition / deep space row
        'planets_colonized'            => 'Planetas colonizados',
        'expedition_fleet'             => 'Frota de expedição',
        'admiral_needed'               => 'Você precisa de um Almirante para usar este recurso.',
        'send'                         => 'enviar',

        // Legend tooltip
        'legend'                       => 'Legenda',
        'status_admin_abbr'            => 'A',
        'legend_admin'                 => 'Administrador',
        'status_strong_abbr'           => 'f',
        'legend_strong'                => 'jogador mais forte',
        'status_noob_abbr'             => 'n',
        'legend_noob'                  => 'jogador mais fraco (novato)',
        'status_outlaw_abbr'           => 'o',
        'legend_outlaw'                => 'Foragido (temporário)',
        'status_vacation_abbr'         => 'f',
        'vacation_mode'                => 'Modo de férias',
        'status_banned_abbr'           => 'b',
        'legend_banned'                => 'banido',
        'status_inactive_abbr'         => 'i',
        'legend_inactive_7'            => '7 dias inativo',
        'status_longinactive_abbr'     => 'I',
        'legend_inactive_28'           => '28 dias inativo',
        'status_honorable_abbr'        => 'hp',
        'legend_honorable'             => 'Alvo honroso',

        // loca JS object (unique galaxy strings)
        'phalanx_restricted'           => 'A falange do sistema só pode ser usada pela classe de aliança Pesquisador!',
        'astro_required'               => 'Você precisa pesquisar Astrofísica primeiro.',
        'galaxy_nav'                   => 'Galáxia',
        'activity'                     => 'Atividade',
        'no_action'                    => 'Nenhuma ação disponível.',
        'time_minute_abbr'             => 'm',
        'moon_diameter_km'             => 'Diâmetro da lua em km',
        'km'                           => 'km',
        'pathfinders_needed'           => 'Desbravadores necessários',
        'recyclers_needed'             => 'Recicladores necessários',
        'mine_debris'                  => 'Minerar',
        'mission_harvest'              => 'Colher',
        'phalanx_no_deut'              => 'Deutério insuficiente para implantar falange.',
        'use_phalanx'                  => 'Usar falange',
        'colonize_error'               => 'Não é possível colonizar um planeta sem uma nave de colonização.',
        'ranking'                      => 'Ranking',
        'espionage_report'             => 'Relatório de espionagem',
        'missile_attack'               => 'Ataque de mísseis',
        'rank'                         => 'Classificação',
        'alliance_member'              => 'Membro',
        'alliance_class'               => 'Classe da aliança',
        'espionage_not_possible'       => 'Espionagem não possível',
        'espionage'                    => 'Espionagem',
        'hire_admiral'                 => 'Contratar almirante',
        'dark_matter'                  => 'Matéria Escura',
        'outlaw_explanation'           => 'Se você é um foragido, não tem mais proteção contra ataques e pode ser atacado por todos os jogadores.',
        'honorable_target_explanation' => 'Em batalha contra este alvo, você pode receber pontos de honra e saquear 50% a mais de pilhagem.',

        // galaxyLoca JS object
        'relocate_success'             => 'A posição foi reservada para você. A relocação da colônia começou.',
        'relocate_title'               => 'Reassentar Planeta',
        'relocate_action'              => 'Relocar',
        'relocate_question'            => 'Tem certeza de que deseja relocar seu planeta para estas coordenadas? Para financiar a relocação você precisará de :cost Matéria Escura.',
        'deut_needed_relocate'         => 'Você não tem Deutério suficiente! Você precisa de 10 unidades de Deutério.',
        'fleet_attacking'              => 'Frota está atacando!',
        'fleet_underway'               => 'Frota a caminho',
        'discovery_send'               => 'Enviar nave de exploração',
        'discovery_success'            => 'Nave de exploração enviada',
        'discovery_unavailable'        => 'Você não pode enviar uma nave de exploração para este local.',
        'discovery_underway'           => 'Uma Nave de Exploração já está a caminho deste planeta.',
        'discovery_locked'             => 'Você ainda não desbloqueou a pesquisa para descobrir novas formas de vida.',
        'discovery_title'              => 'Nave de Exploração',
        'discovery_question'           => 'Deseja enviar uma nave de exploração para este planeta?<br/>Metal: 5000 Cristal: 1000 Deutério: 500',

        // Phalanx result dialog (JS strings inside Blade-rendered script block)
        'sensor_report'                => 'relatório do sensor',
        'refresh'                      => 'Atualizar',
        'arrived'                      => 'Chegou',

        // Missile attack dialog
        'target'                       => 'Alvo',
        'flight_duration'              => 'Duração do voo',
        'ipm_full'                     => 'Mísseis Interplanetários',
        'primary_target'               => 'Alvo primário',
        'no_primary_target'            => 'Nenhum alvo primário selecionado: alvo aleatório',
        'target_has'                   => 'Alvo tem',
        'abm_full'                     => 'Mísseis Anti-Balísticos',
        'fire'                         => 'Disparar',
        'valid_missile_count'          => 'Por favor, insira um número válido de mísseis',
        'not_enough_missiles'          => 'Você não tem mísseis suficientes',
        'launched_success'             => 'Mísseis lançados com sucesso!',
        'launch_failed'                => 'Falha ao lançar mísseis',
        'insufficient_range'           => 'Alcance insuficiente (nível de pesquisa de propulsão a impulso) de seus mísseis interplanetários!',
        'alliance_page'   => 'Página da Aliança',
        'apply'           => 'Aplicar',
        'contact_support' => 'Contatar suporte',
    ],

    // -------------------------------------------------------------------------
    // Buddy system (buddy requests + player ignore — used in galaxy page)
    // -------------------------------------------------------------------------

    'buddy' => [
        'request_sent'   => 'Solicitação de amigo enviada com sucesso!',
        'request_failed' => 'Falha ao enviar solicitação de amigo.',
        'request_to'     => 'Solicitação de amigo para',
        'ignore_confirm' => 'Tem certeza de que deseja ignorar',
        'ignore_success' => 'Jogador ignorado com sucesso!',
        'ignore_failed'  => 'Falha ao ignorar jogador.',
    ],

    // -------------------------------------------------------------------------
    // Messages page
    // -------------------------------------------------------------------------

    'messages' => [
        // Main tabs
        'tab_fleets'        => 'Frotas',
        'tab_communication' => 'Comunicação',
        'tab_economy'       => 'Economia',
        'tab_universe'      => 'Universo',
        'tab_system'        => 'OGame',
        'tab_favourites'    => 'Favoritos',

        // Fleet subtabs
        'subtab_espionage'   => 'Espionagem',
        'subtab_combat'      => 'Relatórios de Combate',
        'subtab_expeditions' => 'Expedições',
        'subtab_transport'   => 'Uniões/Transporte',
        'subtab_other'       => 'Outros',

        // Communication subtabs
        'subtab_messages'         => 'Mensagens',
        'subtab_information'      => 'Informações',
        'subtab_shared_combat'    => 'Relatórios de Combate Compartilhados',
        'subtab_shared_espionage' => 'Relatórios de Espionagem Compartilhados',

        // General UI
        'news_feed'          => 'Feed de notícias',
        'loading'            => 'carregando...',
        'error_occurred'     => 'Ocorreu um erro',
        'mark_favourite'     => 'marcar como favorito',
        'remove_favourite'   => 'remover dos favoritos',
        'from'               => 'De',
        'no_messages'        => 'Atualmente não há mensagens disponíveis nesta aba',
        'new_alliance_msg'   => 'Nova mensagem da aliança',
        'to'                 => 'Para',
        'all_players'        => 'todos os jogadores',
        'send'               => 'enviar',
        'delete_buddy_title' => 'Excluir amigo',
        'report_to_operator' => 'Denunciar esta mensagem a um operador do jogo?',
        'too_few_chars'      => 'Poucos caracteres! Insira pelo menos 2 caracteres.',

        // BBCode editor (localizedBBCode)
        'bbcode_bold'           => 'Negrito',
        'bbcode_italic'         => 'Itálico',
        'bbcode_underline'      => 'Sublinhado',
        'bbcode_stroke'         => 'Tachado',
        'bbcode_sub'            => 'Subscrito',
        'bbcode_sup'            => 'Sobrescrito',
        'bbcode_font_color'     => 'Cor da fonte',
        'bbcode_font_size'      => 'Tamanho da fonte',
        'bbcode_bg_color'       => 'Cor de fundo',
        'bbcode_bg_image'       => 'Imagem de fundo',
        'bbcode_tooltip'        => 'Dica',
        'bbcode_align_left'     => 'Alinhar à esquerda',
        'bbcode_align_center'   => 'Centralizar',
        'bbcode_align_right'    => 'Alinhar à direita',
        'bbcode_align_justify'  => 'Justificar',
        'bbcode_block'          => 'Quebra',
        'bbcode_code'           => 'Código',
        'bbcode_spoiler'        => 'Spoiler',
        'bbcode_moreopts'       => 'Mais opções',
        'bbcode_list'           => 'Lista',
        'bbcode_hr'             => 'Linha horizontal',
        'bbcode_picture'        => 'Imagem',
        'bbcode_link'           => 'Link',
        'bbcode_email'          => 'E-mail',
        'bbcode_player'         => 'Jogador',
        'bbcode_item'           => 'Item',
        'bbcode_coordinates'    => 'Coordenadas',
        'bbcode_preview'        => 'Visualizar',
        'bbcode_text_ph'        => 'Texto...',
        'bbcode_player_ph'      => 'ID ou nome do jogador',
        'bbcode_item_ph'        => 'ID do item',
        'bbcode_coord_ph'       => 'Galáxia:sistema:posição',
        'bbcode_chars_left'     => 'Caracteres restantes',
        'bbcode_ok'             => 'Ok',
        'bbcode_cancel'         => 'Cancelar',
        'bbcode_repeat_x'       => 'Repetir horizontalmente',
        'bbcode_repeat_y'       => 'Repetir verticalmente',

        // Espionage report
        'spy_player'          => 'Jogador',
        'spy_activity'        => 'Atividade',
        'spy_minutes_ago'     => 'minutos atrás',
        'spy_class'           => 'Classe',
        'spy_unknown'         => 'Desconhecido',
        'spy_alliance_class'  => 'Classe da aliança',
        'spy_no_alliance_class' => 'Nenhuma classe de aliança selecionada',
        'spy_resources'       => 'Recursos',
        'spy_loot'            => 'Pilhagem',
        'spy_counter_esp'     => 'Chance de contra-espionagem',
        'spy_no_info'         => 'Não foi possível obter nenhuma informação confiável deste tipo na varredura.',
        'spy_debris_field'    => 'campo de destroços',
        'spy_no_activity'     => 'Sua espionagem não mostra anormalidades na atmosfera do planeta. Parece não ter havido atividade no planeta na última hora.',
        'spy_fleets'          => 'Frotas',
        'spy_defense'         => 'Defesa',
        'spy_research'        => 'Pesquisa',
        'spy_building'        => 'Edifício',

        // Battle report (brief)
        'battle_attacker'    => 'Atacante',
        'battle_defender'    => 'Defensor',
        'battle_resources'   => 'Recursos',
        'battle_loot'        => 'Pilhagem',
        'battle_debris_new'       => 'Campo de destroços (recém-criado)',
        'battle_wreckage_created'  => 'Destroços criados',
        'battle_attacker_wreckage' => 'Destroços do atacante',
        'battle_repaired'    => 'Realmente reparado',
        'battle_moon_chance' => 'Chance de lua',
        'battle_report'          => 'Relatório de Combate',
        'battle_planet'          => 'Planeta',
        'battle_fleet_command'   => 'Comando da Frota',
        'battle_from'            => 'De',
        'battle_tactical_retreat' => 'Recuo tático',
        'battle_total_loot'      => 'Pilhagem total',
        'battle_debris'          => 'Destroços (novos)',
        'battle_recycler'        => 'Reciclador',
        'battle_mined_after'     => 'Minerado após combate',
        'battle_reaper'          => 'Ceifador',
        'battle_debris_left'     => 'Campos de destroços (restantes)',
        'battle_honour_points'   => 'Pontos de honra',
        'battle_dishonourable'   => 'Luta desonrosa',
        'battle_vs'              => 'vs',
        'battle_honourable'      => 'Luta honrosa',
        'battle_class'           => 'Classe',
        'battle_weapons'         => 'Armas',
        'battle_shields'         => 'Escudos',
        'battle_armour'          => 'Blindagem',
        'battle_combat_ships'    => 'Naves de combate',
        'battle_civil_ships'     => 'Naves civis',
        'battle_defences'        => 'Defesas',
        'battle_repaired_def'    => 'Defesas reparadas',
        'battle_share'           => 'compartilhar mensagem',
        'battle_attack'          => 'Ataque',
        'battle_espionage'       => 'Espionagem',
        'battle_delete'          => 'excluir',
        'battle_favourite'       => 'marcar como favorito',
        'battle_hamill'          => 'Um Caça Leve destruiu uma Estrela da Morte antes do início da batalha!',
        'battle_retreat_tooltip'  => 'Observe que Estrelas da Morte, Sondas de Espionagem, Satélites Solares e qualquer frota em missão de Defesa ACS não podem fugir. Recuos táticos também são desativados em batalhas honrosas. Um recuo também pode ter sido desativado manualmente ou impedido por falta de deutério. Bandidos e jogadores com mais de 500.000 pontos nunca recuam.',
        'battle_no_flee'         => 'A frota defensora não fugiu.',
        'battle_fled'            => 'A frota defensora fugiu da batalha.',
        'battle_flee_deuterium'  => 'Custo de deutério: :amount',
        'battle_rounds'          => 'Rodadas',
        'battle_start'           => 'Início',
        'battle_player_from'     => 'de',
        'battle_attacker_fires'  => 'O :attacker dispara um total de :hits tiros no :defender com força total de :strength. Os escudos do :defender2 absorvem :absorbed pontos de dano.',
        'battle_defender_fires'  => 'O :defender dispara um total de :hits tiros no :attacker com força total de :strength. Os escudos do :attacker2 absorvem :absorbed pontos de dano.',
    ],

    // -------------------------------------------------------------------------
    // Alliance page
    // -------------------------------------------------------------------------

    'alliance' => [
        // Page / navigation
        'page_title'                    => 'Aliança',
        'tab_overview'                  => 'Visão Geral',
        'tab_management'                => 'Gerenciamento',
        'tab_communication'             => 'Comunicação',
        'tab_applications'              => 'Inscrições',
        'tab_classes'                   => 'Classes de Aliança',
        'tab_create'                    => 'Criar aliança',
        'tab_search'                    => 'Buscar aliança',
        'tab_apply'                     => 'inscrever',

        // Overview – alliance info table
        'your_alliance'                 => 'Sua aliança',
        'name'                          => 'Nome',
        'tag'                           => 'Tag',
        'created'                       => 'Criada',
        'member'                        => 'Membro',
        'your_rank'                     => 'Seu posto',
        'homepage'                      => 'Página inicial',
        'logo'                          => 'Logo da aliança',
        'open_page'                     => 'Abrir página da aliança',
        'highscore'                     => 'Ranking de alianças',
        'leave_wait_warning'            => 'Se você sair da aliança, precisará esperar 3 dias antes de entrar ou criar outra aliança.',
        'leave_btn'                     => 'Sair da aliança',

        // Overview – member list
        'member_list'                   => 'Lista de membros',
        'no_members'                    => 'Nenhum membro encontrado',
        'assign_rank_btn'               => 'Atribuir posto',
        'kick_tooltip'                  => 'Expulsar membro da aliança',
        'write_msg_tooltip'             => 'Escrever mensagem',
        'col_name'                      => 'Nome',
        'col_rank'                      => 'Posto',
        'col_coords'                    => 'Coordenadas',
        'col_joined'                    => 'Entrou',
        'col_online'                    => 'Online',
        'col_function'                  => 'Função',

        // Overview – text sections
        'internal_area'                 => 'Área Interna',
        'external_area'                 => 'Área Externa',

        // Management – privileges
        'configure_privileges'          => 'Configurar privilégios',
        'col_rank_name'                 => 'Nome do posto',
        'col_applications_group'        => 'Inscrições',
        'col_member_group'              => 'Membro',
        'col_alliance_group'            => 'Aliança',
        'delete_rank'                   => 'Excluir posto',
        'save_btn'                      => 'Salvar',
        'rights_warning_html'           => '<strong>Aviso!</strong> Você só pode dar permissões que possui.',
        'rights_warning_loca'           => '[b]Aviso![/b] Você só pode dar permissões que possui.',
        'rights_legend'                 => 'Legenda de direitos',
        'create_rank_btn'               => 'Criar novo posto',
        'rank_name_placeholder'         => 'Nome do posto',
        'no_ranks'                      => 'Nenhum posto encontrado',

        // Management – permissions (icon titles and legend)
        'perm_see_applications'         => 'Ver inscrições',
        'perm_edit_applications'        => 'Processar inscrições',
        'perm_see_members'              => 'Ver lista de membros',
        'perm_kick_user'                => 'Expulsar usuário',
        'perm_see_online'               => 'Ver status online',
        'perm_send_circular'            => 'Escrever mensagem circular',
        'perm_disband'                  => 'Dissolver aliança',
        'perm_manage'                   => 'Gerenciar aliança',
        'perm_right_hand'               => 'Mão direita',
        'perm_right_hand_long'          => '`Mão Direita` (necessário para transferir posto de fundador)',
        'perm_manage_classes'           => 'Gerenciar classe de aliança',

        // Management – texts section
        'manage_texts'                  => 'Gerenciar textos',
        'internal_text'                 => 'Texto interno',
        'external_text'                 => 'Texto externo',
        'application_text'              => 'Texto de inscrição',

        // Management – options/settings
        'options'                       => 'Opções',
        'alliance_logo_label'           => 'Logo da aliança',
        'applications_field'            => 'Inscrições',
        'status_open'                   => 'Possível (aliança aberta)',
        'status_closed'                 => 'Impossível (aliança fechada)',
        'rename_founder'                => 'Renomear título de fundador como',
        'rename_newcomer'               => 'Renomear posto Novato',
        'no_settings_perm'              => 'Você não tem permissão para gerenciar configurações da aliança.',

        // Management – change tag/name
        'change_tag_name'               => 'Alterar tag/nome da aliança',
        'change_tag'                    => 'Alterar tag da aliança',
        'change_name'                   => 'Alterar nome da aliança',
        'former_tag'                    => 'Tag anterior da aliança:',
        'new_tag'                       => 'Nova tag da aliança:',
        'former_name'                   => 'Nome anterior da aliança:',
        'new_name'                      => 'Novo nome da aliança:',
        'former_tag_short'              => 'Tag anterior da aliança',
        'new_tag_short'                 => 'Nova tag da aliança',
        'former_name_short'             => 'Nome anterior da aliança',
        'new_name_short'                => 'Novo nome da aliança',
        'no_tagname_perm'               => 'Você não tem permissão para alterar tag/nome da aliança.',

        // Management – disband / pass on
        'delete_pass_on'                => 'Excluir aliança/Passar aliança adiante',
        'delete_btn'                    => 'Excluir esta aliança',
        'no_delete_perm'                => 'Você não tem permissão para excluir a aliança.',
        'handover'                      => 'Transferir aliança',
        'takeover_btn'                  => 'Assumir aliança',
        'loca_continue'                 => 'Continuar',
        'loca_change_founder'           => 'Transferir título de fundador para:',
        'loca_no_transfer_error'        => 'Nenhum dos membros tem o direito `mão direita` necessário. Você não pode transferir a aliança.',
        'loca_founder_inactive_error'   => 'O fundador não está inativo há tempo suficiente para assumir a aliança.',

        // Management – leave alliance section (non-founders)
        'leave_section_title'           => 'Sair da aliança',
        'leave_consequences'            => 'Se você sair da aliança, perderá todas as permissões de posto e benefícios da aliança.',

        // Applications tab
        'no_applications'               => 'Nenhuma inscrição encontrada',
        'accept_btn'                    => 'aceitar',
        'deny_btn'                      => 'Recusar inscrito',
        'report_btn'                    => 'Denunciar inscrição',
        'app_date'                      => 'Data da inscrição',
        'action_col'                    => 'Ação',
        'answer_btn'                    => 'responder',
        'reason_label'                  => 'Motivo',

        // Apply page
        'apply_title'                   => 'Inscrever-se na Aliança',
        'apply_heading'                 => 'Inscrição para',
        'send_application_btn'          => 'Enviar inscrição',
        'chars_remaining'               => 'Caracteres restantes',
        'msg_too_long'                  => 'Mensagem muito longa (máx. 2000 caracteres)',

        // Broadcast
        'addressee'                     => 'Para',
        'all_players'                   => 'todos os jogadores',
        'only_rank'                     => 'apenas posto:',
        'send_btn'                      => 'Enviar',

        // Info popup
        'info_title'                    => 'Informações da Aliança',
        'apply_confirm'                 => 'Deseja inscrever-se nesta aliança?',
        'redirect_confirm'              => 'Ao seguir este link, você sairá do OGame. Deseja continuar?',

        // Classes tab
        'class_selection_header'        => 'Seleção de Classe',
        'select_class_title'            => 'Selecionar classe de aliança',
        'select_class_note'             => 'Selecione uma classe de aliança para receber bônus especiais. Você pode alterar a classe da aliança no menu da aliança, desde que tenha as permissões necessárias.',
        'class_warriors'                => 'Guerreiros (Aliança)',
        'class_traders'                 => 'Comerciantes (Aliança)',
        'class_researchers'             => 'Pesquisadores (Aliança)',
        'class_label'                   => 'Classe da Aliança',
        'buy_for'                       => 'Comprar por',
        'no_dark_matter'                => 'Não há Matéria Escura suficiente disponível',
        'loca_deactivate'               => 'Desativar',
        'loca_activate_dm'              => 'Deseja ativar a classe de aliança #allianceClassName# por #darkmatter# Matéria Escura? Ao fazer isso, você perderá sua classe de aliança atual.',
        'loca_activate_item'            => 'Deseja ativar a classe de aliança #allianceClassName#? Ao fazer isso, você perderá sua classe de aliança atual.',
        'loca_deactivate_note'          => 'Tem certeza de que deseja desativar a classe de aliança #allianceClassName#? Reativação requer um item de mudança de classe de aliança por 500.000 Matéria Escura.',
        'loca_class_change_append'      => '<br><br>Classe de aliança atual: #currentAllianceClassName#<br><br>Última alteração em: #lastAllianceClassChange#',
        'loca_no_dm'                    => 'Matéria Escura insuficiente! Deseja comprar agora?',
        'loca_reference'                => 'Referência',
        'loca_language'                 => 'Idioma:',
        'loca_loading'                  => 'carregando...',
        'warrior_bonus_1'               => '+10% velocidade para naves voando entre membros da aliança',
        'warrior_bonus_2'               => '+1 níveis de pesquisa de combate',
        'warrior_bonus_3'               => '+1 níveis de pesquisa de espionagem',
        'warrior_bonus_4'               => 'O sistema de espionagem pode ser usado para escanear sistemas inteiros.',
        'trader_bonus_1'                => '+10% velocidade para transportadores',
        'trader_bonus_2'                => '+5% produção de minas',
        'trader_bonus_3'                => '+5% produção de energia',
        'trader_bonus_4'                => '+10% capacidade de armazenamento do planeta',
        'trader_bonus_5'                => '+10% capacidade de armazenamento da lua',
        'researcher_bonus_1'            => '+5% planetas maiores na colonização',
        'researcher_bonus_2'            => '+10% velocidade para destino de expedição',
        'researcher_bonus_3'            => 'A falange do sistema pode ser usada para escanear movimentos de frota em sistemas inteiros.',
        'class_not_implemented'         => 'Sistema de classes de aliança ainda não implementado',

        // Create alliance form
        'create_tag_label'              => 'Tag da Aliança (3-8 caracteres)',
        'create_name_label'             => 'Nome da Aliança (3-30 caracteres)',
        'create_btn'                    => 'Criar aliança',
        'loca_ally_tag_chars'           => 'Tag da Aliança (3-30 caracteres)',
        'loca_ally_name_chars'          => 'Nome da Aliança (3-8 caracteres)',
        'loca_ally_name_label'          => 'Nome da Aliança (3-30 caracteres)',
        'loca_ally_tag_label'           => 'Tag da Aliança (3-8 caracteres)',
        'validation_min_chars'          => 'Caracteres insuficientes',
        'validation_special'            => 'Contém caracteres inválidos.',
        'validation_underscore'         => 'Seu nome não pode começar ou terminar com um sublinhado.',
        'validation_hyphen'             => 'Seu nome não pode começar ou terminar com hífen.',
        'validation_space'              => 'Seu nome não pode começar ou terminar com espaço.',
        'validation_max_underscores'    => 'Seu nome não pode conter mais de 3 sublinhados no total.',
        'validation_max_hyphens'        => 'Seu nome não pode conter mais de 3 hífens.',
        'validation_max_spaces'         => 'Seu nome não pode incluir mais de 3 espaços no total.',
        'validation_consec_underscores' => 'Você não pode usar dois ou mais sublinhados seguidos.',
        'validation_consec_hyphens'     => 'Você não pode usar dois ou mais hífens consecutivamente.',
        'validation_consec_spaces'      => 'Você não pode usar dois ou mais espaços seguidos.',

        // JS confirm dialogs
        'confirm_leave'                 => 'Tem certeza de que deseja sair da aliança?',
        'confirm_kick'                  => 'Tem certeza de que deseja expulsar :username da aliança?',
        'confirm_deny'                  => 'Tem certeza de que deseja recusar esta inscrição?',
        'confirm_deny_title'            => 'Recusar inscrição',
        'confirm_disband'               => 'Realmente excluir aliança?',
        'confirm_pass_on'               => 'Tem certeza de que deseja passar sua aliança adiante?',
        'confirm_takeover'              => 'Tem certeza de que deseja assumir esta aliança?',
        'confirm_abandon'               => 'Abandonar esta aliança?',
        'confirm_takeover_long'         => 'Assumir esta aliança?',

        // Controller / AJAX success & error messages
        'msg_already_in'                => 'Você já está em uma aliança',
        'msg_not_in_alliance'           => 'Você não está em uma aliança',
        'msg_not_found'                 => 'Aliança não encontrada',
        'msg_id_required'               => 'ID da aliança é obrigatório',
        'msg_closed'                    => 'Esta aliança está fechada para inscrições',
        'msg_created'                   => 'Aliança criada com sucesso',
        'msg_applied'                   => 'Inscrição enviada com sucesso',
        'msg_accepted'                  => 'Inscrição aceita',
        'msg_rejected'                  => 'Inscrição recusada',
        'msg_kicked'                    => 'Membro expulso da aliança',
        'msg_kicked_success'            => 'Membro expulso com sucesso',
        'msg_left'                      => 'Você saiu da aliança',
        'msg_rank_assigned'             => 'Posto atribuído',
        'msg_rank_assigned_to'          => 'Posto atribuído com sucesso para :name',
        'msg_ranks_assigned'            => 'Postos atribuídos com sucesso',
        'msg_rank_perms_updated'        => 'Permissões de posto atualizadas',
        'msg_texts_updated'             => 'Textos da aliança atualizados',
        'msg_text_updated'              => 'Texto da aliança atualizado',
        'msg_settings_updated'          => 'Configurações da aliança atualizadas',
        'msg_tag_updated'               => 'Tag da aliança atualizada',
        'msg_name_updated'              => 'Nome da aliança atualizado',
        'msg_tag_name_updated'          => 'Tag e nome da aliança atualizados',
        'msg_disbanded'                 => 'Aliança dissolvida',
        'msg_broadcast_sent'            => 'Mensagem de transmissão enviada com sucesso',
        'msg_rank_created'              => 'Posto criado com sucesso',
        'msg_apply_success'             => 'Inscrição enviada com sucesso',
        'msg_apply_error'               => 'Falha ao enviar inscrição',
        'msg_leave_error'               => 'Falha ao sair da aliança',
        'msg_assign_error'              => 'Falha ao atribuir postos',
        'msg_kick_error'                => 'Falha ao expulsar membro',
        'msg_invalid_action'            => 'Ação inválida',
        'msg_error'                     => 'Ocorreu um erro',
        'rank_founder_default'  => 'Fundador',
        'rank_newcomer_default' => 'Novato',
    ],

    // -------------------------------------------------------------------
    // Techtree module
    // -------------------------------------------------------------------
    'techtree' => [
        // Navigation tabs
        'tab_techtree'                          => 'Árvore Tecnológica',
        'tab_applications'                      => 'Aplicações',
        'tab_techinfo'                          => 'Tecnologia Info',
        'tab_technology'                        => 'Tecnologia',

        // Common
        'page_title'                            => 'Tecnologia',
        'no_requirements'                       => 'Nenhum requisito disponível',
        'is_requirement_for'                    => 'é requisito para',
        'level'                                 => 'Nível',

        // Shared table columns
        'col_level'                             => 'Nível',
        'col_difference'                        => 'Diferença',
        'col_diff_per_level'                    => 'Diferença/Nível',
        'col_protected'                         => 'Protegido',
        'col_protected_percent'                 => 'Protegido (Porcentagem)',

        // Production table
        'production_energy_balance'             => 'Balanço de Energia',
        'production_per_hour'                   => 'Produção/h',
        'production_deuterium_consumption'      => 'Consumo de Deutério',

        // Properties table (ships/defense)
        'properties_technical_data'             => 'Dados técnicos',
        'properties_structural_integrity'       => 'Integridade Estrutural',
        'properties_shield_strength'            => 'Força do Escudo',
        'properties_attack_strength'            => 'Força de Ataque',
        'properties_speed'                      => 'Velocidade',
        'properties_cargo_capacity'             => 'Capacidade de Carga',
        'properties_fuel_usage'                 => 'Consumo de combustível (Deutério)',

        // Property tooltip
        'tooltip_basic_value'                   => 'Valor base',

        // Rapidfire
        'rapidfire_from'                        => 'Tiro rápido de',
        'rapidfire_against'                     => 'Tiro rápido contra',

        // Storage table
        'storage_capacity'                      => 'Cap. armazenamento',

        // Plasma table
        'plasma_metal_bonus'                    => 'Bônus Metal %',
        'plasma_crystal_bonus'                  => 'Bônus Cristal %',
        'plasma_deuterium_bonus'                => 'Bônus Deutério %',

        // Astrophysics table
        'astrophysics_max_colonies'             => 'Colônias máximas',
        'astrophysics_max_expeditions'          => 'Expedições máximas',
        'astrophysics_note_1'                   => 'Posições 3 e 13 podem ser povoadas a partir do nível 4.',
        'astrophysics_note_2'                   => 'Posições 2 e 14 podem ser povoadas a partir do nível 6.',
        'astrophysics_note_3'                   => 'Posições 1 e 15 podem ser povoadas a partir do nível 8.',
    ],

    // -------------------------------------------------------------------
    // Options (user settings) module
    // -------------------------------------------------------------------
    'options' => [
        // Page title
        'page_title'                                => 'Opções',

        // Tabs
        'tab_userdata'                              => 'Dados do usuário',
        'tab_general'                               => 'Geral',
        'tab_display'                               => 'Exibição',
        'tab_extended'                              => 'Estendido',

        // Tab 1 – Player name
        'section_playername'                        => 'Nome do Jogador',
        'your_player_name'                          => 'Seu nome de jogador:',
        'new_player_name'                           => 'Novo nome de jogador:',
        'username_change_once_week'                 => 'Você pode alterar seu nome de usuário uma vez por semana.',
        'username_change_hint'                      => 'Para isso, clique no seu nome ou nas configurações no topo da tela.',

        // Tab 1 – Password
        'section_password'                          => 'Alterar senha',
        'old_password'                              => 'Digite a senha antiga:',
        'new_password'                              => 'Nova senha (mín. 4 caracteres):',
        'repeat_password'                           => 'Repita a nova senha:',
        'password_check'                            => 'Verificação de senha:',
        'password_strength_low'                     => 'Baixa',
        'password_strength_medium'                  => 'Média',
        'password_strength_high'                    => 'Alta',
        'password_properties_title'                 => 'A senha deve conter as seguintes propriedades',
        'password_min_max'                          => 'mín. 4 caracteres, máx. 128 caracteres',
        'password_mixed_case'                       => 'Maiúsculas e minúsculas',
        'password_special_chars'                    => 'Caracteres especiais (ex.: !?:_., )',
        'password_numbers'                          => 'Números',
        'password_length_hint'                      => 'Sua senha deve ter pelo menos <strong>4 caracteres</strong> e no máximo <strong>128 caracteres</strong>.',

        // Tab 1 – Email
        'section_email'                             => 'Endereço de e-mail',
        'current_email'                             => 'Endereço de e-mail atual:',
        'send_validation_link'                      => 'Enviar link de validação',
        'email_sent_success'                        => 'E-mail enviado com sucesso!',
        'email_sent_error'                          => 'Erro! A conta já está validada ou o e-mail não pôde ser enviado!',
        'email_too_many_requests'                   => "Você já solicitou muitos e-mails!",
        'new_email'                                 => 'Novo endereço de e-mail:',
        'new_email_confirm'                         => 'Novo endereço de e-mail (para confirmação):',
        'enter_password_confirm'                    => 'Digite a senha (como confirmação):',
        'email_warning'                             => 'Aviso! Após uma validação bem-sucedida da conta, uma nova alteração de endereço de e-mail só é possível após um período de <b>7 dias</b>.',

        // Tab 2 – General
        'section_spy_probes'                        => 'Sondas de espionagem',
        'spy_probes_amount'                         => 'Quantidade de sondas de espionagem:',
        'section_chat'                              => 'Chat',
        'disable_chat_bar'                          => 'Desativar barra de chat:',
        'section_warnings'                          => 'Avisos',
        'disable_outlaw_warning'                    => 'Desativar aviso de foragido em ataques a oponentes 5x mais fortes:',

        // Tab 3 – Display > General
        'section_general_display'                   => 'Geral',
        'show_mobile_version'                       => 'Mostrar versão móvel:',
        'show_alt_dropdowns'                        => 'Mostrar menus alternativos:',
        'activate_autofocus'                        => 'Ativar autofoco no ranking:',
        'always_show_events'                        => 'Sempre mostrar eventos:',
        'events_hide'                               => 'Ocultar',
        'events_above'                              => 'Acima do conteúdo',
        'events_below'                              => 'Abaixo do conteúdo',

        // Tab 3 – Display > Planets
        'section_planets'                           => 'Seus planetas',
        'sort_planets_by'                           => 'Ordenar planetas por:',
        'sort_emergence'                            => 'Ordem de surgimento',
        'sort_coordinates'                          => 'Coordenadas',
        'sort_alphabet'                             => 'Alfabeto',
        'sort_size'                                 => 'Tamanho',
        'sort_used_fields'                          => 'Campos usados',
        'sort_sequence'                             => 'Sequência de ordenação:',
        'sort_order_up'                             => 'crescente',
        'sort_order_down'                           => 'decrescente',

        // Tab 3 – Display > Overview
        'section_overview_display'                  => 'Visão Geral',
        'highlight_planet_info'                     => 'Destacar informações do planeta:',
        'animated_detail_display'                   => 'Exibição detalhada animada:',
        'animated_overview'                         => 'Visão geral animada:',

        // Tab 3 – Display > Overlays
        'section_overlays'                          => 'Sobreposições',
        'overlays_hint'                             => 'As configurações a seguir permitem que as sobreposições correspondentes abram como janela de navegador adicional em vez de dentro do jogo.',
        'popup_notes'                               => 'Notas em janela extra:',
        'popup_combat_reports'                      => 'Relatórios de combate em janela extra:',

        // Tab 3 – Display > Messages
        'section_messages_display'                  => 'Mensagens',
        'hide_report_pictures'                      => 'Ocultar imagens em relatórios:',
        'msgs_per_page'                             => 'Quantidade de mensagens exibidas por página:',
        'auctioneer_notifications'                  => 'Notificação do leiloeiro:',
        'economy_notifications'                     => 'Criar mensagens de economia:',

        // Tab 3 – Display > Galaxy
        'section_galaxy_display'                    => 'Galáxia',
        'detailed_activity'                         => 'Exibição detalhada de atividade:',
        'preserve_galaxy_system'                    => 'Preservar galáxia/sistema com mudança de planeta:',

        // Tab 4 – Extended > Vacation Mode
        'section_vacation'                          => 'Modo de Férias',
        'vacation_active'                           => 'Você está atualmente em modo de férias.',
        'vacation_can_deactivate_after'             => 'Você pode desativar após:',
        'vacation_cannot_activate'                  => 'Modo de férias não pode ser ativado (Frotas ativas)',
        'vacation_description_1'                    => 'O modo de férias foi projetado para protegê-lo durante longas ausências do jogo. Você só pode ativá-lo quando nenhuma de suas frotas estiver em trânsito. Ordens de construção e pesquisa serão colocadas em espera.',
        'vacation_description_2'                    => 'Uma vez ativado o modo de férias, ele o protegerá de novos ataques. Ataques já iniciados, no entanto, continuarão e sua produção será definida como zero. O modo de férias não impede que sua conta seja excluída se estiver inativa por 35+ dias e a conta não tiver DM comprado.',
        'vacation_description_3'                    => 'O modo de férias dura no mínimo 48 horas. Somente após esse tempo você poderá desativá-lo.',
        'vacation_tooltip_min_days'                 => 'As férias duram no mínimo 2 dias.',
        'vacation_deactivate_btn'                   => 'Desativar',
        'vacation_activate_btn'                     => 'Ativar',

        // Tab 4 – Extended > Account
        'section_account'                           => 'Sua Conta',
        'delete_account'                            => 'Excluir conta',
        'delete_account_hint'                       => 'Marque aqui para que sua conta seja marcada para exclusão automática após 7 dias.',

        // Submit
        'use_settings'                              => 'Usar configurações',

        // JS validationEngine rules
        'validation_not_enough_chars'               => 'Caracteres insuficientes',
        'validation_pw_too_short'                   => 'A senha digitada é muito curta (mín. 4 caracteres)',
        'validation_pw_too_long'                    => 'A senha digitada é muito longa (máx. 20 caracteres)',
        'validation_invalid_email'                  => 'Você precisa inserir um endereço de e-mail válido!',
        'validation_special_chars'                  => 'Contém caracteres inválidos.',
        'validation_no_begin_end_underscore'        => 'Seu nome não pode começar ou terminar com um sublinhado.',
        'validation_no_begin_end_hyphen'            => 'Seu nome não pode começar ou terminar com hífen.',
        'validation_no_begin_end_whitespace'        => 'Seu nome não pode começar ou terminar com espaço.',
        'validation_max_three_underscores'          => 'Seu nome não pode conter mais de 3 sublinhados no total.',
        'validation_max_three_hyphens'              => 'Seu nome não pode conter mais de 3 hífens.',
        'validation_max_three_spaces'               => 'Seu nome não pode incluir mais de 3 espaços no total.',
        'validation_no_consecutive_underscores'     => 'Você não pode usar dois ou mais sublinhados seguidos.',
        'validation_no_consecutive_hyphens'         => 'Você não pode usar dois ou mais hífens consecutivamente.',
        'validation_no_consecutive_spaces'          => 'Você não pode usar dois ou mais espaços seguidos.',

        // JS preferenceLoca object
        'js_change_name_title'                      => 'Novo nome de jogador',
        'js_change_name_question'                   => 'Tem certeza de que deseja alterar seu nome de jogador para %newName%?',
        'js_planet_move_question'                   => 'Cuidado! Esta missão pode ainda estar em execução quando o período de relocação começar e, se for o caso, o processo será cancelado. Você realmente deseja continuar com este trabalho?',
        'js_tab_disabled'                           => 'Para usar esta opção você precisa estar validado e não pode estar em modo de férias!',
        'js_vacation_question'                      => 'Deseja ativar o modo de férias? Você só pode terminar suas férias após 2 dias.',

        // Controller messages
        'msg_settings_saved'                        => 'Configurações salvas',
        'msg_password_incorrect'                    => 'A senha atual digitada está incorreta.',
        'msg_password_mismatch'                     => 'As novas senhas não coincidem.',
        'msg_password_length_invalid'               => 'A nova senha deve ter entre 4 e 128 caracteres.',
        'msg_vacation_activated'                    => 'Modo de férias ativado. Ele o protegerá de novos ataques por no mínimo 48 horas.',
        'msg_vacation_deactivated'                  => 'Modo de férias desativado.',
        'msg_vacation_min_duration'                 => 'Você só pode desativar o modo de férias após a duração mínima de 48 horas.',
        'msg_vacation_fleets_in_transit'            => 'Você não pode ativar o modo de férias enquanto tiver frotas em trânsito.',
        'msg_probes_min_one'                        => 'Quantidade de sondas de espionagem deve ser pelo menos 1',
    ],

    // -------------------------------------------------------------------------
    // Layout (main.blade.php) — header, menu, resource bar, footer, JS loca
    // -------------------------------------------------------------------------
    'layout' => [
        // Header bar
        'player'                    => 'Jogador',
        'change_player_name'        => 'Alterar nome do jogador',
        'highscore'                 => 'Ranking',
        'notes'                     => 'Anotações',
        'notes_overlay_title'       => 'Minhas anotações',
        'buddies'                   => 'Amigos',
        'search'                    => 'Buscar',
        'search_overlay_title'      => 'Buscar Universo',
        'options'                   => 'Opções',
        'support'                   => 'Suporte',
        'log_out'                   => 'Sair',
        'unread_messages'           => 'mensagem(ns) não lida(s)',
        'loading'                   => 'carregando...',
        'no_fleet_movement'         => 'Sem movimento de frota',
        'under_attack'              => 'Você está sob ataque!',

        // Character class
        'class_none'                => 'Nenhuma classe selecionada',
        'class_selected'            => 'Sua classe: :name',
        'class_click_select'        => 'Clique para selecionar uma classe de personagem',

        // Resource bar
        'res_available'             => 'Disponível',
        'res_storage_capacity'      => 'Capacidade de armazenamento',
        'res_current_production'    => 'Produção atual',
        'res_den_capacity'          => 'Capacidade do Depósito',
        'res_consumption'           => 'Consumo',
        'res_purchase_dm'           => 'Comprar Matéria Escura',
        'res_metal'                 => 'Metal',
        'res_crystal'               => 'Cristal',
        'res_deuterium'             => 'Deutério',
        'res_energy'                => 'Energia',
        'res_dark_matter'           => 'Matéria Escura',

        // Menu sidebar — item labels
        'menu_overview'             => 'Visão Geral',
        'menu_resources'            => 'Recursos',
        'menu_facilities'           => 'Instalações',
        'menu_merchant'             => 'Mercador',
        'menu_research'             => 'Pesquisa',
        'menu_shipyard'             => 'Estaleiro',
        'menu_defense'              => 'Defesa',
        'menu_fleet'                => 'Frota',
        'menu_galaxy'               => 'Galáxia',
        'menu_alliance'             => 'Aliança',
        'menu_officers'             => 'Recrutar Oficiais',
        'menu_shop'                 => 'Loja',
        'menu_directives'           => 'Diretivas',

        // Menu sidebar — icon tooltip titles
        'menu_rewards_title'        => 'Recompensas',
        'menu_resource_settings_title' => 'Configurações de recursos',
        'menu_jump_gate'            => 'Portal de Salto',
        'menu_resource_market_title' => 'Mercado de Recursos',
        'menu_technology_title'     => 'Tecnologia',
        'menu_fleet_movement_title' => 'Movimento de frota',
        'menu_inventory_title'      => 'Inventário',

        // Planet sidebar
        'planets'                   => 'Planetas',

        // Chat bar
        'contacts_online'           => ':count Contato(s) online',

        // Scroll button
        'back_to_top'               => 'Voltar ao topo',

        // Footer
        'all_rights_reserved'       => 'Todos os direitos reservados.',
        'patch_notes'               => 'Notas de atualização',
        'server_settings'           => 'Configurações do servidor',
        'help'                      => 'Ajuda',
        'rules'                     => 'Regras',
        'legal'                     => 'Legal',
        'board'                     => 'Fórum',

        // JS — jsloca
        'js_internal_error'         => "Ocorreu um erro desconhecido anteriormente. Infelizmente sua última ação não pôde ser executada!",
        'js_notify_info'            => 'Info',
        'js_notify_success'         => 'Sucesso',
        'js_notify_warning'         => 'Aviso',
        'js_combatsim_planning'     => 'Planejamento',
        'js_combatsim_pending'      => 'Simulação em execução...',
        'js_combatsim_done'         => 'Concluído',
        'js_msg_restore'            => 'restaurar',
        'js_msg_delete'             => 'excluir',
        'js_copied'                 => 'Copiado para a área de transferência',
        'js_report_operator'        => 'Denunciar esta mensagem a um operador do jogo?',

        // JS — LocalizationStrings
        'js_time_done'              => 'concluído',
        'js_question'               => 'Pergunta',
        'js_ok'                     => 'Ok',
        'js_outlaw_warning'         => 'Você está prestes a atacar um jogador mais forte. Se fizer isso, suas defesas de ataque serão desativadas por 7 dias e todos os jogadores poderão atacá-lo sem punição. Tem certeza de que deseja continuar?',
        'js_last_slot_moon'         => 'Este edifício usará o último slot de construção disponível. Expanda sua Base Lunar para obter mais espaço. Tem certeza de que deseja construir este edifício?',
        'js_last_slot_planet'       => 'Este edifício usará o último slot de construção disponível. Expanda seu Terraformador ou compre um item de Campo de Planeta para obter mais slots. Tem certeza de que deseja construir este edifício?',
        'js_forced_vacation'        => 'Alguns recursos do jogo estão indisponíveis até que sua conta seja validada.',
        'js_more_details'           => 'Mais detalhes',
        'js_less_details'           => 'Menos detalhes',
        'js_planet_lock'            => 'Travar arranjo',
        'js_planet_unlock'          => 'Destravar arranjo',
        'js_activate_item_question' => 'Gostaria de substituir o item existente? O bônus antigo será perdido no processo.',
        'js_activate_item_header'   => 'Substituir item?',

        // JS — chatLoca
        'chat_text_empty'           => 'Onde está a mensagem?',
        'chat_text_too_long'        => 'A mensagem é muito longa.',
        'chat_same_user'            => 'Você não pode escrever para si mesmo.',
        'chat_ignored_user'         => 'Você ignorou este jogador.',
        'chat_not_activated'        => "Esta função só está disponível após a ativação da sua conta.",
        'chat_new_chats'            => '#+# mensagem(ns) não lida(s)',
        'chat_more_users'           => 'mostrar mais',

        // JS — eventboxLoca
        'eventbox_mission'          => 'Missão',
        'eventbox_missions'         => 'Missões',
        'eventbox_next'             => 'Próximo',
        'eventbox_type'             => 'Tipo',
        'eventbox_own'              => 'próprio',
        'eventbox_friendly'         => 'amigável',
        'eventbox_hostile'          => 'hostil',

        // JS — planetMoveLoca
        'planet_move_ask_title'     => 'Reassentar Planeta',
        'planet_move_ask_cancel'    => 'Tem certeza de que deseja cancelar esta relocação de planeta? O tempo de espera normal será mantido.',
        'planet_move_success'       => 'A relocação do planeta foi cancelada com sucesso.',

        // JS — locaPremium
        'premium_building_half'     => 'Deseja reduzir o tempo de construção em 50% do tempo total de construção () por <b>750 Matéria Escura<\/b>?',
        'premium_building_full'     => 'Deseja concluir imediatamente a ordem de construção por <b>750 Matéria Escura<\/b>?',
        'premium_ships_half'        => 'Deseja reduzir o tempo de construção em 50% do tempo total de construção () por <b>750 Matéria Escura<\/b>?',
        'premium_ships_full'        => 'Deseja concluir imediatamente a ordem de construção por <b>750 Matéria Escura<\/b>?',
        'premium_research_half'     => 'Deseja reduzir o tempo de pesquisa em 50% do tempo total de pesquisa () por <b>750 Matéria Escura<\/b>?',
        'premium_research_full'     => 'Deseja concluir imediatamente a ordem de pesquisa por <b>750 Matéria Escura<\/b>?',

        // JS — loca object
        'loca_error_not_enough_dm'  => 'Matéria Escura insuficiente! Deseja comprar agora?',
        'loca_notice'               => 'Referência',
        'loca_planet_giveup'        => 'Tem certeza de que deseja abandonar o planeta %planetName% %planetCoordinates%?',
        'loca_moon_giveup'          => 'Tem certeza de que deseja abandonar a lua %planetName% %planetCoordinates%?',
        'no_ships_in_wreck'  => 'Nenhuma nave no campo de destroços',
        'no_wreck_available' => 'Nenhum campo de destroços disponível',
    ],

    // ── Highscore ───────────────────────────────────────────────────────────
    'highscore' => [
        'player_highscore'      => 'Ranking de jogadores',
        'alliance_highscore'    => 'Ranking de alianças',
        'own_position'          => 'Própria posição',
        'own_position_hidden'   => 'Própria posição (-)',
        'points'                => 'Pontos',
        'economy'               => 'Economia',
        'research'              => 'Pesquisa',
        'military'              => 'Militar',
        'military_built'        => 'Pontos militares construídos',
        'military_destroyed'    => 'Pontos militares destruídos',
        'military_lost'         => 'Pontos militares perdidos',
        'honour_points'         => 'Pontos de honra',
        'position'              => 'Posição',
        'player_name_honour'    => "Nome do Jogador (Pontos de honra)",
        'action'                => 'Ação',
        'alliance'              => 'Aliança',
        'member'                => 'Membro',
        'average_points'        => 'Pontos médios',
        'no_alliances_found'    => 'Nenhuma aliança encontrada',
        'write_message'         => 'Escrever mensagem',
        'buddy_request'         => 'Solicitação de amigo',
        'buddy_request_to'      => 'Solicitação de amigo para',
        'total_ships'           => 'Total de naves',
        'buddy_request_sent'    => 'Solicitação de amigo enviada com sucesso!',
        'buddy_request_failed'  => 'Falha ao enviar solicitação de amigo.',
        'are_you_sure_ignore'   => 'Tem certeza de que deseja ignorar',
        'player_ignored'        => 'Jogador ignorado com sucesso!',
        'player_ignored_failed' => 'Falha ao ignorar jogador.',
    ],

    // ── Premium / Officers ──────────────────────────────────────────────────
    'premium' => [
        'recruit_officers'           => 'Recrutar Oficiais',
        'your_officers'              => 'Seus oficiais',
        'intro_text'                 => 'Com seus oficiais você pode levar seu império a um tamanho além de seus sonhos - tudo que você precisa é um pouco de Matéria Escura e seus trabalhadores e conselheiros trabalharão ainda mais!',
        'info_dark_matter'           => 'Mais informações sobre: Matéria Escura',
        'info_commander'             => 'Mais informações sobre: Comandante',
        'info_admiral'               => 'Mais informações sobre: Almirante',
        'info_engineer'              => 'Mais informações sobre: Engenheiro',
        'info_geologist'             => 'Mais informações sobre: Geólogo',
        'info_technocrat'            => 'Mais informações sobre: Tecnocrata',
        'info_commanding_staff'      => 'Mais informações sobre: Estado-maior',
        'hire_commander_tooltip'     => 'Contratar comandante|+40 favoritos, fila de construção, atalhos, scanner de transporte, sem anúncios* <span style=\'font-size: 10px; line-height: 10px\'>(*exceto: referências relacionadas ao jogo)</span>',
        'hire_admiral_tooltip'       => "Contratar almirante|Máx. slots de frota +2,\nMáx. expedições +1,\nTaxa de fuga de frota melhorada,\nSlots de simulação de combate +20",
        'hire_engineer_tooltip'      => 'Contratar engenheiro|Reduz perdas de defesas pela metade, +10% produção de energia',
        'hire_geologist_tooltip'     => 'Contratar geólogo|+10% produção de minas',
        'hire_technocrat_tooltip'    => 'Contratar tecnocrata|+2 níveis de espionagem, 25% menos tempo de pesquisa',
        'remaining_officers'         => ':current de :max',
        'benefit_fleet_slots_title'  => 'Você pode despachar mais frotas ao mesmo tempo.',
        'benefit_fleet_slots'        => 'Máx. slots de frota +1',
        'benefit_energy_title'       => 'Suas usinas e satélites solares produzem 2% mais energia.',
        'benefit_energy'             => '+2% produção de energia',
        'benefit_mines_title'        => 'Suas minas produzem 2% a mais.',
        'benefit_mines'              => '+2% produção de minas',
        'benefit_espionage_title'    => '1 nível será adicionado à sua pesquisa de espionagem.',
        'benefit_espionage'          => '+1 níveis de espionagem',
    ],

    // ── Shop ────────────────────────────────────────────────────────────────
    'shop' => [
        'page_title'               => 'Loja',
        'tooltip_shop'             => 'Você pode comprar itens aqui.',
        'tooltip_inventory'        => 'Você pode obter uma visão geral dos itens comprados aqui.',
        'btn_shop'                 => 'Loja',
        'btn_inventory'            => 'Inventário',
        'category_special_offers'  => 'Ofertas especiais',
        'category_all'             => 'todos',
        'category_resources'       => 'Recursos',
        'category_buddy_items'     => 'Itens de amigos',
        'category_construction'    => 'Construção',
        'btn_get_more_resources'   => 'Obter mais recursos',
        'btn_purchase_dark_matter' => 'Comprar Matéria Escura',
        'feature_coming_soon'      => 'Recurso em breve.',
        // Item tiers
        'tier_gold'                => 'Ouro',
        'tier_silver'              => 'Prata',
        'tier_bronze'              => 'Bronze',
        // Tooltip labels inside item cards
        'tooltip_duration'         => 'Duração',
        'duration_now'             => 'agora',
        'tooltip_price'            => 'Preço',
        'tooltip_in_inventory'     => 'No Inventário',
        'dark_matter'              => 'Matéria Escura',
        'dm_abbreviation'          => 'ME',
        'item_duration'            => 'Duração',
        'now'                      => 'agora',
        'item_price'               => 'Preço',
        'item_in_inventory'        => 'No Inventário',
        // JS loca keys (consumed by inventory.js)
        'loca_extend'              => 'Estender',
        'loca_activate'            => 'Ativar',
        'loca_buy_activate'        => 'Comprar e ativar',
        'loca_buy_extend'          => 'Comprar e estender',
        'loca_buy_dm'              => 'Você não tem Matéria Escura suficiente. Gostaria de comprar agora?',
    ],

    // -------------------------------------------------------------------------
    // Search overlay
    // -------------------------------------------------------------------------

    'search' => [
        'input_hint'              => 'Digite nome de jogador, aliança ou planeta',
        'search_btn'              => 'Buscar',
        'tab_players'             => 'Nomes de jogadores',
        'tab_alliances'           => 'Alianças/Tags',
        'tab_planets'             => 'Nomes de planetas',
        'no_search_term'          => 'Nenhum termo de busca inserido',
        'searching'               => 'Buscando...',
        'search_failed'           => 'Busca falhou. Tente novamente.',
        'no_results'              => 'Nenhum resultado encontrado',
        'player_name'             => 'Nome do jogador',
        'planet_name'             => 'Nome do planeta',
        'coordinates'             => 'Coordenadas',
        'tag'                     => 'Tag',
        'alliance_name'           => 'Nome da aliança',
        'member'                  => 'Membro',
        'points'                  => 'Pontos',
        'action'                  => 'Ação',
        'apply_for_alliance'      => 'Inscrever-se nesta aliança',
    ],

    // -------------------------------------------------------------------------
    // Notes overlay
    // -------------------------------------------------------------------------

    'notes' => [
        'no_notes_found'          => 'Nenhuma anotação encontrada',
        'add_note'             => 'Adicionar anotação',
        'date_label'           => 'Data',
        'delete_all'           => 'Excluir todas as anotações',
        'delete_marked'        => 'Excluir anotações marcadas',
        'edit_note'            => 'Editar anotação',
        'new_note'             => 'Nova Anotação',
        'priority_important'   => 'Importante',
        'priority_label'       => 'Prioridade:',
        'priority_normal'      => 'Normal',
        'priority_unimportant' => 'Não importante',
        'save_btn'             => 'Salvar',
        'save_question'        => 'As alterações devem ser salvas?',
        'select_action'        => 'Selecionar ação',
        'subject_label'        => 'Assunto',
        'subject_placeholder'  => 'Seu assunto',
        'unsaved_warning'      => 'A mensagem não foi salva. Todas as alterações serão perdidas se você sair da página.',
        'your_message'         => 'Sua mensagem:',
        'your_subject'         => 'Seu assunto:',
    ],

    // -------------------------------------------------------------------------
    // Planet abandon / rename overlay
    // -------------------------------------------------------------------------

    'planet_abandon' => [
        // Page description
        'description'                   => 'Usando este menu você pode alterar nomes de planetas e luas ou abandoná-los completamente.',

        // Rename section
        'rename_heading'                => 'Renomear',
        'new_planet_name'               => 'Novo nome do planeta',
        'new_moon_name'                 => 'Novo nome da lua',
        'rename_btn'                    => 'Renomear',

        // Tooltips (HTML content – escaped automatically by {{ }} in title attributes)
        'tooltip_rules_title'           => 'Regras',
        'tooltip_rename_planet'         => 'Você pode renomear seu planeta aqui.<br /><br />O nome do planeta deve ter entre <span style="font-weight: bold;">2 e 20 caracteres</span>.<br />Nomes de planetas podem conter letras maiúsculas e minúsculas, bem como números.<br />Podem conter hífens, sublinhados e espaços - porém estes não podem ser colocados da seguinte forma:<br />- no início ou no final do nome<br />- diretamente um ao lado do outro<br />- mais de três vezes no nome',
        'tooltip_rename_moon'           => 'Você pode renomear sua lua aqui.<br /><br />O nome da lua deve ter entre <span style="font-weight: bold;">2 e 20 caracteres</span>.<br />Nomes de luas podem conter letras maiúsculas e minúsculas, bem como números.<br />Podem conter hífens, sublinhados e espaços - porém estes não podem ser colocados da seguinte forma:<br />- no início ou no final do nome<br />- diretamente um ao lado do outro<br />- mais de três vezes no nome',

        // Abandon section headings
        'abandon_home_planet'           => 'Abandonar planeta natal',
        'abandon_moon'                  => 'Abandonar Lua',
        'abandon_colony'                => 'Abandonar Colônia',
        'abandon_home_planet_btn'       => 'Abandonar Planeta Natal',
        'abandon_moon_btn'              => 'Abandonar lua',
        'abandon_colony_btn'            => 'Abandonar Colônia',

        // Abandon warnings
        'home_planet_warning'           => 'Se você abandonar seu planeta natal, imediatamente no seu próximo login você será direcionado para o planeta que colonizou em seguida.',
        'items_lost_moon'               => 'Se você tem itens ativados em uma lua, eles serão perdidos se você abandonar a lua.',
        'items_lost_planet'             => 'Se você tem itens ativados em um planeta, eles serão perdidos se você abandonar o planeta.',

        // Abandon confirm form
        'confirm_password'              => 'Confirme a exclusão do :type [:coordinates] digitando sua senha',
        'confirm_btn'                   => 'Confirmar',
        'type_moon'                     => 'lua',
        'type_planet'                   => 'planeta',

        // Validation messages (JS)
        'validation_min_chars'          => 'Caracteres insuficientes',
        'validation_pw_min'             => 'A senha digitada é muito curta (mín. 4 caracteres)',
        'validation_pw_max'             => 'A senha digitada é muito longa (máx. 20 caracteres)',
        'validation_email'              => 'Você precisa inserir um endereço de e-mail válido!',
        'validation_special'            => 'Contém caracteres inválidos.',
        'validation_underscore'         => 'Seu nome não pode começar ou terminar com um sublinhado.',
        'validation_hyphen'             => 'Seu nome não pode começar ou terminar com hífen.',
        'validation_space'              => 'Seu nome não pode começar ou terminar com espaço.',
        'validation_max_underscores'    => 'Seu nome não pode conter mais de 3 sublinhados no total.',
        'validation_max_hyphens'        => 'Seu nome não pode conter mais de 3 hífens.',
        'validation_max_spaces'         => 'Seu nome não pode incluir mais de 3 espaços no total.',
        'validation_consec_underscores' => 'Você não pode usar dois ou mais sublinhados seguidos.',
        'validation_consec_hyphens'     => 'Você não pode usar dois ou mais hífens consecutivamente.',
        'validation_consec_spaces'      => 'Você não pode usar dois ou mais espaços seguidos.',

        // Controller messages
        'msg_invalid_planet_name'       => 'O novo nome do planeta é inválido. Tente novamente.',
        'msg_invalid_moon_name'         => 'O novo nome da lua é inválido. Tente novamente.',
        'msg_planet_renamed'            => 'Planeta renomeado com sucesso.',
        'msg_moon_renamed'              => 'Lua renomeada com sucesso.',
        'msg_wrong_password'            => 'Senha errada!',
        'msg_confirm_title'             => 'Confirmar',
        'msg_confirm_deletion'          => 'Se você confirmar a exclusão do :type [:coordinates] (:name), todos os edifícios, naves e sistemas de defesa que estão naquele :type serão removidos da sua conta. Se você tiver itens ativos no seu :type, estes também serão perdidos quando você abandonar o :type. Este processo não pode ser revertido!',
        'msg_reference'                 => 'Referência',
        'msg_abandoned'                 => ':type foi abandonado com sucesso!',
        'msg_type_moon'                 => 'Lua',
        'msg_type_planet'               => 'Planeta',
        'msg_yes'                       => 'Sim',
        'msg_no'                        => 'Não',
        'msg_ok'                        => 'Ok',
    ],

    // ── Admin: server settings and developer shortcuts pages ──
    'admin' => [
        'acs'                          => 'Sistema de Combate de Aliança:',
        'alliance_cooldown'            => 'Tempo de espera da aliança (dias):',
        'alliance_cooldown_desc'       => 'Dias que um jogador deve esperar após sair de uma aliança antes de entrar/criar outra',
        'battle_engine'                => 'Motor de Batalha:',
        'battle_engine_desc'           => 'O motor de batalha Rust é até 200x mais performático que PHP. Mude para PHP apenas se o Rust não puder rodar no seu servidor.',
        'section_bots'                 => 'Jogadores Bot',
        'bot_spawn_enabled'            => 'Ativar spawn automático de bots:',
        'bot_spawn_interval'           => 'Intervalo de spawn de bots (segundos):',
        'bot_max_count'                => 'Máximo de jogadores bot:',
        'bot_inactive_days'            => 'Remover bots após inatividade (dias):',
        'bot_attack_chance'            => 'Chance de ataque dos bots (%):',
        'bot_level_min'                => 'Nível mínimo aleatório:',
        'bot_level_max'                => 'Nível máximo aleatório:',
        'bot_run_action'               => 'Executar Ação do Bot Agora',
        'bot_action_error'             => 'Ocorreu um erro ao executar a ação do bot.',
        'bot_action_success'           => 'Ação do bot concluída: :spawned bots spawnados, :attacks ataques lançados.',
        'debris_defense'               => 'Estruturas defensivas em campos de destroços:',
        'debris_deuterium'             => 'Deutério em campos de destroços:',
        'debris_ships'                 => 'Naves destruídas em campos de destroços:',
        'dev_add_dm'                   => 'Adicionar/subtrair matéria escura para jogador nas coordenadas:',
        'dev_add_resources'            => 'Adicionar/subtrair recursos nas coordenadas:',
        'dev_add_units'                => 'Adicionar X de unidade ao planeta atual:',
        'dev_class_settings'           => 'Configurações de Classe de Personagem',
        'dev_coordinates'              => 'Coordenadas:',
        'dev_create_debris'            => 'Criar/excluir campo de destroços nas coordenadas:',
        'dev_create_debris_btn'        => 'Criar/Adicionar Campo de Destroços',
        'dev_create_expedition_debris' => 'Criar Destroços de Expedição (Posição 16)',
        'dev_create_moon'              => 'Criar Lua',
        'dev_create_planet'            => 'Criar Planeta',
        'dev_create_planet_moon'       => 'Criar planeta/lua nas coordenadas:',
        'dev_debris_amount'            => 'Quantidade de Destroços:',
        'dev_debris_resources_label'   => 'Recursos a adicionar:',
        'dev_delete_debris_btn'        => 'Excluir Campo de Destroços',
        'dev_delete_moon'              => 'Excluir Lua',
        'dev_delete_planet'            => 'Excluir Planeta',
        'dev_disable_free_class'       => 'Desativar Mudanças de Classe Gratuitas',
        'dev_dm_amount'                => 'Quantidade de Matéria Escura:',
        'dev_dm_desc'                  => 'Insira valor positivo para adicionar ou negativo para subtrair matéria escura. Suporta sufixos k/m/b.',
        'dev_enable_free_class'        => 'Ativar Mudanças de Classe Gratuitas',
        'dev_galaxy'                   => 'Galáxia:',
        'dev_goto_class'               => 'Ir para Seleção de Classe',
        'dev_level_to_set'             => 'Nível a definir:',
        'dev_light_fighter'            => 'Caça leve',
        'dev_moon_size'                => 'Tamanho da Lua (para Criar Lua):',
        'dev_position'                 => 'Posição:',
        'dev_quick_shortcut_desc'      => 'Atalho rápido para testar classe Descobridor:',
        'dev_reset_buildings'          => 'Definir todos os edifícios para nível 0',
        'dev_reset_class'              => 'Redefinir Classe de Personagem',
        'dev_reset_planet'             => 'Redefinir planeta',
        'dev_reset_research'           => 'Definir todas as pesquisas para nível 0',
        'dev_reset_resources'          => 'Definir todos os recursos para 0',
        'dev_reset_units'              => 'Remover todas as unidades',
        'dev_resources_desc'           => 'Você pode inserir valores positivos ou negativos para adicionar ou subtrair do recurso selecionado. Suporta sufixos k/m/b (ex.: 1k, 2m, 3b)',
        'dev_resources_label'          => 'Recursos a adicionar/subtrair:',
        'dev_set_building'             => 'Definir nível do edifício no planeta atual:',
        'dev_set_mines'                => 'Definir todas as minas para nível 30',
        'dev_set_research'             => 'Definir todas as pesquisas para nível 10',
        'dev_set_research_level'       => 'Definir nível de pesquisa para o jogador atual:',
        'dev_set_shipyard'             => 'Definir todas as instalações do estaleiro para nível 12',
        'dev_set_storages'             => 'Definir todos os armazenamentos para nível 15',
        'dev_system'                   => 'Sistema:',
        'dev_title'                    => 'Atalhos do Desenvolvedor',
        'dev_units_amount'             => 'Quantidade de unidades a adicionar:',
        'dev_update_dm'                => 'Atualizar Matéria Escura',
        'dev_update_planet'            => 'Atualizar planeta atual:',
        'dev_update_resources_moon'    => 'Atualizar Recursos (lua)',
        'dev_update_resources_planet'  => 'Atualizar Recursos (planeta)',
        'dev_x_factor'                 => 'Fator X (10-20):',
        'dm_bonus'                     => 'Bônus de Matéria Escura:',
        'dm_regen_amount'              => 'Quantidade de regeneração de Matéria Escura:',
        'dm_regen_description'         => 'Ativar regeneração periódica de Matéria Escura para todos os jogadores. Desativado por padrão para corresponder ao comportamento do jogo oficial. Quando ativado, jogadores receberão Matéria Escura automaticamente no intervalo configurado.',
        'dm_regen_enabled'             => 'Regeneração de Matéria Escura ativada:',
        'dm_regen_period'              => 'Período de regeneração de Matéria Escura (segundos):',
        'economy_speed'                => 'Velocidade da economia:',
        'expedition_bonus_slots'       => 'Slots de expedição bônus:',
        'expedition_multiplier_dm'     => 'Multiplicador de recompensa de Matéria Escura:',
        'expedition_multiplier_items'  => 'Multiplicador de recompensa de itens:',
        'expedition_multiplier_res'    => 'Multiplicador de recompensa de recursos:',
        'expedition_multiplier_ships'  => 'Multiplicador de recompensa de naves:',
        'expedition_slots_desc'        => 'Slots de expedição bônus são adicionados aos slots base da pesquisa de Astrofísica. Multiplicadores de recompensa são multiplicativos com velocidade da economia e aplicam-se aos valores finais de recompensa (1.0 = padrão, 2.0 = dobro).',
        'expedition_weights_defaults'  => 'Porcentagens padrão:',
        'expedition_weights_desc'      => 'Pesos de resultado determinam a probabilidade relativa de cada resultado de expedição. Valores maiores significam ocorrência mais frequente. Pesos são relativos entre si (ex.: peso 20 é duas vezes mais provável que peso 10). Defina 0 para desativar um resultado.',
        'expedition_weights_values'    => 'Nada: 25% | Recursos: 35% | Naves: 17% | Atraso: 7.5% | Aceleração: 2.75% | Matéria Escura: 7.5% | Piratas: 3% | Aliens: 1.5% | Itens: 0.5% | Mercador: 0.4% | Buraco Negro: 0.2%',
        'fleet_speed_holding'          => 'Velocidade de frota de espera:',
        'fleet_speed_peaceful'         => 'Velocidade de frota pacífica:',
        'fleet_speed_war'              => 'Velocidade de frota de guerra:',
        'galaxy_count'                 => 'Número de galáxias:',
        'galaxy_ignore_empty'          => 'Sistemas vazios são ignorados:',
        'galaxy_ignore_inactive'       => 'Sistemas inativos são ignorados:',
        'hamill_probability'           => 'Probabilidade da Manobra Hamill (1 em X chance):',
        'highscore_admin_visible'      => 'Mostrar admins no ranking:',
        'highscore_admin_visible_desc' => 'Quando ativado, usuários admin aparecem no ranking com nomes destacados em laranja. Quando desativado (padrão), admins são excluídos dos rankings completamente.',
        'income_crystal'               => 'Renda básica de cristal por hora:',
        'income_deuterium'             => 'Renda básica de deutério por hora:',
        'income_energy'                => 'Renda básica de energia por hora:',
        'income_metal'                 => 'Renda básica de metal por hora:',
        'moon_chance'                  => 'Chance máxima de lua:',
        'planet_fields_bonus'          => 'Bônus de campos de planeta',
        'registration_planet_amount'   => 'Quantidade de planetas para dar ao jogador no registro',
        'relocation_cost'              => 'Custo de relocação de planeta (Matéria Escura):',
        'relocation_duration'          => 'Duração da relocação de planeta (segundos):',
        'research_speed'               => 'Velocidade de pesquisa:',
        'save'                         => 'Salvar configurações',
        'section_alliance'             => 'Configurações de aliança.',
        'section_basic'                => 'Configurações básicas.',
        'section_battle'               => 'Configurações de batalha.',
        'section_changes_note'         => 'Você pode alterar as configurações do servidor abaixo. As alterações serão aplicadas imediatamente.',
        'section_dm_regen'             => 'Configurações de regeneração de Matéria Escura.',
        'section_expedition'           => 'Configurações de expedição.',
        'section_expedition_slots'     => 'Slots de expedição e multiplicadores de recompensa.',
        'section_expedition_weights'   => 'Pesos de resultados de expedição.',
        'section_galaxy'               => 'Configurações de galáxia.',
        'section_highscore'            => 'Configurações de ranking.',
        'section_income_note'          => 'Nota: os valores de renda básica abaixo são multiplicados pela velocidade da economia.',
        'section_new_player'           => 'Configurações de novo jogador.',
        'section_relocation'           => 'Configurações de relocação de planeta.',
        'title'                        => 'Configurações do servidor',
        'universe_name'                => 'Nome do universo:',
        'weight_aliens'                => 'Peso aliens:',
        'weight_black_hole'            => 'Peso buraco negro:',
        'weight_delay'                 => 'Peso atraso:',
        'weight_dm'                    => 'Peso matéria escura:',
        'weight_items'                 => 'Peso itens:',
        'weight_merchant'              => 'Peso mercador:',
        'weight_nothing'               => 'Peso nada/falha:',
        'weight_pirates'               => 'Peso piratas:',
        'weight_resources'             => 'Peso recursos:',
        'weight_ships'                 => 'Peso naves:',
        'weight_speedup'               => 'Peso aceleração:',
        'wreck_lifetime'               => 'Tempo de vida do campo de destroços (horas):',
        'wreck_lifetime_desc'          => 'Horas antes de um campo de destroços expirar se não reparado.',
        'wreck_min_fleet_pct'          => 'Porcentagem mínima de destruição da frota:',
        'wreck_min_fleet_pct_desc'     => 'Porcentagem mínima da frota defensora que deve ser destruída para formação de campo de destroços.',
        'wreck_min_resources'          => 'Destruição mínima para campos de destroços:',
        'wreck_min_resources_desc'     => 'Valor mínimo de recursos que deve ser perdido para formação de campo de destroços.',
        'wreck_repair_max'             => 'Tempo máximo de reparo (horas):',
        'wreck_repair_max_desc'        => 'Tempo máximo para reparos de naves no Estaleiro Espacial.',
        'wreck_repair_min'             => 'Tempo mínimo de reparo (minutos):',
        'wreck_repair_min_desc'        => 'Tempo mínimo antes que qualquer nave possa ser reparada no Estaleiro Espacial.',
    ],

    // ── Technology detail panel (ajax/object) ──
    'ajax_object' => [
        'build'                    => 'Construir',
        'cancel_expansion_confirm' => 'Cancelar expansão de :name para nível :level?',
        'commander_queue_info'     => 'Você precisa de um Comandante para usar a fila de construção. Gostaria de saber mais sobre as vantagens de um Comandante?',
        'costs_per_piece'          => 'Custos por unidade',
        'crystal'                  => 'Cristal',
        'deconstruction_costs'     => 'Custos de desconstrução',
        'destroy_rockets_btn'      => 'Destruir foguetes',
        'destroy_rockets_desc'     => 'Destruir foguetes para liberar espaço no seu silo de mísseis',
        'detail_now'               => 'agora',
        'deuterium'                => 'Deutério',
        'duration'                 => 'Duração:',
        'energy'                   => 'Energia',
        'energy_needed'            => 'Energia necessária:',
        'err_dm_price_too_low'     => 'Com preço de 0 ME a margem de lucro é muito baixa para o mercador!',
        'err_no_dark_matter'       => 'Matéria Escura insuficiente! Deseja comprar agora?',
        'err_resource_limit'       => 'O mercador só pode entregar recursos totalizando 10.000.000 para você',
        'err_storage_capacity'     => 'Capacidade de armazenamento insuficiente. - Deseja expandir seu armazenamento?',
        'error'                    => 'Erro',
        'gain_resources'           => 'Ganhar recursos para reabastecer imediatamente seu armazenamento',
        'improve'                  => 'Melhorar',
        'in_queue'                 => 'Na fila',
        'ion_technology_bonus'     => 'Bônus de tecnologia de íons:',
        'level'                    => 'Nível',
        'max_btn'                  => '[máx. :amount]',
        'metal'                    => 'Metal',
        'more_details'             => 'Mais detalhes',
        'no_requirements'          => 'Nenhum requisito disponível',
        'no_rocket_silo_capacity'  => 'Capacidade insuficiente. Atualize silo de mísseis.',
        'not_enough_fields'        => 'Campos insuficientes!',
        'number'                   => 'Número',
        'number_label'             => 'Quantidade:',
        'open_techtree'            => 'Abrir árvore tecnológica',
        'production'               => 'Produção',
        'production_duration'      => 'Duração da produção:',
        'required_to_improve'      => 'Necessário para melhorar para nível',
        'shipyard_busy'            => 'O Estaleiro ainda está ocupado',
        'shipyard_upgrading'       => 'Estaleiro está sendo atualizado',
        'start_with_dm'            => 'Iniciar com ME',
        'storage_capacity'         => 'Capacidade de armazenamento:',
        'tear_down_btn'            => 'desmontar',
        'techtree'                 => 'Árvore tecnológica',
        'vacation_mode'            => 'Você não pode construir enquanto estiver em modo de férias',
        'view_offers'              => 'Ver ofertas',
    ],

    // ── Jump gate dialog ──
    'jumpgate' => [
        'cooldown_time'      => 'Tempo até próximo salto',
        'error_occurred'     => 'Ocorreu um erro.',
        'jump_btn'           => 'Pular',
        'jump_error'         => 'Ocorreu um erro durante o salto.',
        'jump_success'       => 'Salto executado com sucesso.',
        'no_ships'           => 'Nenhuma nave foi selecionada!',
        'not_ready'          => 'Portal de Salto não está pronto!',
        'ok_btn'             => 'OK',
        'origin_coordinates' => 'Coordenadas de origem',
        'reset_selection'    => 'Redefinir seleção',
        'select_all'         => 'Selecionar todas as naves disponíveis',
        'select_ships'       => 'Selecionar naves',
        'select_target'      => 'Selecionar alvo do salto',
        'standard_target'    => 'Alvo padrão do Portal de Salto',
        'target_coordinates' => 'Coordenadas do alvo',
        'valid_target'       => 'Você deve selecionar um alvo válido.',
    ],

    // ── Server settings overlay (in-game) ──
    'serversettings_overlay' => [
        'acs_enabled'          => 'Sistema de Combate de Aliança ativado',
        'days'                 => 'dias',
        'debris_defense'       => 'Estruturas defensivas em campos de destroços:',
        'debris_deuterium'     => 'Deutério em campos de destroços',
        'debris_ships'         => 'Naves destruídas em campos de destroços:',
        'dev_speed'            => 'Velocidade de desenvolvimento:',
        'dm_bonus'             => 'Bônus de Matéria Escura:',
        'dm_regen_amount'      => 'Quantidade de regeneração de Matéria Escura:',
        'dm_regen_enabled'     => 'Regeneração de Matéria Escura ativada',
        'dm_regen_period'      => 'Período de regeneração de Matéria Escura:',
        'fleet_deut_reduction' => 'Redução de consumo de deutério de frota:',
        'fleet_speed_holding'  => 'Velocidade de frota de espera:',
        'fleet_speed_peace'    => 'Velocidade de frota pacífica:',
        'fleet_speed_war'      => 'Velocidade de frota de guerra:',
        'ignore_empty'         => 'Sistemas vazios são ignorados',
        'ignore_inactive'      => 'Sistemas inativos são ignorados',
        'num_galaxies'         => 'Número de galáxias:',
        'planet_field_bonus'   => 'Bônus de campo de planeta:',
        'research_speed'       => 'Velocidade de pesquisa:',
    ],

    // ── Shared build queue partials ──
    'buildqueue' => [
        'building_duration'      => 'Duração da construção',
        'complete'               => 'Concluir',
        'complete_tooltip'       => 'Conclui instantaneamente a produção atual do estaleiro.',
        'halve_cost'             => 'Custo: :amount ME',
        'halve_time'             => 'Reduzir tempo pela metade',
        'halve_tooltip_building' => 'Reduz o tempo de construção em 50% do tempo total de construção.',
        'question_complete_unit' => 'Deseja concluir imediatamente a ordem de construção por :dm_cost?',
        'question_halve_unit'    => 'Deseja reduzir o tempo de construção do projeto atual em 50% do tempo total de construção (:time_reduction) por :dm_cost?',
        'total_time'             => 'Tempo total',
    ],
];