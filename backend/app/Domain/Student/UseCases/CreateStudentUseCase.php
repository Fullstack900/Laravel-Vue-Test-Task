<?php

namespace App\Domain\Student\UseCases;

use App\Domain\Student\StudentRepositoryInterface;
use App\Application\Student\DataTransferObjects\StudentDTO;
use App\Domain\Student\Student;

class CreateStudentUseCase
{
    private StudentRepositoryInterface $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(StudentDTO $data): Student
    {
        return $this->repository->create([
            'username' => $data->username,
            'email' => $data->email,
        ]);
    }
}