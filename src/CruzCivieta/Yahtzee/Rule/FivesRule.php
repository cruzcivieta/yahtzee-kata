<?php


namespace CruzCivieta\Yahtzee\Rule;


use CruzCivieta\Yahtzee\Category;
use CruzCivieta\Yahtzee\Roll;

class FivesRule extends NumbersRule
{
    public function __construct()
    {
        parent::__construct(5);
    }

    /**
     * @param Category $category
     * @param Roll $roll
     * @return bool
     */
    public function isSupport(Category $category, Roll $roll)
    {
        return $category->isFive();
    }
}