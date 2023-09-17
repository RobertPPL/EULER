<?php

namespace problem;

use ProblemSolver\Problem;
use ProblemSolver\ProblemResult;

/**
 * @euloer_title Largest Prime Factor
 * @euloer_url https://projecteuler.net/problem=3
 */

class Problem3 implements Problem
{
    private array $prime_factors  = [2];

    function resolve($value): ProblemResult
    {
        $value = (int) $value;
        $result = [];
        while (true) {
            $v = $this->div($value);
            $result[] = $v->factor;
            $value = $v->value;

            if ($value === 1) {
                break;
            }
        }

        return new ProblemResult($result);
    }

    private function div(int $value)
    {
        $prime_index = 0;
        while (true) {
            $result = $value % $this->prime_factors[$prime_index];
            if ($result === 0) {
                $object = new \stdClass();
                $object->factor = $this->prime_factors[$prime_index];
                $object->value = $value / $this->prime_factors[$prime_index];
                return $object;
            }

            if (++$prime_index >= count($this->prime_factors) - 1) {
                $prime_last = count($this->prime_factors) - 1;
                $this->prime_factors[] = $this->generatePrimeNumber($this->prime_factors[$prime_last]);
            }
        }
    }

    private function generatePrimeNumber(int $value): int
    {
        $next = $value + 1;
        while ($this->isPrime($next) === false) {
            $next++;
        }

        return $next;
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
}