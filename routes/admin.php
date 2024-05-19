<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CkeEditorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EngineerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\MailingListController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/', HomeController::class)->name('home');

    Route::get('engineers/data', [EngineerController::class, 'datatable'])->name('engineers.data')->can('products-view');
    Route::get('engineers/form', [EngineerController::class, 'form'])->name('engineers.form')->can('products-store');
    Route::get('engineers/update_status', [EngineerController::class, 'updateStatus'])->name('engineers.status')->can('products-status');
    Route::post('engineers/reorder', [EngineerController::class, 'reorder'])->name('engineers.reorder');
    Route::get('/engineers', [EngineerController::class, 'index'])->name('engineers.index')->can('products-view');
    Route::post('engineers', [EngineerController::class, 'store'])->name('engineers.store')->can('products-store');
    Route::delete('engineers/{engineer}', [EngineerController::class, 'destroy'])->name('engineers.delete')->can('products-delete');;
    Route::post('engineers/upload', [EngineerController::class, 'import'])->name('engineers.file')->can('products-delete');;
     Route::get('engineers/download', [EngineerController::class, 'export'])->name('engineers.export')->can('products-delete');;




    Route::get('admins/data', [AdminController::class, 'datatable'])->name('admins.data')->can('admins-view');
    Route::get('admins/form', [AdminController::class, 'form'])->name('admins.form')->can('admins-store');
    Route::get('admins/update_status', [AdminController::class, 'updateStatus'])->name('admins.status')->can('admins-status');
    Route::get('admins', [AdminController::class, 'index'])->name('admins.index')->can('admins-view');
    Route::post('admins', [AdminController::class, 'store'])->name('admins.store')->can('admins-store');
    Route::delete('admins/{admin}', [AdminController::class, 'destroy'])->name('admins.delete')->can('admins-delete');


    Route::get('users/data', [UserController::class, 'datatable'])->name('users.data')->can('users-view');
    Route::get('users/form', [UserController::class, 'form'])->name('users.form')->can('users-store');
    Route::get('users/update_status', [UserController::class, 'updateStatus'])->name('users.status')->can('users-status');
    Route::get('users', [UserController::class, 'index'])->name('users.index')->can('users-view');
    Route::post('users', [UserController::class, 'store'])->name('users.store')->can('users-store');
    Route::delete('users/{slider}', [UserController::class, 'destroy'])->name('users.delete')->can('users-delete');


    Route::get('roles', [RoleController::class, 'index'])->name('roles.index')->can('roles-view');
    Route::get('roles/data', [RoleController::class, 'datatable'])->name('roles.data')->can('roles-view');;
    Route::post('roles', [RoleController::class, 'process'])->name('roles.process')->can('roles-store');
    Route::get('roles/form', [RoleController::class, 'form'])->name('roles.form')->can('roles-store');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy')->can('roles-delete');;


    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/data', [PermissionController::class, 'datatable'])->name('permissions.data');
    Route::post('permissions', [PermissionController::class, 'process'])->name('permissions.process');
    Route::get('permissions/form', [PermissionController::class, 'form'])->name('permissions.form');
    Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');




    Route::delete('/resources/{resource}', [ResourceController::class, 'destroy']);


    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit')->can('settings-edit');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update')->can('settings-edit');

    Route::post('ckeditor/upload', [CkeEditorController::class, 'uploadFile'])->name('ckeditor.upload');

    Route::get('/change-localization', LocalizationController::class)->name('change-localization');







//    Route::get('loop_routes', function () {
//        $routes = Route::getRoutes();
//
//        foreach ($routes as $route) {
//
//            $permissionAlias = $route->action['middleware'][2] ?? '';
//            if (!$permissionAlias) continue;
//
//
//            $permissionName = explode(':', $permissionAlias)[1];
//            $permission = explode('-', $permissionName);
//
//            $parentName = $permission[0];
//            $childName = $permission[1];
//
//
//            echo 'parent name ' . $parentName . '<br>';
//            echo 'child name ' . $permissionName . '<br>';
//
//
//            if ($parentName && $permissionName) {
//                $parent = \App\Models\TPermission::where(['name' => $parentName])->first();
//                if ($parent) {
//                    $child = $parent->children()->where(['name' => $permissionName])->first();
//                    if (!$child) {
//                        $parent->children()->create(['name' => $permissionName, 'display_name' => $permissionName, 'guard_name' => 'admin']);
//                    }
//                }
//            }
//
//        }
//
//        echo '[+] Done';
//    });

});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('post_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



