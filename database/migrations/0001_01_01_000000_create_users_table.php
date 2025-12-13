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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->decimal('umur')->nullable()->default(0);
            $table->decimal('kelamin')->nullable()->default(0);
            $table->decimal('berat_badan')->nullable()->default(0);
            $table->decimal('tinggi_badan')->nullable()->default(0);
            $table->decimal('seberapa_aktif')->nullable()->default(0);
            $table->decimal('sakit_diabetes')->nullable()->default(0);
            $table->decimal('waktu_tidur')->nullable()->default(0);
            $table->decimal('limit_protein', 8, 2)->nullable()->default(1000);
            $table->decimal('limit_karbo', 8, 2)->nullable()->default(1000);
            $table->decimal('limit_kalori', 8, 2)->nullable()->default(100);
            $table->decimal('current_protein', 8, 2)->nullable()->default(0);
            $table->decimal('current_karbo', 8, 2)->nullable()->default(0);
            $table->decimal('current_kalori', 8, 2)->nullable()->default(0);
            $table->json('food_today')->default('[]');
            $table->rememberToken();
            $table->timestamps();
            $table->date('last_reset_date')->nullable();
            
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        
        Schema::create('sleep_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('sleep_time')->nullable();   // jam tidur user
            $table->time('wake_time')->nullable();    // dicatat saat klik "Bangun"
            $table->integer('sleep_minutes')->nullable(); // hasil durasi
            $table->integer('quality')->nullable(); // persentase kualitas
            $table->timestamps();
        });

        
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('sleep_records');
    }
};
