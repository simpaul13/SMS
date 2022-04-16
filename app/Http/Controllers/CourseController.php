<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Processes\CourseProcess;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Course::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = Course::create($request->all());

        return [
            'success' => true,
            'message' => 'Course created successfully',
            'data' => $course
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return Course::where('id', $course->id)
                        ->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, CourseProcess $process)
    {
        $process->find($request->id)
                ->update();

        activity()
            ->performedOn($process->course())
            ->withProperties($process->course())
            ->log('Process updated');

        return [
            'success' => true,
            'message' => 'Course updated successfully',
            'data' => $process->course()
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        activity()
            ->performedOn($course)
            ->withProperties($course)
            ->log('Process deleted');

        return [
            'success' => true,
            'message' => 'Course deleted successfully',
            'data' => $course
        ];
    }
}
