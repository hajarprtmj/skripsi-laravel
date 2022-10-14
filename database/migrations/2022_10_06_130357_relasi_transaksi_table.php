<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->nullable();
            $table->foreign('id')->references('id')->on('users');
            $table->unsignedBigInteger('id_menu')->nullable();
            $table->foreign('id_menu')->references('id_menu')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('users');
            $table->dropForeign(['id']);
            $table->string('menu');
            $table->dropForeign(['id_menu']);
        });
    }
};
