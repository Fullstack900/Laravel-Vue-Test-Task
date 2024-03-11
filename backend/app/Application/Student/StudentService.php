<?php

namespace App\Application\Student;

use App\Application\Student\Actions\CreateStudentAction;
use App\Application\Student\Actions\DeleteStudentAction;
use App\Application\Student\DataTransferObjects\StudentDTO;
use App\Domain\Student\StudentRepositoryInterface;

class StudentService
{
    private CreateStudentAction $createStudentAction;
    private DeleteStudentAction $deleteStudentAction;

    public function __construct(CreateStudentAction $createStudentAction, DeleteStudentAction $deleteStudentAction)
    {
        $this->createStudentAction = $createStudentAction;
        $this->deleteStudentAction = $deleteStudentAction;
    }

    public function createStudent(StudentDTO $studentDTO): void
    {
        $this->createStudentAction->execute($studentDTO);
    }

    public function deleteStudent(int $studentId): void
    {
        $this->deleteStudentAction->execute($studentId);
    }
}