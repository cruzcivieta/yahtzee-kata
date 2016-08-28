<?php


namespace CruzCivieta\Yahtzee\Rule;


use CruzCivieta\Yahtzee\Category;
use CruzCivieta\Yahtzee\Roll;

interface ScoreRule
{
    /**
     * @param Roll $roll
     * @return integer
     */
    public function apply(Roll $roll);

    /**
     * @param Category $category
     * @param Roll $roll
     * @return bool
     */
    public function isSupport(Category $category, Roll $roll);
}