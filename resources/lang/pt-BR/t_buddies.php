<?php

return [
    // Error messages
    'error' => [
        'cannot_send_to_self' => 'Não é possível enviar solicitação de amigo para você mesmo.',
        'user_not_found' => 'Usuário não encontrado.',
        'cannot_send_to_admin' => 'Não é possível enviar solicitações de amigo para administradores.',
        'cannot_send_to_user' => 'Não é possível enviar solicitação de amigo para este usuário.',
        'already_buddies' => 'Você já é amigo deste usuário.',
        'request_exists' => 'Já existe uma solicitação de amigo entre estes usuários.',
        'request_not_found' => 'Solicitação de amigo não encontrada.',
        'not_authorized_accept' => 'Você não está autorizado a aceitar esta solicitação.',
        'not_authorized_reject' => 'Você não está autorizado a rejeitar esta solicitação.',
        'not_authorized_cancel' => 'Você não está autorizado a cancelar esta solicitação.',
        'already_processed' => 'Esta solicitação já foi processada.',
        'relationship_not_found' => 'Relacionamento de amigo não encontrado.',
        'cannot_ignore_self' => 'Não é possível ignorar a si mesmo.',
        'already_ignored' => 'Jogador já está ignorado.',
        'not_in_ignore_list' => 'Jogador não está na sua lista de ignorados.',
        'send_request_failed' => 'Falha ao enviar solicitação de amigo.',
        'ignore_player_failed' => 'Falha ao ignorar jogador.',
        'delete_buddy_failed' => 'Falha ao excluir amigo',
        'search_too_short' => 'Muito poucos caracteres! Insira pelo menos 2 caracteres.',
        'invalid_action' => 'Ação inválida',
    ],

    // Success messages
    'success' => [
        'request_sent' => 'Solicitação de amigo enviada com sucesso!',
        'request_cancelled' => 'Solicitação de amigo cancelada com sucesso.',
        'request_accepted' => 'Solicitação de amigo aceita!',
        'request_rejected' => 'Solicitação de amigo rejeitada',
        'request_accepted_symbol' => '✓ Solicitação de amigo aceita',
        'request_rejected_symbol' => '✗ Solicitação de amigo rejeitada',
        'buddy_deleted' => 'Amigo excluído com sucesso!',
        'player_ignored' => 'Jogador ignorado com sucesso!',
        'player_unignored' => 'Jogador designorado com sucesso.',
    ],

    // UI labels and titles
    'ui' => [
        'page_title' => 'Amigos',
        'my_buddies' => 'Meus amigos',
        'ignored_players' => 'Jogadores Ignorados',
        'buddy_request' => 'solicitação de amigo',
        'buddy_request_title' => 'Solicitação de amigo',
        'buddy_request_to' => 'Solicitação de amigo para',
        'buddy_requests' => 'Solicitações de amigo',
        'new_buddy_request' => 'Nova solicitação de amigo',
        'write_message' => 'Escrever mensagem',
        'send_message' => 'Enviar mensagem',
        'send' => 'enviar',
        'search_placeholder' => 'Pesquisar...',
        'no_buddies_found' => 'Nenhum amigo encontrado',
        'no_buddy_requests' => 'Você atualmente não tem solicitações de amigo.',
        'no_requests_sent' => 'Você não enviou nenhuma solicitação de amigo.',
        'no_ignored_players' => 'Nenhum jogador ignorado',
        'requests_received' => 'solicitações recebidas',
        'requests_sent' => 'solicitações enviadas',
        'new' => 'novo',
        'new_label' => 'Novo',
        'from' => 'De:',
        'to' => 'Para:',
        'online' => 'online',
        'status_on' => 'Ligado',
        'status_off' => 'Desligado',
        'received_request_from' => 'Você recebeu uma nova solicitação de amigo de',
        'buddy_request_to_player' => 'Solicitação de amigo para o jogador',
        'ignore_player_title' => 'Ignorar jogador',
    ],

    // Actions
    'action' => [
        'accept_request' => 'Aceitar solicitação de amigo',
        'reject_request' => 'Rejeitar solicitação de amigo',
        'withdraw_request' => 'Retirar solicitação de amigo',
        'delete_buddy' => 'Excluir amigo',
        'confirm_delete_buddy' => 'Você realmente deseja excluir seu amigo',
        'add_as_buddy' => 'Adicionar como amigo',
        'ignore_player' => 'Tem certeza de que deseja ignorar',
        'remove_from_ignore' => 'Remover da lista de ignorados',
        'report_message' => 'Denunciar esta mensagem a um operador do jogo?',
    ],

    // Table headers
    'table' => [
        'id' => 'ID',
        'name' => 'Nome',
        'points' => 'Pontos',
        'rank' => 'Classificação',
        'alliance' => 'Aliança',
        'coords' => 'Coordenadas',
        'actions' => 'Ações',
    ],

    // Common
    'common' => [
        'yes' => 'sim',
        'no' => 'não',
        'caution' => 'Cuidado',
    ],
];
