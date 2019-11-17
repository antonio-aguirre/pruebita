<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // esto sirve para insertar datos en la base DB los seeds

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
