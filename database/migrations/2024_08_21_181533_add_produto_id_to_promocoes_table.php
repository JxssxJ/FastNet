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
        Schema::table('promocoes', function (Blueprint $table) {
            $table -> foreignId('produto_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promocoes', function (Blueprint $table) {
            $table -> foreignId('produto_id')->constrained()
            ->onDelete('cascade');
        });
    }
};
