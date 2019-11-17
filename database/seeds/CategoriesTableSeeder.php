<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'name' => 'Frituras',
        'description' => 'Cualquier cosa'
      ]);

      DB::table('categories')->insert([
        'name' => 'Dulces',
        'description' => 'Cualquier cosa'
      ]);

      DB::table('categories')->insert([
        'name' => 'Salado',
        'description' => 'Cualquier cosa'
      ]);
    }
}
