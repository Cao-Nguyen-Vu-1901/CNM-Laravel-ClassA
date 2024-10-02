<?php
namespace App\Services;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentService {
    protected $model;

    public function __construct(Student $model) {
        $this->model = $model;  
    }
    public function index() {
        return $this->model->all();
    }

    public function show($id) {
        try {
            $student = $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return null;
        }
        return $student;
    }

    public function store($params) {
        return $this->model->create($params );
    }
    public function update($params, $id) {
        try {
            $task = $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return null;
        }
        $task->update($params);
        return $task;
    }
    public function destroy($id) {
        try {
            $task = $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return null;
        }
        $task->delete();
    }
}