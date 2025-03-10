<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller {

    // Show create news form
    public function create() {
        return view('admin.news.create');
    }

    // Store news
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'date_posted' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document' => 'nullable|mimes:pdf,doc,docx|max:5120'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('news_images', 'public') : null;
        $documentPath = $request->file('document') ? $request->file('document')->store('news_documents', 'public') : null;

        News::create([
            'title' => $request->title,
            'message' => $request->message,
            'date_posted' => $request->date_posted,
            'image' => $imagePath,
            'document' => $documentPath,
        ]);

        return redirect()->route('news.view-news')->with('success', 'News added successfully.');
    }

    //// Show edit form
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
            'message' => 'required|string',
            'date_posted' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document' => 'nullable|mimes:pdf,doc,docx|max:5120'
        ]);

        
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::delete('public/' . $news->image); // Delete old image if exists
            }
            $news->image = $request->file('image')->store('news_images', 'public');
        }

        
        if ($request->hasFile('document')) {
            if ($news->document) {
                Storage::delete('public/' . $news->document); // Delete old document if exists
            }
            $news->document = $request->file('document')->store('news_documents', 'public');
        }

        // Update news details
        $news->update([
            'title' => $request->title,
            'message' => $request->message,
            'date_posted' => $request->date_posted,
            'image' => $news->image,
            'document' => $news->document
        ]);

        return redirect()->route('news.view-news')->with('success', 'News updated successfully.');
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

        return redirect()->route('news.view-news')->with('success', 'News deleted successfully.');
    }
}
