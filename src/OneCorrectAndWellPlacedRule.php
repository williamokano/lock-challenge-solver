<?php

namespace Katapoka\Katapoka;

/**
 * One number is correct and wellplaced
 */
class OneCorrectAndWellPlacedRule extends Rule {
    /**
     * Handle the restriction rule.
     *
     * @param $numbers
     *
     * @return mixed
     */
    public function matchConstraint($numbers) {
        $countCorrectsAndWellPlaced = 0;
        foreach ($numbers as $position => $number) {
            if ($this->contains($number) && $this->wellPlaced($position, $number)) {
                $countCorrectsAndWellPlaced++;
            }
        }

        return $countCorrectsAndWellPlaced === 1;
    }
}