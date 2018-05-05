<?php

namespace MotorK;


class Rate
{

    /** @var $amount int */
    private $amount;
    /** @var $apr int */
    private $apr;
    /** @var $term int */
    private $term;

    /**
     * @param $amount
     * @param $percent
     * @param $month
     * @param $years
     * @return Rate
     */
    public static function init(int $amount, int $percent, int $month, int $years)
    {
        return new self($amount, $percent, $month, $years);
    }

    /**
     * Rate constructor.
     * @param $amount
     * @param $percent
     * @param $month
     * @param $years
     */
    public function __construct(int $amount, int $percent, int $month, int $years)
    {
        $this->amount = $amount;
        $this->apr = $percent / ($month * 100);
        $this->term = $years * $month;
    }

    /**
     * @return float
     */
    public function calculate(): float
    {
        return $this->amount * ($this->apr * (1 + $this->apr) ** $this->term) /((1 + $this->apr) ** $this->term - 1);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return round($this->calculate(), 2) . ' €';
    }
}