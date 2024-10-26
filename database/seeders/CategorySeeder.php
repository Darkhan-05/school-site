<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Запуск сидера.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Тесты и опросы',
                'name_kk' => 'Тесттер мен сауалнамалар',
            ],
            [
                'name' => 'Информация для учителей',
                'name_kk' => 'Мұғалімдерге арналған ақпарат',
            ],
            [
                'name' => 'Информация для родителей',
                'name_kk' => 'Ата-аналарға арналған ақпарат',
            ],
            [
                'name' => 'События',
                'name_kk' => 'Оқиғалар',
            ],
            [
                'name' => 'Рекомендованные видео',
                'name_kk' => 'Ұсынылған бейнелер',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
