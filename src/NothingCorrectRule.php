<?php

namespace Katapoka\Katapoka;

class NothingCorrectRule extends Rule {
    /**
     * Check if the constraint match against the given number
     *
     * @param string[] $numbers
     *
     * @return mixed
     */
    public function matchConstraint($numbers) {
        $corrects = 0;
        foreach ($numbers as $position => $number) {
            if ($this->contains($number)) {
                $corrects++;
            }
        }

        return $corrects === 0;
    }
}