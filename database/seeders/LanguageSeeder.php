<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language = [
            [
                'name' => 'español',
                'label' => 'es'
            ],
            [
                'name' => 'english',
                'label' => 'en'
            ]
        ];
    
        foreach ($language as $languageData) {
            Language::create($languageData);
        };
    }
}
