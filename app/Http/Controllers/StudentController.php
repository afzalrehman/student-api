<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Get all students
    public function index() {
        return Student::all();
    }

    // Get single student
    public function show($id) {
        return Student::findOrFail($id);
    }

    // Create new student
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'student_class' => 'required|string',
            'father_name' => 'required|string',
        ]);

        $student = Student::create($validated);
        return response()->json($student, 201);
    }

    // Update student
    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'student_class' => 'required|string',
            'father_name' => 'required|string',
        ]);

        $student->update($validated);
        return response()->json($student);
    }

    // Delete student
    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted']);
    }
}
