<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'id' => 1,
            'name' => 'Muhasebe',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('departments')->insert([
            'id' => 2,
            'name' => 'Pazarlama',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('customers')->insert([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'gsm_no' => '905331234567',
            'department_id' => 1,
            'birthday' => '1987-12-10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('customers')->insert([
            'id' => 2,
            'name' => 'Mary Lee',
            'email' => 'mary@lee.com',
            'gsm_no' => '905331234568',
            'department_id' => 2,
            'birthday' => '1985-10-30',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
