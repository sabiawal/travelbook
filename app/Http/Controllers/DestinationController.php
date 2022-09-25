<?php

namespace App\Http\Controllers;
use App\Models\Destinations;
use Illuminate\Http\Request;

class DestinationController extends Controller
{

    public function destination()
    {
        $destination = Destinations::all()->toArray();
        return view('admin/destination',compact('destination'));
    }

    public function delete($id)
    {
        $destination = Destinations::find($id);
        $destination->forceDelete();
        return Redirect()->back()->with('success','Record deleted successfully!');
    }
    public function edit(Request $request,$id)
    {
        $destination = Destinations::find($id);
        
        $destination->DestinationName = $request->destination;
        $destination->Category = $request->category;
        $destination->Price = $request->price;
        $destination->Description = $request->description;

        // image
        $image=$request->file('image');
        $img_name_generator=hexdec(uniqid());   //generate new name for image file

        $img_extension=strtolower($image->getClientOriginalExtension());  //get original file extension
        $image_name=$img_name_generator.'.'.$img_extension; 
        //create generated name + original extension to make new file name
        $upload_path = "storage/images/";
        $image_url = $upload_path.$image_name; 
        $image->move('storage/images/',$image_name);
        $destination->Image=$image_url;
        $destination->save();

        return Redirect()->back()->with('success','Record updated successfully!');
    }
    
    public function create(Request $request){
            $validate=$request->validate([
                'destination'=>['required'],
                'category'=>['required'],
                'price'=>['required'],
                'image'=>['max:50000']
                
            ],
        [            
            'category.required'=>'Please select a category!',
            'price.required'=>'Please enter price!',
            'destination.required'=>'Please enter destination name!'
        ]);

            $destination = new Destinations();

            $destination->DestinationName = $request->destination;
            $destination->Category = $request->category;
            $destination->Price = $request->price;
            $destination->Description = $request->description;
  

            // image
            $image=$request->file('image');
            $img_name_generator=hexdec(uniqid());   //generate new name for image file
    
            $img_extension=strtolower($image->getClientOriginalExtension());  //get original file extension
            $image_name=$img_name_generator.'.'.$img_extension; 
            //create generated name + original extension to make new file name
            $upload_path = "storage/images/";
            $image_url = $upload_path.$image_name; 
            $image->move('storage/images/',$image_name);
            $destination->Image=$image_url;
            $destination->save();
            
            return Redirect()->back()->with('success','Destination created successfully!');
    }
}
