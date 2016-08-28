<?php


namespace CruzCivieta\Yahtzee\Rule;


use CruzCivieta\Yahtzee\Category;
use CruzCivieta\Yahtzee\Roll;

class YahtzeeRule implements ScoreRule
{

    /**
     * @param Roll $roll
     * @return integer
     */
    public function apply(Roll $roll)
    {
        return 50;
    }

    /**
     * @param Category $category
     * @param Roll $roll
     * @return bool
     */
    public function isSupport(Category $category, Roll $roll)
    {
        return $category->isYahtzee() && $roll->retrieveRoll() === [1, 2, 3, 4, 5, 6];
    }
}