<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirbusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airbuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airbusType_id')
            ->constrained('airbus_types')
            ->onDelete('cascade');
            $table->string('name', 100);
            $table->string('company_name', 100);
            $table->text('description')->nullable();
            $table->string('image');
            $table->string('ip_address');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->string('status', 1)->default('a');
            $table->softDeletes();
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
        Schema::dropIfExists('airbuses');
    }
}
