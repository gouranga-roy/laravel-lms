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
        $borrows = DB::table('borrows') -> orderBy('return_date', 'asc')
                ->join('students', 'borrows.student_id', '=', 'students.id')
                ->join('books', 'borrows.book_id', '=', 'books.id')
                ->select(
                    'borrows.*',
                    'students.st_name as student_name',
                    'students.photo as student_photo',
                    'books.b_name as book_name',
                    'books.cover as book_cover',
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
            'status'        => $request -> status,
            'issue_date'    => now(),
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
        $borrow = DB::table('borrows')
                    -> join('students', 'borrows.student_id', '=' , 'students.id')
                    -> join('books', 'borrows.book_id', '=', 'books.id')
                    -> select(
                        'borrows.*',
                        'students.st_name as student_name',
                        'students.photo as st_photo',
                        'students.email as st_email',
                        'students.address as st_address',
                        'books.b_name as book_name'
                    )
                    -> where('borrows.id', $id)
                    -> first();

        $books = DB::table('books')->get();

        return view('borrow.edit', [
            'borrow' => $borrow,
            'books'  => $books
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('borrows')->where('id', $id)->update([
            'student_id'    => $request -> student_id,
            'book_id'       => $request -> book_id,
            'return_date'   => $request -> return_date,
            'status'        => $request -> status,
            'updated_at'    => now()
        ]);

        // Update data Borrows table
        return back()->with('success','Data Update <strong>Successfully!</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('borrows')->where('id', $id)->delete();

        // Delete Successfully Message and Redirect Home page
        return redirect(route('borrow.index'))->with('success', 'Borrowing Delete <strong>Successfully</strong>');
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
                    ->where('student_id', $request->student_search)
                    ->orWhere('email', $request->student_search)
                    ->orWhere('phone', $request->student_search)
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

    /**
     * Borrow Make Return
     */
    public function borrowReturned(string $id) {
        return "Hello";
    }

}
 