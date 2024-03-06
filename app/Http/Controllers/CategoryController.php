<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Property;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
   
    $properties= Property::get();
    $locations = Property::distinct()->pluck('location');
    $categories = Category::get();
    $testimonials= Testimonial::get();
    return view('index', compact('properties', 'categories', 'locations','testimonials'));
}

    
    public function propertytype()
    {
        $contacts =Contact::with('user')->get();
        $categories = Category::get();
        return view('admin.categories', compact('categories','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts =Contact::with('user')->get();
        $categories=Category::get();
        $properties= Property::get();
        return view('admin.addcategory',compact('properties','categories','contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cat_name' => 'required|string',
        ]);
        Category::create($data);
        return redirect('admin.categories');
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
        $categories =Category::findOrFail($id);
        
        return view ('admin.editcategory', compact('categories','contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'cat_name'=>'required|string',
        ]);
        Category::where('id', $id)->update($data);
                return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id',$id)->delete();
        
        return redirect('admin.categories');
    }
    public function showCategories()
    {
        $locations = Property::distinct()->pluck('location');
        // Retrieve all categories with property counts using eager loading
        $categories = Category::withCount('properties')->get();
    
        // Pass the categories and their property counts to the view
        return view('property-type', compact('categories','locations'));
    }
    
}
