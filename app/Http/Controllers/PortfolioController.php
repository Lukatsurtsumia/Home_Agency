<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        return redirect('/#portfolio');
    }

    public function show($id)
    {
        $portfolio = portfolio::with('images')->findOrFail($id);

        return view('website.portfolio.imagesPortfolio', compact('portfolio'));
    }

    public function create()
    {
        return view('website.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'address'=>'required|string',
            'area'=>'required|string',
            'rooms'=>'required|integer',
                'lat'=>'required|numeric',
                'lng'=>'required|numeric',
            'cover_image' => 'required|image|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048'
        ]);

        // create portfolio first
        $portfolio = portfolio::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'address' => $request->address,
            'area' => $request->area,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'rooms' => $request->rooms,
            'cover_image' => ''
        ]);

        // save cover image
        if ($request->hasFile('cover_image')) {

            $coverPath = $request->file('cover_image')
                ->store("portfolio/{$portfolio->id}", 'public');

            $portfolio->update([
                'cover_image' => $coverPath
            ]);
        }

        // save gallery images
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store(
                    "portfolio/{$portfolio->id}/gallery",
                    'public'
                );

                $portfolio->images()->create([
                    'portfolio_id'=>$portfolio->id,
                    'image' => $path
                ]);
            }
        }

        return redirect()->back()->with('success','Portfolio created');
    }

    public function edit($id){
        $portfolio = portfolio::with('images')->findOrFail($id);
        return view('website.portfolio.edit', compact('portfolio'));
    }
    public function update(Request $request, $id)
    {
        $portfolio = portfolio::with('images')->findOrFail($id);

        $request->validate([
             'title' => 'required|string|max:255',
        'price' => 'required|integer',
        'description' => 'required|string',
        'address' => 'required|string',
        'area' => 'required|string',
        'rooms' => 'required|integer',
        'lat' => 'required|numeric',
        'lng' => 'required|numeric',
            'cover_image' => 'nullable|image|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048'
        ]);

        $portfolio->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'address' => $request->address,
            'area' => $request->area,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'rooms' => $request->rooms,
        ]);
        if ($request->hasFile('cover_image')) {
        if ($portfolio->cover_image) {
            Storage::disk('public')->delete($portfolio->cover_image); // remove old file
        }
        $portfolio->update([
            'cover_image' => $request->file('cover_image')->store("portfolio/{$portfolio->id}", 'public'),
        ]);
    }

    // add new gallery images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $portfolio->images()->create([
                'image' => $image->store("portfolio/{$portfolio->id}/gallery", 'public'),
            ]);
        }
    }


    return redirect()->route('images', $portfolio->id)->with('success', 'Portfolio updated');

    }
}