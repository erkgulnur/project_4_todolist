<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function addTask(Request $request)
    {

        $user_id = Auth::id();

        $data = $request->validate([
            'title' => 'required|string|max:255'
        ]);
        $data['status'] ='notdone';
        $data['user_id'] = $user_id;

        Task::create($data);

        return redirect('dashboard');

    }

    public static function deleteTask($task_id)
    {
        $task = Task::find($task_id);
        if ($task) {
            $task->delete();
        }
        //return redirect('dashboard'); Подскажите пожалуйста почему это редирект не работает? 
        //приходится его прописывать в router/web.php, чтобы снова перенаправить страницу на /dashboard        
    }

    public static function doneTask($task_id)
    {
        $task = Task::find($task_id);
        if ($task)
        {
            $task->update([
                'status' => 'done'
            ]);
        }
        //redirect('dashboard'); - тут тоже редирект не срабатывает
    }
}
