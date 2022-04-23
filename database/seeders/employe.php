<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class employe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employe = [
          
            ['id' => 1,'name' => 'Ram','created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['id' => 2,'name' => 'Mohan','created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['id' => 3,'name' => 'Sohan','created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['id' => 4,'name' => 'Anjeeli','created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['id' => 5,'name' => 'Geeta','created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
         ];
         
       \App\Models\employe::insert($employe);
    }
}
