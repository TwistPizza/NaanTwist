<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('our_deals', function (Blueprint $table) {
            $table->string('section')->after('id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('our_deals', function (Blueprint $table) {
            $table->dropColumn('section');
        });
    }
};