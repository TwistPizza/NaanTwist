<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Main deals table - store_id nahi hoga
        Schema::create('our_deals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });

        // Pivot table - deal aur store ka link
        Schema::create('our_deal_store', function (Blueprint $table) {
            $table->id();
            $table->foreignId('our_deal_id')->constrained('our_deals')->cascadeOnDelete();
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('our_deal_store');
        Schema::dropIfExists('our_deals');
    }
};