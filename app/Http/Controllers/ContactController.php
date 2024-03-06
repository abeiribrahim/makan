<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MakaanMail;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $contacts =Contact::with('user')->get();
        $contacts =Contact::paginate(3);
        return view('admin.contacts', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    
    public function sendEmails(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'fname' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string',
        ]);
    
        // Create a new contact record
        $locations = Property::distinct()->pluck('location');
        $categories=Category::get();
        Contact::create($data);
    
        // Send email using the MakaanMail Mailable class
        Mail::to('abeir@gmail.com')->send(new MakaanMail($data));
    
        // Return the view (if needed)
        return view('contact',compact('categories','locations'));
    }
    
     public function showA(string $id)
     { 
         // Retrieve the specific message by its ID
         $message = Contact::findOrFail($id);
     
         // Check if the message is unread
         if (!$message->is_read) {
             // If unread, mark it as read and decrement the unread_count
             $message->update(['is_read' => true]);
             $message->decrement('unread_count');
         }
     
         // Fetch the latest messages after updating
         $latestMessages = Contact::latest()->get();
         $unreadCount = $latestMessages->where('is_read', false)->count();
     
         return view('admin.messages', compact('latestMessages', 'unreadCount'));
     }

     public function contact()

    {   
        $locations = Property::distinct()->pluck('location');
        $categories=Category::get();
        $contacts=Contact::get();
        return view('contact', compact('contacts','categories','locations'));
    }
    public function create()
    {
        $contacts=Contact::get();
        $categories=Category::get();
        return view('contact', compact('contacts','categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        
        $data = $request->validate([
    'fname'=>'required|string',
    'subject'=>'required|string',
   'email'=>'required|string',
   'message'=>'required|string',
   
    ]);

    Contact::create($data);
        return redirect('index');
       
}
     
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{ 
    $contacts =Contact::findOrFail($id);
   
  //  if (!$contact->is_read) {
       $contacts->update(['is_read' => true]);
        $contacts->decrement('unread_count');

        // Debugging statements
    //    dd($contact->unread_count); // Output the updated unread_count value
   // }

   // $contacts = contact::latest()->get();
    $unreadCount = $contacts->where('unread_count', false)->count();

    return view('admin.showmsg', compact('contacts', 'unreadCount'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        contact::where('id',$id)->delete();
        
        return redirect('admin.contacts');
    }
   // public function showmsg(string $id)
  //  {
      // $msg= contact::findOrFail($id);
      // $msg->update(['unread_count' => 1]);
      // return view('emails.carmail', compact('msg'));
   // }
   
}
