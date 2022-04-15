<?php
namespace App\Processes;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            $this->genereateStudentNumber()
                ->createStudent();
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
            'student_firstname'  => 'required',
            'student_lastname'   => 'required',
            'student_middlename' => 'required',
            'student_username'   => 'required|unique:students',
            'student_password'   => 'required',
            'student_email'      => 'required|email|unique:students',
            'student_phone'      => 'required|digits:11',
            'student_address'    => 'required',
            'student_city'       => 'required',
            'student_zip'        => 'required',
            'student_country'    => 'required',
            'student_birthday'   => 'required',
            'student_gender'     => 'required|in:Male,Female'
        ]);

        $this->student = Student::create([
            'student_number'     => $this->student_number,
            'student_firstname'  => Hash::make($this->request->student_firstname),
            'student_lastname'   => Hash::make($this->request->student_lastname),
            'student_middlename' => Hash::make($this->request->student_middlename),
            'student_username'   => Hash::make($this->request->student_username),
            'student_email'      => Hash::make($this->request->student_email),
            'student_password'   => Hash::make($this->request->student_password),
            'student_phone'      => Hash::make($this->request->student_phone),
            'student_address'    => Hash::make($this->request->student_address),
            'student_city'       => Hash::make($this->request->student_city),
            'student_state'      => $this->request->student_state,
            'student_zip'        => Hash::make($this->request->student_zip),
            'student_country'    => Hash::make($this->request->student_country),
            'student_gender'     => $this->request->student_gender,
            'student_birthday'   => $this->request->student_birthday
        ]);

        return $this;
    }

    public function genereateStudentNumber()
    {

        // get the year
        $today = date('Y');

        // count the total number of students
        $total_students = Student::where('student_number', 'like', $today . '%')->count();

        // generate the student number
        $this->student_number =  $today . sprintf('%04d', $total_students + 1);

        // return the instance
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
