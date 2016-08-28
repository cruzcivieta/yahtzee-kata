<?php

namespace CruzCivieta\Yahtzee;

class ScorerTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @test
    */
    public function given_a_empty_roll_then_scores_zero_points()
    {
        $scorer = new Scorer();
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
        $scorer = new Scorer();
        $roll = new Roll([1,1,2,5,6]);
        $category = Category::chance();

        $score = $scorer->score($roll, $category);

        static::assertEquals(15, $score);
    }

    /**
    * @test
    */
    public function given_a_valid_yahtzee_roll_then_return_fifty_score()
    {
        $scorer = new Scorer();
        $roll = new Roll([3,2,1,4,5,6]);
        $category = Category::yahtzee();

        $scorer = $scorer->score($roll, $category);

        static::assertEquals(50, $scorer);
    }

    /**
    * @test
    */
    public function given_a_not_valid_yahtzee_roll_then_return_zero_score()
    {
        $scorer = new Scorer();
        $roll = new Roll([2,2,3,4,5,6]);
        $category = Category::yahtzee();

        $scorer = $scorer->score($roll, $category);

        static::assertEquals(0, $scorer);
    }
    
    /**
    * @test
    */
    public function give_a_valid_one_category_roll_then_return_sum_of_one_numbers()
    {
        $scorer = new Scorer();
        $roll = new Roll([1,1,6,6,5]);
        $category = Category::one();

        $score = $scorer->score($roll, $category);

        static::assertEquals(2, $score);
    }

    /**
     * @test
     */
    public function given_a_not_valid_one_category_roll_then_return_zero()
    {
        $scorer = new Scorer();
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
        $scorer = new Scorer();
        $roll = new Roll([2,2,6,6,5]);
        $category = Category::two();

        $score = $scorer->score($roll, $category);

        static::assertEquals(4, $score);
    }

    /**
     * @test
     */
    public function give_a_not_valid_two_category_roll_then_return_zero()
    {
        $scorer = new Scorer();
        $roll = new Roll([1,1,6,6,5]);
        $category = Category::two();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }


    /**
     * @test
     */
    public function give_a_valid_three_category_roll_then_return_sum_of_two_numbers()
    {
        $scorer = new Scorer();
        $roll = new Roll([3,3,6,6,5]);
        $category = Category::three();

        $score = $scorer->score($roll, $category);

        static::assertEquals(6, $score);
    }

    /**
     * @test
     */
    public function give_a_not_valid_three_category_roll_then_return_zero()
    {
        $scorer = new Scorer();
        $roll = new Roll([1,1,6,6,5]);
        $category = Category::three();

        $score = $scorer->score($roll, $category);

        static::assertSame(0, $score);
    }



}