<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;
    public function __construct(StudentService $studentService)
    {
        $this -> studentService = $studentService;         
    }

    public function index()
    {
        return response()->json($this->studentService -> index());
    }

    public function store(CreateStudentRequest $request){
        
        return response()->json($this -> studentService -> store($request -> all()), 201);
    }
    public function show($id){
        
        $dataResponse = $this -> studentService -> show($id);
        if(!$dataResponse){
            return response()->json(["message"=> "Student not found"],404);
        }
        return response()->json($dataResponse,200);
    }

    public function update(UpdateStudentRequest $request, $id){
         $dataResponse = $this -> studentService -> update( $request->all(),$id );   
         if(!$dataResponse){
            return response()->json(["message"=> "Student not found"],404);
         }
        return response() -> json( $dataResponse,200);
    }

    public function delete($id){
         $this -> studentService -> destroy($id);
         return response()->json(['message' => 'Student has been delete']);
    }
}

