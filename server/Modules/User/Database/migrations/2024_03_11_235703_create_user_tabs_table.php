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
        Schema::create('user_tabs', function (Blueprint $table) {
            $table->id();
            $table->char('email', 30)->unique();
            $table->char('username', 25);
            $table->string('password');
            $table->unsignedInteger('m_country_tabs_id')->nullable();
            $table->timestamps();
            $table->foreign('m_country_tabs_id')->references('id')->on('m_country_tabs')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tabs');
    }
};
