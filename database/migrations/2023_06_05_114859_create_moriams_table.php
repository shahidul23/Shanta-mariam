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
        Schema::create('moriams', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('Program');
            $table->string('call_type');
            $table->string('agent_name');
            $table->integer('agent_id');
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moriams');
    }
};
