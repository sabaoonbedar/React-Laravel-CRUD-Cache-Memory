<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeDetails;
use Faker\Generator as Faker;

$factory->define(EmployeeDetails::class, function (Faker $faker) {
    return [


            'salarytype_id' => function(){
                           return \App\SalaryType::all()->random();
                         },
            'department_id' => function(){
                            return \App\Department::all()->random();
                         },
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'email' => $faker->unique()->safeEmail(),
            'phone' => $faker->unique()->numerify('###########'),
            'work_hours' =>  $faker->unique()->numberBetween($min = 1, $max = 150),
            'salary' => $faker->unique()->numberBetween($min = 7000, $max = 40000),



    ];
});
