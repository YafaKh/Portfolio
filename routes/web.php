<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\PublicPageController;


Route::get('/', [PublicPageController::class,'index'])->name('home');
Route::get('/contactMe', [PublicPageController::class,'contactMe'])->name('contactMe');
Route::post('/contactMe/store', [PublicPageController::class,'store'])->name('storeContact');
Route::get('/aboutMe', [PublicPageController::class,'aboutMe'])->name('aboutMe');

Route::prefix('/admin')->group(function(){

    Route::prefix('/skills')->group(function(){
        Route::get('/list', [SkillsController::class,'list'])->name('skills');
        Route::get('/add', [SkillsController::class,'add'])->name('addSkill');
        Route::post('/insert', [SkillsController::class,'insert'])->name('insertSkill');
        Route::get('/{id}/edit', [SkillsController::class,'edit'])->name('editSkill');
        Route::post('/{id}/{name}/update', [SkillsController::class,'update'])->name('updateSkill');
        Route::get('/{id}/delete', [SkillsController::class,'delete'])->name('deleteSkill');
        Route::post('/{id}/changeVisabiliy', [SkillsController::class,'changeVisabiliy'])->name('changeSkillVisabiliy');
    });
    Route::prefix('/projects')->group(function(){
        Route::get('/list', [ProjectsController::class,'list'])->name('projects');
        Route::get('/add', [ProjectsController::class,'add'])->name('addProject');
        Route::post('/insert', [ProjectsController::class,'insert'])->name('insertProject');
        Route::get('/{id}/edit', [ProjectsController::class,'edit'])->name('editProject');
        Route::post('/{id}/update', [ProjectsController::class,'update'])->name('updateProject');
        Route::get('/{id}/delete', [ProjectsController::class,'delete'])->name('deleteProject');
        Route::post('/{id}/changeVisabiliy', [ProjectsController::class,'changeVisabiliy'])->name('changeProjectVisabiliy');
    });
    Route::prefix('/contactInfo')->group(function(){
        Route::get('/list', [ContactInfoController::class,'list'])->name('contactInfo');
        Route::get('/add', [ContactInfoController::class,'add'])->name('addContactInfo');
        Route::post('/insert', [ContactInfoController::class,'insert'])->name('insertContactInfo');
        Route::get('/{id}/edit', [ContactInfoController::class,'edit'])->name('editContactInfo');
        Route::post('/{id}/update', [ContactInfoController::class,'update'])->name('updateContactInfo');
        Route::get('/{id}/delete', [ContactInfoController::class,'delete'])->name('deleteContactInfo');
        Route::post('/{id}/changeVisabiliy', [ContactInfoController::class,'changeVisabiliy'])->name('changeVisabiliy');
    });
});
