<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\JenisPendapatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;

use Illuminate\Support\Facades\Hash;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::create([
            'nama' => 'A',
            'username' => 'A',
            'password' => Hash::make('A'),
            'kontak' => '087889872637',
            'status' => 'Ketua',
        ]);
    }
}
