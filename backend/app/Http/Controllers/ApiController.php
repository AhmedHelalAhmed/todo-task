<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * Class ApiController
 *
 * @package App\Http\Controllers
 *
 * @SWG\Swagger(
 *     basePath="/api/",
 *     host="localhost:8000",
 *     @SWG\Info(
 *         version="1.0",
 *         title="ToDo",
 *         @SWG\Contact(name="Ahmed Helal Ahmed", url="https://www.facebook.com/A.Helal.A.A"),
 *     ),
 *     @SWG\Definition(
 *         definition="Task",
 *         required={"description"},
 *         default=false,
 *         @SWG\Property(
 *             description="the name of a task",
 *             property="description",
 *             type="string",
 *         ),
 *         @SWG\Property(
 *             description="the details of a task",
 *             property="details",
 *             type="string",
 *         )
 *     )
 * 
 * )
 */
class ApiController extends Controller
{
    
}
