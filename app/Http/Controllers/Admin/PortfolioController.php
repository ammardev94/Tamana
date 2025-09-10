<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\View\View;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PortfolioRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $portfolios = Portfolio::paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create(): View
    {
        return view('admin.portfolio.create');
    }

    public function store(PortfolioRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail_img')) {
                $validated['thumbnail_img'] = $request->file('thumbnail_img')->store('portfolio/thumbnails', 'public');
            }

            if ($request->hasFile('images')) {
                $validated['images'] = collect($request->file('images'))
                    ->map(fn($file) => $file->store('portfolio/images', 'public'))
                    ->toArray();
            }

            Portfolio::create($validated);

            Session::flash('msg.success', 'Portfolio created successfully.');
            return redirect()->route('admin.portfolio.index');

        } catch (Exception $e) {
            Session::flash('msg.error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit(int $id): View
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(int $id, PortfolioRequest $request): RedirectResponse
    {
        try {
            $portfolio = Portfolio::findOrFail($id);
            $validated = $request->validated();

            if ($request->hasFile('thumbnail_img')) {
                Storage::disk('public')->delete($portfolio->thumbnail_img);
                $validated['thumbnail_img'] = $request->file('thumbnail_img')->store('portfolio/thumbnails', 'public');
            }

            if ($request->hasFile('images')) {
                if (is_array($portfolio->images)) {
                    foreach ($portfolio->images as $img) {
                        Storage::disk('public')->delete($img);
                    }
                }
                $validated['images'] = collect($request->file('images'))
                    ->map(fn($file) => $file->store('portfolio/images', 'public'))
                    ->toArray();
            }

            $portfolio->update($validated);

            Session::flash('msg.success', 'Portfolio updated successfully.');
            return redirect()->route('admin.portfolio.index');

        } catch (Exception $e) {
            Session::flash('msg.error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->thumbnail_img) {
            Storage::disk('public')->delete($portfolio->thumbnail_img);
        }

        if (is_array($portfolio->images)) {
            foreach ($portfolio->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $portfolio->delete();

        Session::flash('msg.success', 'Portfolio deleted successfully.');
        return redirect()->route('admin.portfolio.index');
    }
}
