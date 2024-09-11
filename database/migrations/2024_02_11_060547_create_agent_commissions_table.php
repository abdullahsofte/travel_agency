<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
            ->constrained('customers')
            ->onDelete('cascade');
            $table->string('payment_type');
            $table->decimal('agent_point')->default(0);
            $table->decimal('amount')->nullable();
            $table->date('date');
            $table->text('note')->nullable();
            $table->decimal('balance_point')->nullable();
            $table->string('ip_address');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('agent_commissions');
    }
}
