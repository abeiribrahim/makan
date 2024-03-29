<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Traits\Common;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
    // users page
    public function index(Request $request)
    {
        // Retrieve input values
        $keyword = $request->input('keyword');
        $selectedLocation = $request->input('location'); // Renamed to avoid conflict
    
        // Retrieve distinct locations from the properties table
        $locations = Property::distinct()->pluck('location');
    
        // Retrieve categories
        $categories = Category::get();
    
        // Construct the base query to fetch properties
        $query = Property::query();
    
        // Apply keyword filter
        if ($keyword) {
            $query->where('title', 'like', "%$keyword%");
        }
    
        // Apply category filter
        $catName = $request->input('category_id');
        if ($catName) {
            $query->where('category_id', $catName);
        }
    
        // Apply location filter
        if ($selectedLocation) {
            $query->where('location', $selectedLocation);
        }
    
        // Fetch properties based on the search criteria
        $properties = $query->get();
        $testimonials= Testimonial::get();
        // Pass data to the index view
        return view('index', compact('properties', 'categories', 'locations', 'selectedLocation'));
    }


    //Admins only
    public function propertylist()
    {  
        $contacts =Contact::with('user')->get();
        $properties=Property::get();
        $categories =Category::get();
        
       
        return view('admin.propertylist',compact('properties','categories','contacts'));
    }
    public function about()
    {  
        $locations =Property::distinct()->pluck('location');
        $categories=Category::get();
       
        $properties=Property::get();
        $categories =Category::get();
        
       
        return view('about',compact('properties','categories','locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations =Property::distinct()->pluck('location');
        $categories=Category::get();
        $properties= Property::get();
        return view('addproperty',compact('properties','categories','locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $data = $request->validate([
        'category_id' => 'required|string|max:50',
        'price' => 'required|string|max:100',
        'title'=> 'required|string|max:100',
        'bedn' => 'required|string|max:50',
        'bathn' => 'required|string|max:50',
        'area' => 'required|string|max:50',
        'location' => 'required|string|max:50',
        'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
    ]);

    // Determine the values of rent and sell based on the selected option
    $listingType = $request->input('listing_type');
    if ($listingType === 'rent') {
        $data['rent'] = 1; // For Rent
        $data['sell'] = 0;
    } else {
        $data['rent'] = 0;
        $data['sell'] = 1; // For Sale
    }
    $data['published'] = isset($request->published);
    // Upload the image file and get the file name
    $fileName = $this->uploadFile($request->image, 'assets/images');

    // Assign the file name to the 'image' field in the $data array
    $data['image'] = $fileName;

    // Create a new Property record using the merged $data array
    Property::create($data);

    return redirect('property-list');
}

    
    

    /**
     * Display the specified resource.
     */
    public function getForSellProperties() {
        $locations = Property::distinct()->pluck('location');
        $categories=Category::get();
        $properties = Property::where('sell', 1)->get();
        return view('forsell',compact('properties','categories', 'locations'));
        
        
    }
    
    public function getForRentProperties() {
        $locations = Property::distinct()->pluck('location');
        $categories = Category::get();
        $properties = Property::where('rent', 1)->get();
        return view('forrent', compact('properties', 'categories', 'locations'));
    }
    
    public function properties(Request $request)
    {   
        $keyword = $request->input('keyword');
        $selectedLocation = $request->input('location');
        $locations = Property::distinct()->pluck('location');
            $categories=Category::get();
            $properties=Property::get();
            return view('property-list',compact('properties','categories', 'locations'));
        
    }
    public function show(string $id)
    {
        $locations = Property::distinct()->pluck('location');
            $categories=Category::get();
            $properties=Property::get();
            return view('property-list',compact('properties','categories'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contacts =Contact::with('user')->get();
        $categories=Category::get();
        $properties =Property::findOrFail($id);
    $listingType = $properties->listing_type; // Assuming listing_type is the property in your model
    return view('admin.editproperty', compact('properties','categories','contacts','listingType'));
}

        
       
        
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
    $data = $request->validate([
        'category_id' => 'required|string|max:50',
        'price' => 'required|string|max:100',
        'title'=> 'required|string|max:100',
        'bedn' => 'required|string|max:50',
        'bathn' => 'required|string|max:50',
        'area' => 'required|string|max:50',
        'location' => 'required|string|max:50',
        'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
    ]);

    // Determine the values of rent and sell based on the selected option
    $listingType = $request->input('listing_type');
    if ($listingType === 'rent') {
        $data['rent'] = 1; // For Rent
        $data['sell'] = 0;
    } else {
        $data['rent'] = 0;
        $data['sell'] = 1; // For Sale
    }
    if($request->hasFile('image')){
        $fileName = $this->uploadFile($request->image,'adminassets/images');    
        $data['image'] = $fileName;
       
    }else{
        $data ['image']=$request->oldImage;
        //unlink("assets/images/" . $request->oldImage);
    }
    
    $data['published'] = isset($request->published);
    // Create a new Property record using the merged $data array
    Property::where('id', $id)->update($data);

    return redirect('admin.propertylist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Property::where('id',$id)->delete();
        
        return redirect('admin.propertylist');
    }
    public function searchProperties(Request $request)
{
    // Retrieve input values
    $searchTerm = $request->input('search');
    $keyword = $request->input('keyword');
    $selectedLocation = $request->input('location'); // Renamed to avoid conflict

    // Retrieve distinct locations from the properties table
    $locations = Property::distinct()->pluck('location');

    // Retrieve categories
    $categories = Category::get();

    // Construct the base query to fetch properties
    $query = Property::query();

    // Apply keyword filter
    if ($keyword) {
        $query->where('title', 'like', "%$keyword%");
    }

    // Apply category filter
    $catName = $request->input('category_id');
    if ($catName) {
        $query->where('category_id', $catName);
    }

    // Apply location filter
    if ($selectedLocation) {
        $query->where('location', $selectedLocation);
    }

    // Fetch properties based on the search criteria
    $properties = $query->get();

    // Pass data to the index view
    return view('searchresult', compact('properties', 'categories', 'locations', 'selectedLocation'));
}

    

}
