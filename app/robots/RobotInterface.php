<?php

namespace app\robots;

/**
 * Интерфейс роботов, помогает понять, является ли роботом объект
 */
interface RobotInterface
{
    /**
     * @return int
     */
    public function getSpeed();

    /**
     * @return int
     */
    public function getWeight();

    /**
     * @return int
     */
    public function getHeight();

    /**
     * @param $speed
     */
    public function setSpeed($speed);

    /**
     * @param $weight
     */
    public function setWeight($weight);

    /**
     * @param $height
     */
    public function setHeight($height);
}