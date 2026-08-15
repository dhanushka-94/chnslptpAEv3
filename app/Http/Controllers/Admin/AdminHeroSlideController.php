<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminHeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::ordered()->get();

        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero-slides.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        unset($data['image']);
        $data['image_path'] = $request->file('image')->store('hero-slides', 'public');
        $data['sort_order'] = $data['sort_order'] ?? ((int) HeroSlide::max('sort_order') + 1);
        $data['is_active'] = $request->boolean('is_active', true);

        HeroSlide::create($data);

        return redirect()
            ->route('admin.hero-slides.index')
            ->with('success', 'Slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero-slides.edit', ['slide' => $heroSlide]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $data = $this->validated($request, false);
        unset($data['image']);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $this->deleteImageFile($heroSlide->image_path);
            $data['image_path'] = $request->file('image')->store('hero-slides', 'public');
        }

        $heroSlide->update($data);

        return redirect()
            ->route('admin.hero-slides.index')
            ->with('success', 'Slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $this->deleteImageFile($heroSlide->image_path);
        $heroSlide->delete();

        return redirect()
            ->route('admin.hero-slides.index')
            ->with('success', 'Slide deleted.');
    }

    public function toggle(HeroSlide $heroSlide)
    {
        $heroSlide->update(['is_active' => ! $heroSlide->is_active]);

        return back()->with('success', $heroSlide->is_active ? 'Slide activated.' : 'Slide deactivated.');
    }

    private function validated(Request $request, bool $imageRequired): array
    {
        return $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'link_url' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'is_active' => ['nullable', 'boolean'],
            'image' => [
                $imageRequired ? 'required' : 'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,gif',
                'max:5120',
            ],
        ]);
    }

    private function deleteImageFile(?string $path): void
    {
        if (! $path) {
            return;
        }

        if (Str::startsWith($path, 'images/')) {
            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
