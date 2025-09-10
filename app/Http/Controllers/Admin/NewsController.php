<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\News;
use Illuminate\View\View;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $news = News::paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('img')) {
                $validated['img'] = $request->file('img')->store('news', 'public');
            }

            if ($request->hasFile('author_img')) {
                $validated['author_img'] = $request->file('author_img')->store('news/authors', 'public');
            }

            News::create($validated);

            Session::flash('msg.success', 'News created successfully.');
            return redirect()->route('admin.news.index');

        } catch (Exception $e) {
            Session::flash('msg.error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, NewsRequest $request): RedirectResponse
    {
        try {
            $news = News::findOrFail($id);
            $validated = $request->validated();

            // Handle file uploads for update
            if ($request->hasFile('img')) {
                Storage::disk('public')->delete($news->img);
                $validated['img'] = $request->file('img')->store('news', 'public');
            }

            if ($request->hasFile('author_img')) {
                Storage::disk('public')->delete($news->author_img);
                $validated['author_img'] = $request->file('author_img')->store('news/authors', 'public');
            }

            $news->update($validated);

            Session::flash('msg.success', 'News updated successfully.');
            return redirect()->route('admin.news.index');

        } catch (Exception $e) {
            Session::flash('msg.error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $news = News::findOrFail($id);

        if ($news->img) {
            Storage::disk('public')->delete($news->img);
        }
        if ($news->author_img) {
            Storage::disk('public')->delete($news->author_img);
        }

        $news->delete();

        Session::flash('msg.success', 'News deleted successfully.');
        return redirect()->route('admin.news.index');
    }
}
