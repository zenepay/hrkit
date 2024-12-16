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

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('title_name', 10)->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('full_name', 100)->nullable();
            $table->string('nick_name', 30)->nullable();
            $table->string('first_name_th', 50)->nullable();
            $table->string('last_name_th', 50)->nullable();
            $table->string('nick_name_th', 30)->nullable();
            $table->string('full_name_th', 100)->nullable();
            $table->string('gender', 10)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email', 100)->unique();
            $table->string('phone', 255)->nullable();
            $table->string('phone_hash', 255)->nullable();
            $table->string('national_id_no', 255)->nullable();
            $table->string('national_id_no_hash', 255)->nullable();
            $table->date('national_id_no_expiry_date')->nullable();
            $table->string('passport_no', 225)->nullable();
            $table->date('passport_no_expiry_date')->nullable();
            $table->string('photo_path')->nullable();
            $table->integer('age')->nullable();
            $table->string('nationality', 30)->nullable();
            $table->string('religion', 20)->nullable();
            $table->string('marital_status', 20)->nullable();
            $table->string('military_status', 20)->nullable();
            $table->string('contact_person1_name', 100)->nullable();
            $table->string('contact_person1_phone', 255)->nullable();
            $table->string('contact_person1_relation', 30)->nullable();
            $table->string('contact_person2_name', 100)->nullable();
            $table->string('contact_person2_phone', 255)->nullable();
            $table->string('contact_person2_relation', 30)->nullable();
            $table->string('address_house_no', 255)->nullable();
            $table->string('address_village', 100)->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_subdistrict')->nullable();
            $table->string('address_district')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_province', 50)->nullable();
            $table->string('address_postcode', 5)->nullable();
            $table->string('address_house_no_th', 255)->nullable();
            $table->string('address_village_th', 100)->nullable();
            $table->string('address_street_th')->nullable();
            $table->string('address_subdistrict_th')->nullable();
            $table->string('address_district_th')->nullable();
            $table->string('address_city_th')->nullable();
            $table->string('address_province_th', 50)->nullable();
            $table->string('address_postcode_th', 5)->nullable();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('division_id')->nullable()->constrained();
            $table->foreignId('department_id')->nullable()->constrained();
            $table->foreignId('supervisor_id')->nullable();
            $table->string('staff_no', 20)->nullable();
            $table->string('como_code', 20)->nullable();
            $table->foreignId('position_id')->nullable()->constrained();
            $table->foreignId('workplace_id')->nullable()->constrained();
            $table->date('start_date')->nullable();
            $table->integer('probation_days')->default(120);
            $table->date('pass_probation_date')->nullable();
            $table->string('security_hospital', 100)->nullable();
            $table->date('profident_fund_join_date')->nullable();
            $table->date('profident_fund_leave_date')->nullable();
            $table->string('status', 20)->nullable();
            $table->json('onboarding_checklist')->nullable();
            $table->json('tags')->nullable();
            $table->foreignId('updated_by_id')->nullable()->constrained('users');
            $table->integer('notify_to_hr')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_rehired')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
