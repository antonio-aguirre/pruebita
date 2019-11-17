<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
          'name' => 'Chettos bolita',
          'price' => 10,
          'description' => 'Algo',
          'category_id' => 1
        ]);

        DB::table('products')->insert([
          'name' => 'Doritos',
          'price' => 10,
          'description' => 'Algo',
          'category_id' => 1
        ]);

        DB::table('products')->insert([
          'name' => 'Paleta',
          'price' => 10,
          'description' => 'Algo',
          'category_id' => 2
        ]);

        DB::table('products')->insert([
          'name' => 'Chocolate',
          'price' => 10,
          'description' => 'Algo',
          'category_id' => 2
        ]);

        DB::table('products')->insert([
          'name' => 'Cacahuates',
          'price' => 10,
          'description' => 'Algo',
          'category_id' => 3
        ]);

        DB::table('products')->insert([
          'name' => 'Habas',
          'price' => 10,
          'description' => 'Algo',
          'category_id' => 3
        ]);
    }
}
