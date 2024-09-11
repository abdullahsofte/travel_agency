<?php

use App\Models\Welcome;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWelcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcomes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description');
            $table->string('image');
            $table->string('ip_address');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
        // create default one 
        $welcome = new Welcome();
        $welcome->title = 'title here';
        $welcome->description = 'text here';
        $welcome->image = 'no.png';
        $welcome->ip_address = '127.332.000';
        $welcome->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcomes');
    }
}
