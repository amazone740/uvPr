<?php

use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
      while($i<10){
        $i++;
        DB::table('users')
           ->insert([
               'name'=>"gildasLedoux$i",
               "email"=>"gildas$i@gmail.fr",
               "password"=>bcrypt('0000')
           ]);
           
       } 

        
        //
    }
}
