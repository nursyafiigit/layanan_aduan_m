<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1500; $i++) {
            Book::create([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'category_id' => rand(11, 35),
                'isbn' => $faker->isbn13,
                'published_at' => $faker->date(),
                'pages' => $faker->numberBetween(50, 1000),
                'available' => $faker->numberBetween(0, 100),
            ]);
        }
    }
}
