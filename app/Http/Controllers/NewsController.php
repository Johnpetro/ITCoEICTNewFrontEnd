<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller {

    // Show create news form
    public function index() {
        $news = News::latest()->paginate(4);
        return view('admin.news.index', compact('news'));
    }
    public function create() {
        return view('admin.news.create');
    }

    // Store news
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url',
            'published_at' => 'nullable|date'
        ]);

        // Handle image upload
        $imagePath = $request->file('image') ? $request->file('image')->store('news_images', 'public') : null;

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'video_url' => $request->video_url,
            'published_at' => $request->published_at
        ]);

        return redirect()->route('news.index')->with('success', 'News added successfully.');
    }

    // Show edit form
    public function edit($id) {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function show($id) {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    // Update news
    public function update(Request $request, $id) {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url',
            'published_at' => 'nullable|date'
        ]);

        $news->title = $request->title;
        $news->description = $request->description;
        $news->video_url = $request->video_url;
        $news->published_at = $request->published_at;

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::delete('public/' . $news->image); // Delete old image
            }
            $news->image = $request->file('image')->store('news_images', 'public');
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

 

    // Delete news
    public function destroy($id) {
        $news = News::findOrFail($id);

        // Delete associated files if they exist
        if ($news->image) {
            Storage::delete('public/' . $news->image);
        }
        if ($news->document) {
            Storage::delete('public/' . $news->document);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
