<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Processes\ClassroomProcess;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Classroom::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassroomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request, ClassroomProcess $process)
    {

        $process->create();

        activity()
            ->performedOn($process->classroom())
            ->withProperties($process->classroom())
            ->log('Process created');

        return [
            'success' => true,
            'message' => 'Classroom created successfully',
            'data' => $process->classroom()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return Classroom::where('classroom_id', $classroom->id)
                        ->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassroomRequest  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request,ClassroomProcess $process,  Classroom $classroom)
    {
        $process->find($request->id)
                ->update();

        activity()
            ->performedOn($process->classroom())
            ->log('Classroom updated successfully');

        return [
            'success' => true,
            'message' => 'Classroom updated successfully',
            'data' => $process->classroom()
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        activity()
            ->performedOn($classroom)
            ->withProperties($classroom)
            ->log('Classroom deleted');

        return [
            'success' => true,
            'message' => 'Classroom deleted successfully',
            'data' => $classroom
        ];
    }
}
