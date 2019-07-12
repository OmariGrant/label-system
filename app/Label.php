<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //
    protected $fillable = [
        'id', 'Name', 'Slug', 'Path', 'TextColour', 'BGColour'
    ];

    public function children()
    {
        return $this->belongsTo('App\Label', 'id');
    }

    public function parent()
    {
        return $this->hasMany('App\Label', 'id');
    }
}
