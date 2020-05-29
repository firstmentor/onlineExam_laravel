<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_master extends Model
{
     protected $table="exam_masters";
    protected $primaryKey="id";
    protected $fillable =['title','category','exam_date','status'];
}
