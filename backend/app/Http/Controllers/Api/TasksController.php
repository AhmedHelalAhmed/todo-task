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
 * 
 */
class TasksController extends ApiController
{
    
    /**
     * 
     * Get tasks
     * @SWG\Get(
     *     path="/tasks",
     *     description="Display a list of the tasks",
     *     tags={"tasks . . . to deal with tasks - crud operations -"},
     *     @SWG\Response(
     *         response=200,
     *         description="Successful operation - All data received"
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Bad operation - Fail to pass validation"
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server error"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Forbidden - Authenticated, but does not have the permissions to perform an action"
     *     ),
     *     
     * )
     */
    public function index()
    {
        $tasks= Task::all();
       return TaskResource::collection($tasks);
    }


    /**
     * Store a task.
     * 
     * @SWG\Post(
     *     path="/tasks",
     *     description="Store the task in database and return it in JSON",
     *     tags={"tasks . . . to deal with tasks - crud operations -"},
     *     @SWG\Parameter(
     *         name="details",
     *         type="string",
     *         in="query",
     *         description="Task details",
     *         required=false,
     *         @SWG\Schema(type="string",example="This task is important because . . ."),
     *     ),
     *     @SWG\Parameter(
     *         name="description",
     *         type="string",
     *         in="query",
     *         description="Task description",
     *         required=true,
     *         @SWG\Schema(type="string",example="Task to do"),
     *     ),

     *     @SWG\Response(
     *         response=200,
     *         description="Successful operation - task stored",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data",
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Bad operation - Fail to pass validation"
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server error"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Forbidden - Authenticated, but does not have the permissions to perform an action"
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json(new TaskResource($task), 200);
    }

    /**
     * show a task by ID.
     * 
     * @SWG\Get(
     *     path="/tasks/{ID}",
     *     description="Get the task that has ID in the URL in JSON",
     *      tags={"tasks . . . to deal with tasks - crud operations -"},
     *     @SWG\Parameter(
     *         name="ID",
     *         type="integer",
     *         in="path",
     *         description="task's id",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data",
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Bad operation - Fail to pass validation"
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server error"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Forbidden - Authenticated, but does not have the permissions to perform an action"
     *     ),
     * )
     */
    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return "error ModelNotFoundException";
        }
        return response()->json(['data'=>['task'=>new TaskResource($task)]]);
    }


    /**
     * 
     * Edit a task by ID.
     * 
     * @SWG\Get(
     *     path="/tasks/{ID}/edit",  
     *     description="Edit - return the task that has the ID in the URL in JSON",
     *      tags={"tasks . . . to deal with tasks - crud operations -"},
     *     @SWG\Parameter(
     *         name="ID",
     *         type="integer",
     *         in="path",
     *         description="task's id",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data",
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Bad operation - Fail to pass validation"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Forbidden - Authenticated, but does not have the permissions to perform an action"
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Task Model NOT Found"
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server error"
     *     ),
     * )
     */
    public function edit($id)
    {
        

        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(
                ['error' => 'Task Model NOT Found'], 404);
        }



        return response()->json(
            ['data'=>['task'=>new TaskResource($task)]]);
    }




    /**
     * 
     * Update a task by ID.
     * 
     * @SWG\Put(
     *     path="/tasks/{ID}",
     *     description="Update the task that has the ID in the URL",
     *      tags={"tasks . . . to deal with tasks - crud operations -"},
     *     @SWG\Parameter(
     *         name="description",
     *         in="body",
     *         type="string",
     *         description="Description of the task",
     *         required=true,
     *         @SWG\Schema(type="string",example="Task to do"),
     *     ),
     *     @SWG\Parameter(
     *         name="details",
     *         in="body",
     *         type="string",
     *         description="Details of the task",
     *         required=false,
     *         @SWG\Schema(type="string",example="This task is important because . . ."),
     *     ),
     *     @SWG\Parameter(
     *         name="ID",
     *         type="integer",
     *         in="path",
     *         description="ID of a task",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Successful operation - Task updated",
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Task Model NOT Found"
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Bad operation - Fail to pass validation"
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server error"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Forbidden - Authenticated, but does not have the permissions to perform an action"
     *     ),
     * )
     */
    public function update(Request $request, $id)
    {

        try {
            $task = Task::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(
                ['error' => 'Task Model NOT Found'], 404);
        }

        $task->update($request->all());

        return response()->json(new TaskResource($task), 200);
    }





    /**
     * 
     * Delete a task.
     * 
     * @SWG\Delete(
     *     path="/tasks/{ID}",
     *     description="Delete the task that has the ID in the URL",
     *      tags={"tasks . . . to deal with tasks - crud operations -"},
     *     @SWG\Parameter(
     *         name="ID",
     *         type="integer",
     *         in="path",
     *         description="task's id",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="Successful operation - NO CONTENT"
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Bad operation - Fail to pass validation"
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server error"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Forbidden - Authenticated, but does not have the permissions to perform an action"
     *     ),
     * )
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json(null, 204);;
    }

    


    /**
     * 
     * Swap the IDs of two tasks.
     * 
     * @SWG\post(
     *     path="/tasks/{ID1}/{ID2}",
     *     description="Swap two tasks data (description and details) which have the ids ID1 and ID2 in the URL and return the new updated data in JSON",
     *      tags={"tasks . . . to deal with tasks - crud operations -"},
     *     @SWG\Parameter(
     *         name="ID1",
     *         type="integer",
     *         in="path",
     *         description="first task's id",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="ID2",
     *         type="integer",
     *         in="path",
     *         description="second task's id",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Successful operation",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Missing Data"
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Bad operation - Fail to pass validation"
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal server error"
     *     ),
     *     @SWG\Response(
     *         response=403,
     *         description="Forbidden - Authenticated, but does not have the permissions to perform an action"
     *     ),
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

        return response()->json(
            ['data'=>['first'=>new TaskResource($task1),
                      'second'=>new TaskResource($task2)]]);

    }


}
