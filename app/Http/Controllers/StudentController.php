<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Processes\StudentProcess;
class StudentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();

    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StudentProcess $process)
    {

        $process->create();

        activity()
            ->performedOn($process->student())
            ->withProperties($process->student())
            ->log('Process created');

        return [
            'success' => true,
            'message' => 'Student created successfully',
            'data' => $process->student()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

        return Student::where('id', $student->id)
                        ->first();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, StudentProcess $process)
    {

        $process->find($request->id)
                ->update();

        activity()
            ->performedOn($process->student())
            ->withProperties($process->student())
            ->log('Process updated');

        return [
            'success' => true,
            'message' => 'Student updated successfully',
            'data' => $process->student()
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        activity()
            ->performedOn($student)
            ->withProperties($student)
            ->log('Process deleted');

        return [
            'success' => true,
            'message' => 'Student deleted successfully',
            'data' => $student
        ];
    }
}
