<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Partner;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(): View
    {
        $partners = Partner::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    public function create(): View
    {
        return view('admin.partners.create');
    }

    public function store(PartnerRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail_img')) {
                $validated['thumbnail_img'] = $request->file('thumbnail_img')->store('partners/thumbnails', 'public');
            }

            if ($request->hasFile('logo')) {
                $validated['logo'] = $request->file('logo')->store('partners/logos', 'public');
            }

            Partner::create($validated);

            Session::flash('msg.success', 'Partner created successfully.');
            return redirect()->route('admin.partners.index');

        } catch (Exception $e) {
            Session::flash('msg.error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit(int $id): View
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(int $id, PartnerRequest $request): RedirectResponse
    {
        try {
            $partner = Partner::findOrFail($id);
            $validated = $request->validated();

            if ($request->hasFile('thumbnail_img')) {
                Storage::disk('public')->delete($partner->thumbnail_img);
                $validated['thumbnail_img'] = $request->file('thumbnail_img')->store('partners/thumbnails', 'public');
            }

            if ($request->hasFile('logo')) {
                Storage::disk('public')->delete($partner->logo);
                $validated['logo'] = $request->file('logo')->store('partners/logos', 'public');
            }

            $partner->update($validated);

            Session::flash('msg.success', 'Partner updated successfully.');
            return redirect()->route('admin.partners.index');

        } catch (Exception $e) {
            Session::flash('msg.error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        $partner = Partner::findOrFail($id);

        if ($partner->thumbnail_img) {
            Storage::disk('public')->delete($partner->thumbnail_img);
        }

        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        Session::flash('msg.success', 'Partner deleted successfully.');
        return redirect()->route('admin.partners.index');
    }
}
