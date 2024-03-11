<?php

namespace App\Http\Controllers;

use App\Application\Student\StudentService;
use App\Application\Student\DataTransferObjects\StudentDTO;
use App\Http\Requests\CreateStudentRequest;
use Illuminate\Http\Request;
use App\Domain\Student\UseCases\FetchAllStudentsUseCase;
use App\Domain\Student\StudentRepositoryInterface;

class StudentController extends Controller
{
    private $fetchAllStudentsUseCase;
    private $studentService;

    public function __construct(FetchAllStudentsUseCase $fetchAllStudentsUseCase, StudentService $studentService)
    {
        $this->fetchAllStudentsUseCase = $fetchAllStudentsUseCase;
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->fetchAllStudentsUseCase->execute();
        return response()->json($students);
    }

    public function store(CreateStudentRequest $request)
    {
        $validatedData = $request->validated();
        $studentDTO = new StudentDTO($validatedData['username'], $validatedData['email']);

        $this->studentService->createStudent($studentDTO);

        return response()->json(['message' => 'Student created successfully']);
    }

    public function destroy($id)
    {
        $this->studentService->deleteStudent($id);
        return response()->json(['message' => 'Student deleted successfully']);
    }
}
