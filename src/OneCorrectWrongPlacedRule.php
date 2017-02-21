<?php

namespace Katapoka\Katapoka;

/**
 * Check if one number is correct
 */
class OneCorrectWrongPlacedRule extends Rule
{
    public function matchConstraint($numbers)
    {
        $countFulfillRule = 0;
        foreach ($numbers as $position => $number) {
            if ($this->contains($number) && $this->wrongPlaced($position, $number)) {
                $countFulfillRule++;
            }
        }

        return $countFulfillRule === 1;
    }
}