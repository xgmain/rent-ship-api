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
        Schema::create('roasts', function (Blueprint $table) {
            $table->id();
            $table->integer('ship_id')->references("id")->on("ships")->onDelete('cascade');
            $table->boolean('availability')->default(true);
            $table->integer('capacity');
            $table->integer('owner_id')->references('id')->on("customers")->onDelete('cascade');
            $table->integer('bank_account');
            $table->string('target_fish');
            $table->string('wish_fish');
            $table->text('our_support');
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
        Schema::dropIfExists('roasts');
    }
};
