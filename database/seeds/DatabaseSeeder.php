<?php

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
        // $this->call(UserSeeder::class);
        // Panggil data penerbit
        $this->call(Penerbit::class);
        // Panggil data Buku
        $this->call(BukuSeeder::class);
    }
}
