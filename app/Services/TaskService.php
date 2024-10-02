<?php
namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskService {

    protected $model;
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function index(){
        return $this -> model -> all();
    }

    public function show($id){
        try{
            return $this -> model -> findOrFail($id);
        }catch(ModelNotFoundException $e){
            return null;
        }
    }

    public function create($params) {  
        
        return $this->model->create($params);
    }
    public function update($id, $params) 
    {
        try {
            $task = $this->model->findOrFail($id); // Tìm đối tượng theo ID
        } catch (ModelNotFoundException $e) { // Bắt lỗi nếu không tìm thấy
            return null; // Trả về null nếu không tìm thấy
        }
    
        Log::info($task);
        $task->update($params); // Cập nhật đối tượng
        return $task; // Trả về đối tượng đã được cập nhật
    }
    public function destroy($id){
        try{
            $task = $this->model->findOrFail($id);
        }catch(ModelNotFoundException $e) { return null; }
        $task -> delete();
         
    }
}
