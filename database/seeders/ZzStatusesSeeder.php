<?php

namespace Database\Seeders;

use App\Models\Zz\Status;
use Illuminate\Database\Seeder;

class ZzStatusesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Perkahwinan', 'child' => [
                ['name' => 'Bujang'],
                ['name' => 'Berkahwin'],
                ['name' => 'Bercerai'],
                ['name' => 'Bercerai Mati'],
            ]],
            ['name' => 'Pekerjaan', 'child' => [
                ['name' => 'Bekerja'],
                ['name' => 'Kerja Sendiri'],
                ['name' => 'Tidak Bekerja'],
            ]],
        ];

        foreach ($data as $datum) {
            $status = Status::updateOrCreate(['name' => $datum['name']]);

            if (isset($datum['child'])) {
                foreach ($datum['child'] as $child) {
                    $status->children()->updateOrCreate(['name' => $child['name']], $child);
                }
            }
        }
    }
}
