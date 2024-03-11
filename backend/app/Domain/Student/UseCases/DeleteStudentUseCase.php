<?php

namespace App\Domain\Student\UseCases;

use App\Domain\Student\StudentRepositoryInterface;

class DeleteStudentUseCase
{
    private StudentRepositoryInterface $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): void
    {
        $this->repository->delete($id);
    }
}