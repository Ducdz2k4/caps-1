<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // ...existing code...
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        
    }

}
