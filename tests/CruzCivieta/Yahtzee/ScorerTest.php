<?php

namespace CruzCivieta\Yahtzee;

class ScorerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function given_valid_roll_for_category_then_sum_all_dices_in_other_case_zero($category, $dices, $expected)
    {
        $scorer = new Scorer();
        $roll = new Roll($dices);

        $score = $scorer->score($roll, $category);

        static::assertSame($expected, $score);
    }

    public function dataProvider()
    {
        return [
            [Category::random(), [], 0],
            [Category::chance(), [1, 1, 2, 5, 6], 15],
            [Category::yahtzee(), [3, 2, 1, 4, 5, 6], 50],
            [Category::yahtzee(), [2, 2, 3, 4, 5, 6], 0],
            [Category::one(), [1, 1, 6, 6, 5], 2],
            [Category::one(), [2, 3, 5, 5, 6], 0],
            [Category::two(), [2, 2, 6, 6, 5], 4],
            [Category::two(), [1, 1, 6, 6, 5], 0],
            [Category::three(), [3, 3, 6, 6, 5], 6],
            [Category::three(), [1, 1, 6, 6, 5], 0],
            [Category::four(), [4, 4, 6, 6, 5], 8],
            [Category::four(), [1, 1, 6, 6, 5], 0],
            [Category::five(), [5, 5, 6, 6, 5], 15],
            [Category::five(), [1, 1, 6, 6, 3], 0],
            [Category::six(), [5, 5, 6, 6, 5], 12],
            [Category::six(), [1, 1, 4, 4, 3], 0],
            [Category::pairs(), [1, 1, 2, 4, 3], 2],
            [Category::pairs(), [1, 1, 4, 4, 3], 8],
            [Category::pairs(), [1, 2, 3, 4, 5, 6], 0],
            [Category::threeOfaKind(), [2, 2, 2, 4, 5, 6], 6],
            [Category::threeOfaKind(), [2, 2, 2, 3, 3, 3], 9],
            [Category::threeOfaKind(), [2, 2, 3, 4, 5, 6], 0],
            [Category::fourOfaKind(), [2, 2, 2, 2, 5, 6], 8],
            [Category::fourOfaKind(), [4, 4, 4, 4, 5, 6], 16],
            [Category::fourOfaKind(), [2, 2, 2, 4, 5, 6], 0],
            [Category::smallStraight(), [1, 2, 3, 4, 5, 6], 15],
            [Category::smallStraight(), [1, 2, 3, 4, 3, 5], 15],
            [Category::smallStraight(), [1, 2, 3, 5, 5, 5], 0],
            [Category::largeStraight(), [2, 3, 4, 5, 6, 6], 20],
            [Category::largeStraight(), [2, 2, 4, 5, 3, 6], 20],
            [Category::largeStraight(), [6, 6, 3, 4, 5, 6], 0],
            [Category::fullHouse(), [1, 1, 2, 2, 2, 5], 8],
            [Category::fullHouse(), [1, 1, 1, 5, 5, 4], 13],
            [Category::fullHouse(), [1, 1, 1, 1, 5, 5], 0],
        ];
    }
}