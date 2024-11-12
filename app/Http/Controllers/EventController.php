<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;


class EventController extends Controller
{
    public function index() {

        $search = request('search');
        if($search) {
            $events = Event::where([
                ['name', 'like', '%'. $search . '%']
            ])->get();

        } else {
            $events = Event::all();
        }

        return view('welcome', ['events' => $events, 'search' => $search]);    
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {

        $event = new Event;
        // dd($request->all());
        // hack_How($request);
        $event->name = $request->name;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->user_id = auth()->id(); // Associando o usuário logado
        
        //imagem upload
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

        return redirect('/');
    }

    public function show($id) {

        if (!view()->exists('events.show')) {
            return "A view 'events.show' não foi encontrada.";
        }
        $event = Event::findOrFail($id);
        $eventOwner = $event->user; 

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }


    public function dashboard() {

        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }


    public function destroy($id) {

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso.');
        
    }


    public function edit($id) {

        $event = Event::findOrFail($id);
        $event->date = $event->date ? Carbon::parse($event->date) : null;
        return view('events.edit', ['event' => $event]);

    }

    public function update(Request $request) {

        $data = $request->all();

         //imagem upload
         if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $requestImage->move(public_path('img/events'), $imageName);
        
            $data['image'] = $imageName;
        }

        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Evento Editado com sucesso.');
    }

    public function joinEvent($id) {
        $user = auth()->user();
        $user->eventsAsParticipant()->attach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento' . $event->name);
    }

}