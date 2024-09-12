<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        $this->call([
            UserDetailSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            CategorySeeder::class,
            BookCategorySeeder::class,
        ]);

        // Schema::disableForeignKeyConstraints();
        // Book::truncate();
        // Author::truncate();
        // Category::truncate();

        // for ($i = 0; $i < 10; $i++) {
        //     Category::query()->create([
        //     'name' => fake()->realText(10),
        //     ]);

        //     $Author=Author::query()->create([
        //         'name' => fake()->realText(10),
        //     ]);
        //     $Book=Book::query()->create([
        //         'title' => fake()->realText(10),
        //     ]);
        // }
        // Schema::enableForeignKeyConstraints();


        // $book = Book::find(1);

        // $categories = [5, 7, 10];

        // $book->categories()->attach($categories);

        // $book->categories()->detach([5,7]);

        // $book->categories()->sync([4, 3, 9]);//xoa

        // $book->categories()->toggle([5,9]);//co trong csdl thif xoas ddi
    }
}

//attach-> them vao csdl
