<?php

namespace MotorK;


class Tae
{

    /** @var $percent int */
    private $percent;
    /** @var $month int */
    private $month;

    /**
     * @param $percent
     * @param $month
     * @return Tae
     */
    public static function init(int $percent, int $month)
    {
        return new self($percent, $month);
    }

    /**
     * Tae constructor.
     * @param $percent
     * @param $month
     */
    public function __construct(int $percent, int $month)
    {
        $this->percent = $percent;
        $this->month = $month;
    }

    /**
     * @return float
     */
    public function calculate(): float
    {

        return ((1 + $this->percent / 100 / 12) ** 12 - 1) * 100;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return round($this->calculate(), 3) . ' %';
    }
}