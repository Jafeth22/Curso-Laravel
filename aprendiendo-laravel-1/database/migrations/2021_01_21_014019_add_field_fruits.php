<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldFruits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //To ALTER a table
        // Schema::table('fruits', function (Blueprint $table) {
        //     $table->string('typeFruit')->after('amount');
        //     $table->renameColumn('fruitName','name');
        // });
        DB::statement('
            CREATE TABLE testSQL(
                ID INTEGER PRIMARY KEY auto_increment,
                publish INTEGER
            );
        '); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('fruits');
    }   
}
