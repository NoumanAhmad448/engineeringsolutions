<?php

use App\Http\Controllers\AdminPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryLogController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseDetailController;
use App\Http\Controllers\Admin\CourseLogController;

$route = Route::prefix("admin");

if (config("setting.enable_admin_domain")) {
    // $route->domain(config("setting.admin_domain"));
}
$route->group(function () {
    Route::post('page/{page}/change-status', [AdminPageController::class, 'changeStatus'])->name('admin_cs_page');
    Route::delete('page/{page}/delete-page', [AdminPageController::class, 'delete'])->name('admin_page_delete');
    Route::get('show-page', [AdminPageController::class, 'view'])->name('admin_v_page');
    Route::get('create-page', [AdminPageController::class, 'createPage'])->name('admin_c_page');
    Route::post('create-page', [AdminPageController::class, 'savePage'])->name('admin_s_page');

    Route::get('page/{page}/edit-page', [AdminPageController::class, 'editPage'])->name('admin_edit_page');
    Route::put('page/{page}/update-page', [AdminPageController::class, 'updatePage'])->name('admin_update_page');

    Route::get('dashboard', [AdminPageController::class, 'dashboard'])->name('admin_dashboard');

    Route::get('categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::get(
        'categories/{category}/logs',
        [CategoryLogController::class, 'index']
    )->name('categories.logs');


    Route::get('courses', [CourseController::class, 'index'])->name('admin.course.index');
    Route::post('courses', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('courses/{course}', [CourseController::class, 'update'])->name('admin.course.update');
    Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('admin.course.delete');

    Route::get('courses/{course}/details', [CourseDetailController::class, 'index'])
        ->name('admin.courses.details');
    Route::post('courses/{course}/details', [CourseDetailController::class, 'store'])
        ->name('admin.courses.details.store');
    Route::delete('course-details/{detail}', [CourseDetailController::class, 'destroy'])
        ->name('admin.courses.details.delete');


    Route::get(
        'admin/course/{course}/logs',
        [CourseLogController::class, 'index']
    )->name('admin.course.logs');

    Route::get(
        'admin/course/{course}/details',
        [CourseDetailController::class, 'index']
    )->name('admin.course.detail.index');

    Route::post(
        'admin/course/{course}/details',
        [CourseDetailController::class, 'store']
    )->name('courses.details.store');

    Route::get(
        'admin/course-detail/{detail}/edit',
        [CourseDetailController::class, 'edit']
    )->name('courses.details.edit');

    Route::put(
        'admin/course-detail/{detail}',
        [CourseDetailController::class, 'update']
    )->name('courses.details.update');

    Route::delete(
        'admin/course-detail/{detail}',
        [CourseDetailController::class, 'delete']
    )->name('courses.details.destroy');
});
