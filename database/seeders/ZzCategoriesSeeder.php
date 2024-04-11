<?php

namespace Database\Seeders;

use App\Models\Zz\Categories;
use App\Models\Zz\Status;
use Illuminate\Database\Seeder;

class ZzCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Jantina', 'child' => [
                ['name' => 'Lelaki'],
                ['name' => 'Perempuan'],
                ['name' => 'Ragu'],
            ]],
        ];

        foreach ($data as $datum) {
            $category = Categories::updateOrCreate(['name' => $datum['name']]);

            if (isset($datum['child'])) {
                foreach ($datum['child'] as $child) {
                    $category->children()->updateOrCreate(['name' => $child['name']], $child);
                }
            }
        }
    }
}
