@extends('admin.layout')

@section('title', 'Homepage Sliders')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Homepage Sliders</h1>
            <p class="text-gray-600">Upload and manage hero banner slides shown on the homepage</p>
        </div>
        <a href="{{ route('admin.hero-slides.create') }}"
           class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white px-4 py-2.5 rounded-lg transition-colors">
            <i class="fas fa-plus mr-2"></i>Add Slide
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($slides->isEmpty())
        <div class="bg-white border border-gray-200 rounded-xl p-10 text-center">
            <p class="text-gray-600 mb-4">No slides yet. Add your first homepage banner.</p>
            <a href="{{ route('admin.hero-slides.create') }}" class="text-red-600 font-semibold hover:underline">Create slide</a>
        </div>
    @else
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Preview</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Title</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Link</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Order</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($slides as $slide)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <img src="{{ $slide->image_url }}" alt="{{ $slide->alt_text }}"
                                         class="h-16 w-28 object-cover rounded-lg border border-gray-200">
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-medium text-gray-900">{{ $slide->title ?: 'Untitled' }}</div>
                                    <div class="text-xs text-gray-500">{{ $slide->alt_text }}</div>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600 max-w-[220px] truncate">
                                    {{ $slide->link_url ?: '—' }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $slide->sort_order }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-semibold {{ $slide->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $slide->is_active ? 'Active' : 'Hidden' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <form action="{{ route('admin.hero-slides.toggle', $slide) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1.5 text-xs rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                                                {{ $slide->is_active ? 'Hide' : 'Show' }}
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.hero-slides.edit', $slide) }}"
                                           class="px-3 py-1.5 text-xs rounded-lg bg-gray-800 text-white hover:bg-gray-700">Edit</a>
                                        <form action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST"
                                              onsubmit="return confirm('Delete this slide?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 text-xs rounded-lg bg-red-500 text-white hover:bg-red-600">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
