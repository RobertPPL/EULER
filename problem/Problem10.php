<?php

namespace problem;

use ProblemSolver\ProblemResult;

/**
 * @euloer_title Summation of Primes
 * @euloer_url https://projecteuler.net/problem=10
 */
class Problem10 implements \ProblemSolver\Problem
{
    public function resolve($value): ProblemResult
    {
        // https://pl.wikipedia.org/wiki/Sito_Eratostenesa
        $sieve = array_fill(0, $value, true);

        $sieve[0] = false;
        $sieve[1] = false;

        $maxNumber = sqrt($value);

        for ($i = 2; $i <= $maxNumber; $i++) {
            if ($sieve[$i]) {

                for ($j = $i * $i; $j < $value; $j += $i) {
                    $sieve[$j] = false;
                }

            }
        }

        $sum = 0;

        for ($i = 2; $i < $value; $i++) {

            if ($sieve[$i]) {
                $sum += $i;
            }

        }

        return new ProblemResult($sum);
    }
}