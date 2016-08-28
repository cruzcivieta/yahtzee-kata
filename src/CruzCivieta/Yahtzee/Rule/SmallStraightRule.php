<?php


namespace CruzCivieta\Yahtzee\Rule;


use CruzCivieta\Yahtzee\Category;
use CruzCivieta\Yahtzee\Roll;

class SmallStraightRule implements ScoreRule
{
    /**
     * @param Roll $roll
     * @return integer
     */
    public function apply(Roll $roll)
    {
        $dices = array_slice($roll->retrieveRoll(), 0, 5);
        $smallStraight = [1, 2, 3, 4, 5];

        return $dices === $smallStraight ? 15: 0;
    }

    /**
     * @param Category $category
     * @param Roll $roll
     * @return bool
     */
    public function isSupport(Category $category, Roll $roll)
    {
        return $category->isCategory(10);
    }
}