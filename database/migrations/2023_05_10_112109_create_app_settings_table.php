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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('refferal_comission')->default(env('DEFAULT_REFERRAL_COMISSION'));
            $table->integer('second_level_refferal_comission')->default(env('DEFAULT_SECOND_LEVEL_REFERRAL_COMISSION'));
            $table->integer('default_user_bal')->default(env('DEFAULT_BALANCE'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
