<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        DB::table('company')->truncate();
        DB::table('company')->insert(
            [
                ['company_name' => 'PT Maju Mundur', 'created_at' => $time, 'updated_at' => $time],
                ['company_name' => 'PT Juga Lagi', 'created_at' => $time, 'updated_at' => $time],
                ['company_name' => 'PT Kamu Lagi', 'created_at' => $time, 'updated_at' => $time],

            ]
        );
    }
}
