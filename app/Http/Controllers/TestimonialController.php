<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Traits\Common;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
    public function index()
    {
        
        $contacts =Contact::with('user')->get();
        $testimonials= Testimonial::get();
        return view('testimonial',compact('testimonials','contacts'));
    }
    public function testimonial()
    {
        
        $contacts =Contact::with('user')->get();
        $testimonials= Testimonial::get();
        return view('admin.testi',compact('testimonials','contacts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $contacts =Contact::with('user')->get();
        $testimonials= Testimonial::get();
        return view('admin.addtestimonial',compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'position'=> 'required|string',
            'content'=> 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            
           ]);

           $fileName = $this->uploadFile($request->image,'adminassets/images');    
           $data['image'] = $fileName;
          // $data['published'] = isset($request->published);
           $data['published'] = $request->has('published');
           Testimonial::create($data);
           return redirect('admin.testi');
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
        
        $testimonials =Testimonial::findOrFail($id);
        $contacts =Contact::with('user')->get();
        return view('admin.edittestimonial',compact('testimonials','contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {  
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'position'=>'required|string',
            'content'=>'required|string',
            'image' =>'sometimes|mimes:png,jpg,jpeg|max:2048',
            
           ]);

           if($request->hasFile('image')){
               $fileName = $this->uploadFile($request->image,'adminassets/images');    
               $data['image'] = $fileName;
              
           }else{
               $data ['image']=$request->oldImage;
               //unlink("assets/images/" . $request->oldImage);
           }
            
           $data['published'] = isset($request->published);
           Testimonial::where('id', $id)->update($data);
               return redirect('admin.testi');
           
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Testimonial::where('id',$id)->delete();
        
        return redirect('admin.testi');
    }
   
    
}
