<?php
require_once './vendor/autoload.php';

$solver = new \Katapoka\Katapoka\PuzzleSolver();
$solver
    ->addRule(new \Katapoka\Katapoka\OneCorrectAndWellPlacedRule("682"))
    ->addRule(new \Katapoka\Katapoka\OneCorrectWrongPlacedRule("614"))
    ->addRule(new \Katapoka\Katapoka\TwoCorrectAndWrongPlacedRule("206"))
    ->addRule(new \Katapoka\Katapoka\NothingCorrectRule("738"))
    ->addRule(new \Katapoka\Katapoka\OneCorrectWrongPlacedRule("780"))
;

print_r($solver->getSolutions());