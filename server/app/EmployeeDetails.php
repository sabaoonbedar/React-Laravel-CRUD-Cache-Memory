<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\EmployeeCreated;

class EmployeeDetails extends Model
{
 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email','work_hours','salarytype_id','salary','department_id'
    ];



public function department(){

    return $this->hasOne(Department::class);

}



protected $dates = [
    'created_at'
  ];

protected $dispatchesEvents = [
    'created' => EmployeeCreated::class //When a post is created then this Event will be fired
  ];

}
