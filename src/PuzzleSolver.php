<?php
namespace Katapoka\Katapoka;

class PuzzleSolver {
    /** @var Rule[] */
    private $rules = [];
    public function addRule(Rule $rule)
    {
        $this->rules[] = $rule;

        return $this;
    }

    private function range($min, $max)
    {
        for ($i = $min; $i <= $max; $i++) {
            yield $i;
        }
    }

    public function getSolutions()
    {
        $validNumbers = [];
        foreach ($this->range(1, 999) as $number) {
            $number = str_pad($number, 3, '0', STR_PAD_LEFT);
            if ($this->matchAll($number)) {
                $validNumbers[] = $number;
            }
        }

        return $validNumbers;
    }

    public function matchAll($number)
    {
        foreach ($this->rules as $rule) {
            if (!$rule->check($number)) {
                return false;
            }
        }

        return true;
    }
}