<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirbusTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airbus_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
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
        Schema::dropIfExists('airbus_types');
    }
}
