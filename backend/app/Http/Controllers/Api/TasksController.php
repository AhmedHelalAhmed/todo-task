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
     * Display a listing of the tasks.
     *
     *
     * @SWG\Get(
     *     path="/api/tasks",
     *     description="Returns tasks",
     *     tags={"Tasks API"},
     *     @SWG\Response(
     *         response=200,
     *         description="ok"
     *     )
     * )
     */
    public function index()
    {
        $tasks= Task::all();
       return TaskResource::collection($tasks);
    }


    /**
     * Store a task in database.
     * 
     * @SWG\Post(
     *     path="/api/tasks",
     *     description="Store the task in database",
     *     tags={"Tasks API"},
     *     @SWG\Parameter(
     *         name="description",
     *         type="string",
     *         in="query",
     *         description="Task description",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="details",
     *         type="string",
     *         in="query",
     *         description="Task details",
     *         required=false,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data",
     *     )
     * )
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return new TaskResource($task);
    }

    /**
     * @SWG\Get(
     *     path="/api/tasks/{id}",
     *     description="Return the task data in json",
     *      tags={"Tasks API"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data",
     *     )
     * )
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
     * @SWG\Get(
     *     path="/api/tasks/{id}/edit",
     *     description="Return the task data in json",
     *      tags={"Tasks API"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return response()->json(['data'=>['task'=>$task]]);
    }




    /**
     * @SWG\Put(
     *     path="/api/tasks/{id}",
     *     description="Update the task in database",
     *      tags={"Tasks API"},
     *     @SWG\Parameter(
     *         name="description",
     *         in="query",
     *         type="string",
     *         description="Description of the task",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="details",
     *         in="query",
     *         type="string",
     *         description="Details of the task",
     *         required=false,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
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
     * @SWG\Delete(
     *     path="/api/tasks/{id}/edit",
     *     description="Remove the specified task from database",
     *      tags={"Tasks API"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function destroy($id)
    {
        Task::destroy($id);
    }

    


    /**
     * @SWG\post(
     *     path="/api/tasks/{id1}/{id2}",
     *     description="Swap two tasks in database and return the new updated data",
     *      tags={"Tasks API"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function swap($id1,$id2)
    {   
        $task1 = Task::findOrFail($id1); 
        $temp_description=$task1 ->description;
        $temp_details=$task1 ->details;

        $task2 = Task::findOrFail($id2); 
        
        //description
        $task1->description=$task2->description;
        $task2->description=$temp_description;

        //details
        $task1->details=$task2->details;
        $task2->details=$temp_details;

        $task1->save();
        $task2->save();

        return response()->json(['data'=>['first'=>$task1,'second'=>$task2]]);

    }


}
