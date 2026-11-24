<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Models\Book;
class GenreController extends Controller
{
    /**
     * ジャンルの一覧画面を表示する
     *
     * @return View
     */
    public function index(): View
    {
        $genres = Genre::withCount('books')->get();
        return view('genres.index',compact('genres'));
    }

    /**
     * ジャンルの新規登録画面を表示する
     *
     * @return View
     */
    public function create(): View
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        $validated = $request->validated();
        Genre::create($validated);
        return redirect()->route('genres.index');
    }

    /**
     * ジャンルの詳細画面を表示する
     *
     * @return View
     */
    public function show($id): View
    {
        $genre = Genre::findOrFail($id);
        $books = $genre->books()->paginate(10);
        return view('genres.show',compact('genre','books'));
    }

    /**
     * ジャンルの編集画面を表示する
     *
     * @return View
     */
    public function edit($id): View
    {
        $genre = Genre::findOrFail($id);
        return view('genres.edit',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request,$id)
    {
        $genre = Genre::findOrFail($id);
        $validated = $request->validated();
        $genre->update($validated);

        return redirect()->route('genres.show', $genre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);

        $genre->delete();
        return redirect()->route('genres.index');
    }
}
