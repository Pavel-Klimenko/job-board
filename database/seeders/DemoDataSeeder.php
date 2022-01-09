<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DemoDataSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RolesTableSeeder::class,
            JobCategoriesTableSeeder::class,
            UsersTableSeeder::class,
            VacanciesTableSeeder::class,
            ReviewsTableSeeder::class,
            AdvicesTableSeeder::class,
        ]);
    }
}
