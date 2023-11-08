<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen')->insert([
            'nip' => 12002164,
            'nama' => 'Eva Kurniawaty, M.Kom',
            'nidn' => '9900008796',
            'program_study' => 'D2 Jalur Cepat Administrasi Jaringan Komputer',
        ]);
    }
}
