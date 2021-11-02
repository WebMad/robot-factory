<?php

namespace app;

use app\robots\RobotInterface;
use Exception;

/**
 * Фабрика для создания работов
 */
class FactoryRobot
{
    /**
     * @var array
     */
    private static $types = [];

    /**
     * Добавление типа
     * @param RobotInterface $robot
     */
    public function addType(RobotInterface $robot)
    {
        $class = get_class($robot);

        //добавляю экземпляр класса работа в массив, чтобы потом можно было восстановить состояние объекта
        //(необходимо для создания соединенного робота и сохраннения его параметров)
        self::$types[substr($class, strrpos($class, '\\') + 1)] = $robot;
    }

    /**
     * @param $class_name
     * @return mixed
     */
    private function create($class_name)
    {
        //клонирую экземпляр класса, чтобы избежать ссылки на одну и ту же область памяти
        return clone self::$types[$class_name];
    }


    /**
     * Вызывается если вызываемый метод не был найден, тут создаем экземпляры необходимых классов
     * @param $name
     * @param $arguments
     * @return array|void
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        if (substr($name, 0, 6) == "create") {
            $class_name = substr($name, 6);
            if (array_key_exists($class_name, self::$types)) {
                $res = [];
                for ($i = 0; $i < $arguments[0]; $i++) {
                    $res[] = $this->create($class_name);
                }
                return $res;
            }
            throw new Exception("Robot type does not exists!");
        }
    }
}