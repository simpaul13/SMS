<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Processes\TeacherProcess;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
        return Teacher::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request, TeacherProcess $process)
    {
        $process->create();

        activity()
            ->performedOn($process->teacher())
            ->withProperties($process->teacher())
            ->log('Process created');

        return [
            'success' => true,
            'message' => 'Teacher created successfully',
            'data' => $process->teacher()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return Teacher::where('teacher_id', $teacher->teacher_id)
                        ->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, TeacherProcess $process)
    {
        $process->find($request->id)
                ->update();

        activity()
            ->performedOn($process->teacher())
            ->withProperties($process->teacher())
            ->log('Process updated');

        return [
            'success' => true,
            'message' => 'Teacher updated successfully',
            'data' => $process->teacher()
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        activity()
            ->performedOn($teacher)
            ->withProperties($teacher)
            ->log('Process deleted');

        return [
            'success' => true,
            'message' => 'Student deleted successfully',
            'data' => $teacher
        ];
    }
}
