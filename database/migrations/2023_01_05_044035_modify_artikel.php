<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyArtikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
     public function up()
     {
         Schema::table('artikel', function (Blueprint $table) {
            
             $table->text('judul');
             $table->text('foto');
            
 
         });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('artikel', function (Blueprint $table) {
             $table->dropcolumn('judul');
             $table->dropcolumn('foto');
         });
     }
}
