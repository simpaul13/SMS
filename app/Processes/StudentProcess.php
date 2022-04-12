<?php
namespace App\Processes;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentProcess
{
    protected $request, $student;

    public function __construct($request = null)
    {
        $this->request = $request ? (object) $request : request();
    }

    public function find($id)
    {
        $this->student = Student::findOrFail($id);

        return $this;
    }

    public function student()
    {
        return $this->student;
    }

    public function create()
    {
        DB::transaction(function(){
            $this->createStudent();
        });
    }

    public function update()
    {
        DB::transaction(function(){
            $this->updateStudent();
        });
    }

    public function createStudent()
    {
        $this->request->validate([
        ]);

        $this->student = Student::create([
        ]);

        return $this;
    }

    public function updateStudent()
    {
        $this->request->validate([
        ]);

        $this->student->update([
        ]);

        return $this;
    }

}
