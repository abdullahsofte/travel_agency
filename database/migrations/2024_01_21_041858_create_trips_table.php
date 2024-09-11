<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airbusType_id')
            ->constrained('airbus_types')
            ->onDelete('cascade');
            $table->foreignId('booking_id')
            ->constrained('bookings')
            ->onDelete('cascade');
            $table->foreignId('customer_id')
            ->constrained('customers')
            ->onDelete('cascade')
            ->nullable();
            $table->foreignId('airbus_id')
            ->constrained('airbuses')
            ->onDelete('cascade');
            $table->foreignId('class_id')
            ->constrained('trip_classes')
            ->onDelete('cascade');
            $table->date('start_date');
            $table->time('start_time');
            $table->decimal('price')->default(0);
            $table->decimal('discount')->default(0);
            $table->decimal('total_point')->default(0);
            $table->decimal('agent_point_amount')->default(0);
            $table->decimal('child_price')->default(0);
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('payment_type');
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
        Schema::dropIfExists('trips');
    }
}
