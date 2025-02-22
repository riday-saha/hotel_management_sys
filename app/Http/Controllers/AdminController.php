<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.admin_index');
    }

    public function all_room(){
        $view_rooms = Room::all();
        return view('admin.room',compact('view_rooms'));
    }

    public function add_room(Request $request){
        $request->validate([
            'room_title' => 'required|string|max:220',
            'wifi' => 'nullable|in:yes,no',
            'room_select' => 'required|in:regular,premium,delux,super delux',
            'room_image' => 'required|image|mimes:png,jpg,jpeg',
            'room_description' => 'nullable|string|',
            'room_price' => 'required|numeric|',
        ],[
            'room_title.required' => 'What is the name of the room?',
            'room_select.required' => 'Please Select the Room Type',
            'room_image.required' => 'Set A Nice Image for the Room',
            'room_price.required' => 'What’s the charge for this room?'
        ]);

        if($request->hasFile('room_image')){
            $img_name = time().'.'.$request->room_image->extension();
            $request->room_image->move(public_path('hotel_photo'),$img_name);
        }

        Room::create([
            'room_title' => $request->room_title,
            'description' => $request->room_description,
            'image' => 'hotel_photo/'.$img_name,
            'price' =>$request->room_price,
            'wifi' =>$request->wifi,
            'room_type' =>$request->room_select
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function update_room(Request $request){
        $request->validate([
            'edit_room_title' => 'nullable|string|max:220',
            'new_room_image' => 'nullable|image|mimes:png,jpg,jpeg',
        ],[
            'edit_room_title.string' => 'What is the name of the room?',
            'new_room_image.image' => 'Set A Nice Image for this Room',
        ]);

        $find_room = Room::find($request->edit_room_id);

        if($request->hasFile('new_room_image')){
            //delete previous image
            if(File::exists(public_path($find_room->image))){
                File::delete(public_path($find_room->image));
            }
            //store new image
            $new_img_named = time().'.'.$request->new_room_image->extension();
            $request->new_room_image->move(public_path('hotel_photo'),$new_img_named);
            $find_room->image = 'hotel_photo/'.$new_img_named;
        }

        $find_room->room_title = $request-> edit_room_title;
        $find_room->description = $request-> edit_room_description;
        $find_room->price = $request-> edit_room_price;
        $find_room->wifi = $request-> edit_wifi;
        $find_room->room_type = $request-> slt_edit_room;
        $find_room->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Room updated successfully!',
        ]);

    }
}
