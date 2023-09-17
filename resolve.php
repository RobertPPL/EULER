<?php

spl_autoload_register(function ($class) {
    require_once '.\\' . $class . '.php';
});
/*
//https://projecteuler.net/problem=1
measure(\problem\Problem1::class, 10, 23);
measure(\problem\Problem1::class, 100, 2318);

//https://projecteuler.net/problem=2
measure(\problem\Problem2::class, 10, 10);
measure(\problem\Problem2::class, 4_000_000, 4613732);
//
//https://projecteuler.net/problem=3
measure(\problem\Problem3::class, 13195, [5, 7, 13, 29]);
measure(\problem\Problem3::class, 600851475143, [71, 839, 1471, 6857]);

//https://projecteuler.net/problem=4
measure(problem\Problem4::class, 2, ["palindrome" => 9009, "first_number" => 91, "second_number" => 99]);
measure(problem\Problem4::class, 3, ["palindrome" => 906609, "first_number" => 913, "second_number" => 993]);

//https://projecteuler.net/problem=5
measure(problem\Problem5::class, 10, 2520);
measure(problem\Problem5::class, 20, 232792560);

//https://projecteuler.net/problem=6
measure(problem\Problem6::class, 10, 2640);
measure(problem\Problem6::class, 100, 25164150);
*/
//https://projecteuler.net/problem=7
measure(problem\Problem7::class, 6, 13);
measure(problem\Problem7::class, 10001, 104743);

//https://projecteuler.net/problem=8
measure(problem\Problem8::class, 4, ["sum" => 5832, "array" => [9, 9, 8, 9]]);
measure(problem\Problem8::class, 13, ["sum" => 5377010688, "array" => [3, 6, 9, 7, 8, 1, 7, 9, 7, 7, 8, 4, 6]]);

//https://projecteuler.net/problem=9
measure(problem\Problem9::class, 25, [3,4,5,25]);
measure(problem\Problem9::class, 1000, [3,4,5,1000]);

function measure(string $problem, $params, $expected)
{
    $start_time = microtime(true);
    $class = new $problem;
    $result = $class->resolve($params);
    $end_time = microtime(true);
    $time = ($end_time - $start_time);

    echo print_raport($problem, $result, $expected, $time);
}

function print_raport($problem, $result, $expected, $time)
{
    return sprintf("STATE: %s\tTEST:%s\tTIME:%ss\tRESULT: %s\r\n",
        ($result->compare($expected) ? "\033[32mTRUE\033[0m" : "\033[31mFALSE\033[0m"),
        $problem,
        number_format($time, 5),
        json_encode($result->getResult())
    );
}