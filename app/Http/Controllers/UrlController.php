<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = Url::where('user_id', auth()->id())->latest()->get();
        return view('backend.urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|active_url',
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['original_url'] = $request->original_url;
        $data['short_url'] = Str::random(5);
        $url = Url::create($data);
        session([
            'id' => $url->id,
            'created_url' => $url->short_url,
            'long_url' => $url->original_url
        ]);
        return redirect()->back()->withSuccess('URL created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        return view('backend.urls.show', compact('url'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        return view('backend.urls.edit', compact('url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        $request->validate([
            'original_url' => 'required|active_url',
        ]);
        $url->original_url = $request->original_url;
        $url->short_url = Str::random(5);
        $url->save();
        return redirect()->back()->withSuccess('URL Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();
        return redirect()->back()->withSuccess('Url Deleted Successfully');
    }
    public function shortenLink($shortener_url)
    {
        $url = Url::where('short_url', $shortener_url)->first();
        if ($url) {
            $url->increment('clicks');
            return redirect($url->original_url);
        }
    }
    public function apiStore(Request $request)
    {
        $request->validate([
            'original_url' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['original_url'] = $request->original_url;
        $data['short_url'] = Str::random(5);
        $url = Url::create($data);
        return response()->json($url);
    }
}
