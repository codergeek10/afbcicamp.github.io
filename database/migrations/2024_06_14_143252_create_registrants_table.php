<?php

use App\Models\Role;
use App\Models\Church;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id');
            $table->string('registration_Code')->unique();
            $table->string('order_id')->unique()->nullable();
            $table->string('status')->default('Unconfirmed')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('gender');
            $table->string('age_group');
            $table->string('illness');
            $table->text('illness_type')->nullable();
            $table->string('contact_1_name');
            $table->string('contact_1_phone');
            $table->string('contact_2_name')->nullable();
            $table->string('contact_2_phone')->nullable();
            $table->string('membership');
            $table->foreignIdFor(Church::class, 'church_id');
            $table->string('attendance');
            $table->foreignIdFor(Role::class, 'role_id');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('registrants');
    }
};
