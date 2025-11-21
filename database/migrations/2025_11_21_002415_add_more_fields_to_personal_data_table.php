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
        Schema::table('personal_data', function (Blueprint $table) {
            $table->dropColumn('birth_date');
            $table->date('date_of_birth')->after('phone')->nullable();
            $table->renameColumn('skills', 'skills_and_expertise');
            $table->renameColumn('experience', 'work_experience');
            $table->string('profile_photo')->nullable()->after('education');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_data', function (Blueprint $table) {
            $table->dropColumn('profile_photo');
            $table->renameColumn('skills_and_expertise', 'skills');
            $table->renameColumn('work_experience', 'experience');
            $table->dropColumn('date_of_birth');
            $table->string('birth_date')->after('phone');
        });
    }
};
