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
    public function up(){
        Schema::create('tb_iak', function (Blueprint $table) {
            $table->string('ref_id')->primary();
            $table->string('no_telp');
            $table->string('provider');
            $table->string('prod_code');
            $table->string('price');
            $table->string('tr_id');
            $table->string('status');
            $table->string('sn')->nullable();
            $table->string('success_at')->nullable();
            $table->string('sign')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tb_iak');
    }
};
