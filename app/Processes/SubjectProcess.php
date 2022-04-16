<?php
namespace App\Processes;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectProcess
{
    protected $request, $subject;

    public function __construct($request = null)
    {
        $this->request = $request ? (object) $request : request();
    }

    public function find($id)
    {
        $this->subject = Subject::findOrFail($id);

        return $this;
    }

    public function subject()
    {
        return $this->subject;
    }

    public function create()
    {
        DB::transaction(function(){
            $this->createSubject();
        });
    }

    public function update()
    {
        DB::transaction(function(){
            $this->updateSubject();
        });
    }

    public function createSubject()
    {
        $this->subject = Subject::create([
            'subject_code'            => $this->request->subject_code,
            'subject_name'            => $this->request->subject_name,
            'subject_description'     => $this->request->subject_description,
        ]);

        return $this;
    }

    public function updateSubject()
    {
        $this->subject->update([
            'subject_code'          => $this->request->subject_code,
            'subject_name'          => $this->request->subject_name,
            'subject_description'   => $this->request->subject_description,
        ]);

        return $this;
    }

}
