<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'edit', 'destroy']]);
    }

    public function index() {
        $blogs = Blog::paginate(7);
        return view('blogs.index', compact('blogs'));
    }

    public function show($blog) {
        $blog = Blog::findOrFail($blog);

        return view('blogs.show', compact('blog'));
    }

    public function create() {

        return view('blogs.create');
    }

    public function store(Request $request) {
        $blog = new Blog($request->all());
        $blog->author_id = \Auth::user()->id;
        $blog->category()->associate($category)->save();
        $blog->tags()->sync($request->tags);
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->storePublicly('', 'public');
            $blog->file = $path;
            $blog->save();

        }
        return redirect('blogs');
    }

    public function destroy(Blog $blog) {
        if(isset($blog->file)) {
            Storage::disk('public')->delete($blog->file);
        }
        $blog->delete();
        return redirect('blogs');
    }
}
