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
        $dicesFiltered = $this->filterByNumber($roll->retrieveRoll(), $this->number);

        return array_sum($dicesFiltered);
    }

    /**
     * @param $dices
     * @param $number
     * @return array
     */
    private function filterByNumber($dices, $number)
    {
        $dicesFiltered = array_filter($dices, function ($dice) use ($number) {
            return $dice === $number;
        });

        return $dicesFiltered;
    }

}