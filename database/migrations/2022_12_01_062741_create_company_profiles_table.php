<?php

use App\Models\CompanyProfile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('com_name', 100);
            $table->string('phone', 20);
            $table->string('phone_two', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('address');
            $table->text('footer_text')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('logo')->default('no.png');
            $table->text('map')->nullable();
            $table->timestamps();
        });

        // create default one 
        $content = new CompanyProfile();
        $content->com_name = 'test name';
        $content->phone = '01700000000';
        $content->email = 'info@bestgoods.com';
        $content->address = 'Mirpur 10 (Behind Shah Ali Plaza), Dhaka-1216';
        $content->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
}
