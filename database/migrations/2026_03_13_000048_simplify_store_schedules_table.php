<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('store_schedules', function (Blueprint $table) {
            // Purane dine_in & take_out columns drop kar do
            $table->dropColumn(['dine_in_open', 'dine_in_close', 'take_out_open', 'take_out_close']);
            
            // Sirf ek general open/close time add karo
            $table->time('open_time')->after('day');
            $table->time('close_time')->after('open_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_schedules', function (Blueprint $table) {
            $table->time('dine_in_open')->after('day');
            $table->time('dine_in_close')->after('dine_in_open');
            $table->time('take_out_open')->after('dine_in_close');
            $table->time('take_out_close')->after('take_out_open');

            $table->dropColumn(['open_time', 'close_time']);
        });
    }
};