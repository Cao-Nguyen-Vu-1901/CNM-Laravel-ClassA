<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Task\CreateRequest;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService; 

class TaskController extends Controller
{
    protected $task  ;  
    protected $taskService;
    public function __construct(TaskService $taskService, Task $task)
    {
        
        $this->taskService = $taskService;
        $this -> task = $task; 
    }

     
    public function index()
    {
        return response()->json($this->taskService -> index());
    }

     

    // Tạo một task mới
    public function store(CreateTaskRequest $request) {
         
         $dataRequest = $request->all(); 
         $taskW = $this->taskService->create($dataRequest);
         return response()->json($taskW);
        
    }
    
    
    // Lấy thông tin một task theo ID
    public function show($id)
    {
        $dataResponse = $this -> taskService->show($id);
        if ($dataResponse === null) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        return response()->json($dataResponse);
    }

    // Cập nhật một task
    public function update(UpdateTaskRequest $request, $id)
{
    $dataUpdate = $this->taskService->update($id, $request->all());

    if ($dataUpdate === null) {
        return response()->json(['message' => 'Task not found'], 404);
    }

    return response()->json($dataUpdate);
}


    // Xóa một task
    public function destroy($id)
    {
        $this -> taskService->destroy($id);
         return response()->json(['message' => 'Task has been delete'],200);
    }
}