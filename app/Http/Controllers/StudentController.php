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
        return view('student.index');
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

        // Store data form input
        DB::table('students')->insert([
            'st_name'       => $request->st_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'student_id'    => $request->student_id,
            'address'       => $request->address,
            'photo'         => $request->photo,
            'created_at'    => now()
        ]);

        // Redirect home page and Success Message!
        return redirect()->route('student.index')->with('success', 'Form data insert <strong>Successfully</strong>');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('student.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('student.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
