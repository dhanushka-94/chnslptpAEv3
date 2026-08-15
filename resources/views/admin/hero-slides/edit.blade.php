@extends('admin.layout')

@section('title', 'Edit Homepage Slide')

@section('content')
<div class="max-w-2xl space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Slide</h1>
        <p class="text-gray-600">Update banner image, link, or order</p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.hero-slides.update', $slide) }}" method="POST" enctype="multipart/form-data"
          class="bg-white border border-gray-200 rounded-xl p-6 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-gray-800 mb-2">Current image</label>
            <img src="{{ $slide->image_url }}" alt="{{ $slide->alt_text }}" class="h-40 w-full max-w-md object-cover rounded-lg border border-gray-200">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-800 mb-2">Replace image</label>
            <input type="file" name="image" accept="image/*"
                   class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
            <p class="mt-1 text-xs text-gray-500">Leave empty to keep the current image.</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-800 mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $slide->title) }}"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-800 mb-2">Alt text</label>
            <input type="text" name="alt_text" value="{{ old('alt_text', $slide->alt_text) }}"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-800 mb-2">Link URL</label>
            <input type="text" name="link_url" value="{{ old('link_url', $slide->link_url) }}"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500"
                   placeholder="/promotions or https://...">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">Sort order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $slide->sort_order) }}" min="0"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
            </div>
            <div class="flex items-end pb-2">
                <label class="inline-flex items-center gap-2 text-sm text-gray-800">
                    <input type="checkbox" name="is_active" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500" {{ old('is_active', $slide->is_active) ? 'checked' : '' }}>
                    Active on homepage
                </label>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-lg font-medium">Update slide</button>
            <a href="{{ route('admin.hero-slides.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </div>
    </form>
</div>
@endsection
