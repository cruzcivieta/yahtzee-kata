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
        $pair = $roll->retrieveHighestPair();
        $three = $roll->retrieveHighestThreeOfaKind();
        $fullHouse = array_merge([], $pair, $three);

        return count($fullHouse) === 5 ? array_sum($fullHouse) : 0;
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