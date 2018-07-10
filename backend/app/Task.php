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
 *   required={"description"}
 * )
 *
 */
class Task extends Model
{
  protected $fillable = ['description','details'];
}
