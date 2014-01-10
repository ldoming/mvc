<?php

class Config {
    

    public function base_url($url = '') {
        $url = explode('.php', $url);
        $url = $url[0];
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        if (substr($root, -1) != '/') {
            $base_url = $root . '/';
        } else {
            $base_url = $root;
        }
        return $base_url;
    }

}
