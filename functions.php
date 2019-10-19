<?php
    require('config.php');
    require('lib/markdown.php');

    if ($config['debug']) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL ^ E_DEPRECATED);
    }

    function getUri() {
        return substr($_SERVER['REQUEST_URI'], 1);
    }

    function getMenuItems() {
        global $pages;

        $return = array();
        foreach ($pages as $k => $v) {
            if ($v[2] == true) {
                $return[] = array($k, $v);
            }
        }
        return $return;
    }

    function isActive($item){
        $uri = explode("/", getUri());

        if (end($uri) == '') {
            array_pop($uri);
        }
    
        if(!isset($uri[0])) {
            $uri[0] = '';
        }

        $menuurl = explode("/", $item[0]);

        if ($uri[0] == $menuurl[0]) {
            return 'active';
        } else {
            return;
        }
    }

    function showMenuItems() {

        //var_dump(getMenuItems());
        foreach (getMenuItems() as $item) {
            echo'<li class="nav-item">
                <a class="nav-link '. isActive($item) .'" href="/'.$item[0].'">'.$item[1][1].'</a>
            </li>';
        }
    }

    function displayPage($page) {
        global $config;

        require('src/header.php');
        //echo "pages/" . $page[0] . ".php";
        $success = include("pages/" . $page[0] . ".php");
        require('src/footer.php');

        if (!$success) {
            echo 'There was an error while we tried to open that page.';
        }
    }

    function scandirbydate($dir) {
        $ignored = array('.', '..', '.svn', '.htaccess');
    
        $files = array();    
        foreach (scandir($dir) as $file) {
            if (in_array($file, $ignored)) continue;
            $files[$file] = filemtime($dir . '/' . $file);
        }
    
        arsort($files);
        $files = array_keys($files);
    
        return ($files) ? $files : false;
    }

    function getPosts() {
        $files = preg_grep('~\.(md)$~', scandirbydate("posts"));
        
        $n = 0;
        foreach ($files as $value) {
            $content = file_get_contents("posts/" . $value);
            $content = Markdown($content);
            
            $arr = explode("</p>", $content, 2);
            $return[$n]['title'] = strip_tags ($arr[0]);

            $content = str_replace($arr[0], "", $content);
            $return[$n]['content'] = $content;

            $return[$n]['filename'] = str_replace('.md', "", $value);

            $n++;
        }
        return $return;
    }

    function getPost($filename) {
        if (!file_exists($filename)) {
            return false;
        } 
        
        $content = file_get_contents($filename);
        $content = Markdown($content);
        
        $arr = explode("</p>", $content, 2);
        $return['title'] = strip_tags ($arr[0]);

        $content = str_replace($arr[0], "", $content);
        $return['content'] = $content;

        $return['filename'] = str_replace('.md', "", $filename);

        return $return;
    }
?>