@extends('layouts.main')

@section('content')

<section class="min-h-screen flex items-start justify-center px-4 py-16 bg-slate-100">

<div class="w-full max-w-md">

<div class="bg-slate-900/95 border border-slate-800 rounded-2xl shadow-2xl p-6">

<h2 class="text-lg font-semibold text-white mb-6">
Add portfolio
</h2>

<form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
@csrf

<!-- Title -->
<div class="space-y-1">
<label class="text-xs text-slate-400">Title</label>
<input
type="text"
name="title"
placeholder="Apartment renovation"
class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition"
required>
</div>

<!-- Price -->
<div class="space-y-1">
<label class="text-xs text-slate-400">Price</label>
<input
type="number"
name="price"
placeholder="Project price"
class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition"
required>
</div>

<!-- Address -->
<div class="space-y-1">
<label class="text-xs text-slate-400">Address</label>
<input
type="text"
name="address"
placeholder="Saburtalo, Tbilisi"
class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition"
required>
</div>

<!-- Area -->
<div class="space-y-1">
<label class="text-xs text-slate-400">Area (m²)</label>
<input
type="number"
step="0.01"
name="area"
placeholder="Area"
class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition"
required>
</div>

<!-- Rooms -->
<div class="space-y-1">
<label class="text-xs text-slate-400">Rooms</label>
<input
type="number"
name="rooms"
placeholder="Number of rooms"
class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition"
required>
</div>

<!-- Latitude -->
<div class="space-y-1">
<label class="text-xs text-slate-400">Latitude</label>
<input
type="number"
step="any"
name="lat"
placeholder="41.7261"
class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition">
</div>

<!-- Longitude -->
<div class="space-y-1">
<label class="text-xs text-slate-400">Longitude</label>
<input
type="number"
step="any"
name="lng"
placeholder="44.7689"
class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition">
</div>

<!-- Description -->
<div class="space-y-1">
<label class="text-xs text-slate-400">Description</label>
<textarea
name="description"
rows="3"
placeholder="Short project description"
class="w-full bg-slate-950 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 outline-none transition"
required></textarea>
</div>

<!-- Cover Image -->
<div class="space-y-2">
<label class="text-xs text-slate-400">Cover image</label>

<div class="border border-dashed border-slate-700 rounded-lg p-3 bg-slate-950/40 hover:border-sky-500 transition">
<input
type="file"
name="cover_image"
id="coverImage"
class="w-full text-xs text-slate-300 file:bg-slate-800 file:border-0 file:px-3 file:py-1.5 file:rounded-md file:text-slate-200 file:mr-3"
required>
</div>

<div id="coverPreview" class="mt-3"></div>
</div>

<!-- Gallery -->
<div class="space-y-2">
<label class="text-xs text-slate-400">Gallery images</label>

<div class="border border-dashed border-slate-700 rounded-lg p-3 bg-slate-950/40 hover:border-sky-500 transition">
<input
type="file"
name="images[]"
multiple
class="w-full text-xs text-slate-300 file:bg-slate-800 file:border-0 file:px-3 file:py-1.5 file:rounded-md file:text-slate-200 file:mr-3">
</div>

<p class="text-[11px] text-slate-500">
You can select multiple images
</p>
</div>

<!-- Submit -->
<button
type="submit"
class="w-full bg-sky-500 hover:bg-sky-400 text-slate-950 text-sm font-medium py-2.5 rounded-lg transition shadow-lg shadow-sky-900/30">
Save project
</button>

</form>

</div>

</div>

</section>

@endsection