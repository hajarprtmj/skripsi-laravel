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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->dateTime('tanggal_transaksi');
            $table->text('pesanan');
            $table->string('tagihan');
            $table->integer('status_pembayaran')->default('1');
            $table->integer('kategori_pembayaran')->nullable();
            $table->string('foto_pembayaran')->nullable();
            $table->text('keterangan')->nullable();
            // Tambahan untuk payment gateway Midtrans
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('gross_amount')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('pdf_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
