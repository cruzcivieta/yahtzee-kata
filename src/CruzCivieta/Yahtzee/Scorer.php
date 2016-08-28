<?php

namespace CruzCivieta\Yahtzee;

use CruzCivieta\Yahtzee\Rule;

class Scorer
{
    /**
     * @var Rule\ScoreRule[]
     */
    private $rules;

    /**
     * Scorer constructor.
     */
    public function __construct()
    {
        $this->rules = [
            new Rule\OnesRule(),
            new Rule\TwosRule(),
            new Rule\ThreesRule(),
            new Rule\FoursRule(),
            new Rule\FivesRule(),
            new Rule\SixesRule(),
            new Rule\YahtzeeRule(),
            new Rule\ChanceRule(),
            new Rule\PairRule(),
            new Rule\ThreeEqualsRule(),
            new Rule\FourEqualsRule(),
            new Rule\SmallStraightRule(),
            new Rule\LargeStraightRule(),
            new Rule\FullHouseRule(),
        ];
    }


    /**
     * @param $roll Roll
     * @param $category Category
     * @return int
     */
    public function score(Roll $roll, Category $category)
    {
        if ($roll->isEmpty()) {
            return 0;
        }

        foreach ($this->rules as $rule) {
            if ($rule->isSupport($category, $roll)) {
                return $rule->apply($roll);
            }
        }

        return 0;
    }
}