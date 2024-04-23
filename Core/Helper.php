<?php

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