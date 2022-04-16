<?php
namespace App\Processes;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseProcess
{
    protected $request, $course;

    public function __construct($request = null)
    {
        $this->request = $request ? (object) $request : request();
    }

    public function find($id)
    {
        $this->course = Course::findOrFail($id);

        return $this;
    }

    public function course()
    {
        return $this->course;
    }

    public function create()
    {
        DB::transaction(function(){
            $this->createCourse();
        });
    }

    public function update()
    {
        DB::transaction(function(){
            $this->updateCourse();
        });
    }

    public function createCourse()
    {
        $this->course = Course::create([
            'course_name'           => $this->request->course_name,
            'course_code'           => $this->request->course_code,
            'course_description'     => $this->request->course_description,
        ]);

        return $this;
    }

    public function updateCourse()
    {
        $this->course->update([
            'course_name'           => $this->request->course_name,
            'course_code'           => $this->request->course_code,
            'course_description'     => $this->request->course_description,
        ]);

        return $this;
    }

}
