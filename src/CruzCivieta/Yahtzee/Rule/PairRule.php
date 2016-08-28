<?php


namespace CruzCivieta\Yahtzee\Rule;


use CruzCivieta\Yahtzee\Category;
use CruzCivieta\Yahtzee\Roll;

class PairRule implements ScoreRule
{

    /**
     * @param Roll $roll
     * @return integer
     */
    public function apply(Roll $roll)
    {
        $roll = $roll->retrieveRoll();

        $reverseRoll = array_reverse($roll);
        $differentDices = array_unique($reverseRoll);

        if (count($differentDices) === 6) {
            return 0;
        }

        foreach ($differentDices as $dice) {
            $equalsDices = array_filter($reverseRoll, function($element) use ($dice) {
                return $element === $dice;
            });

            if  (count($equalsDices) === 2) {
                return array_sum($equalsDices);
            }
        }

        return 0;
    }

    /**
     * @param Category $category
     * @param Roll $roll
     * @return bool
     */
    public function isSupport(Category $category, Roll $roll)
    {
        return $category->isPairCategory();
    }
}