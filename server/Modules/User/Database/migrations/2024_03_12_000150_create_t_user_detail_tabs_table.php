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
        Schema::create('t_user_detail_tabs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_tabs_id');
            $table->string('avatar')->nullable();
            $table->string('bio')->nullable();
            $table->string('description')->nullable();
            $table->mediumInteger('age');
            $table->unsignedBigInteger('m_club_tabs_id')->nullable();
            $table->unsignedTinyInteger('m_gender_tabs_id')->nullable();
            $table->foreign('m_club_tabs_id')->references('id')->on('m_club_tabs')->nullOnDelete();
            $table->foreign('m_gender_tabs_id')->references('id')->on('m_gender_tabs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_user_detail_tabs');
    }
};
