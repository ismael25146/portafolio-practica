<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ContactMessageController;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/resume', [PublicController::class, 'index'])->name('resume');
Route::get('/jobs', [PublicController::class, 'index'])->name('jobs');
Route::get('/blog', [PublicController::class, 'index'])->name('blog');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::get('/admin', function() {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
Route::post('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
Route::post('/admin/projects/{project}/delete', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

Route::get('/admin/skills', [SkillController::class, 'index'])->name('admin.skills.index');
Route::post('/admin/skills', [SkillController::class, 'store'])->name('admin.skills.store');
Route::post('/admin/skills/{skill}', [SkillController::class, 'update'])->name('admin.skills.update');
Route::post('/admin/skills/{skill}/delete', [SkillController::class, 'destroy'])->name('admin.skills.destroy');

Route::get('/admin/experiences', [ExperienceController::class, 'index'])->name('admin.experiences.index');
Route::post('/admin/experiences', [ExperienceController::class, 'store'])->name('admin.experiences.store');
Route::post('/admin/experiences/{experience}', [ExperienceController::class, 'update'])->name('admin.experiences.update');
Route::post('/admin/experiences/{experience}/delete', [ExperienceController::class, 'destroy'])->name('admin.experiences.destroy');

Route::get('/admin/contact', [ContactMessageController::class, 'index'])->name('admin.contact.index');
Route::post('/admin/contact/{contactMessage}/delete', [ContactMessageController::class, 'destroy'])->name('admin.contact.destroy');
Route::post('/admin/contact/{contactMessage}/read', [ContactMessageController::class, 'markRead'])->name('admin.contact.read');