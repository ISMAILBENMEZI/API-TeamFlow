<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskTiemrResource;
use App\Models\Task;
use App\Models\TaskTimer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskTimerController extends Controller
{
    public function handle(Task $task)
    {
        $this->authorize('update', $task);

        $timer = TaskTimer::where('task_id', $task->id)
            ->where('user_id', Auth::id())
            ->whereNull('end_time')
            ->first();

        if ($timer) {
            $timer->end_time = now();
            $timer->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Timer stopped',
                'timer' => TaskTiemrResource::make($timer),
            ]);

        } else {
            $newTimer = TaskTimer::create([
                'task_id' => $task->id,
                'user_id' => Auth::id(),
                'start_time' => now(),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Timer Started',
                'timer' => TaskTiemrResource::make($newTimer),
            ]);
            
        }
    }
}
