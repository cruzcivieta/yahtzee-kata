<?php


namespace CruzCivieta\Yahtzee\Rule;


use CruzCivieta\Yahtzee\Roll;

abstract class NumbersRule implements ScoreRule
{
    private $number;

    /**
     * NumbersRule constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function apply(Roll $roll)
    {
        return array_sum($roll->retrieveDicesOfNumber($this->number));
    }
}