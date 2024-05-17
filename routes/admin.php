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
     Route::get('phpmyinfo', function () {
    phpinfo();
    ini_set('max_execution_time', 18000);
})->name('phpmyinfo');



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


    Route::get('brands/data', [BrandController::class, 'datatable'])->name('brands.data')->can('brands-view');
    Route::get('brands/form', [BrandController::class, 'form'])->name('brands.form')->can('brands-store');
    Route::get('brands/update_status', [BrandController::class, 'updateStatus'])->name('brands.status')->can('brands-status');
    Route::get('brands', [BrandController::class, 'index'])->name('brands.index')->can('brands-view');
    Route::post('brands', [BrandController::class, 'store'])->name('brands.store')->can('brands-store');
    Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('brands.delete')->can('brands-delete');


    Route::get('slider/data', [SliderController::class, 'datatable'])->name('slider.data')->can('slider-view');
    Route::get('slider/form', [SliderController::class, 'form'])->name('slider.form')->can('slider-store');
    Route::get('slider/update_status', [SliderController::class, 'updateStatus'])->name('slider.status')->can('slider-status');
    Route::get('slider', [SliderController::class, 'index'])->name('slider.index')->can('slider-view');
    Route::post('slider', [SliderController::class, 'store'])->name('slider.store')->can('slider-store');
    Route::delete('slider/{slider}', [SliderController::class, 'destroy'])->name('slider.delete')->can('slider-delete');


    Route::get('partners/data', [PartnerController::class, 'datatable'])->name('partners.data')->can('partners-view');
    Route::get('partners/form', [PartnerController::class, 'form'])->name('partners.form')->can('partners-store');
    Route::get('partners/update_status', [PartnerController::class, 'updateStatus'])->name('partners.status')->can('partners-status');
    Route::get('partners', [PartnerController::class, 'index'])->name('partners.index')->can('partners-view');
    Route::post('partners', [PartnerController::class, 'store'])->name('partners.store')->can('partners-store');
    Route::delete('partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.delete')->can('partners-delete');


    Route::get('testimonials/data', [TestimonialController::class, 'datatable'])->name('testimonials.data')->can('testimonials-view');
    Route::get('testimonials/form', [TestimonialController::class, 'form'])->name('testimonials.form')->can('testimonials-store');
    Route::get('testimonials/update_status', [TestimonialController::class, 'updateStatus'])->name('testimonials.status')->can('testimonials-status');
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index')->can('testimonials-view');
    Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store')->can('testimonials-store');
    Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.delete')->can('testimonials-delete');


    Route::get('tags/data', [TagController::class, 'datatable'])->name('tags.data')->can('tags-view');
    Route::get('tags/form', [TagController::class, 'form'])->name('tags.form')->can('tags-store');
    Route::get('tags/update_status', [TagController::class, 'updateStatus'])->name('tags.status')->can('tags-status');;
    Route::get('tags', [TagController::class, 'index'])->name('tags.index')->can('tags-view');
    Route::post('tags', [TagController::class, 'store'])->name('tags.store')->can('tags-store');
    Route::delete('tags/{tag}', [TagController::class, 'destroy'])->name('tags.delete')->can('tags-delete');


    Route::get('team/data', [TeamController::class, 'datatable'])->name('team.data')->can('team-view');
    Route::get('team/form', [TeamController::class, 'form'])->name('team.form')->can('team-store');
    Route::get('team/update_status', [TeamController::class, 'updateStatus'])->name('team.status')->can('team-status');
    Route::get('team', [TeamController::class, 'index'])->name('team.index')->can('team-view');
    Route::post('team', [TeamController::class, 'store'])->name('team.store')->can('team-store');
    Route::delete('team/{team}', [TeamController::class, 'destroy'])->name('team.delete')->can('team-delete');


    Route::get('about/data', [AboutController::class, 'datatable'])->name('about.data')->can('about-view');
    Route::get('about/form', [AboutController::class, 'form'])->name('about.form')->can('about-store');
    Route::get('about/update_status', [AboutController::class, 'updateStatus'])->name('about.status')->can('about-status');
    Route::get('about', [AboutController::class, 'index'])->name('about.index')->can('about-view');
    Route::post('about', [AboutController::class, 'store'])->name('about.store')->can('about-store');
    Route::delete('about/{about}', [AboutController::class, 'destroy'])->name('about.delete')->can('about-delete');


    Route::get('products/data', [ProductController::class, 'datatable'])->name('products.data')->can('products-view');
    Route::get('products/form', [ProductController::class, 'form'])->name('products.form')->can('products-store');
    Route::get('products/update_status', [ProductController::class, 'updateStatus'])->name('products.status')->can('products-status');
    Route::post('products/reorder', [ProductController::class, 'reorder'])->name('products.reorder');
    Route::get('products', [ProductController::class, 'index'])->name('products.index')->can('products-view');
    Route::post('products', [ProductController::class, 'store'])->name('products.store')->can('products-store');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.delete')->can('products-delete');;
    Route::get('products/{product}/replicate', [ProductController::class, 'replicate'])->name('products.replicate')->can('products-store');;


    Route::get('jobs/data', [JobController::class, 'datatable'])->name('jobs.data')->can('jobs-view');
    Route::get('jobs/update_status', [JobController::class, 'updateStatus'])->name('jobs.status')->can('jobs-status');
    Route::get('jobs', [JobController::class, 'index'])->name('jobs.index')->can('jobs-view');
    Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create')->can('jobs-store');
    Route::post('jobs', [JobController::class, 'store'])->name('jobs.store')->can('jobs-store');
    Route::delete('jobs/{job}', [JobController::class, 'destroy'])->name('jobs.delete')->can('jobs-delete');


    Route::get('news/data', [NewsController::class, 'datatable'])->name('news.data')->can('news-view');
    Route::get('news/update_status', [NewsController::class, 'updateStatus'])->name('news.status')->can('news-status');
    Route::get('news', [NewsController::class, 'index'])->name('news.index')->can('news-view');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create')->can('news-store');
    Route::post('news', [NewsController::class, 'store'])->name('news.store')->can('news-store');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.delete')->can('news-delete');


    Route::get('campaigns/data', [CampaignController::class, 'datatable'])->name('campaigns.data')->can('campaigns-view');
    Route::get('campaigns/update_status', [CampaignController::class, 'updateStatus'])->name('campaigns.status')->can('campaigns-status');
    Route::get('campaigns', [CampaignController::class, 'index'])->name('campaigns.index')->can('campaigns-view');
    Route::get('campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create')->can('campaigns-store');;
    Route::post('campaigns', [CampaignController::class, 'store'])->name('campaigns.store')->can('campaigns-store');
    Route::delete('campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('campaigns.delete')->can('campaigns-delete');


    Route::get('albums/data', [AlbumController::class, 'datatable'])->name('albums.data')->can('albums-view');
    Route::get('albums/update_status', [AlbumController::class, 'updateStatus'])->name('albums.status')->can('albums-status');;
    Route::get('albums', [AlbumController::class, 'index'])->name('albums.index')->can('albums-view');;
    Route::post('albums', [AlbumController::class, 'store'])->name('albums.store')->can('albums-store');
    Route::get('albums/create', [AlbumController::class, 'create'])->name('albums.create')->can('albums-store');
    Route::get('albums/{album}', [AlbumController::class, 'show'])->name('albums.show')->can('albums-view');
    Route::delete('albums/{album}', [AlbumController::class, 'destroy'])->name('albums.delete')->can('albums-delete');;


    Route::get('job_applications', [JobApplicationController::class, 'index'])->name('job_applications.index')->can('job-applications-view');
    Route::delete('job_applications/{id}', [JobApplicationController::class, 'destroy'])->name('job_applications.delete')->can('job-applications-delete');
    Route::get('job_applications/data', [JobApplicationController::class, 'datatable'])->name('job_applications.data')->can('job-applications-view');
    Route::get('job_applications/show', [JobApplicationController::class, 'show'])->name('job_applications.show')->can('job-applications-view');
    Route::get('job_applications/export', [JobApplicationController::class, 'export'])->name('job_applications.export')->can('job-applications-view');


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


    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index')->can('contacts-view');
    Route::get('contacts/data', [ContactController::class, 'datatable'])->name('contacts.data')->can('contacts-view');
    Route::get('contacts/update_status', [ContactController::class, 'updateStatus'])->name('contacts.status')->can('contacts-view');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.delete')->can('contacts-delete');;


    Route::delete('/resources/{resource}', [ResourceController::class, 'destroy']);


    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit')->can('settings-edit');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update')->can('settings-edit');

    Route::post('ckeditor/upload', [CkeEditorController::class, 'uploadFile'])->name('ckeditor.upload');

    Route::get('/change-localization', LocalizationController::class)->name('change-localization');


    Route::get('mailing-list', [MailingListController::class, 'index'])->name('mailing_list.index');
    Route::get('mailing-list/data', [MailingListController::class, 'datatable'])->name('mailing_list.data');
    Route::get('mailing-list/export', [MailingListController::class, 'export'])->name('mailing_list.export');




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



