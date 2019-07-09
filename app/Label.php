<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //
    protected $fillable = [
        'id', 'Name', 'Slug', 'Path', 'TextColour', 'BGColour', 'created_at', 'updated_at'
    ];
}
