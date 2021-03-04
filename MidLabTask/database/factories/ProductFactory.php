<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'product_name' => $faker->name,
        'vendor_id' => $faker->randomElement(['1','2','3']),
        'category' => $faker->randomElement(['Liquid','Vegetable','Meat','Makeup','Grocery']),
        'unit_price' => $faker->numberBetween(1,99),
        'quantity' => $faker->numberBetween(1,1000),
        'status' => $faker->randomElement(['upcoming','existing']),
        'date_added' => $faker->dateTimeBetween('-2 years','now','Asia/Dhaka'),



    ];
});
