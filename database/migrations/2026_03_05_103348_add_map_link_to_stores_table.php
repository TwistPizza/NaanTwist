<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            // Phone ke baad description add karo
            $table->text('description')->nullable()->after('phone');
            
            // Description ke baad map_link add karo
            $table->string('map_link')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['description', 'map_link']);
        });
    }
};