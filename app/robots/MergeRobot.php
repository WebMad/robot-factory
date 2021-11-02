<?php

namespace app\robots;

/**
 * Робот, которого можно мерджить с другими роботами
 */
class MergeRobot extends AbstractRobot
{
    /**
     * Сделал приватным, чтобы не нарушить логику работы по подсчету веса
     * (можно было роботов не хранить, так как нет задачи их потом отображать, удалять и т.д.)
     * @var array
     */
    private $robots = [];

    /**
     * Добавление робота
     * массу, скорость и рост подсчитываем тут же, так как скорее всего они будут вызываться чаще,
     * чем добавление нового робота
     * Если бы подразумевалось, что создание новых роботов будет чаще, то вынесли бы эту логику по геттерам и сеттерам
     * @param RobotInterface|RobotInterface[] $robots
     */
    public function addRobot($robots) {
        //проверка на массив
        if (is_array($robots)) {
            $this->robots = array_merge($robots, $this->robots);

            $min_speed = $robots[0]->getSpeed();
            foreach ($this->robots as $robot) {
                $min_speed = min($min_speed, $robot->getSpeed());
            }

            $height = 0;
            foreach ($this->robots as $robot) {
                $height += $robot->getHeight();
            }

            $weight = 0;
            foreach ($this->robots as $robot) {
                $weight += $robot->getWeight();
            }

            $this->setSpeed($min_speed);
            $this->setHeight($height);
            $this->setWeight($weight);
        }

        //проверка, является ли роботом
        if ($robots instanceof RobotInterface) {
            $this->robots[] = $robots;
        }
    }
}