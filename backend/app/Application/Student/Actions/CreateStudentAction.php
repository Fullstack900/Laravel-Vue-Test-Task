<?php

namespace App\Application\Student\Actions;

use App\Application\Student\DataTransferObjects\StudentDTO;
use App\Domain\Student\UseCases\CreateStudentUseCase;

class CreateStudentAction
{
    private CreateStudentUseCase $createStudentUseCase;

    public function __construct(CreateStudentUseCase $createStudentUseCase)
    {
        $this->createStudentUseCase = $createStudentUseCase;
    }


    public function execute(StudentDTO $studentDTO): void
    {
        $this->createStudentUseCase->execute($studentDTO);
    }
}