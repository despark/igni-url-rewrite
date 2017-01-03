<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlRewritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('url_rewrites', function (Blueprint $table) {
            $range = range(300, 308);

            $table->increments('id');
            $table->text('from')->comment = 'Requested url';
            $table->text('to')->comment = 'Url to redirect to';
            $table->enum('http_redirect_code', $range)->comment = 'What redirect code to return to the client';
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
        Schema::dropIfExists('url_rewrites');
    }
}
