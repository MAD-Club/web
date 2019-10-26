<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'edit', 'destroy']]);
    }

    public function index() {
        $events = Event::paginate(10);
        return view('events.index', compact('events'));
    }

    public function show($event) {
        $event = Event::findOrFail($event);

        return view('events.show', compact('event'));
    }

    public function create() {

        return view('events.create');
    }

    public function store(EventRequest $request) {
        $event = new Event($request->all());
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->storePublicly('', 'public');
            $event->file = $path;
            $event->save();
        } else {
            $event->save();
        }
        return redirect('events');
    }

    public function edit($event) {
        $event = Event::findOrFail($event);

        return view('events.edit', compact("event"));
    }

    public function update(EventRequest $request, $event) {
        $formData = $request->all();
        $event = Event::findOrFail($event);
        $event->update($formData);

        if($request->hasFile('file') && $request->file('file')->isValid()) {
            if(isset($event->file)) {
                Storage::disk('public')->delete($event->file);
            }
            $path = $request->file('file')->storePublicly('', 'public');
            $event->file = $path;
            $event->save();
        }

        return redirect('events/' . $event->id);
    }

    public function destroy(Event $event) {
        if(isset($event->file)) {
            Storage::disk('public')->delete($event->file);
        }
        $event->delete();
        return redirect('events');
    }
}
