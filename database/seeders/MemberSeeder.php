<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::factory()
            ->count(25)
            ->hasShip(2)
            ->create();

        Member::factory()
            ->count(10)
            ->hasShip(5)
            ->create();
    }
}
