<?php

namespace App\Http\Controllers;

use App\Showcase;
use App\Http\Requests\ShowcaseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowcaseController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'edit', 'destroy']]);
    }

    public function index() {
        $showcases = Showcase::paginate(10);
        return view('showcases.index', compact('showcases'));
    }

    public function show($showcase) {
        $showcase = Showcase::findOrFail($showcase);

        return view('showcases.show', compact('showcase'));
    }

    public function create() {

        return view('showcases.create');
    }

    public function store(ShowcaseRequest $request) {
        $showcase = new Showcase($request->all());
        $showcase->author_id = \Auth::user()->id;
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->storePublicly('', 'public');
            $showcase->file = $path;
            $showcase->save();
        } else {
            $showcase->save();
        }
        return redirect('showcases');
    }

    public function edit($showcase) {
        $showcase = Showcase::findOrFail($showcase);

        return view('showcases.edit', compact("showcase"));
    }

    public function update(ShowcaseRequest $request, $showcase) {
        $formData = $request->all();
        $showcase = Showcase::findOrFail($showcase);
        $showcase->update($formData);

        if($request->hasFile('file') && $request->file('file')->isValid()) {
            if(isset($showcase->file)) {
                Storage::disk('public')->delete($showcase->file);
            }
            $path = $request->file('file')->storePublicly('', 'public');
            $showcase->file = $path;
            $showcase->save();
        }

        return redirect('showcases/' . $showcase->id);
    }

    public function destroy(Showcase $showcase) {
        if(isset($showcase->file)) {
            Storage::disk('public')->delete($showcase->file);
        }
        $showcase->delete();
        return redirect('showcases');
    }
}
