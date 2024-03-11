<?php


namespace App\Infrastructure\Student;

use App\Domain\Student\Student;
use App\Domain\Student\StudentRepositoryInterface;

class EloquentStudentRepository implements StudentRepositoryInterface
{
    public function create(array $data): Student
    {
        return Student::create($data);
    }

    public function delete(int $id): void
    {
        Student::findOrFail($id)->delete();
    }

    public function all(): iterable
    {
        return Student::all();
    }
}
