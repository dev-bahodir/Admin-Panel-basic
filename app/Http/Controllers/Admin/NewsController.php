<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create() {
        return view('admin.news.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'body' => 'nullable',
            'images.*' => 'image|max:2048',
            'preview' => 'nullable|integer'
        ]);

        $news = News::create($request->only('title', 'body'));

        // Rasmlarni saqlash
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $img) {
                $path = $img->store('news', 'public');

                NewsImage::create([
                    'news_id' => $news->id,
                    'path' => $path,
                    'is_preview' => $request->preview == $index ? true : false
                ]);
            }
        }

        return redirect()->route('admin.news.index');
    }

    public function edit(News $news) {
        $news->load('images');
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news) {
        $request->validate([
            'title' => 'required',
            'body' => 'nullable',
            'images.*' => 'image|max:2048',
            'preview' => 'nullable|integer'
        ]);

        $news->update($request->only('title', 'body'));

        // Rasm yuklash (yangi rasmlar)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $img) {
                $path = $img->store('news', 'public');

                NewsImage::create([
                    'news_id' => $news->id,
                    'path' => $path,
                    'is_preview' => false
                ]);
            }
        }

        // Preview belgilash
        if ($request->preview !== null) {
            NewsImage::where('news_id', $news->id)->update(['is_preview' => false]);
            NewsImage::where('id', $request->preview)->update(['is_preview' => true]);
        }

        return redirect()->route('admin.news.index');
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
