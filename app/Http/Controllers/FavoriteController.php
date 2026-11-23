<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
class FavoriteController extends Controller
{
    public function index(): View
    {
        $books = Auth::user()->favoriteBooks()->latest()->paginate(10);
        return view('favorites.index',compact('books'));
    }

    public function toggle(Book $book): RedirectResponse
    {
        Auth::user()->favoriteBooks()->toggle($book->id);
        return back();
    }
}
