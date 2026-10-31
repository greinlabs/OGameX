<?php

return [
    // Space Dock Building
    'space_dock' => [
        'name' => 'Estaleiro Espacial',
        'description' => 'Estragos podem ser reparados no Estaleiro Espacial.',
        'description_long' => 'O Estaleiro Espacial oferece a possibilidade de reparar navios destruídos em batalha que deixaram destroços. O tempo de reparo leva no máximo 12 horas, mas leva pelo menos 30 minutos até que os navios possam ser colocados de volta em serviço.

Como o Estaleiro Espacial flutua em órbita, não requer um campo de planeta.',
        'requirements' => 'Requer Estaleiro nível 2',
        'field_consumption' => 'Não consome campos de planeta (flutua em órbita)',

        // Space Dock Interface
        'wreck_field_section' => 'Campo de Destroços',
        'no_wreck_field' => 'Nenhum campo de destroços disponível neste local.',
        'wreck_field_info' => 'Um campo de destroços está disponível contendo navios que podem ser reparados.',
        'ships_available' => 'Navios disponíveis para reparo: {count}',
        'repair_capacity' => 'Capacidade de reparo com base no nível do Estaleiro Espacial {level}',

        // Repair Actions
        'start_repair' => 'Iniciar reparo do campo de destroços',
        'repair_in_progress' => 'Reparos em andamento',
        'repair_completed' => 'Reparos concluídos',
        'deploy_ships' => 'Implantar navios reparados',
        'burn_wreck_field' => 'Queimar campo de destroços',

        // Repair Information
        'repair_time' => 'Tempo estimado de reparo: {time}',
        'repair_progress' => 'Progresso do reparo: {progress}%',
        'completion_time' => 'Conclusão: {time}',
        'auto_deploy_warning' => 'Os navios serão automaticamente implantados {hours} horas após a conclusão do reparo se não forem implantados manualmente.',

        // Level Effects
        'level_effects' => [
            'repair_speed' => 'Velocidade de reparo aumentada em {bonus}%',
            'capacity_increase' => 'Máximo de navios reparáveis aumentado',
        ],

        // Status Messages
        'status' => [
            'no_dock' => 'Estaleiro Espacial necessário para reparar campos de destroços',
            'level_too_low' => 'Nível 1 do Estaleiro Espacial necessário para reparar campos de destroços',
            'no_wreck_field' => 'Nenhum campo de destroços disponível',
            'repairing' => 'Reparando campo de destroços atualmente',
            'ready_to_deploy' => 'Reparos concluídos, navios prontos para implantação',
        ],
    ],

    // General Facilities Messages
    'actions' => [
        'build' => 'Construir',
        'upgrade' => 'Atualizar para o nível {level}',
        'downgrade' => 'Rebaixar para o nível {level}',
        'demolish' => 'Demolir',
        'cancel' => 'Cancelar',
    ],

    // Requirements
    'requirements' => [
        'met' => 'Requisitos atendidos',
        'not_met' => 'Requisitos não atendidos',
        'research' => 'Pesquisa: {requirement}',
        'building' => 'Edifício: {requirement} nível {level}',
    ],

    // Resources
    'cost' => [
        'metal' => 'Metal: {amount}',
        'crystal' => 'Cristal: {amount}',
        'deuterium' => 'Deutério: {amount}',
        'energy' => 'Energia: {amount}',
        'dark_matter' => 'Matéria Escura: {amount}',
        'total' => 'Custo total: {amount}',
    ],

    // Time
    'construction_time' => 'Tempo de construção: {time}',
    'upgrade_time' => 'Tempo de atualização: {time}',
];
