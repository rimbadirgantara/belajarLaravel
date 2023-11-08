<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('berita')->insert([
            'judul' => 'Penangan Perkara 01',
            'isi' => 'Penangan Perkara 01 di bumi pertiwi',
            'foto' => 'https://thumb.tvonenews.com/thumbnail/2023/10/03/651bc01549984-kejagung-geledah-kantor-kemendag-terkait-dugaan-kasus-korupsi-impor-gula-periode-2021-2023_375_211.jpg'
        ]);
    }
}
