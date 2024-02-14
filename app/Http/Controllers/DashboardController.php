<?php

namespace App\Http\Controllers;

use App\Services\WeatherApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class DashboardController extends Controller
{
    private $weatherApiService;

    public function __construct(WeatherApiService $weatherApiService)
    {
        $this->weatherApiService = $weatherApiService;
    }

    public function index()
    {
        $weather = $this->weatherApiService->getWeatherData();
        $user = Auth::user();
        $userid = Auth::id();
        //dd($user['id']);
        $tasks = Task::where('user_id',$userid)->get() ?? null;

        //dd($user);
       
        return view('dashboard',[
            'weather' => $weather,
            'tasks' => $tasks,
            'user' => $user
        ]);
        
    }
}
