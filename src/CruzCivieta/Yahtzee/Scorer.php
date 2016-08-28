<?php

namespace CruzCivieta\Yahtzee;

class Scorer
{
    /**
     * @param $roll Roll
     * @param $category Category
     * @return int
     */
    public function score(Roll $roll, Category $category)
    {
        $dices = $roll->retrieveRoll();
        if (empty($dices)) {
            return 0;
        }

        if ($category->isOne()) {
            $dicesFiltered = $this->filterByNumber($dices, 1);
            return array_sum($dicesFiltered);
        }

        if ($category->isTwo()) {
            $dicesFiltered = $this->filterByNumber($dices, 2);
            return array_sum($dicesFiltered);
        }

        if ($category->isThree()) {
            $dicesFiltered = $this->filterByNumber($dices, 3);
            return array_sum($dicesFiltered);
        }

        if ($category->isFour()) {
            $dicesFiltered = $this->filterByNumber($dices, 4);
            return array_sum($dicesFiltered);
        }

        if ($category->isFive()) {
            $dicesFiltered = $this->filterByNumber($dices, 5);
            return array_sum($dicesFiltered);
        }

        if ($category->isYahtzee() && $dices === [1, 2, 3, 4, 5, 6]) {
            return 50;
        }

        if ($category->isChance()) {
            return array_sum($roll->retrieveRoll());
        }

        return 0;
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