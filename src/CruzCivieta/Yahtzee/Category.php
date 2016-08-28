<?php


namespace CruzCivieta\Yahtzee;


class Category
{
    const ONE = 1;
    const CHANCE = 19;
    const YAHTZEE = 20;
    const TWO = 2;
    const THREE = 3;
    const FOUR = 4;
    const FIVE = 5;
    const SIX = 6;
    const PAIRS = 7;

    private $category;

    /**
     * Category constructor.
     * @param $category
     */
    public function __construct($category)
    {
        $this->category = $category;
    }

    public static function random()
    {
        $constants = get_defined_constants();

        return new static($constants[array_rand($constants)]);
    }

    public static function chance()
    {
        return new static(static::CHANCE);
    }

    public static function yahtzee()
    {
        return new static(static::YAHTZEE);
    }

    public static function one()
    {
        return new static(static::ONE);
    }

    public static function two()
    {
        return new static(static::TWO);
    }

    public static function three()
    {
        return new static(static::THREE);
    }

    public static function four()
    {
        return new static(static::FOUR);
    }

    public static function five()
    {
        return new static(static::FIVE);
    }

    public static function six()
    {
        return new static(static::SIX);
    }

    public static function pairs()
    {
        return new static(static::PAIRS);
    }

    public static function threeOfaKind()
    {
        return new static(8);
    }

    public static function fourOfaKind()
    {
        return new static(9);
    }

    public static function smallStraight()
    {
        return new static(10);
    }

    public function isCategory($category)
    {
        return $this->category == $category;
    }

    public function isOne()
    {
        return $this->isCategory(static::ONE);
    }

    public function isTwo()
    {
        return $this->isCategory(static::TWO);
    }

    public function isThree()
    {
        return $this->isCategory(static::THREE);
    }

    public function isFour()
    {
        return $this->isCategory(static::FOUR);
    }

    public function isFive()
    {
        return $this->isCategory(static::FIVE);
    }

    public function isSix()
    {
        return $this->isCategory(static::SIX);
    }

    public function isYahtzee()
    {
        return $this->isCategory(static::YAHTZEE);
    }

    public function isChance()
    {
        return $this->isCategory(static::CHANCE);
    }

    public function isPairCategory()
    {
        return $this->isCategory(static::PAIRS);
    }

    public function isThreeOfaKind()
    {
        return $this->isCategory(8);
    }

    public function isFourOfaKind()
    {
        return $this->isCategory(9);
    }
}