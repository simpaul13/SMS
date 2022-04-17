<?php
namespace App\Processes;

use Illuminate\Http\Request;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class ClassroomProcess
{
    protected $request, $classroom;

    public function __construct($request = null)
    {
        $this->request = $request ? (object) $request : request();
    }

    public function find($id)
    {
        $this->classroom = Classroom::findOrFail($id);

        return $this;
    }

    public function classroom()
    {
        return $this->classroom;
    }

    public function create()
    {
        DB::transaction(function(){
            $this->createClassroom();
        });
    }

    public function update()
    {
        DB::transaction(function(){
            $this->updateClassroom();
        });
    }

    public function createClassroom()
    {
        $this->classroom = Classroom::create([
            'classroom_code'        => $this->request->classroom_code,
            'classroom_name'        => $this->request->classroom_name,
            'classroom_description' => $this->request->classroom_description,
        ]);

        return $this;
    }

    public function updateClassroom()
    {
        $this->classroom->update([
            'classroom_code'        => $this->request->classroom_code,
            'classroom_name'        => $this->request->classroom_name,
            'classroom_description' => $this->request->classroom_description,
        ]);

        return $this;
    }

}
