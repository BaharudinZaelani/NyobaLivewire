<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Book;

class Books extends Component
{
    #[Validate('required')]
    public $title = "";
    #[Validate('required')]
    public $description = "";
    public function save()
    {
        $this->validate();
        try {
            Book::create($this->only(["title", "description"]));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function remove($id)
    {
        try {
            Book::destroy($id);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function render()
    {
        $books = Book::all();
        return view('livewire.books', compact("books"));
    }
}
