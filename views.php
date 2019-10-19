<?php
    require('functions.php');

    // Get array from URI
    $uri = explode("/", getUri());
    
    if (end($uri) == '') {
        array_pop($uri);
    }

    if(!isset($uri[0])) {
        $uri[0] = '';
    }

    if (count($uri) <= 1) {
        if (array_key_exists($uri[0], $pages)) {
            displayPage($pages[$uri[0]]);
        } else {
            displayPage(array(
                '404', '404 - Page not found',
            ));
        }
    } else {
        if (array_key_exists($uri[0] . '/*', $pages)) {
            $file = array_shift($uri);

            displayPage(array(
                $file . "-param", $pages[$file][1], $uri,
            ));
        } else {
            displayPage(array(
                '404', '404 - Page not found',
            ));
        }
    }
?>