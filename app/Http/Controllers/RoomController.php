<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        App::setlocale(session('lang'));
        $rooms = request('search') ? Room::filter(request(['search']))->get() : Room::all();

        return view('rooms/index', [
            'rooms' => $rooms,
            'pageTitle' => 'Our Rooms'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        App::setlocale(session('lang'));
        return view('rooms/create', [
            'pageTitle' => 'Create Room'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:rooms',
            'description' => 'required',
            'price' => 'required|numeric|min:1000',
            'facilities' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $room = Room::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'facilities' => $validatedData['facilities']
        ]);

        $validatedData['images'] = $request->file('images');
        
        foreach ($validatedData['images'] as $img) {
            $img = $img->store('room-images', 'public');
            RoomImage::create([
                'room_id' => $room->id,
                'image' => $img
            ]);
        }

        return redirect('/rooms')->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        App::setlocale(session('lang'));
        return view('rooms/show', [
            'pageTitle' => 'Show',
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {   
        $this->authorize('admin');
        App::setlocale(session('lang'));
        return view('rooms/edit', [
            'pageTitle' => 'Edit',
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|unique:rooms,name,'.$room->id, // ignore current room name
            'description' => 'required',
            'price' => 'required|numeric|min:1000',
            'facilities' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $room->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'facilities' => $validatedData['facilities']
        ]);

        if($request->file('images')) {
            $validatedData['images'] = $request->file('images');
            
            foreach ($validatedData['images'] as $img) {
                $img = $img->store('room-images', 'public');
                RoomImage::create([
                    'room_id' => $room->id,
                    'image' => $img
                ]);
            }
        }

        

        return redirect('/rooms')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $this->authorize('admin');

        if($room->roomImages()->count()) {
            foreach ($room->roomImages as $img) {
                Storage::disk('public')->delete($img->image);
                $img->delete();
            }
        }
        
        Room::destroy($room->id);
        return redirect('/rooms')->with('success', 'Room deleted successfully.');
    }

    public function deleteImage(Room $room, RoomImage $image)
    {
        $this->authorize('admin');

        Storage::disk('public')->delete($image->image);
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
