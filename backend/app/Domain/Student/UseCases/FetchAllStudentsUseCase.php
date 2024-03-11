<?php

namespace App\Domain\Student\UseCases;

use App\Domain\Student\StudentRepositoryInterface;

class FetchAllStudentsUseCase
{
    private $repository; // Declare property separately

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository; // Assign value in constructor
    }

    public function execute(): iterable
    {
        return $this->repository->all();
    }
}
