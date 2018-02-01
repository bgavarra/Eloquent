<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use softDeletes;
    protected $guarded = [];

}
