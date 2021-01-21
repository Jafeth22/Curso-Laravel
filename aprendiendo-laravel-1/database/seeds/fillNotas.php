<?php

use Illuminate\Database\Seeder;

class fillNotas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 40; $i++){
            DB::table('notes')->insert([
                'title' => 'My Title Note '.$i,
                'description' => 'Description '.$i,
                'created_on' => date('Y/m/d H:i:s'),
                'updated_on' => NULL
            ]);
        }

        $this->command->info('Note table has been filled successfully');  
    }
}
