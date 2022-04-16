<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Processes\SubjectProcess;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subject::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request, SubjectProcess $process)
    {
        $process->create();

        activity()
            ->performedOn($process->subject())
            ->withProperties($process->subject())
            ->log('Process created');

        return [
            'success' => true,
            'message' => 'Subject created successfully',
            'data' => $process->subject()
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return Subject::where('id', $subject->id)
                        ->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, SubjectProcess $process)
    {
        $process->find($request->id)
                ->update();

        activity()
            ->performedOn($process->subject())
            ->withProperties($process->subject())
            ->log('Process updated');

        return [
            'success' => true,
            'message' => 'Subject updated successfully',
            'data' => $process->subject()
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        activity()
            ->performedOn($subject)
            ->withProperties($subject)
            ->log('Subject deleted');

        return [
            'success' => true,
            'message' => 'Subject deleted successfully',
            'data' => $subject
        ];
    }
}
