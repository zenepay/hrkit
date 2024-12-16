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
        Schema::disableForeignKeyConstraints();

        Schema::create('position_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->foreignId('company_id')->constrained();
            $table->decimal('level', 2, 1);
            $table->decimal('purchase_quota', 10, 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_levels');
    }
};
