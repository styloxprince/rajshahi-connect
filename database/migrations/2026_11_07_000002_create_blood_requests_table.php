<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_token')->unique();
            $table->string('blood_group', 3)->index();
            $table->unsignedTinyInteger('bags')->default(1);
            $table->string('needed_when', 10); // now | today | tomorrow
            $table->string('hospital', 120);
            $table->string('phone', 11);
            $table->string('status', 15)->default('open')->index(); // open | fulfilled | cancelled | expired
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
