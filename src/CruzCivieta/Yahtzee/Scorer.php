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
            return $this->applyNumberRule($dices, 1);
        }

        if ($category->isTwo()) {
            return $this->applyNumberRule($dices, 2);
        }

        if ($category->isThree()) {
            return $this->applyNumberRule($dices, 3);
        }

        if ($category->isFour()) {
            return $this->applyNumberRule($dices, 4);
        }

        if ($category->isFive()) {
            return $this->applyNumberRule($dices, 5);
        }

        if ($category->isSix()) {
            return $this->applyNumberRule($dices, 6);
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

    /**
     * @param $dices
     * @param $number
     * @return number
     */
    private function applyNumberRule($dices, $number)
    {
        $dicesFiltered = $this->filterByNumber($dices, $number);
        return array_sum($dicesFiltered);
    }
}