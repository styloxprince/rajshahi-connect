<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 11)->unique();
            $table->string('blood_group', 3)->index();
            $table->string('area', 60)->index();
            $table->date('last_donated_at')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamp('consented_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
