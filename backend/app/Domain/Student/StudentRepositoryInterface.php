<?php


namespace App\Domain\Student;

interface StudentRepositoryInterface
{
    public function all(): iterable;
    public function create(array $data): Student;
    public function delete(int $id): void;
}
