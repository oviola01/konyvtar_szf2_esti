<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $books = response()->json(Book::all());
        return $books;
    }

    public function show($id){
        $book = response()->json(Book::find($id));
        return $book;
    }

    public function store(Request $request){
        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;
        $book->save();
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        $book->book_id = $request->book_id;
        $book->author = $request->author;
        $book->title = $request->title;
        $book->save();
    }
    public function destroy($id)
    {
        //find helyett a paraméter
        Book::find($id)->delete();
    }
}
