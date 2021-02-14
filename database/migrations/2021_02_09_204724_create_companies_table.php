<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('company_email', 100)->unique();
            $table->string('company_name');
            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken();
            // $table->text('profile_photo_path')->nullable();
            $table->timestamps();

            $table->unique(['id','user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
        
        });

        // Schema::create('user_companies', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('company_id');
 
        //     $table->unique(['id','user_id']);

    
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
