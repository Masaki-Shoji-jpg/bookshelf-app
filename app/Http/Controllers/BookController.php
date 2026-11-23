<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Genre;
class BookController extends Controller
{
    /**
     * 本の一覧画面を表示する
     *
     * @return View
     */
    public function index(): View
    {
        $books = Book::latest()->paginate(15);
        return view('books.index',compact('books'));

        //reviews_avg_rating　追加
    }

    /**
     * 本の編集画面を表示する
     *
     * @return View
     */
    public function create(): View
    {
        $genres = Genre::all();
        return view('books.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        Book::create($validated);

        return redirect()->route('books.index');
    }

    /**
     * 本の詳細画面を表示する
     *
     * @param  $id
     * @return View
     */
    public function show($id): View
    {
        $book = Book::findOrFail($id);

        return view('books.show',compact('book'));
    }

    /**
     * 本の編集画面を表示する
     *
     * @param  $id
     * @return View
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::all();;
        return view('books.edit',compact('book','genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request,$id)
    {
        $book = Book::findOrFail($id);

        Gate::authorize('update', $book);

        $validated = $request->validated();
        $book->update($validated);
        $book->genres()->sync($validated['genres']);

        return redirect()->route('books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->user_id !== auth()->id()) {
            abort(403);
        }
        $book->delete();
        return redirect()->route('books.index');
    }
}
