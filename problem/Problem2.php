<?php

namespace problem;

use ProblemSolver\Problem;
use ProblemSolver\ProblemResult;

/**
 * @euloer_title Even Fibonacci Numbers
 * @euloer_url https://projecteuler.net/problem=2
 */
class Problem2 implements Problem
{
    public function resolve($value): ProblemResult
    {
        $max = (int) $value;
        $sum = 0;
        foreach ($this->fibonacci() as $fib) {
            if ($fib % 2 === 0) {
                $sum += $fib;
            }

            if ($fib > $max) {
                break;
            }
        }

        return new ProblemResult($sum);
    }

    private function fibonacci(): \Iterator
    {
        $memory = [0, 1];
        while (true) {
            $result = $memory[0] + $memory[1];
            $memory[0] = $memory[1];
            $memory[1] = $result;

            yield $result;
        }
    }
}