<?php

use App\Models\Benifite;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenifitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benifites', function (Blueprint $table) {
            $table->id();
            $table->string('title_one', 100);
            $table->text('description')->nullable();
            $table->string('title_two', 100);
            $table->text('description_two')->nullable();
            $table->string('title_three', 100);
            $table->text('description_three')->nullable();
            $table->string('title_four', 100);
            $table->text('description_four')->nullable();
            $table->string('image')->nullable();
            $table->string('status', 1)->default('a');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });

        $benefit = new Benifite();
        $benefit->title_one = 'Title One';
        $benefit->title_two = 'Title One';
        $benefit->title_three = 'Title One';
        $benefit->title_four = 'Title One';
        $benefit->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benifites');
    }
}
