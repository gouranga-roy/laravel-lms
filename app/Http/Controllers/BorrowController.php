<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $borrows = DB::table('borrows') -> latest() -> get();
        $borrows = DB::table('borrows') -> latest()
                ->join('students', 'borrows.student_id', '=', 'students.id')
                ->join('books', 'borrows.book_id', '=', 'books.id')
                ->select(
                    'borrows.*',
                    'students.st_name as student_name',
                    'books.b_name as book_name',
                )
                ->get();

        return view('borrow.index', [
            'borrows' => $borrows
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('borrow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('borrows') -> insert([
            'student_id'    => $request -> student_id,
            'book_id'       => $request -> book_id,
            'return_date'   => $request -> return_date,
            'created_at'    => now(),
        ]);

        return redirect(route('borrow.index')) -> with('success', 'Assign Book <strong>Successfully</strong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('borrow.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('borrow.edit');
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

    /**
     * Search Student
     */
    public function search() {
       $students = DB::table('students')->get();
        return view('borrow.search_student', [
            'students' => $students,
        ]);
    }

    public function searchStudentGet() {
        return redirect('/borrow-search');
    }

    /**
     * Search Student Data
     */
    public function searchStudent(Request $request) {
        $students = DB::table('students')
                    ->where('student_id', $request->student_id)
                    ->orWhere('email', $request->email)
                    ->orWhere('phone', $request->phone)
                    ->get();


        return view('borrow.search_student', [
            'students' => $students,
        ]);
    }

    /**
     * Borrow Assign
     */
    public function borrowAssign($id) {
        $student = DB::table('students')
                    -> where('id', $id)
                    -> first();
        $books = DB::table('books')
                -> get();

        return view('borrow.assign_book', [
            'student' => $student,
            'books' => $books
        ]);
    }

}
 