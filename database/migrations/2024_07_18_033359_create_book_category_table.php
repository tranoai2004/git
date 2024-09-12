<?php

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_category', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('book_id')->constrained()->onDelete('cascade');
            // $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Book::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['category_id','book_id']);

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_category');
    }
};
