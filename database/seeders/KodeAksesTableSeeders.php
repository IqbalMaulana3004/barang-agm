<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeAksesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_kode_akses')->insert([
            [
                'kode_akses' => 'KA-1',
                'user_akses' => 'Full Akses',
            ],
            [
                'kode_akses' => 'KA-2',
                'user_akses' => 'Manggala',
            ],
            [
                'kode_akses' => 'KA-3',
                'user_akses' => 'Sungai Puting',
            ],
            [
                'kode_akses' => 'KA-4',
                'user_akses' => 'Tatakan',
            ],
        ]);
    }
    
}
