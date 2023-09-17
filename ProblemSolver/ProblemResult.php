<?php

namespace ProblemSolver;

class ProblemResult
{
    private $value;
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function compare($expected): bool
    {
        return $this->value === $expected;
    }

    public function getResult()
    {
        return $this->value;
    }
}