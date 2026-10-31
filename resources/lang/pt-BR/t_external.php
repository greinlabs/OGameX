<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Outgame / Landing page - Português Brasileiro
    |--------------------------------------------------------------------------
    */

    // Browser outdated warning
    'browser_warning' => [
        'title'  => 'Seu navegador não está atualizado.',
        'desc1'  => 'Sua versão do Internet Explorer não corresponde aos padrões existentes e não é mais suportada por este site.',
        'desc2'  => 'Para usar este site, atualize seu navegador da web para uma versão atual ou use outro navegador. Se você já estiver usando a versão mais recente, recarregue a página para exibi-la corretamente.',
        'desc3'  => "Aqui está uma lista dos navegadores mais populares. Clique em um dos símbolos para acessar a página de download:",
    ],

    // Login form (header)
    'login' => [
        'page_title'        => 'OGame - Conquiste o universo',
        'btn'               => 'Login',
        'email_label'       => 'Endereço de e-mail:',
        'password_label'    => 'Senha:',
        'universe_label'    => 'Universo:',
        'universe_option_1' => '1. Universo',
        'submit'            => 'Entrar',
        'forgot_password'   => 'Esqueceu sua senha?',
        'forgot_email'      => 'Esqueceu seu endereço de e-mail?',
        'terms_accept_html' => 'Ao fazer login, eu aceito os <a class="" href="#" target="_blank" title="T&amp;Cs">Termos e Condições</a>',
    ],

    // Registration form (sidebar)
    'register' => [
        'play_free'    => 'JOGUE DE GRAÇA!',
        'email_label'  => 'Endereço de e-mail:',
        'password_label' => 'Senha:',
        'universe_label' => 'Universo:',
        'distinctions' => 'Distinguições',
        'terms_html'   => 'Nossos <a class="" target="_blank" href="#" title="T&amp;Cs"> Termos e Condições </a> e <a class="" target="_blank" href="#" title="Política de Privacidade"> Política de Privacidade </a> se aplicam ao jogo',
        'submit'       => 'Registrar',
    ],

    // Top navigation tabs
    'nav' => [
        'home'  => 'Início',
        'about' => 'Sobre o OGame',
        'media' => 'Mídia',
        'wiki'  => 'Wiki',
    ],

    // Home tab content
    'home' => [
        'title'            => 'OGame - Conquiste o universo',
        'description_html' => '<em>OGame</em> é um jogo de estratégia ambientado no espaço, com milhares de jogadores de todo o mundo competindo ao mesmo tempo. Você só precisa de um navegador da web comum para jogar.',
        'board_btn'        => 'Fórum',
        'trailer_title'    => 'Trailer',
    ],

    // Footer
    'footer' => [
        'legal'          => 'Legal',
        'privacy_policy' => 'Política de Privacidade',
        'terms'          => 'Termos e Condições',
        'contact'        => 'Contato',
        'rules'          => 'Regras',
        'copyright'      => '© OGameX. Todos os direitos reservados.',
    ],

    // Inline JS strings
    'js' => [
        'login'            => 'Login',
        'close'            => 'Fechar',
        'age_check_failed' => 'Lamentamos, mas você não é elegível para se registrar. Consulte nossos Termos e Condições para obter mais informações.',
    ],

    // jQuery ValidationEngine strings
    'validation' => [
        'required'                  => 'Este campo é obrigatório',
        'make_decision'             => 'Faça uma escolha',
        'accept_terms'              => 'Você deve aceitar os Termos e Condições.',
        'length'                    => 'Entre 3 e 20 caracteres são permitidos.',
        'pw_length'                 => 'Entre 4 e 20 caracteres são permitidos.',
        'email'                     => 'Você precisa digitar um endereço de e-mail válido!',
        'invalid_chars'             => 'Contém caracteres inválidos.',
        'no_begin_end_underscore'   => 'Seu nome não pode começar ou terminar com um sublinhado.',
        'no_begin_end_whitespace'   => 'Seu nome não pode começar ou terminar com um espaço.',
        'max_three_underscores'     => 'Seu nome não pode conter mais de 3 sublinhados no total.',
        'max_three_whitespaces'     => 'Seu nome não pode incluir mais de 3 espaços no total.',
        'no_consecutive_underscores' => 'Você não pode usar dois ou mais sublinhados seguidos.',
        'no_consecutive_whitespaces' => 'Você não pode usar dois ou mais espaços seguidos.',
        'username_available'        => 'Este nome de usuário está disponível.',
        'username_loading'          => 'Por favor, aguarde, carregando...',
        'username_taken'            => 'Este nome de usuário não está mais disponível.',
        'only_letters'              => 'Use apenas caracteres.',
    ],

    // Universe selection characteristics tooltip texts
    'universe_characteristics' => [
        'fleet_speed'     => 'Velocidade da Frota: quanto maior o valor, menos tempo você tem para reagir a um ataque.',
        'economy_speed'   => 'Velocidade da Economia: quanto maior o valor, mais rápido construções e pesquisas serão concluídas e recursos coletados.',
        'debris_ships'    => 'Alguns dos navios destruídos em batalha entrarão no campo de destroços.',
        'debris_defence'  => 'Algumas das estruturas defensivas destruídas em batalha entrarão no campo de destroços.',
        'dark_matter_gift' => 'Você receberá Matéria Escura como recompensa por confirmar seu endereço de e-mail.',
        'aks_on'          => 'Sistema de Batalha de Aliança ativado',
        'planet_fields'   => 'A quantidade máxima de slots de construção foi aumentada.',
        'wreckfield'      => 'Estaleiro Espacial ativado: alguns navios destruídos podem ser restaurados usando o Estaleiro Espacial.',
        'universe_big'    => 'Quantidade de Galáxias no Universo',
    ],
];
