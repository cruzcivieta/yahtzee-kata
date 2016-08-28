<?php

namespace CruzCivieta\Yahtzee;

class ScorerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function given_a_empty_roll_then_scores_zero_points()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([]);
        $category = Category::random();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_with_chance_category_then_return_the_sum_of_them()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 2, 5, 6]);
        $category = Category::chance();

        $score = $scorer->score($roll, $category);

        static::assertEquals(15, $score);
    }

    /**
     * @test
     */
    public function given_a_valid_yahtzee_roll_then_return_fifty_score()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([3, 2, 1, 4, 5, 6]);
        $category = Category::yahtzee();

        $scorer = $scorer->score($roll, $category);

        static::assertEquals(50, $scorer);
    }

    /**
     * @test
     */
    public function given_a_not_valid_yahtzee_roll_then_return_zero_score()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 2, 3, 4, 5, 6]);
        $category = Category::yahtzee();

        $scorer = $scorer->score($roll, $category);

        static::assertEquals(0, $scorer);
    }

    /**
     * @test
     */
    public function give_a_valid_one_category_roll_then_return_sum_of_one_numbers()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 6, 6, 5]);
        $category = Category::one();

        $score = $scorer->score($roll, $category);

        static::assertEquals(2, $score);
    }

    /**
     * @test
     */
    public function given_a_not_valid_one_category_roll_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 3, 5, 5, 6]);
        $category = Category::one();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     */
    public function give_a_valid_two_category_roll_then_return_sum_of_two_numbers()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 2, 6, 6, 5]);
        $category = Category::two();

        $score = $scorer->score($roll, $category);

        static::assertEquals(4, $score);
    }

    /**
     * @test
     */
    public function give_a_not_valid_two_category_roll_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 6, 6, 5]);
        $category = Category::two();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }


    /**
     * @test
     */
    public function give_a_valid_three_category_roll_then_return_sum_of_two_numbers()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([3, 3, 6, 6, 5]);
        $category = Category::three();

        $score = $scorer->score($roll, $category);

        static::assertEquals(6, $score);
    }

    /**
     * @test
     */
    public function give_a_not_valid_three_category_roll_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 6, 6, 5]);
        $category = Category::three();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }


    /**
     * @test
     */
    public function give_a_not_valid_four_category_roll_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 6, 6, 5]);
        $category = Category::four();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     */
    public function give_a_valid_four_category_roll_then_return_sum_of_two_numbers()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([4, 4, 6, 6, 5]);
        $category = Category::four();

        $score = $scorer->score($roll, $category);

        static::assertEquals(8, $score);
    }

    /**
     * @test
     */
    public function give_a_not_valid_five_category_roll_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 6, 6, 3]);
        $category = Category::five();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     */
    public function give_a_valid_five_category_roll_then_return_sum_of_two_numbers()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([5, 5, 6, 6, 5]);
        $category = Category::five();

        $score = $scorer->score($roll, $category);

        static::assertEquals(15, $score);
    }

    /**
     * @test
     */
    public function give_a_valid_six_category_roll_then_return_sum_of_two_numbers()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([5, 5, 6, 6, 5]);
        $category = Category::six();

        $score = $scorer->score($roll, $category);

        static::assertEquals(12, $score);
    }

    /**
     * @test
     */
    public function give_a_not_valid_six_category_roll_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 4, 4, 3]);
        $category = Category::six();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_with_pairs_then_return_sum_of_total_pairs()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 2, 4, 3]);
        $category = Category::pairs();

        $score = $scorer->score($roll, $category);

        static::assertEquals(2, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_with_two_different_pairs_then_return_sum_of_highest_pairs()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 1, 4, 4, 3]);
        $category = Category::pairs();

        $score = $scorer->score($roll, $category);

        static::assertEquals(8, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_without_pairs_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 2, 3, 4, 5, 6]);
        $category = Category::pairs();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_with_three_equals_dices_then_return_sum_of_them()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 2, 2, 4, 5, 6]);
        $category = Category::threeOfaKind();

        $score = $scorer->score($roll, $category);

        static::assertEquals(6, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_with_two_three_equals_dices_then_return_the_sum_of_highest_dices()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 2, 2, 3, 3, 3]);
        $category = Category::threeOfaKind();

        $score = $scorer->score($roll, $category);

        static::assertEquals(9, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_without_three_of_a_kind_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 2, 3, 4, 5, 6]);
        $category = Category::threeOfaKind();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_with_four_equals_dices_then_return_sum_of_them()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 2, 2, 2, 5, 6]);
        $category = Category::fourOfaKind();

        $score = $scorer->score($roll, $category);

        static::assertEquals(8, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_with_four_different_equals_dices_then_return_sum_of_them()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([4, 4, 4, 4, 5, 6]);
        $category = Category::fourOfaKind();

        $score = $scorer->score($roll, $category);

        static::assertEquals(16, $score);
    }

    /**
     * @test
     */
    public function given_a_roll_without_four_of_a_kind_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 2, 2, 4, 5, 6]);
        $category = Category::fourOfaKind();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     */
    public function given_a_valid_small_straight_roll_then_return_fifteen()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 2, 3, 4, 5, 6]);
        $category = Category::smallStraight();

        $score = $scorer->score($roll, $category);

        static::assertEquals(15, $score);
    }

    /**
     * @test
     */
    public function given_another_valid_small_straight_roll_then_return_fifteen()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 2, 3, 4, 3, 5]);
        $category = Category::smallStraight();

        $score = $scorer->score($roll, $category);

        static::assertEquals(15, $score);
    }

    /**
     * @test
     */
    public function given_a_not_valid_small_Straight_roll_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([1, 2, 3, 5, 5, 5]);
        $category = Category::smallStraight();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }


    /**
     * @test
     */
    public function given_a_valid_large_straight_roll_then_return_twenty()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 2, 4, 5, 3, 6]);
        $category = Category::largeStraight();

        $score = $scorer->score($roll, $category);

        static::assertEquals(20, $score);
    }

    /**
     * @test
     */
    public function given_another_valid_large_straight_roll_then_return_twenty()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([2, 3, 4, 5, 6, 6]);
        $category = Category::largeStraight();

        $score = $scorer->score($roll, $category);

        static::assertEquals(20, $score);
    }

    /**
     * @test
     */
    public function given_a_not_valid_large_Straight_roll_then_return_zero()
    {
        $scorer = $this->createScorer();
        $roll = new Roll([6, 6, 3, 4, 5, 6]);
        $category = Category::largeStraight();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }

    /**
     * @test
     * @dataProvider fullHouseDataProvider
     */
    public function given_a_valid_data_provider_full_house_roll_then_return_sum_of_all_dices($dices, $expected)
    {
        $scorer = $this->createScorer();
        $roll = new Roll($dices);
        $category = Category::fullHouse();

        $score = $scorer->score($roll, $category);

        static::assertEquals($expected, $score);
    }

    /**
     * @return Scorer
     */
    private function createScorer()
    {
        return new Scorer();
    }


    public function fullHouseDataProvider() {
        return [
            [[1, 1, 2, 2, 2, 5], 8],
            [[1, 1, 1, 5, 5, 4], 13],
            [[1, 1, 1, 1, 5, 5], 0],
        ];
    }
}