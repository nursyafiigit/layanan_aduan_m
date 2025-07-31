<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\MemberProfile;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 58; $i++) {
            // 1. Buat Member
            $member = Member::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
            ]);

            // 2. Buat Member Profile terkait
            MemberProfile::create([
                'member_id' => $member->id,
                'address' => $faker->address,
                'phone_number' => $member->phone_number, // bisa sama
                'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'dob' => $faker->date('Y-m-d'),
                'status_pendidikan' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2']),
            ]);
        }
    }
}
