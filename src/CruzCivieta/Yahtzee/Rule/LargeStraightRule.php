<?php


namespace CruzCivieta\Yahtzee\Rule;


use CruzCivieta\Yahtzee\Category;
use CruzCivieta\Yahtzee\Roll;

class LargeStraightRule implements ScoreRule
{

    /**
     * @param Roll $roll
     * @return integer
     */
    public function apply(Roll $roll)
    {
        return $roll->isLargeStraight() ? 20 : 0;
    }

    /**
     * @param Category $category
     * @param Roll $roll
     * @return bool
     */
    public function isSupport(Category $category, Roll $roll)
    {
        return $category->isCategory(11);
    }
}