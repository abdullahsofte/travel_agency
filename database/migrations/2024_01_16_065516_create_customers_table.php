<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 30)->nullable();
            $table->string('name', 100);
            $table->string('phone', 11);
            $table->string('email', 50)->nullable();
            $table->string('nid_number', 20)->nullable();
            $table->string('date_of_birth', 40)->nullable();
            $table->string('gender', 40)->nullable();
            $table->string('address')->nullable();
            $table->text('profile_picture')->nullable();
            $table->string('username', 20)->nullable();
            $table->string('password', 100);
            $table->string('status', 1)->default('a');
            $table->string('save_by', 3);
            $table->string('updated_by', 3);
            $table->softDeletes();
            $table->string('ip_address', 17);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
