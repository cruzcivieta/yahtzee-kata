<?php


namespace CruzCivieta\Yahtzee;


class Roll
{

    private $roll;

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
        $reverseRoll = array_reverse($this->roll);
        $differentDices = array_unique($reverseRoll);

        if (count($differentDices) === 6) {
            return [];
        }

        return $this->findHighestPair($differentDices, $reverseRoll);
    }

    /**
     * @param $differentDices
     * @param $reverseRoll
     * @return array
     */
    private function findHighestPair($differentDices, $reverseRoll)
    {
        foreach ($differentDices as $dice) {
            $equalsDices = $this->findEqualsDicesBy($reverseRoll, $dice);

            if (count($equalsDices) === 2) {
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

    public function retrieveHighestThreeOfaKind()
    {
        $reverseRoll = array_reverse($this->roll);
        $differentDices = array_unique($reverseRoll);

        if (count($differentDices) === 6) {
            return [];
        }

        return $this->findHighestThreeOfaKind($differentDices, $reverseRoll);
    }

    private function findHighestThreeOfaKind($differentDices, $reverseRoll)
    {
        foreach ($differentDices as $dice) {
            $equalsDices = $this->findEqualsDicesBy($reverseRoll, $dice);

            if (count($equalsDices) === 3) {
                return $equalsDices;
            }
        }

        return [];
    }
}