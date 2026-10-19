<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  
        return view('student.index', [    
            'title' => 'student',
            'students' => Student::latest()->get(),
            ]);
    }

    public function create()
    {
        return view('student.create', ['title' => 'create student']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric|digits:12',
    ],[
        'name.required' => 'Nama wajib di input',
        'nim.required' => 'NIM wajib di input',
        'nim.numeric' => 'NIM wajib berupa angka',
        'nim.digits' => 'NIM wajib 12 digit',
    ]
    );
 
     Student::create($validated);
 
    return redirect('/student');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
