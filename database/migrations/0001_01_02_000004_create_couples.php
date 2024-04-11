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
        Schema::create('entity_couples', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('husband_id')->constrained('entities');
            $table->foreignUlid('wife_id')->constrained('entities');
            $table->foreignId('marital_status_id')->nullable()->constrained('zz_statuses');
            $table->date('marriage_date')->nullable();
            $table->date('divorce_date')->nullable();
            $table->foreignId('divorce_type_id')->nullable()->constrained('zz_categories');
            $table->softDeletes();
            $table->timestamps();
        });
    }
};
