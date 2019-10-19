<?php
    //  'uri'       => array('pages/file', 'Page title', 'On navbar')?
    $pages = array(
        ''          => array('home', 'Homepage', true),
        'pages'     => array('pages', 'Posts', true),
        'pages/*'   => array('pages', 'Posts', false),
    );

    $config['sitename'] = "CDN";
    $config['url'] = "davidjaksa.ddns.net";
    $config['https'] = false;

    $user['davidjaksa']['username'] = "davidjaksa";
    $user['davidjaksa']['password'] = "asdasdasd";

    $user['davidjaksa']['username'] = "neon";
    $user['davidjaksa']['password'] = "asdasdasd";

    $config['debug'] = true;
?>