<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            LevelSeeder::class,
            UserSeeder::class,
            KKSeeder::class,
            RTSeeder::class,
            // DomisiliSeeder::class,
            PendudukSeeder::class,
            KegiatanSeeder::class,
            InventarisSeeder::class,
            PengaduanSeeder::class,
            PinjamInventarisSeeder::class,
        ]);
    }
}
