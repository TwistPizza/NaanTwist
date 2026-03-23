<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exclusive_deals_store_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id'); // store reference
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exclusive_deals_store_user');
    }
};