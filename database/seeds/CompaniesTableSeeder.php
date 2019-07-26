<?php

use Illuminate\Database\Seeder;
use App\Company;
use Carbon\Carbon;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Company::truncate();

        for ($i=1; $i <= 100; $i++) {
            Company::create([
                'name' => "Company {$i}",
                'email' => "company{$i}@company.com",
                'logo' => "default.png",
                'website' => "company{$i}.com",
                'created_at' => Carbon::now()->subDays(100)->addDays($i)
            ]);
        }
    }
}
