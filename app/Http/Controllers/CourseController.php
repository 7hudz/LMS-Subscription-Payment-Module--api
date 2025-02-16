<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // List all courses
    public function index()
    {
        return response()->json(Course::all());
    }

    // Show a single course
    public function show(Course $course)
    {
        return response()->json($course);
    }

    // Create a new course
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'instructor_id' => 'required|exists:users,id' // Add validation for instructor
        ]);

        $course = Course::create($validatedData);

        return response()->json(['message' => 'Course created successfully', 'course' => $course], 201);
    }

    // Update an existing course
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'instructor_id' => 'sometimes|required|exists:users,id'
        ]);

        $course->update($validatedData);

        return response()->json(['message' => 'Course updated successfully', 'course' => $course]);
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(['message' => 'Course deleted successfully']);
    }
}
