<?php

//добавляю функцию, которая будет автоматически подключать классы, которые еще не подключены к приложению
spl_autoload_register(function ($classname) {
    //составляю путь к подключаемому файлу. Заменяю \ в названии класса, чтобы получить доступ к его файлу и подключить
    $path = APP_DIR . '/' . str_replace("\\", "/", $classname) . '.php';
    if (file_exists($path)) {
        require_once($path);
    } else {
        echo "Class $classname not found";
    }
});