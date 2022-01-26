<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seedling extends Model
{

    protected $fillable = ['name', 'cover_image', 'description', 'type'];

}
