<?php


namespace CruzCivieta\Yahtzee\Rule;


use CruzCivieta\Yahtzee\Category;
use CruzCivieta\Yahtzee\Roll;

class FullHouseRule implements ScoreRule
{
    /**
     * @param Roll $roll
     * @return integer
     */
    public function apply(Roll $roll)
    {
        return array_sum($roll->retrieveFullHouse());
    }

    /**
     * @param Category $category
     * @param Roll $roll
     * @return bool
     */
    public function isSupport(Category $category, Roll $roll)
    {
        return $category->isCategory(12);
    }
}