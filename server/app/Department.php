<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    public function employee(){
        return $this->belongsTo(Employee::class);


    }


}
