<?php
use App\Mail\MakaanMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[CategoryController::class,'index'])->name('index');
Route::get('property-list',[PropertyController::class,'properties'])->name('property-list');
Route::get('admin.propertylist',[PropertyController::class,'propertylist'])->name('admin.propertylist');
Route::get('addproperty',[PropertyController::class,'create'])->name('addproperty');
Route::get('admin.editproperty/{id}',[PropertyController::class,'edit'])->name('admin.editproperty');
Route::put('updateproperty/{id}',[PropertyController::class,'update'])->name('updateproperty');
Route::post('storeproperty',[PropertyController::class,'store'])->name('storeproperty');
Route::get('admin.deleteproperty/{id}',[PropertyController::class,'destroy'])->name('admin.deleteproperty');
Route::get('forsell',[PropertyController::class,'getForSellProperties'])->name('forsell');
Route::get('forrent',[PropertyController::class,'getForRentProperties'])->name('forrent');
Route::get('searchresult',[PropertyController::class,'searchProperties'])->name('searchresult');
Route::get('about',[PropertyController::class,'about'])->name('about');
//Route::get('admin.addcategory',[CategoryController::class,'create'])->name('admin.addcategory');
//Route::post('storecat',[CategoryController::class,'store'])->name('storecat');

Route::get('testimonial',[TestimonialController::class,'index'])->name('testimonial');
Route::get('admin.testi',[TestimonialController::class,'testimonial'])->name('admin.testi');
Route::get('admin.addtestimonial',[TestimonialController::class,'create'])->name('admin.addtestimonial');
Route::get('admin.edittestimonial/{id}',[TestimonialController::class,'edit'])->name('admin.edittestimonial');
Route::put('admin.updatetestimonial/{id}',[TestimonialController::class,'update'])->name('admin.updatetestimonial');
Route::post('storetestimonial',[TestimonialController::class,'store'])->name('storetestimonial');
Route::get('admin.deletetestimonial/{id}',[TestimonialController::class,'destroy'])->name('admin.deletetestimonial');
// categories
Route::get('property-type',[CategoryController::class,'showCategories'])->name('property-type');
Route::get('admin.categories',[CategoryController::class,'propertytype'])->name('admin.categories');
Route::get('admin.addcategory',[CategoryController::class,'create'])->name('admin.addcategory');
Route::get('editcategory/{id}',[CategoryController::class,'edit'])->name('editcategory');
Route::put('updatecategory/{id}',[CategoryController::class,'update'])->name('updatecategory');
//Route::get('createcat',[CategoryController::class,'create'])->name('createcat');
Route::post('storecat',[CategoryController::class,'store'])->name('storecat');
Route::get('deletecat/{id}',[CategoryController::class,'destroy'])->name('deletecat');
// messages
Route::get('contact',[ContactController::class,'contact'])->name('contact');
Route::post('contact',[ContactController::class,'sendEmails'])->name('contact');
Route::get('admin.messages',[ContactController::class,'index'])->name('admin.messages');
Route::post('storemessage',[ContactController::class,'store'])->name('storemessage');
Route::get('admin.deletemessage/{id}',[ContactController::class,'destroy'])->name('admin.deletemessage');
Route::get('admin.showmsg/{id}',[ContactController::class,'show'])->name('admin.showmsg');
Route::get('/messages/{id}', [ContactController::class,'showA'])->name('messages.show');

//teams
Route::get('property-agent',[TeamController::class,'propertyagent'])->name('property-agent');
Route::get('admin.team',[TeamController::class,'index'])->name('admin.team');
Route::get('admin.addteam',[TeamController::class,'create'])->name('admin.addteam');
Route::post('admin.addteam',[TeamController::class,'store'])->name('admin.addteam');
Route::get('admin.editteam/{id}',[TeamController::class,'edit'])->name('admin.editteam');
Route::put('admin.updateteam/{id}',[TeamController::class,'update'])->name('admin.updateteam');

Route::get('admin.deleteteam/{id}',[TeamController::class,'destroy'])->name('admin.deleteteam');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
