<?php

namespace problem;

use ProblemSolver\Problem;
use ProblemSolver\ProblemResult;

/**
 * @euloer_title Problem 1: Multiples of 3 or 5
 * @euloer_url https://projecteuler.net/problem=1
 */
class Problem1 implements Problem
{
    public function resolve($value): ProblemResult
    {
        $value = (int) $value;
        $result = 0;
        for ($i = 0; $i < $value; $i++) {
            if ($this->isDivisibleBy3($i)) {
                $result += $i;
                continue;
            }

            if ($this->isDivisibleBy5($i)) {
                $result += $i;
            }
        }

        return new ProblemResult($result);
    }

    private function isDivisibleBy3(int $value): bool
    {
        if ($value < 10) {
            return $value % 3 === 0;
        }

        $val = (string)$value;
        $elements = str_split($val, 1);
        $result = 0;
        foreach ($elements as $element) {
            $result += (int)$element;
        }

        return $result % 3 === 0;
    }

    private function isDivisibleBy5(int $value): bool
    {
        $val = (string)$value;
        $elements = str_split($val, 1);
        $last_element = $elements[count($elements) - 1];

        return $last_element % 5 === 0;
    }
}