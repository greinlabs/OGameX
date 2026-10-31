<?php

return [
    // Wreck Field Information and Status
    'wreck_field' => 'Campo de Destroços',
    'wreck_field_formed' => 'Campo de destroços formado nas coordenadas {coordinates}',
    'wreck_field_expired' => 'Campo de destroços expirou',
    'wreck_field_burned' => 'Campo de destroços foi queimado',

    // Wreck Field Conditions
    'formation_conditions' => 'Um campo de destroços forma-se quando pelo menos {min_resources} recursos são perdidos e pelo menos {min_percentage}% da frota defensora é destruída.',
    'resources_lost' => 'Recursos perdidos: {amount}',
    'fleet_percentage' => 'Frota destruída: {percentage}%',

    // Repair Information
    'repair_time' => 'Tempo de reparo',
    'repair_progress' => 'Progresso do reparo',
    'repair_completed' => 'Reparo concluído',
    'repairs_underway' => 'Reparos em andamento',
    'repair_duration_min' => 'Tempo mínimo de reparo: {minutes} minutos',
    'repair_duration_max' => 'Tempo máximo de reparo: {hours} horas',
    'repair_speed_bonus' => 'Estaleiro Espacial nível {level} fornece {bonus}% de bônus de velocidade de reparo',

    // Ships in Wreck Field
    'ships_in_wreck_field' => 'Naves no campo de destroços',
    'ship_type' => 'Tipo de nave',
    'quantity' => 'Quantidade',
    'repairable' => 'Reparável',
    'total_ships' => 'Total de naves: {count}',

    // Actions
    'start_repairs' => 'Iniciar reparos',
    'complete_repairs' => 'Concluir reparos',
    'burn_wreck_field' => 'Queimar campo de destroços',
    'cancel_repairs' => 'Cancelar reparos',

    // Action Messages
    'repair_started' => 'Reparos iniciados. Tempo de conclusão: {time}',
    'repairs_completed' => 'Todos os reparos foram concluídos. Naves prontas para implantação.',
    'wreck_field_burned_success' => 'Campo de destroços queimado com sucesso.',
    'cannot_repair' => 'Este campo de destroços não pode ser reparado.',
    'cannot_burn' => 'Este campo de destroços não pode ser queimado enquanto reparos estão em andamento.',

    // Galaxy View
    'wreck_field_icon' => 'CD',
    'wreck_field_tooltip' => 'Campo de Destroços ({time_remaining} restantes)',
    'click_to_repair' => 'Clique para ir ao Estaleiro Espacial para reparos',
    'no_wreck_field' => 'Sem campo de destroços',

    // Space Dock Integration
    'space_dock_required' => 'Estaleiro Espacial nível 1 é necessário para reparar campos de destroços.',
    'space_dock_level' => 'Nível do Estaleiro Espacial: {level}',
    'upgrade_space_dock' => 'Atualize o Estaleiro Espacial para reparar mais naves',
    'repair_capacity_reached' => 'Capacidade máxima de reparo atingida. Atualize o Estaleiro Espacial para aumentar a capacidade.',

    // Battle Reports
    'wreck_field_section' => 'Informações do Campo de Destroços',
    'ships_available_for_repair' => 'Naves disponíveis para reparo: {count}',
    'wreck_field_resources' => 'Campo de destroços contém aproximadamente {value} recursos em valor de naves.',

    // Admin Settings
    'settings_title' => 'Configurações do Campo de Destroços',
    'enabled_description' => 'Campos de destroços permitem a recuperação de naves destruídas através do edifício Estaleiro Espacial. Naves podem ser reparadas se a destruição atender a certos critérios.',
    'percentage_setting' => 'Naves destruídas no campo de destroços:',
    'min_resources_setting' => 'Destruição mínima para campos de destroços:',
    'min_fleet_percentage_setting' => 'Porcentagem mínima de destruição da frota:',
    'lifetime_setting' => 'Tempo de vida do campo de destroços (horas):',
    'repair_max_time_setting' => 'Tempo máximo de reparo (horas):',
    'repair_min_time_setting' => 'Tempo mínimo de reparo (minutos):',

    // Errors and Warnings
    'error_no_wreck_field' => 'Nenhum campo de destroços encontrado neste local.',
    'error_not_owner' => 'Você não é o proprietário deste campo de destroços.',
    'error_already_repairing' => 'Reparos já estão em andamento.',
    'error_no_ships' => 'Nenhuma nave disponível para reparo.',
    'error_space_dock_required' => 'Estaleiro Espacial nível 1 é necessário para reparar campos de destroços.',
    'error_cannot_collect_late_added' => 'Naves adicionadas durante reparos em andamento não podem ser coletadas manualmente. Você deve esperar até que todos os reparos sejam concluídos automaticamente.',
    'warning_auto_return' => 'Naves reparadas serão automaticamente retornadas ao serviço {hours} horas após a conclusão do reparo.',

    // Time Remaining
    'time_remaining' => '{hours}h {minutes}m restantes',
    'expires_soon' => 'Expira em breve',
    'repair_time_remaining' => 'Conclusão do reparo: {time}',

    // Status Messages
    'status_active' => 'Ativo',
    'status_repairing' => 'Reparando',
    'status_completed' => 'Concluído',
    'status_burned' => 'Queimado',
    'status_expired' => 'Expirado',

    // Action Results
    'repairs_started' => 'Reparos iniciados com sucesso',
    'all_ships_deployed' => 'Todas as naves foram colocadas de volta em serviço',
    'no_ships_ready' => 'Nenhuma nave pronta para coleta',
    'repairs_not_started' => 'Reparos ainda não foram iniciados',
];