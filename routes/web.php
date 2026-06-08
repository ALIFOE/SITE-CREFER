<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdmissionsController;
use App\Http\Controllers\ProgrammesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticlesAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\VideosAdminController;
use App\Http\Controllers\Admin\PagesAdminController;
use App\Http\Controllers\Admin\AdmissionsAdminController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\ContactAdminController;

// ── Pages publiques ──────────────────────────────────────────
Route::get('/',                 [HomeController::class,       'index'])->name('home');
Route::get('/about',            [AboutController::class,      'index'])->name('about');
Route::get('/gallery',          [GalleryController::class,    'index'])->name('gallery');
Route::get('/articles',         [ArticlesController::class,   'index'])->name('articles');
Route::get('/articles/{id}',    [ArticlesController::class,   'show'])->name('article.show');
Route::get('/contact',          [ContactController::class,    'index'])->name('contact');
Route::post('/contact',         [ContactController::class,    'send'])->name('contact.send');
Route::get('/admissions',       [AdmissionsController::class, 'index'])->name('admissions');
Route::get('/programmes',       [ProgrammesController::class, 'index'])->name('programmes');
Route::get('/cap-electricite',  [ProgrammesController::class, 'cap'])->name('cap');
Route::get('/bt-electrotechnique', [ProgrammesController::class, 'bt'])->name('bt');
Route::get('/formation-modulaire', [ProgrammesController::class, 'modulaire'])->name('modulaire');
Route::get('/blog',               [BlogController::class,        'index'])->name('blog');
Route::get('/blog/{id}',          [BlogController::class,        'show'])->name('blog.show');

// ── Admin — authentification ─────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout',[AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/',          fn() => redirect()->route('admin.dashboard'));
        Route::get('dashboard',  [DashboardController::class, 'index'])->name('dashboard');

        // Articles
        Route::get('articles',            [ArticlesAdminController::class, 'index'])->name('articles');
        Route::get('articles/create',     [ArticlesAdminController::class, 'create'])->name('articles.create');
        Route::post('articles',           [ArticlesAdminController::class, 'store'])->name('articles.store');
        Route::get('articles/{article}/edit',   [ArticlesAdminController::class, 'edit'])->name('articles.edit');
        Route::put('articles/{article}',        [ArticlesAdminController::class, 'update'])->name('articles.update');
        Route::delete('articles/{article}',     [ArticlesAdminController::class, 'destroy'])->name('articles.destroy');

        // Galerie
        Route::get('gallery',             [GalleryAdminController::class, 'index'])->name('gallery');
        Route::get('gallery/create',      [GalleryAdminController::class, 'create'])->name('gallery.create');
        Route::post('gallery',            [GalleryAdminController::class, 'store'])->name('gallery.store');
        Route::get('gallery/{gallery}/edit',   [GalleryAdminController::class, 'edit'])->name('gallery.edit');
        Route::put('gallery/{gallery}',        [GalleryAdminController::class, 'update'])->name('gallery.update');
        Route::delete('gallery/{gallery}',     [GalleryAdminController::class, 'destroy'])->name('gallery.destroy');

        // Vidéos
        Route::get('videos',              [VideosAdminController::class, 'index'])->name('videos');
        Route::get('videos/create',       [VideosAdminController::class, 'create'])->name('videos.create');
        Route::post('videos',             [VideosAdminController::class, 'store'])->name('videos.store');
        Route::get('videos/{video}/edit', [VideosAdminController::class, 'edit'])->name('videos.edit');
        Route::put('videos/{video}',      [VideosAdminController::class, 'update'])->name('videos.update');
        Route::delete('videos/{video}',   [VideosAdminController::class, 'destroy'])->name('videos.destroy');

        // Pages CMS
        Route::get('pages',                    [PagesAdminController::class, 'index'])->name('pages');
        Route::get('pages/{page}/edit',        [PagesAdminController::class, 'edit'])->name('pages.edit');
        Route::put('pages/{page}/sections/{section}', [PagesAdminController::class, 'updateSection'])->name('pages.section.update');

        // Messages contact
        Route::get('contact',                    [ContactAdminController::class, 'index'])->name('contact');
        Route::get('contact/{message}',          [ContactAdminController::class, 'show'])->name('contact.show');
        Route::delete('contact/{message}',       [ContactAdminController::class, 'destroy'])->name('contact.destroy');
        Route::post('contact/destroy-all',       [ContactAdminController::class, 'destroyAll'])->name('contact.destroy-all');
        Route::post('contact/mark-all-read',     [ContactAdminController::class, 'markAllRead'])->name('contact.mark-all-read');

        // Administrateurs
        Route::get('users',                  [AdminUsersController::class, 'index'])->name('users');
        Route::post('users',                 [AdminUsersController::class, 'store'])->name('users.store');
        Route::get('users/{user}/edit',      [AdminUsersController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}',           [AdminUsersController::class, 'update'])->name('users.update');
        Route::delete('users/{user}',        [AdminUsersController::class, 'destroy'])->name('users.destroy');

        // Admissions
        Route::get('admissions',               [AdmissionsAdminController::class, 'index'])->name('admissions');
        Route::post('admissions/images',       [AdmissionsAdminController::class, 'storeImage'])->name('admissions.images.store');
        Route::delete('admissions/images/{image}', [AdmissionsAdminController::class, 'destroyImage'])->name('admissions.images.destroy');
        Route::post('admissions/documents',    [AdmissionsAdminController::class, 'storeDocument'])->name('admissions.documents.store');
        Route::delete('admissions/documents/{document}', [AdmissionsAdminController::class, 'destroyDocument'])->name('admissions.documents.destroy');
    });
});
