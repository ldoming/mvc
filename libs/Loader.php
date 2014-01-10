<?php

class Loader {

    public function model($path) {
        $path = rtrim($path, '.php');
        $path = $path.'.php';
        if (file_exists($path)) {
            require_once $path;
            $vname = basename($path, '.php');
            ${$vname} = new $vname();
            return ${$vname};
        } else {
            echo "The file $path does not exist";
            return;
        }
    }

}
