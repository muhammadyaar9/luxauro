<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuitsController;
use App\Http\Controllers\Goldevine\GoldevineCategoryController;
use App\Http\Controllers\Admin\Goldevine\ProjectManageController;





Route::resource('goldevine-category', GoldevineCategoryController::class);
Route::get('project-detail/{id}/{slug}', [ProjectManageController::class, 'projectDetail'])->name('projectDetail')->middleware('auth');
Route::get('project-checkout/{id}', [ProjectManageController::class, 'projectcheckout'])->name('projectcheckout');
Route::post('project-checkout', [ProjectManageController::class, 'projectcheckoutstore'])->name('projectcheckoutstore');
Route::any('project-search', [ProjectManageController::class, 'projectsearch'])->name('projectsearch');

Route::get('project-add-to-favirate', [ProjectManageController::class, 'addToFavirate'])->name('addToFavirate');

Route::get('project-favirate', [ProjectManageController::class, 'favirate'])->name('favirate');

Route::get('project-favirate-removes', [ProjectManageController::class, 'favirateRemove'])->name('removeFacirates');

Route::post('project-add-to-cart', [ProjectManageController::class, 'projectAddToCart'])->name('projectAddToCart');
// Myprofile Admin pnal |Route:

Route::get('create-project', [ProjectManageController::class, 'create'])->name('createProject');
Route::post('create-project', [ProjectManageController::class, 'store'])->name('storeProjectgoldevine');
Route::get('all-project', [ProjectManageController::class, 'allProject'])->name('allprojects');
Route::get('edit-project/{id}', [ProjectManageController::class, 'edit'])->name('editProject');
Route::post('edit-project', [ProjectManageController::class, 'update'])->name('updateProject');

Route::get('filter-Goldevine', [ProjectManageController::class, 'filterGoldevine'])->name('filterGoldevine');
Route::get('filter-trending', [ProjectManageController::class, 'Goldevinetrending'])->name('Goldevinetrending');
Route::get('filter-backend', [ProjectManageController::class, 'goldevinebackeds'])->name('goldevinebackeds');
Route::get('filter-nearly', [ProjectManageController::class, 'goldevinenearly'])->name('goldevinenearly');

Route::any('goldevine-newest',[ProjectManageController::class,'goldevineNewest'])->name('goldevineNewest');
Route::any('goldevine-trending',[ProjectManageController::class,'goldevineTrendings'])->name('goldevineTrendings');
Route::any('goldevine-most-backed',[ProjectManageController::class,'goldevinemostbacked'])->name('goldevinemostbacked');
Route::any('goldevine-nearly',[ProjectManageController::class,'goldevinenearlys'])->name('goldevinenearlys');


// Suits Route
Route::get('suits', [SuitsController::class, 'index'])->name('suits');
Route::post('suits/store', [SuitsController::class, 'store'])->name('suits.store');
Route::get('suits/product/{id}', [SuitsController::class, 'suitsProducts'])->name('suitsProducts');

Route::get('suits/suits_detail/{id}/{slug}', [SuitsController::class, 'suitsSuitsDetail'])->name('suitsSuitsDetail');


Route::get('remove-project/', [ProjectManageController::class, 'removeGoldevineproject'])->name('removeGoldevineproject');
// Suits Route
