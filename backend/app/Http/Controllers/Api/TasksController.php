<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Http\Resources\TaskResource;
use App\Http\Controllers\ApiController;

/**
 * Class TasksController
 *
 * @package App\Http\Controllers\Api
 */
class TasksController extends ApiController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *     path="/api/tasks",
     *     description="Returns tasks",
     *     operationId="api.tasks.index",
     *     tags={"tasks"},
     *     @SWG\Response(
     *         response=200,
     *         description="tasks overview."
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    public function index()
    {
        $tasks= Task::all();
       return TaskResource::collection($tasks);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all());
      return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return "error ModelNotFoundException";
        }
        return response()->json(['data'=>['task'=>$task]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return response()->json(['data'=>['task'=>$task]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return "error ModelNotFoundException";
        }
        
        $task->update($request->all());
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
    }

    
    public function swap($id1,$id2)
    {   
        $task1 = Task::findOrFail($id1); 
        $tempdescription=$task1 ->description;
        $tempdetails=$task1 ->details;

        $task2 = Task::findOrFail($id2); 
        
        //description
        $task1->description=$task2->description;
        $task2->description=$tempdescription;

        //details
        $task1->details=$task2->details;
        $task2->details=$tempdetails;

        $task1->save();
        $task2->save();

        return response()->json(['data'=>['first'=>$task1,'second'=>$task2]]);

    }


}
