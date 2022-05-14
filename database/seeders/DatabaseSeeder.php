<?php

namespace Database\Seeders;

use App\Models\Companies;
use App\Models\CompanyPackages;
use App\Models\CompanyPayments;
use App\Models\Packages;
use Facade\Ignition\Support\Packagist\Package;
use Faker\Provider\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $packages = Packages::factory(15)->create();

        $companies = Companies::factory(10)
            ->create()
            ->each(function ($item) {
                CompanyPackages::factory()
                    ->count(1)
                    ->for($item)
                    ->create();
                CompanyPayments::factory()
                    ->count(random_int(1, 30))
                    ->for($item)
                    ->create();
            });;

    }
}
