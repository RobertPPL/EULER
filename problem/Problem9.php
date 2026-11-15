<?php

namespace problem;

use ProblemSolver\ProblemResult;

/**
 * @euloer_title Special Pythagorean Triplet
 * @euloer_url https://projecteuler.net/problem=9
 */
class Problem9 implements \ProblemSolver\Problem
{

    public function resolve($value): ProblemResult
    {
        for ($a = 1; $a < $value / 3; $a++) {
            for ($b = $a + 1; $b < $value / 2; $b++) {
                $c = $value - $a - $b;

                if ($a * $a + $b * $b === $c * $c) {
                    return new ProblemResult([
                        $a,
                        $b,
                        $c,
                    ]);
                }
            }
        }

        throw new \RuntimeException('No solution');
    }
}