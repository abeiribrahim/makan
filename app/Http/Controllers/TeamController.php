<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;

use App\Models\Property;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Traits\Common;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
    public function index()
    {
        $contacts =Contact::with('user')->get();
        $teams = Team::get();
        return view('admin.team', compact('teams','contacts'));
       
    }
    public function propertyagent()
    {
        $locations =Property::distinct()->pluck('location');
        $categories=Category::get();
        $properties= Property::get();
        $teams= Team::get();
        return view('property-agent',compact('teams','categories','locations','properties'));
        
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts =Contact::with('user')->get();
        $teams = Team::get();
        return view('admin.addteam', compact('teams','contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fname'=>'required|string|max:50',
            'designation'=> 'required|string',
            'facebook_url'=> 'required|string',
            'instagram_url'=> 'required|string',
            'twitter_url'=> 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            
           ]);

           $fileName = $this->uploadFile($request->image,'assets/images');    
           $data['image'] = $fileName;
          // $data['published'] = isset($request->published);
           //$data['published'] = $request->has('published');
           Team::create($data);
           return redirect('admin.team');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contacts =Contact::with('user')->get();
        $teams =Team::findOrFail($id);
        
        return view ('admin.editteam', compact('teams','contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'fname'=>'required|string|max:50',
            'designation'=> 'required|string',
            'facebook_url'=> 'required|string',
            'instagram_url'=> 'required|string',
            'twitter_url'=> 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            
           ]);

           if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image,'adminassets/images');    
            $data['image'] = $fileName;
           
        }else{
            $data ['image']=$request->oldImage;
        }
        //$data['published'] = isset($request->published);
           Team::where('id', $id)->update($data);
           return redirect('admin.team');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Team::where('id',$id)->delete();
        
        return redirect('admin.team');
    }
}
