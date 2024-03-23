<?php

namespace Database\Seeders;
use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::factory()->count(5)->create();
        /*DB::table('categories')->insert([
            [
                'name'=>'Cate 5',
                'description'=>'Descripcion producto 5',
             
            ],
            [
                'name'=>'Cate 6',
                'description'=>'Descripcion producto 6',
               
            ], [
                'name'=>'Cate 7',
                'description'=>'Descripcion producto 6',
                
            ],[
                'name'=>'Cate 8',
                'description'=>'Descripcion producto 6',
              
            ],[
                'name'=>' 9',
                'description'=>'Descripcion producto 6',
               
            ]
            ]);*/
    }
}
