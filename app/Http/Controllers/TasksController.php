<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tasks = Tasks::all();
       return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Tasks;
        $task->task = $request->task;
        $task->save();
        $data = [
            'message' =>'Task added succesfully',
            'task' => $task
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
    $temp = Tasks::find($tasks->id);
    if($temp->selected === 0){       
        $temp->selected = 1;} 
    else{
            $temp->selected = 0;
        }

    $temp->save();
    $data = [
            'message' =>'Task updated succesfully',
            'task' => $temp
        ];
     return response()->json($data);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        $temp = Tasks::find($tasks->id);
        $temp->selected = $request->selected;
        $temp->task = $request->task;
    
        $temp->save();
        $data = [
                'message' =>'Task updated succesfully',
                'task' => $temp
            ];
         return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroySelected()
    {

        $count = Tasks::where('selected', true)->delete();
        // dd($data);
        if($count > 0 ){
    
            return response()->json(['message'=>'Successfully Deleted']);
        }
        else{
            return response()->json(['message'=>'Delete Failed']);
        }
    }

    public function destroyAll()
    {

        $count = Tasks::whereNotNull('id')->delete();
        if($count > 0 ){
    
            return response()->json(['message'=>'Successfully Deleted']);
        }
        else{
            return response()->json(['message'=>'Delete Failed']);
        }
    }
}
