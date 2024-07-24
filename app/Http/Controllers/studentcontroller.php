<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class studentcontroller extends Controller
{   
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        return view('posts.show', ['post' => $post]);
    }
    
    //fun to return student list view
    public function index(){
        // fetch all students fromm the db
        $students= students::all();
        // return the view data
        return view('students.index',['students'=>$students]);
    }
    //fun to return the form to add a new student
    public function create(){
        return view('students.create');
    }
    // fun to store data in the database
    public function store(Request $request){
        $data = $request->all();

        $Validator = Validator::make($data,[
            'firstname' =>'required |min:2',
            'lastname' =>'required |min:2',
            'email' =>'required |email |unique:students,email',
            'student_id' =>'required ',
            'course_name'=>'required ',
            'contact' =>'required | min:10 | max:13 |unique:students,contact',
            'address' =>'required',
        ]);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator)->withInput();
        }
        students::create([
            'firstname' => $data['firstname'],
            'lastname'=>$data['lastname'],
            'email' =>$data['email'],
            'student_id' =>$data['student_id'],
            'course_name'=>$data['course_name'],
            'contact' =>$data['contact'],
            'address' =>$data['address'],

        ]);
        return redirect()->intended('students')->with('messages','student added successfully');
    }
    // fun to return the form for editing
    public function edit($id){
        //find students records with the id provided
        $student= students::find($id);
        // return the edit.blade.php which is in the students folder and pass the data to it
        return view('students.edit',['student'=>$student]);
    }
    // function to update column in the database
    public function update(Request $resquest, $id){
        
        //save the datarequest to a variable called data 
        $data= $resquest->all();
        $Validator = Validator::make($data,[
            'firstname' =>'required |min:2',
            'lastname' =>'required |min:2',
            'email' =>'required |email',
            'student_id' =>'required ',
            'course_name'=>'required ',
            'contact' =>'required | min:10 | max:13 ',
            'address' =>'required',
        ]);
        //if validation fails return back with errors
        if ($Validator->fails()) {
           return redirect()->back()->withErrors($Validator)->withInput();
        }
        //find the student with the id coming first
        $student = students::find($id);

        // check if the student is already in the list then update else return error 
        if ($student) {
            $student->firstname = $data['firstname'];
            $student->lastname = $data['lastname'];
            $student->email = $data['email'];
            $student->student_id = $data['student_id'];
            $student->course_name = $data['course_name'];
            $student->contact = $data['contact'];
            $student->address= $data['address'];

            // save the new changes
            $student->save();

            return redirect()->intended('students')->with('messages','student updated successfully');
        }
        return redirect()->back();
    }

    // function to delete a student
    public function delete($id){
        students::find($id)->delete();
        return redirect()->intended('students')->with('messages','student deleted successfully');
    }

}
