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
}