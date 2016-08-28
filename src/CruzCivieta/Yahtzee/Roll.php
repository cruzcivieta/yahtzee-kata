<?php


namespace CruzCivieta\Yahtzee;


class Roll
{

    private $roll;
    const PAIR = 2;
    const THREE_OF_A_KIND = 3;
    const FOUR_OF_A_KIND = 4;

    /**
     * Roll constructor.
     * @param array $roll
     */
    public function __construct($roll = [])
    {
        sort($roll);
        $this->roll = $roll;
    }

    public function retrieveRoll()
    {
        return $this->roll;
    }

    public function isEmpty()
    {
        return empty($this->roll);
    }

    public function retrieveHighestPair()
    {
        return $this->findHighestRepeatedNumber(static::PAIR);
    }

    public function retrieveHighestThreeOfaKind()
    {
        return $this->findHighestRepeatedNumber(static::THREE_OF_A_KIND);
    }

    public function retrieveFourOfaKind()
    {
        return $this->findHighestRepeatedNumber(static::FOUR_OF_A_KIND);
    }

    private function findHighestRepeatedNumber($number)
    {
        $reverseRoll = array_reverse($this->roll);
        $differentDices = array_unique($reverseRoll);

        if (count($differentDices) === 6) {
            return [];
        }

        foreach ($differentDices as $dice) {
            $equalsDices = $this->findEqualsDicesBy($reverseRoll, $dice);

            if (count($equalsDices) === $number) {
                return $equalsDices;
            }
        }

        return [];
    }

    /**
     * @param $reverseRoll
     * @param $dice
     * @return array
     */
    private function findEqualsDicesBy($reverseRoll, $dice)
    {
        return array_filter($reverseRoll, function ($element) use ($dice) {
            return $element === $dice;
        });
    }

    public function retrieveDiceOfNumber($number)
    {
        return array_filter($this->roll, function ($dice) use ($number) {
            return $dice === $number;
        });
    }
}