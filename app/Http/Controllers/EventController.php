<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\User;

class EventController extends Controller
{
    public function index() {
        $search = request('search');
        
        if ($search) {
            $events = Event::where('title', 'like', '%'.$search.'%')->get();
        } else {
            $events = Event::all();
        }
    
        return view('welcome', ['events' => $events, 'search' => $search]);
    }    

    public function search() {
        $busca = request('search');

        return view('search', ['busca' => $busca]);
    }

    public function contacts($id = null) {
        return view('contacts', ['id' => $id]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->itens = $request->itens;

        /* Image Upload */
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento Criado com Sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard() {

        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }
}