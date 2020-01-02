<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
            ['id'=>1,'product_code'=>'SP01','name'=>'Áo nam da thật MX105','price'=>500000,'featured'=>1,'state'=>1,'img'=>'blog-1.jpg','category_id'=>2],
            ['id'=>2,'product_code'=>'SP02','name'=>'Áo thun có cổ','price'=>500000,'featured'=>1,'state'=>0,'img'=>'blog-3.jpg','category_id'=>2],
            ['id'=>3,'product_code'=>'SP03','name'=>'Quần âu nam','price'=>500000,'featured'=>0,'state'=>1,'img'=>'item-8.jpg','category_id'=>3],
            ['id'=>4,'product_code'=>'SP04','name'=>'Áo nữ có cổ viền tay xinh xinh','price'=>500000,'featured'=>1,'state'=>1,'img'=>'item-14.jpg','category_id'=>3],
            ['id'=>5,'product_code'=>'SP05','name'=>'Quần nữ xuông ống rộng','price'=>500000,'featured'=>1,'state'=>1,'img'=>'item-15.jpg','category_id'=>7]

        ]);
    }
}
