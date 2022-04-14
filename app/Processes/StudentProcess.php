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
            'student_firstname' => 'required',
            'student_lastname'  => 'required',
            'student_username'  => 'required|unique:students',
            'student_email'     => 'required|unique:students',
            'student_password'  => 'required',
            'student_phone'     => 'required',
            'student_address'   => 'required',
            'student_city'      => 'required',
            'student_state'     => 'required',
            'student_zip'       => 'required',
            'student_country'   => 'required',
            'student_gender'    => 'reuqired|in:Male,Female',
            'student_birthday'  => 'required',

        ]);

        $this->student = Student::create([
            'student_number'     => $this->student_number,
            'student_firstname'  => $this->request->student_firstname,
            'student_lastname'   => $this->request->student_lastname,
            'student_middlename' => $this->request->student_middlename,
            'student_username'   => $this->request->student_username,
            'student_email'      => $this->request->student_email,
            'student_password'   => $this->request->student_password,
            'student_phone'      => $this->request->student_phone,
            'student_address'    => $this->request->student_address,
            'student_city'       => $this->request->student_city,
            'student_state'      => $this->request->student_state,
            'student_zip'        => $this->request->student_zip,
            'student_country'    => $this->request->student_country,
            'student_gender'     => $this->request->student_gender,
            'student_birthday'   => $this->request->student_birthday
        ]);

        return $this;
    }

    public function genereateStudentNumber()
    {

        $today = date('Ymd');

        // count the number of students that have this year
        $total_students = Student::where('student_number', 'like', $today . '%')->count();

        $this->student_number =  $today . sprintf('%04d', $total_students + 1);

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
