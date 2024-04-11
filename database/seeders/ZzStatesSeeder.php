<?php

namespace Database\Seeders;

use App\Models\Zz\State;
use Illuminate\Database\Seeder;

class ZzStatesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'ddsa_code'  => '01',
                'short_name' => 'JOHOR',
                'name'       => 'JOHOR DARUL TAKZIM',
            ],
            [
                'ddsa_code'  => '02',
                'short_name' => 'KEDAH',
                'name'       => 'KEDAH DARUL AMAN',
            ],
            [
                'ddsa_code'  => '03',
                'short_name' => 'KELANTAN',
                'name'       => 'KELANTAN DARUL NAIM',
            ],
            [
                'ddsa_code'  => '04',
                'short_name' => 'MELAKA',
                'name'       => 'MELAKA',
            ],
            [
                'ddsa_code'  => '05',
                'short_name' => 'NEGERI SEMBILAN',
                'name'       => 'NEGERI SEMBILAN DARUL KHUSUS',
            ],
            [
                'ddsa_code'  => '06',
                'short_name' => 'PAHANG',
                'name'       => 'PAHANG DARUL MAKMUR',
            ],
            [
                'ddsa_code'  => '07',
                'short_name' => 'PULAU PINANG',
                'name'       => 'PULAU PINANG PULAU MUTIARA',
            ],
            [
                'ddsa_code'  => '08',
                'short_name' => 'PERAK',
                'name'       => 'PERAK DARUL RIDZUAN',
            ],
            [
                'ddsa_code'  => '09',
                'short_name' => 'PERLIS',
                'name'       => 'PERLIS INDERA KAYANGAN',
            ],
            [
                'ddsa_code'  => '10',
                'short_name' => 'SELANGOR',
                'name'       => 'SELANGOR DARUL EHSAN',
            ],
            [
                'ddsa_code'  => '11',
                'short_name' => 'TERENGGANU',
                'name'       => 'TERENGGANU DARUL IMAN',
            ],
            [
                'ddsa_code'  => '12',
                'short_name' => 'SABAH',
                'name'       => 'SABAH',
            ],
            [
                'ddsa_code'  => '13',
                'short_name' => 'SARAWAK',
                'name'       => 'SARAWAK',
            ],
            [
                'ddsa_code'  => '14',
                'short_name' => 'WPKL',
                'name'       => 'WILAYAH PERSEKUTUAN (KL)',
            ],
            [
                'ddsa_code'  => '15',
                'short_name' => 'WPLB',
                'name'       => 'WILAYAH PERSEKUTUAN (LABUAN)',
            ],
            [
                'ddsa_code'  => '16',
                'short_name' => 'WPPJ',
                'name'       => 'WILAYAH PERSEKUTUAN (PUTRAJAYA)',
            ],
        ];

        foreach ($data as $datum) {
            State::firstOrCreate($datum);
        }
    }
}
