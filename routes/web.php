<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\user\AjaxController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // admin
    Route::middleware(['admin_auth'])->group(function () {
        // Dashboard
        Route::get('admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin#dashboard');

        // customer
        Route::group(['prefix' => 'customer'], function () {
            Route::get('listPage', [CustomerController::class, 'listPage'])->name('customer#listPage');
            Route::get('userList', [CustomerController::class, 'userList'])->name('customer#userList');
            Route::get('adminList', [CustomerController::class, 'adminList'])->name('customer#adminList');
            Route::get('deleteUser/{id}', [CustomerController::class, 'deleteUser'])->name('customer#deleteUser');
            Route::get('userEditPage/{id}', [CustomerController::class, 'userEditPage'])->name('customer#userEditPage');
            Route::get('userChangeRole', [CustomerController::class, 'userRoleChange']);
        });

        // Order
        Route::group(['prefix' => 'order'], function () {
            Route::get('orderList', [OrderController::class, 'orderList'])->name('admin#orderList');
            Route::get('order/details/{id}', [OrderController::class, 'orderDetailsPage'])->name('admin#orderDetailsPage');
            Route::get('orderStatusChange', [OrderController::class, 'orderStatusChange']);
            Route::get('delete/order/{id}', [OrderController::class, 'deleteOrder'])->name('admin#deleteOrder');
        });

        // Message
        Route::group(['prefix' => 'message'], function () {
            Route::get('messageList', [MessageController::class, 'messageList'])->name('admin#messageList');
            Route::get('delete/{id}', [MessageController::class, 'messageDelete'])->name('admin#messageDelete');
            Route::get('details/{id}', [MessageController::class, 'messageDetails'])->name('admin#messageDetails');
            Route::post('admin/reply', [MessageController::class, 'adminReply'])->name('admin#adminReply');
        });

        // Category
        Route::group(['prefix' => 'category'], function () {
            Route::get('categoryList', [CategoryController::class, 'categoryList'])->name('admin#categoryList');
            // Main
            Route::get('addMainCategoryPage', [CategoryController::class, 'addMainCategoryPage'])->name('admin#addMainCategoryPage');
            Route::post('addMainCategory', [CategoryController::class, 'addMainCategory'])->name('admin#addMainCategory');
            Route::get('delete/mainCategory/{id}', [CategoryController::class, 'deleteMainCategory'])->name('admin#deleteMainCategory');
            Route::get('edit/mainCategoryPage/{id}', [CategoryController::class, 'editMainCategoryPage'])->name('admin#editMainCategoryPage');
            Route::post('update/mainCategory/{id}', [CategoryController::class, 'updateMainCategory'])->name('admin#updateMainCategory');
            // Second
            Route::get('addSecCategoryPage', [CategoryController::class, 'addSecCategoryPage'])->name('admin#addSecCategoryPage');
            Route::post('addSecCategory', [CategoryController::class, 'addSecCategory'])->name('admin#addSecCategory');
            Route::get('delete/secCategory/{id}', [CategoryController::class, 'deleteSecCategory'])->name('admin#deleteSecCategory');
            Route::get('edit/secCategoryPage/{id}', [CategoryController::class, 'editSecCategoryPage'])->name('admin#editSecCategoryPage');
            Route::post('update/secCategory/{id}', [CategoryController::class, 'updateSecCategory'])->name('admin#updateSecCategory');

        });

        // Product
        Route::group(['prefix' => 'product'], function () {
            Route::get('productList', [ProductController::class, 'productListPage'])->name('admin#productListPage');
            Route::get('chooseCategoryPage', [ProductController::class, 'chooseCategoryPage'])->name('admin#chooseCategoryPage');
            Route::get('createProductPage', [ProductController::class, 'createProductPage'])->name('admin#creatProductPage');
            Route::post('createProduct', [ProductController::class, 'createProduct'])->name('admin#createProduct');
            Route::get('details/{id}', [ProductController::class, 'productDetails'])->name('admin#productDetails');
            Route::get('delete/{id}', [ProductController::class, 'productDelete'])->name('admin#productDelete');
            Route::get('edit/product/{id}', [ProductController::class, 'editProduct'])->name('admin#editProduct');
            Route::post('edit/update/data', [ProductController::class, 'editUpdateData'])->name('admin#editUpdateData');
        });

        // Setting
        Route::group(['prefix' => 'setting'], function () {
            Route::get('list', [SettingController::class, 'ListPage'])->name('setting#list');
            Route::get('profile', [SettingController::class, 'profilePage'])->name('setting#profile');
            Route::get('profile/edit', [SettingController::class, 'editProfile'])->name('setting#editProfile');
            Route::post('updateProfile', [SettingController::class, 'updateProfile'])->name('setting#updateProfile');
            Route::get('changePasswordPage', [SettingController::class, 'changePasswordPage'])->name('setting#changePwPage');
            Route::post('changePassword', [SettingController::class, 'changePassword'])->name('setting#changePassword');
        });

    });

    // user
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {

        Route::get('homePage', [UserController::class, 'homePage'])->name('user#homePage');
        Route::get('filter/mainCategory/{name}', [UserController::class, 'filterCategory'])->name('user#filterCategory');
        Route::get('filter/secondCategory/{name}', [UserController::class, 'filterSecondCategory'])->name('user#filterSecond');
        Route::get('productDetails/{id}', [UserController::class, 'productDetails'])->name('user#productDetails');
        Route::get('search/product', [UserController::class, 'searchProduct'])->name('user#searchProduct');

        // cart list
        Route::get('cart', [CartController::class, 'cartList'])->name('user#cartList');

        // order list
        Route::get('order/list', [OrderController::class, 'userOrderList'])->name('user#orderList');
        Route::get('order/history', [OrderController::class, 'orderHistory'])->name('user#orderHistory');

        // Contact
        Route::get('contact', [MessageController::class, 'contactPage'])->name('user#contactPage');
        Route::post('contactData', [MessageController::class, 'contactData'])->name('user#contactData');

        // Account
        Route::group(['prefix' => 'account'], function () {
            Route::get('account', [SettingController::class, 'userAccount'])->name('user#account');
            // Profile
            Route::get('profile', [SettingController::class, 'userProfile'])->name('user#profile');
            Route::get('editProfile', [SettingController::class, 'userEditProfile'])->name('user#editProfile');
            Route::post('editData', [SettingController::class, 'editProfileData'])->name('user#editProfileData');
            // Password
            Route::get('changePassword', [SettingController::class, 'userChangePassword'])->name('user#changePassword');
            Route::post('changePasswordData', [SettingController::class, 'changePasswordData'])->name('user#changePasswordData');
            // Contact Message
            Route::get('contact/message', [SettingController::class, 'contactMessagePage'])->name('user#contactMessagePage');
        });
        // Help
        Route::get('privacy/policy', [UserController::class, 'privacyPolicy'])->name('user#privacyPolicy');
        Route::get('teamAndCondition', [UserController::class, 'teamAndCondition'])->name('user#teamAndCondition');

        // ajax
        Route::group(['prefix' => 'ajax'], function () {
            Route::get('addToCard', [AjaxController::class, 'addToCard']);
            Route::get('order', [AjaxController::class, 'order']);

        });

    });

});
