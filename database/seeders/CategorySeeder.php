<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = [

            ['name'=>'مواد بناء'],
            
            ['name'=>'مستلزمات تنظيف'],
            ['name'=>'خشبيات'],
            ['name'=>'عدة بناء'],
        ];

        foreach ($cate as $value) {
            Category::create($value);
        }
    }
}
