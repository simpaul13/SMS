<?php
namespace App\Processes;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherProcess
{
    protected $request, $teacher;

    public function __construct($request = null)
    {
        $this->request = $request ? (object) $request : request();
    }

    public function find($id)
    {
        $this->teacher = Teacher::findOrFail($id);

        return $this;
    }

    public function teacher()
    {
        return $this->teacher;
    }

    public function create()
    {
        DB::transaction(function(){
            $this->genereateTeacherNumber()
                ->createTeacher();
        });
    }

    public function update()
    {
        DB::transaction(function(){
            $this->updateTeacher();
        });
    }

    public function createTeacher()
    {
        $this->teacher = Teacher::create([
            'teacher_number'     => $this->teacher_number,
            'teacher_firstname'  => Hash::make($this->request->teacher_firstname),
            'teacher_lastname'   => Hash::make($this->request->teacher_lastname),
            'teacher_middlename' => Hash::make($this->request->teacher_middlename),
            'teacher_username'   => Hash::make($this->request->teacher_username),
            'teacher_email'      => Hash::make($this->request->teacher_email),
            'teacher_password'   => Hash::make($this->request->teacher_password),
            'teacher_phone'      => Hash::make($this->request->teacher_phone),
            'teacher_address'    => Hash::make($this->request->teacher_address),
            'teacher_city'       => Hash::make($this->request->teacher_city),
            'teacher_state'      => $this->request->teacher_state,
            'teacher_zip'        => Hash::make($this->request->teacher_zip),
            'teacher_country'    => Hash::make($this->request->teacher_country),
            'teacher_gender'     => $this->request->teacher_gender,
            'teacher_birthday'   => $this->request->teacher_birthday
        ]);

        return $this;
    }

    public function genereateTeacherNumber()
    {

        // get the year
        $today = date('Y');

        // count the total number of students
        $total_teachers = Teacher::where('teacher_number', 'like', $today . '%')->count();

        // generate the student number
        $this->teacher_number =  $today . sprintf('%04d', $total_teachers + 1);

        // return the instance
        return $this;

    }

    public function updateTeacher()
    {
        $this->teacher->update([
            'teacher_firstname'  => Hash::make($this->request->teacher_firstname),
            'teacher_lastname'   => Hash::make($this->request->teacher_lastname),
            'teacher_middlename' => Hash::make($this->request->teacher_middlename),
            'teacher_username'   => Hash::make($this->request->teacher_username),
            'teacher_email'      => Hash::make($this->request->teacher_email),
            'teacher_password'   => Hash::make($this->request->teacher_password),
            'teacher_phone'      => Hash::make($this->request->teacher_phone),
            'teacher_address'    => Hash::make($this->request->teacher_address),
            'teacher_city'       => Hash::make($this->request->teacher_city),
            'teacher_state'      => $this->request->teacher_state,
            'teacher_zip'        => Hash::make($this->request->teacher_zip),
            'teacher_country'    => Hash::make($this->request->teacher_country),
            'teacher_gender'     => $this->request->teacher_gender,
            'teacher_birthday'   => $this->request->teacher_birthday
        ]);

        return $this;
    }

}
