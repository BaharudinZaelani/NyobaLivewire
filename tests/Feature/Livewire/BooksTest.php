<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Books;
use App\Models\Book;
use Livewire\Livewire;
use Tests\TestCase;

class BooksTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Books::class)
            ->assertStatus(200);
    }

    /** @test */
    public function display_book()
    {
        Book::create(["title" => "Lorem 1", "description" => "lorem ipsum dolor sit memet"]);
        Livewire::test(Books::class)
            ->assertSee("Lorem 1")
            ->assertSee("lorem ipsum dolor sit memet");
    }

    /** @test */
    public function display_all_books()
    {
        Book::create(
            ["title" => "Lorem 1", "description" => "lorem ipsum dolor sit memet"],
            ["title" => "Lorem 2", "description" => "lorem ipsum dolor sit memet"]
        );
        Livewire::test(Books::class)
            ->assertViewHas("books", function ($books) {
                return count($books) == 2;
            });
    }

    /** @test */
    public function title_field_is_required()
    {
        Livewire::test(Books::class)
            ->set('title', '')
            ->set('description', '')
            ->call('save')
            ->assertHasErrors('title');
    }
}
