<?php

namespace problem;

use ProblemSolver\ProblemResult;

/**
 * @euloer_title Sum Square Difference
 * @euloer_url https://projecteuler.net/problem=6
 */
class Problem6 implements \ProblemSolver\Problem
{

    public function resolve($value): ProblemResult
    {
        $max = (int)$value;
        //https://pl.wikipedia.org/wiki/Szereg_1_%2B_2_%2B_3_%2B_4_%2B_%E2%80%A6
        $sum_of_squares = $max * ($max + 1) * (2 * $max + 1) / 6;
        //https://testbook.com/maths/sum-of-squares-of-first-n-natural-numbers
        $square_of_sums = pow($max * ($max + 1) / 2, 2);

        return new ProblemResult($square_of_sums - $sum_of_squares);
    }
}