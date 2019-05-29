<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

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

    public function store(BlogRequest $request) {
        $blog = new Blog($request->all());
        $blog->author_id = \Auth::user()->id;
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->storePublicly('', 'public');
            $blog->file = $path;
            $blog->save();

        }
        return redirect('blogs');
    }

    public function edit($blog) {
        $blog = Blog::findOrFail($blog);

        return view('blogs.edit', compact("blog"));
    }

    public function update(BlogRequest $request, $blog) {
        $formData = $request->all();
        $blog = Blog::findOrFail($blog);
        $blog->update($formData);

        if($request->hasFile('file') && $request->file('file')->isValid()) {
            if(isset($blog->file)) {
                Storage::disk('public')->delete($blog->file);
            }
            $path = $request->file('file')->storePublicly('', 'public');
            $blog->file = $path;
            $blog->save();
        }
        return redirect('blogs/' . $blog->id);
    }

    public function destroy(BlogRequest $blog) {
        if(isset($blog->file)) {
            Storage::disk('public')->delete($blog->file);
        }
        $blog->delete();
        return redirect('blogs');
    }
}
