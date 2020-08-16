<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Course;
use DB;

class CourseController extends Controller 
{
	//fetch all courses from courses table......
    public function index(){
    	$allCourse=Course::all();
    	 return response()->json($allCourse);

    }

    public function store(Request $request){

    	//start validation for data insert into courses table......
        $validatedData = $request->validate([
        'student_id' => 'required|max:255',
        'course_name' => 'required|unique:courses|max:30',
        'course_code' => 'required|unique:courses|max:18',
    ]);
        //end validation......

        $couseIn = Course::create($request->all()); //insert data to table.. 			
        return response()->json($couseIn);
    }

    public function show($id){
    	
    	$show=Course::findOrFail($id);
        return response()->json($show);
    }

    public function update(Request $request,$id){

    	//start validation for data update into courses table......
        $validatedData = $request->validate([
        'student_id' => 'required|max:255',
        'course_name' => 'required|max:30',
        'course_code' => 'required|max:18',
    ]);
        //end validation......

        $update = Course::findOrFail($id);
        $update->update($request->all());

        return response()->json($update);

    }
    public function destroy($id){
    	$course_dlt = course::findOrFail($id);
        $course_dlt->delete();

        return 204;
    } 

    public function showCourseByStudent($id){
    	// $show=DB::table('courses')->join('students','courses.student_id','students.id')
    	// 		->where('students.id',$id)->first();
    	// return $show;
    	$showbyid=DB::table('courses')->join('students','courses.student_id','students.id')->where('students.id',$id)->first();
    	return response()->json($showbyid);


    }
}
