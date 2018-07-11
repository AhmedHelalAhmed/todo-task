<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Task
 *
 * @package App
 *
 * @SWG\Definition(
 *   definition="Task",
 *   required={"name"}
 * )
 *
 */
class Task extends Model
{
    protected $fillable = ['description','details'];
}
