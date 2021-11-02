<?php

namespace app\robots;

/**
 * Реализует базовые методы и свойства всех роботов
 */
abstract class AbstractRobot implements RobotInterface
{
    /**
     * Конструктор класса
     */
    public function __construct()
    {
        //тестовые данные
        $this->setSpeed(rand(1, 10));
        $this->setWeight(rand(1, 10));
        $this->setHeight(rand(1, 10));
    }

    /**
     * @var float
     */
    protected $speed;
    /**
     * @var float
     */
    protected $weight;
    /**
     * @var float
     */
    protected $height;

    /**
     * @return float
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param float $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }
}