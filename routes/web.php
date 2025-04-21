<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('index');

Route::get('theme', [App\Http\Controllers\Frontend\HomeController::class, 'theme'])->name('theme');



// //newspapers
// Route::get('newspapers', [App\Http\Controllers\Frontend\NewspaperController::class, 'index'])->name('newspaper.index');
Route::get('newspapers/{slug}', [App\Http\Controllers\Frontend\NewspaperController::class, 'show'])->name('newspaper.show');

// //ehelp
// Route::get('ehelp', [App\Http\Controllers\Frontend\EhelpController::class, 'index'])->name('ehelp.index');
// Route::get('ehelp/{id}', [App\Http\Controllers\Frontend\EhelpController::class, 'show'])->name('ehelp.show');

// //blood donor
// Route::get('blood-donor', [App\Http\Controllers\Frontend\BloodDonorController::class, 'index'])->name('blood-donor.index');
// Route::get('blood-donor/search', [App\Http\Controllers\Frontend\BloodDonorController::class, 'search'])->name('blood-donor.search');

// //hospital
// Route::get('hospital', [App\Http\Controllers\Frontend\HospitalController::class, 'index'])->name('hospital.index');
// Route::get('hospital/search', [App\Http\Controllers\Frontend\HospitalController::class, 'search'])->name('hospital.search');

// //ambulance
// Route::get('ambulance', [App\Http\Controllers\Frontend\AmbulanceController::class, 'index'])->name('ambulance.index');
// Route::get('ambulance/search', [App\Http\Controllers\Frontend\AmbulanceController::class, 'search'])->name('ambulance.search');

// //doctor
// Route::get('doctor', [App\Http\Controllers\Frontend\DoctorController::class, 'index'])->name('doctor.index');
// Route::get('doctor/{id}', [App\Http\Controllers\Frontend\DoctorController::class, 'show'])->name('doctor.show');
// Route::get('doctor-search', [App\Http\Controllers\Frontend\DoctorController::class, 'search'])->name('doctor.search');

// //journalist
// Route::get('journalist', [App\Http\Controllers\Frontend\JournalistController::class, 'index'])->name('journalist.index');
// Route::get('journalist/result', [App\Http\Controllers\Frontend\JournalistController::class, 'search'])->name('journalist.search');


// //lawyer
// Route::get('lawyer', [App\Http\Controllers\Frontend\LawyerController::class, 'index'])->name('lawyer.index');
// Route::get('lawyer/result', [App\Http\Controllers\Frontend\LawyerController::class, 'search'])->name('lawyer.search');

// //fire-service
// Route::get('fire-service', [App\Http\Controllers\Frontend\FireServiceController::class, 'index'])->name('fireservice.index');
// Route::get('fire-service/result', [App\Http\Controllers\Frontend\FireServiceController::class, 'search'])->name('fireservice.search');

// //restaurant
// Route::get('restaurant', [App\Http\Controllers\Frontend\RestaurantController::class, 'index'])->name('restaurant.index');
// Route::get('restaurant/food/{slug}', [App\Http\Controllers\Frontend\RestaurantController::class, 'show'])->name('restaurant.show');
// Route::get('restaurant/result', [App\Http\Controllers\Frontend\RestaurantController::class, 'search'])->name('restaurant.search');

// //hotel
// Route::get('hotel', [App\Http\Controllers\Frontend\HotelController::class, 'index'])->name('hotel.index');
// Route::get('hotel/result', [App\Http\Controllers\Frontend\HotelController::class, 'search'])->name('hotel.search');

// //bus ticket
// Route::get('bus-ticket', [App\Http\Controllers\Frontend\BusController::class, 'index'])->name('bus.index');
// Route::get('get-bus/{id}', [App\Http\Controllers\Frontend\FilterController::class, 'getBus'])->name('bus.get');
// Route::post('bus-ticket/result', [App\Http\Controllers\Frontend\BusController::class, 'search'])->name('bus.search');

// //train ticket
// Route::get('train-ticket', [App\Http\Controllers\Frontend\TrainController::class, 'index'])->name('train.index');
// Route::post('train-ticket/result', [App\Http\Controllers\Frontend\TrainController::class, 'search'])->name('train.search');

// //training_centers
// Route::get('training-centers', [App\Http\Controllers\Frontend\TrainingCenterController::class, 'index'])->name('training_centers.index');
// Route::get('training-centers/result', [App\Http\Controllers\Frontend\TrainingCenterController::class, 'search'])->name('training_centers.search');

// //govt_offices
// Route::get('govt-office', [App\Http\Controllers\Frontend\GovtOfficeController::class, 'index'])->name('govt_office.index');
// Route::get('govt-office/result', [App\Http\Controllers\Frontend\GovtOfficeController::class, 'search'])->name('govt_office.search');

// //govt_offices
// Route::get('electricity', [App\Http\Controllers\Frontend\ElectricityController::class, 'index'])->name('electricity.index');
// Route::get('electricity/result', [App\Http\Controllers\Frontend\ElectricityController::class, 'search'])->name('electricity.search');

// //job
// Route::get('jobs', [App\Http\Controllers\Frontend\JobController::class, 'index'])->name('job.index');

// //help line
// Route::get('help-line', [App\Http\Controllers\Frontend\HelplineController::class, 'index'])->name('helpline.index');

// //police station
// Route::get('police-station', [App\Http\Controllers\Frontend\ThanaController::class, 'index'])->name('thana.index');
// Route::get('police-station/result', [App\Http\Controllers\Frontend\ThanaController::class, 'search'])->name('thana.search');

// Route::get('police-station/{id}/police', [App\Http\Controllers\Frontend\ThanaController::class, 'show'])->name('thana.show');


// //school
// Route::get('educational-institute', [App\Http\Controllers\Frontend\EduInstituteController::class, 'index'])->name('school.index');
// Route::get('educational-institute/result', [App\Http\Controllers\Frontend\EduInstituteController::class, 'search'])->name('school.search');

// //library
// Route::get('libraries', [App\Http\Controllers\Frontend\LibraryController::class, 'index'])->name('library.index');
// Route::get('libraries/result', [App\Http\Controllers\Frontend\LibraryController::class, 'search'])->name('library.search');

// //business idea
// Route::get('business-ideas', [App\Http\Controllers\Frontend\BusinessIdeaController::class, 'index'])->name('business.index');
// Route::get('business-ideas/{slug}', [App\Http\Controllers\Frontend\BusinessIdeaController::class, 'show'])->name('business.show');
// Route::get('business-ideas/type/{id}', [App\Http\Controllers\Frontend\BusinessIdeaController::class, 'type'])->name('business.type');


// //live tv
// Route::get('live-tv', [App\Http\Controllers\Frontend\PageController::class, 'livetv'])->name('livetv.index');


// //blog
Route::get('blog', [App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog.show');


// //plane service
// Route::get('plane-tickets', [App\Http\Controllers\Frontend\PlaneController::class, 'index'])->name('plane.index');
// Route::get('plane-tickets/result', [App\Http\Controllers\Frontend\PlaneController::class, 'search'])->name('plane.search');

// //airline
// Route::get('airline/{slug}', [App\Http\Controllers\Frontend\PlaneController::class, 'airline'])->name('plane.airline');


// //tourist place
// Route::get('tourist-place', [App\Http\Controllers\Frontend\TouristPlaceController::class, 'index'])->name('place.index');
// Route::get('tourist-place/result', [App\Http\Controllers\Frontend\TouristPlaceController::class, 'search'])->name('place.search');


// //shop
// Route::get('shop', [App\Http\Controllers\Frontend\ShopController::class, 'index'])->name('shop.index');
// Route::get('shop/result', [App\Http\Controllers\Frontend\ShopController::class, 'search'])->name('shop.search');

// //story
// Route::get('story', [App\Http\Controllers\Frontend\StoryController::class, 'index'])->name('story.index');
// Route::get('story/{slug}', [App\Http\Controllers\Frontend\StoryController::class, 'show'])->name('story.show');
// Route::get('story/category/{slug}', [App\Http\Controllers\Frontend\StoryController::class, 'category'])->name('story.category');

// //namaz
// Route::get('namaz-time', [App\Http\Controllers\Frontend\NamazController::class, 'index'])->name('namaz.index');


// //coourse
Route::get('course', [App\Http\Controllers\Frontend\CourseController::class, 'index'])->name('course.index');
Route::get('course/{slug}', [App\Http\Controllers\Frontend\CourseController::class, 'show'])->name('course.show');
Route::get('course-apply/{id}', [App\Http\Controllers\Frontend\CourseController::class, 'applyForm'])->name('course.apply.form');
Route::post('course-apply', [App\Http\Controllers\Frontend\CourseController::class, 'apply'])->name('course.apply.submit');

// //Volunteer
Route::get('volunteer', [App\Http\Controllers\Frontend\VolunteerController::class, 'index'])->name('volunteer.index');
Route::get('volunteer/apply', [App\Http\Controllers\Frontend\VolunteerController::class, 'create'])->name('volunteer.create');
Route::get('volunteer/result', [App\Http\Controllers\Frontend\VolunteerController::class, 'search'])->name('volunteer.search');

//contact us
Route::get('contact-us', [App\Http\Controllers\Frontend\PageController::class, 'contact'])->name('contact.index');

//about us
Route::get('about-us', [App\Http\Controllers\Frontend\PageController::class, 'about'])->name('about.index');

//terms and conditions
Route::get('terms-conditions', [App\Http\Controllers\Frontend\PageController::class, 'terms'])->name('terms.index');

//Privacy Policy
Route::get('privacy-policy', [App\Http\Controllers\Frontend\PageController::class, 'privacy'])->name('privacy.index');

//help
Route::get('help', [App\Http\Controllers\Frontend\PageController::class, 'help'])->name('help.index');

//about khulna
Route::get('about-khulna', [App\Http\Controllers\Frontend\PageController::class, 'aboutKhulna'])->name('khulna.index');







// filter
Route::get('get-city/{id}', [App\Http\Controllers\Frontend\FilterController::class, 'getCity']);
Route::get('get-city-option/{id}', [App\Http\Controllers\Frontend\FilterController::class, 'getCitySelect']);


Auth::routes();


Route::get('/{slug}', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('service.index');
