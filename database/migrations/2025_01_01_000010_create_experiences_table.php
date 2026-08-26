<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company', 150);
            $table->string('position', 150)->nullable();
            $table->string('start_date', 20)->nullable();
            $table->string('end_date', 20)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
