<?php

namespace problem;

use ProblemSolver\Problem;
use ProblemSolver\ProblemResult;

/**
 * @euloer_title Largest Palindrome Product
 * @euloer_url https://projecteuler.net/problem=4
 */

class Problem4 implements Problem
{
    public function resolve($value): ProblemResult
    {
        $digits = (int) $value;
        $result = null;
        $max_palindrome = 0;
        $min = pow(10, $digits - 1);
        $max = pow(10, $digits);

        for ($first_number = $min; $first_number < $max; $first_number++)
            for ($second_number = $min; $second_number < $max; $second_number++) {
                $number = $first_number * $second_number;

                if ($this->isPalindrome($number) && $max_palindrome < $number) {
                    $max_palindrome = $number;
                    $result = ["palindrome" => $number, "first_number" => $first_number, "second_number" => $second_number];
                }
            }

        return new ProblemResult($result);
    }

    private function isPalindrome($value): bool
    {
        $array = str_split((string)$value, 1);
        $array_half = count($array) / 2;

        if (is_int($array_half)) {
            $chunks = array_chunk($array, $array_half);
        } else {
            $chunks = [
                array_slice($array, 0, (int)$array_half),
                array_slice($array, round($array_half), count($array))
            ];
        }

        return $chunks[0] === array_reverse($chunks[1]);
    }
}