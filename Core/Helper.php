<?php

function measure(string $problem, $params, $expected): void
{
    $start_time = microtime(true);
    $class = new $problem;
    try {
        $result = $class->resolve($params);
    }
    catch(Exception $exception) {
        $result = new \ProblemSolver\ProblemResult($exception->getMessage());
    }
    $end_time = microtime(true);
    $time = ($end_time - $start_time);

    echo print_raport($problem, $result, $expected, $time);
}

function print_raport($problem, $result, $expected, $time): string
{
    return sprintf("STATE: %s\tTEST:%s\tTIME:%ss\tRESULT: %s\r\n",
        ($result->compare($expected) ? "\033[32mTRUE\033[0m" : "\033[31mFALSE\033[0m"),
        $problem,
        number_format($time, 2),
        json_encode($result->getResult())
    );
}