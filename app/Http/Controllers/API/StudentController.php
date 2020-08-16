<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //show all data into json format.....
        $st= Student::all();
        return response()->json($st);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //start validation for data insert into students table......
        $validatedData = $request->validate([
        'student_name' => 'required|max:255',
        'student_email' => 'required|unique:students|email',
        'student_phone' => 'required|max:18',
    ]);

        //end validation
         $insertStudent= Student::create($request->all()); //insert all requested data
        return response()->json($insertStudent);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        //show single information by id.....
         $show=  Student::findOrFail($id);
         return response()->json($show); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //start validation for data update into students table......
        $validatedData = $request->validate([
        'student_name' => 'required|max:255',
        'student_email' => 'required|email',
        'student_phone' => 'required|max:18',
    ]);
        //end validation......

        $st_up = Student::findOrFail($id); //fetch data regarding by id
        $st_up->update($request->all()); //update data by id

        return response()->json($st_up);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //delete specific information by id.....
        $st_dlt = Student::findOrFail($id);
        $st_dlt->delete();

        return 204;
    }
}
