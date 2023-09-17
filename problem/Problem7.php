<?php

namespace problem;

use ProblemSolver\ProblemResult;

/**
 * @euloer_title 10001 st Prime
 * @euloer_url https://projecteuler.net/problem=7
 */
class Problem7 implements \ProblemSolver\Problem
{

    public function resolve($value): ProblemResult
    {
        $result = [2];
        for ($i = 1; $i < $value; $i++) {
            $result[] = $this->generatePrimeNumber($result[count($result) - 1]);
        }

        return new ProblemResult($result[count($result) - 1]);
    }

    function isPrime($value): bool
    {
        if ($value < 2) {
            return false;
        }

        for ($i = 2; pow($i, 2) <= $value; $i++) {
            if ($value % $i == 0) {
                return false;
            }
        }

        return true;
    }

    private function generatePrimeNumber(int $value): int
    {
        $next = $value + 1;
        while ($this->isPrime($next) === false) {
            $next++;
        }

        return $next;
    }
}