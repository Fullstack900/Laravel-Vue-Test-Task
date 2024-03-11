<?php

namespace App\Application\Student\Actions;

use App\Domain\Student\UseCases\DeleteStudentUseCase;

class DeleteStudentAction
{
    private DeleteStudentUseCase $deleteStudentUseCase;

    public function __construct(DeleteStudentUseCase $deleteStudentUseCase)
    {
        $this->deleteStudentUseCase = $deleteStudentUseCase;
    }

    public function execute(int $studentId): void
    {
        $this->deleteStudentUseCase->execute($studentId);
    }
}
