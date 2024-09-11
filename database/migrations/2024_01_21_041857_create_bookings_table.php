<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
            ->constrained('customers')
            ->onDelete('cascade')
            ->nullable();
            $table->foreignId('from_location')
            ->constrained('locations')
            ->onDelete('cascade');
            $table->foreignId('to_location')
            ->constrained('locations')
            ->onDelete('cascade');
            $table->string('code', 10);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 18);
            $table->string('address');
            $table->string('country')->nullable();
            $table->string('area_city');
            $table->string('postal_code')->nullable();
            $table->string('nid_number', 18);
            $table->string('passport')->nullable();
            $table->string('child_number')->nullable();
            $table->string('adult_number')->nullable();
            $table->date('booking_date');
            $table->string('type');
            $table->text('note')->nullable();
            $table->string('agent_point')->default(0); 
            $table->string('status', 1)->default('p');
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
        Schema::dropIfExists('bookings');
    }
}
