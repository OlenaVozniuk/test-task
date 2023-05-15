<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory(2)->create();
        Admin::factory()->create([
            'email'    => 'admin@test.com',
            'name'     => 'Admin',
            'password' => Hash::make('12345')
        ]);

        Category::factory(10)->create();
    }
}
