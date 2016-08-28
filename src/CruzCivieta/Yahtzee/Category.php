<?php


namespace CruzCivieta\Yahtzee;


class Category
{
    const ONE = 1;
    const CHANCE = 19;
    const YAHTZEE = 20;
    const TWO = 2;
    const THREE = 3;

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
        return new static(static::ONE);
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
        return new static(4);
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

    public function isYahtzee()
    {
        return $this->isCategory(static::YAHTZEE);
    }

    public function isChance()
    {
        return $this->isCategory(static::CHANCE);
    }

}