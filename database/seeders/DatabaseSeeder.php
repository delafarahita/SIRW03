<?php

namespace Database\Seeders;
use App\Models\BantuanSosialModel;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            LevelSeeder::class,
            UserSeeder::class,
            KKSeeder::class,
            RTSeeder::class,
            // DomisiliSeeder::class,
            PendudukSeeder::class,
            KegiatanSeeder::class,
            KasSeeder::class,
            InventarisSeeder::class,
            PengaduanSeeder::class,
            PinjamInventarisSeeder::class,
            UMKMSeeder::class,
            DataAlternatifSeeder::class,
            DataKriteriaSeeder::class,
            DataPenilaianSeeder::class,
            // Panggil seeder lain jika ada
        ]);
    }
}
