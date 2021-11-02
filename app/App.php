<?php

namespace app;

use app\robots\MergeRobot;
use app\robots\Robot1;
use app\robots\Robot2;

/**
 * Класс приложения
 */
class App
{
    /**
     * Основная логика приложения
     */
    public function run()
    {
        $robotFactory = new FactoryRobot();
        $robotFactory->addType(new Robot1());
        $robotFactory->addType(new Robot2());

        var_dump($robotFactory->createRobot1(5));
        var_dump($robotFactory->createRobot2(2));

        $mergeRobot = new MergeRobot();
        $mergeRobot->addRobot(new Robot2());
        $mergeRobot->addRobot($robotFactory->createRobot2(2));

        $robotFactory->addType($mergeRobot);

        $res = reset($robotFactory->createMergeRobot(1));
        echo "Speed: " . $res->getSpeed() . "\n";
        echo "Weight: " . $res->getWeight() . "\n";
        echo "Height: " . $res->getHeight() . "\n";
    }
}