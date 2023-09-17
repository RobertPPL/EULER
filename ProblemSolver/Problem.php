<?php

namespace ProblemSolver;

interface Problem
{
    public function resolve($value): ProblemResult;
}