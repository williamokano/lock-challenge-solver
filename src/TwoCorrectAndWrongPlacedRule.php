<?php

namespace Katapoka\Katapoka;

/**
 * Check if there's two correct numbers but wrong placed
 */
class TwoCorrectAndWrongPlacedRule extends Rule
{
    public function matchConstraint($numbers)
    {
        $countCorrectAndWrongPlaced = 0;
        foreach ($numbers as $position => $number) {
            if ($this->contains($number) && $this->wrongPlaced($position, $number)) {
                $countCorrectAndWrongPlaced++;
            }
        }

        return $countCorrectAndWrongPlaced === 2;
    }
}