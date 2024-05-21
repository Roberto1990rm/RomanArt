<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the artwork
            $table->string('image'); // Primary image, required
            $table->string('image1')->nullable(); // Additional image 1, optional
            $table->string('image2')->nullable(); // Additional image 2, optional
            $table->string('image3')->nullable(); // Additional image 3, optional
            $table->string('image4')->nullable(); // Additional image 4, optional
            $table->text('description')->nullable(); // Description of the artwork
            $table->decimal('price', 10, 2); // Price of the artwork
            $table->string('dimensions')->nullable(); // Dimensions of the artwork
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artworks');
    }
}
