<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\Book;
use App\Models\Member;
use Faker\Factory as Faker;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua ID dari buku dan member yang ada
        $bookIds = Book::pluck('id')->toArray();
        $memberIds = Member::pluck('id')->toArray();

        for ($i = 0; $i < 679; $i++) {
            $loanDate = $faker->dateTimeBetween('-1 years', 'now');
            $returnDate = (clone $loanDate)->modify('+3 days');
            $status = $faker->randomElement(['borrowed', 'returned', 'late']);

            Loan::create([
                'book_id' => $faker->randomElement($bookIds),
                'member_id' => $faker->randomElement($memberIds),
                'loan_date' => $loanDate->format('Y-m-d'),
                'return_date' => $returnDate->format('Y-m-d'),
                'actual_return_date' => $status != 'borrowed' ? $faker->dateTimeBetween($loanDate, $returnDate)->format('Y-m-d') : null,
                'status' => $status,
            ]);
        }
    }
}
