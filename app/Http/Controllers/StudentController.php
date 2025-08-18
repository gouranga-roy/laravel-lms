<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get All Students
        $students_all = DB::table('students')->latest()->get();
        return view('student.index', [
            'studentsAll' => $students_all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Form Validation
        $request->validate([
            'st_name'       => 'required|max:100',
            'email'         => 'required|email|unique:students,email',
            'phone'         => ['required', 'regex:/^(?:\+8801[3-9]\d{8}|01[3-9]\d{8})$/'],
            'student_id'    => 'required|numeric|unique:students|max_digits:100',
            'address'       => 'max:250',
            'photo'         => 'mimes:jpg,png,jpeg|max:1024'
        ]);

        // Upload Student Image
        $fileName = $this -> fileUpload($request -> file('photo'), 'media/students');

        // Store data form input
        DB::table('students')->insert([
            'st_name'       => $request->st_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'student_id'    => $request->student_id,
            'address'       => $request->address,
            'photo'         => $fileName,
            'created_at'    => now()
        ]);

        // Redirect home page and Success Message!
        return redirect()->route('student.index')->with('success', 'Student insert <strong>Successfully</strong>');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get single student in DB
        $studnet = DB::table('students')->where('id', $id)->first();
        return view('student.show', [
            'student' => $studnet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Get single student in DB
        $studnet = DB::table('students')->where('id', $id)->first();
        return view('student.edit', [
            'student' => $studnet
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Form Validation
        $request->validate([
            'st_name'       => 'required|max:100',
            'phone'         => 'required', 'regex:/^(?:\+8801[3-9]\d{8}|01[3-9]\d{8})$/',
            'address'       => 'nullable|max:250',
            'photo'         => 'nullable|mimes:jpg,png,jpeg,avif|max:1024'
        ]);


        // Upload Student Image 
        if($request->hasFile('photo')) {

            $stPhoto = DB::table('students')->where('id', $id) -> first();

            if( $stPhoto -> photo != null && file_exists(public_path('media/students/') . $stPhoto->photo ) )  {
                unlink(public_path('media/students/') . $stPhoto->photo);
            };

            $fileName = $this -> fileUpload($request -> file('photo'), 'media/students');
            
            DB::table('students')->where('id', $id)->update([ 
                'photo'         => $fileName, 
            ]);

        };

         
        DB::table('students')->where('id', $id)->update([
            'st_name'       => $request->st_name,
            'phone'         => $request->phone,
            'address'       => $request->address, 
            'updated_at'    => now()
        ]);

    
        // Redirect home page and Success Message!
        return redirect()->route('student.index')->with('success', 'Student Update <strong>Successfully</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id', $id)->delete();

        // Redirect home page and Success Message!
        return redirect()->route('student.index')->with('success', 'Student Delete <strong>Successfully</strong>');
    }
}
