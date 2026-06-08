@extends('layouts.main')
@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Edit Portfolio</h1>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-xl p-6 space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                value="{{ old('title', $portfolio->title) }}"
                required
            >
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
            <input
                type="number"
                name="price"
                id="price"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror"
                value="{{ old('price', $portfolio->price) }}"
                required
            >
            @error('price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea
                name="description"
                id="description"
                rows="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                required
            >{{ old('description', $portfolio->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Address -->
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
            <input
                type="text"
                name="address"
                id="address"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('address') border-red-500 @enderror"
                value="{{ old('address', $portfolio->address) }}"
                required
            >
            @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Area -->
        <div>
            <label for="area" class="block text-sm font-medium text-gray-700 mb-1">Area (m²)</label>
            <input
                type="text"
                name="area"
                id="area"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('area') border-red-500 @enderror"
                value="{{ old('area', $portfolio->area) }}"
                required
            >
            @error('area')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Rooms -->
        <div>
            <label for="rooms" class="block text-sm font-medium text-gray-700 mb-1">Rooms</label>
            <input
                type="number"
                name="rooms"
                id="rooms"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('rooms') border-red-500 @enderror"
                value="{{ old('rooms', $portfolio->rooms) }}"
                required
            >
            @error('rooms')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Latitude & Longitude (side by side) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="lat" class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                <input
                    type="number"
                    name="lat"
                    id="lat"
                    step="any"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('lat') border-red-500 @enderror"
                    value="{{ old('lat', $portfolio->lat) }}"
                    required
                >
                @error('lat')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="lng" class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                <input
                    type="number"
                    name="lng"
                    id="lng"
                    step="any"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('lng') border-red-500 @enderror"
                    value="{{ old('lng', $portfolio->lng) }}"
                    required
                >
                @error('lng')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Cover image preview -->
        @if($portfolio->cover_image)
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Cover Image</label>
                <img
                    src="{{ asset('storage/' . $portfolio->cover_image) }}"
                    alt="Cover"
                    class="w-full max-w-sm rounded-lg shadow-md object-cover"
                >
            </div>
        @endif

        <!-- Cover image (optional to update) -->
        <div>
            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-1">New Cover Image (optional)</label>
            <input
                type="file"
                name="cover_image"
                id="cover_image"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('cover_image') border-red-500 @enderror"
            >
            <p class="mt-1 text-sm text-gray-500">Max 2MB, image only.</p>
            @error('cover_image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gallery images -->
        <div>
            <label for="images" class="block text-sm font-medium text-gray-700 mb-1">Gallery Images (optional)</label>
            <input
                type="file"
                name="images[]"
                id="images"
                multiple
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('images') border-red-500 @enderror"
            >
            <p class="mt-1 text-sm text-gray-500">You can select multiple images. Max 2MB each.</p>
            @error('images')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Existing gallery preview -->
        @if($portfolio->images->count())
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Gallery</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($portfolio->images as $img)
                        <div class="relative">
                            <img
                                src="{{ asset('storage/' . $img->image) }}"
                                alt="Gallery"
                                class="w-full h-32 object-cover rounded-lg shadow-md"
                            >
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Buttons -->
        <div class="flex gap-3 pt-4">
            <button
                type="submit"
                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition"
            >
                Update Portfolio
            </button>
            <a
                href="{{ route('portfolio.index') }}"
                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg transition text-center"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection