<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Service;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            // dd($validated);

            if ($request->hasFile('img')) {
                $validated['img'] = $request->file('img')->store('services', 'public');
            }

            Service::create($validated);

            Session::flash('msg.success', 'Service created successfully.');
            return redirect()->route('admin.services.index');

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Session::flash('msg.error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, ServiceRequest $request): RedirectResponse
    {
        try {
            $service = Service::findOrFail($id);
            $validated = $request->validated();

            if ($request->hasFile('img')) {
                if ($service->img) {
                    Storage::disk('public')->delete($service->img);
                }
                $validated['img'] = $request->file('img')->store('services', 'public');
            }

            $service->update($validated);

            Session::flash('msg.success', 'Service updated successfully.');
            return redirect()->route('admin.services.index');

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
        $service = Service::findOrFail($id);

        if ($service->img) {
            Storage::disk('public')->delete($service->img);
        }

        $service->delete();

        Session::flash('msg.success', 'Service deleted successfully.');
        return redirect()->route('admin.services.index');
    }
}
