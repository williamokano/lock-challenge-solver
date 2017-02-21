<?php

namespace Katapoka\Katapoka;

/**
 * Class to represent one rule.
 */
abstract class Rule
{
    /** int[] $numbers */
    protected $numbers = [];

    /**
     * Rule constructor.
     * Set the rule numbers constraint.
     *
     * @param $number
     */
    public function __construct($number)
    {
        $this->numbers = $this->getTokens($number);
    }

    /**
     * Pad the numbers with zeros, length 3.
     * @param $number
     *
     * @return string
     */
    protected function padNumber($number)
    {
        return str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    /**
     * Return the tokens of any given string.
     *
     * @param $number
     *
     * @return array
     */
    private function getTokens($number)
    {
        return str_split($this->padNumber($number));
    }

    /**
     * Check if some given number match the constraint
     * @param $number
     *
     * @return mixed
     */
    public function check($number)
    {
        return $this->matchConstraint($this->getTokens($number));
    }

    /**
     * Check if the given numbers exists on the rule constraints list.
     *
     * @param $number
     *
     * @return bool
     */
    protected function contains($number)
    {
        return in_array($number, $this->numbers, false);
    }

    /**
     * Retrieve the number at the given position.
     *
     * @param $position
     *
     * @return mixed
     */
    protected function getAt($position)
    {
        return $this->numbers[$position];
    }

    /**
     * Check if some given number is wrong placed at the given position.
     *
     * @param $position
     * @param $number
     *
     * @return bool
     */
    protected function wrongPlaced($position, $number)
    {
        return $this->getAt($position) !== $number;
    }

    /**
     * Check if some given number is well placed at the given position.
     *
     * @param $position
     * @param $number
     *
     * @return bool
     */
    protected function wellPlaced($position, $number)
    {
        return !$this->wrongPlaced($position, $number);
    }

    /**
     * Check if the constraint match against the given number
     *
     * @param string[] $numbers
     *
     * @return mixed
     */
    abstract public function matchConstraint($numbers);
}