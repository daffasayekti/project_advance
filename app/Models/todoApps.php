<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class todoApps extends Model
{
    protected $connection = "mongodb";
    protected $collection = "todoApps";
    protected $fillable   = ["title", "description", "assigned"];
}
