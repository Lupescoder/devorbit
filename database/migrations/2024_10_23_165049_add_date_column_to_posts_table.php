<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('relevance')->after('description'); 
            $table->string('category')->after('relevance'); 
            $table->string('author')->after('category'); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('relevance');
            $table->dropColumn('category');
            $table->dropColumn('author');
        });
    }
};
