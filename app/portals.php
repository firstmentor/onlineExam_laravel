<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portals extends Model
{
    protected $table="portals";
    protected $primaryKey="id";
    protected $fillable =['name','email','mobile','password','status'];
}
