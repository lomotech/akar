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
        Schema::create('people', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('father_id')->nullable()->constrained('people');
            $table->foreignUlid('mother_id')->nullable()->constrained('people');
            $table->boolean('is_foster')->default(false);
            $table->foreignUlid('foster_father_id')->nullable()->constrained('people');
            $table->foreignUlid('foster_mother_id')->nullable()->constrained('people');
            $table->string('nickname')->nullable();
            $table->string('name');
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_death')->nullable();
            $table->unsignedTinyInteger('age')->nullable();
            $table->unsignedTinyInteger('birth_order')->nullable();
            $table->string('email')->nullable();
            $table->text('address');
            $table->foreignId('state_id')->nullable()->after('address')->constrained('zz_states');
            $table->foreignId('gender_id')->nullable()->after('state_id')->constrained('zz_categories');
            $table->softDeletes();
            $table->timestamps();
        });
    }
};
