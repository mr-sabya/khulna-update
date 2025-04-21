<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes();
Route::get('login', [App\Http\Controllers\Backend\Auth\LoginController::class, 'showLoginForm'])->name('login');

// add is_admin middleware to all routes in this file
Route::middleware(['is_admin'])->group(function () {


    Route::get('dashboard', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

    // newspaper
    Route::resource('newspaper-category', App\Http\Controllers\Backend\NewspaperCategoryController::class, ['names' => 'newspaper-category']);
    Route::resource('newspaper', App\Http\Controllers\Backend\NewspaperController::class, ['names' => 'newspaper']);

    //address
    //district
    Route::resource('district', App\Http\Controllers\Backend\DistrictController::class, ['names' => 'district']);

    // division
    Route::resource('division', App\Http\Controllers\Backend\DivisionController::class, ['names' => 'division']);

    //city
    Route::resource('city', App\Http\Controllers\Backend\CityController::class, ['names' => 'city']);

    //blood
    Route::resource('blood', App\Http\Controllers\Backend\BloodController::class, ['names' => 'blood']);

    Route::resource('blood-donor', App\Http\Controllers\Backend\BloodDonorController::class, ['names' => 'blood-donor']);

    //newspaper
    Route::resource('hospital-category', App\Http\Controllers\Backend\HospitalCategoryController::class, ['names' => 'hospital-category']);
    Route::resource('hospital', App\Http\Controllers\Backend\HospitalController::class, ['names' => 'hospital']);

    //ambulance
    Route::resource('ambulance', App\Http\Controllers\Backend\AmbulanceController::class, ['names' => 'ambulance']);

    //food
    Route::resource('food', App\Http\Controllers\Backend\FoodController::class, ['names' => 'food']);

    Route::resource('restaurant', App\Http\Controllers\Backend\RestaurantController::class, ['names' => 'restaurant']);

    //fire servive
    Route::resource('fire-service', App\Http\Controllers\Backend\FireServiceController::class, ['names' => 'fireservice']);

    //journalist
    Route::resource('journalist-category', App\Http\Controllers\Backend\JournalistCategoryController::class, ['names' => 'journalist-category']);
    Route::resource('journalist', App\Http\Controllers\Backend\JournalistController::class, ['names' => 'journalist']);


    //law
    Route::resource('law-department', App\Http\Controllers\Backend\LawDepartmentController::class, ['names' => 'lawdepartment']);
    Route::resource('lawyer', App\Http\Controllers\Backend\LawyerController::class, ['names' => 'lawyer']);

    //doctor
    Route::resource('doctor-type', App\Http\Controllers\Backend\DoctorTypeController::class, ['names' => 'medical']);

    Route::resource('doctor', App\Http\Controllers\Backend\DoctorController::class, ['names' => 'doctor']);

    Route::get('doctor/chamber/{id}', [App\Http\Controllers\Backend\ChamberController::class, 'index'])->name('chamber.index');
    Route::post('chamber/store', [App\Http\Controllers\Backend\ChamberController::class, 'store'])->name('chamber.store');
    Route::get('chamber/edit/{id}', [App\Http\Controllers\Backend\ChamberController::class, 'edit'])->name('chamber.edit');
    Route::put('chamber/edit/{id}', [App\Http\Controllers\Backend\ChamberController::class, 'update'])->name('chamber.update');


    //bus route
    Route::resource('bus-route', App\Http\Controllers\Backend\BusRouteController::class, ['names' => 'busroute']);
    Route::resource('bus-type', App\Http\Controllers\Backend\BusTypeController::class, ['names' => 'bustype']);
    Route::resource('bus', App\Http\Controllers\Backend\BusController::class, ['names' => 'bus']);
    Route::resource('bus-ticket', App\Http\Controllers\Backend\BusTicketController::class, ['names' => 'busticket']);
    Route::resource('bus-counter', App\Http\Controllers\Backend\BusCounterController::class, ['names' => 'buscounter']);



    // ehelp
    Route::resource('ehelp', App\Http\Controllers\Backend\EhelpController::class, ['names' => 'ehelp']);

    // govt office
    Route::resource('govt-office', App\Http\Controllers\Backend\GovtOfficeController::class, ['names' => 'govtoffice']);

    // job
    Route::resource('job', App\Http\Controllers\Backend\JobController::class, ['names' => 'job']);

    // training center
    Route::resource('training-center', App\Http\Controllers\Backend\TrainingCenterController::class, ['names' => 'trainingcenter']);

    // helpline
    Route::resource('helpline', App\Http\Controllers\Backend\HelplineController::class, ['names' => 'helpline']);

    // business
    Route::resource('business-type', App\Http\Controllers\Backend\BusinessTypeController::class, ['names' => 'businesstype']);
    Route::resource('business-idea', App\Http\Controllers\Backend\BusinessIdeaController::class, ['names' => 'businessidea']);

    // library
    Route::resource('library', App\Http\Controllers\Backend\LibraryController::class, ['names' => 'library']);

    //pdf
    Route::resource('pdf', App\Http\Controllers\Backend\PdfController::class, ['names' => 'pdf']);

    // educational institute
    Route::resource('educational-institute-category', App\Http\Controllers\Backend\EducationCategoryController::class, ['names' => 'educationalinstitute-category']);
    Route::resource('educational-institute', App\Http\Controllers\Backend\EducationalInstituteController::class, ['names' => 'educationalinstitute']);


    // train ticket
    Route::resource('train-route', App\Http\Controllers\Backend\TrainRouteController::class, ['names' => 'trainroute']);
    Route::resource('train-class', App\Http\Controllers\Backend\TrainClassController::class, ['names' => 'trainclass']);
    Route::resource('train', App\Http\Controllers\Backend\TrainController::class, ['names' => 'train']);
    Route::resource('train-ticket', App\Http\Controllers\Backend\TrainTicketController::class, ['names' => 'trainticket']);


    //hotel
    Route::resource('hotel', App\Http\Controllers\Backend\HotelController::class, ['names' => 'hotel']);


    // tourist place
    Route::resource('place-type', App\Http\Controllers\Backend\PlaceTypeController::class, ['names' => 'placetype']);
    Route::resource('tourist-place', App\Http\Controllers\Backend\TouristPlaceController::class, ['names' => 'touristplace']);

    // shop
    Route::resource('shop-category', App\Http\Controllers\Backend\ShopCategoryController::class, ['names' => 'shopcategory']);
    Route::resource('shop', App\Http\Controllers\Backend\ShopController::class, ['names' => 'shop']);

    // thana-police
    Route::resource('thana-category', App\Http\Controllers\Backend\ThanaCategoryController::class, ['names' => 'thana-category']);
    Route::resource('thana', App\Http\Controllers\Backend\ThanaController::class, ['names' => 'thana']);
    Route::resource('police', App\Http\Controllers\Backend\PoliceController::class, ['names' => 'police']);

    // blog
    Route::resource('blog-category', App\Http\Controllers\Backend\BlogCategoryController::class, ['names' => 'blogcategory']);
    Route::resource('blog', App\Http\Controllers\Backend\BlogController::class, ['names' => 'blog']);


    // palli bidyut
    Route::resource('palli-bidyut', App\Http\Controllers\Backend\PalliBidyutController::class, ['names' => 'pallibidyut']);

    // story
    Route::resource('story-category', App\Http\Controllers\Backend\StoryCategoryController::class, ['names' => 'storycategory']);
    Route::resource('story', App\Http\Controllers\Backend\StoryController::class, ['names' => 'story']);

    // testimonial
    Route::resource('testimonial', App\Http\Controllers\Backend\TestimonialController::class, ['names' => 'testimonial']);


    // banner
    Route::resource('banner', App\Http\Controllers\Backend\BannerController::class, ['names' => 'banner']);


    // country
    Route::resource('country', App\Http\Controllers\Backend\CountryController::class, ['names' => 'country']);


    // airline
    Route::resource('airline', App\Http\Controllers\Backend\AirlineController::class, ['names' => 'airline']);

    // plane ticket counter
    Route::resource('plane-ticket-counter', App\Http\Controllers\Backend\PlaneCounterController::class, ['names' => 'plane-counter']);

    // plane route
    Route::resource('plane-route', App\Http\Controllers\Backend\PlaneRouteController::class, ['names' => 'plane-route']);

    // plane ticket
    Route::resource('plane-ticket', App\Http\Controllers\Backend\PlaneTicketController::class, ['names' => 'plane-ticket']);


    // volunteer
    Route::resource('volunteer', App\Http\Controllers\Backend\VolunteerController::class, ['names' => 'volunteer']);


    // course category
    Route::resource('course-category', App\Http\Controllers\Backend\CourseCategoryController::class, ['names' => 'course-category']);

    // course
    Route::resource('course', App\Http\Controllers\Backend\CourseController::class, ['names' => 'course']);


    //namaz
    Route::resource('namaz', App\Http\Controllers\Backend\NamazController::class, ['names' => 'namaz']);



    //user
    Route::resource('user', App\Http\Controllers\Backend\UserController::class, ['names' => 'user']);

    Route::get('change-password/{id}', [App\Http\Controllers\Backend\UserController::class, 'updatePasswordView'])->name('password.edit');
    Route::put('change-password/{id}', [App\Http\Controllers\Backend\UserController::class, 'updatePassword'])->name('password.update');


    //setting
    Route::get('setting', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('setting.index');
    Route::post('setting/banner/update', [App\Http\Controllers\Backend\SettingController::class, 'updateBanner'])->name('setting.banner');
    Route::post('setting/about/update', [App\Http\Controllers\Backend\SettingController::class, 'updateAbout'])->name('setting.about');
    Route::post('setting/contact/update', [App\Http\Controllers\Backend\SettingController::class, 'updateContact'])->name('setting.contact');
    Route::post('setting/page/update', [App\Http\Controllers\Backend\SettingController::class, 'updatePage'])->name('setting.page');

    // service
    Route::resource('service', App\Http\Controllers\Backend\ServiceController::class, ['names' => 'service']);
});
