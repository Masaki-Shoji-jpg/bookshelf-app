<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Review;
class ReviewController extends Controller
{
    public function store(ReviewRequest $request,$id)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['book_id'] = $id;
        Review::create($validated);

        return redirect()->route('books.show',$id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request,$id)
    {
        $review = Review::findOrFail($id);
        $id = $review->book->id;

        $validated = $request->validated();
        $review->update($validated);

        return redirect()->route('books.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $id = $review->book->id ;

        $review->delete();
        return redirect()->route('books.show',$id);
    }

    public function toggle(Review $review): RedirectResponse
    {
        Auth::user()->likedReviews()->toggle($review->id);
        return back();
    }
}
