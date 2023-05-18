<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductCotroller;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\GoldevineRuleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductTypeCotroller;
use App\Http\Controllers\GoldevineAboutUsController;
use App\Http\Controllers\Admin\ProductMangeCotroller;
use App\Http\Controllers\Admin\ShippingTypeCotroller;
use App\Http\Controllers\LearnAboutTribridController;
use App\Http\Controllers\Admin\DelivoryOptionCotroller;
use App\Http\Controllers\LearnAboutGoldevineController;
use App\Http\Controllers\Admin\BusinessSettingsController;
use App\Http\Controllers\Admin\Goldevine\GoldevineMageController;
use App\Http\Controllers\Admin\Goldevine\ProjectResourceController;

Route::get('admin-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('category', CategoryController::class);
Route::resource('delivory-option', DelivoryOptionCotroller::class);
Route::resource('shipping-type', ShippingTypeCotroller::class);
Route::resource('product-type', ProductTypeCotroller::class);
Route::resource('product', ProductCotroller::class);
Route::resource('admin-goudevine-project', ProjectResourceController::class);
Route::resource('banner', BannerController::class);
Route::resource('home-slider', HomeSliderController::class);


Route::get('product-active', [ProductMangeCotroller::class, 'suspended'])->name('product.suspended');
Route::get('product-suspended', [ProductMangeCotroller::class, 'active'])->name('product.active');
Route::get('product/{id}/{slug}', [ProductMangeCotroller::class, 'productcategory'])->name('productcategory');

Route::get('product/type-Feature/{id}/{slug}', [ProductMangeCotroller::class, 'productType'])->name('productType');
Route::get('product/type-normal/{id}/{slug}', [ProductMangeCotroller::class, 'productTypenormal'])->name('productTypenormal');

Route::get('all-category', [ProductMangeCotroller::class, 'allcategory'])->name('allcategory');
Route::get('productsabc/{id}', [ProductMangeCotroller::class, 'getRelatedProducts']);
Route::get('productsabc/{slug}', [ProductMangeCotroller::class, 'product']);
Route::get('product-detail/{id}/{slug}', [ProductMangeCotroller::class, 'productDetails'])->name('productDetails');
Route::get('add-cart', [ProductMangeCotroller::class, 'addtocart'])->name('addtocart');
Route::get('order-destroy', [ProductMangeCotroller::class, 'orderdestroy'])->name('orderdestroy');
Route::get('all-local-luxauro', [ProductMangeCotroller::class, 'localluxauro'])->name('localluxauro');
Route::get('checkout', [CartController::class, 'index'])->name('checkout');
Route::get('destroy-checkout', [CartController::class, 'destroycheckout'])->name('order.destroycheckout');
Route::post('payment-type', [CartController::class, 'paymenttype'])->name('order.paymenttype');
Route::get('order-show', [OrderController::class, 'index'])->name('order.show');
Route::get('my-order', [OrderController::class, 'myorder'])->name('order.myorder');
Route::get('my-order-invoice/{id}', [OrderController::class, 'myorderinvoice'])->name('order.myorder.invoice');



Route::get('order-invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');
Route::get('project/suspended', [GoldevineMageController::class, 'projectsuspended'])->name('project.suspended');
Route::get('project/active', [GoldevineMageController::class, 'projectactive'])->name('project.active');

Route::get('project/detail/{id}/{slug}', [GoldevineMageController::class, 'projectdetail'])->name('project.detail');

// website setting
Route::group(['prefix' => 'website'], function () {
    Route::controller(WebsiteController::class)->group(function () {
        Route::get('/footer', 'footer')->name('website.footer');
        Route::get('/header', 'header')->name('website.header');
        Route::get('/appearance', 'appearance')->name('website.appearance');
        Route::get('/pages', 'pages')->name('website.pages');
    });

    // Custom Page
    Route::resource('custom-pages', PageController::class);
    Route::controller(PageController::class)->group(function () {
        Route::get('/custom-pages/edit/{id}', 'edit')->name('custom-pages.edit');
        Route::get('/custom-pages/destroy/{id}', 'destroy')->name('custom-pages.destroy');
    });


    Route::controller(PageController::class)->group(function () {
        //mobile app balnk page for webview
        Route::get('/mobile-page/{slug}', 'mobile_custom_page')->name('mobile.custom-pages');

        //Custom page
        Route::get('/{slug}', 'show_custom_page')->name('custom-pages.show_custom_page');
    });

    // Business Settings
    Route::controller(BusinessSettingsController::class)->group(function () {
        Route::post('/business-settings/update', 'update')->name('business_settings.update');
        Route::post('/business-settings/update/activation', 'updateActivationSettings')->name('business_settings.update.activation');
        Route::get('/general-setting', 'general_setting')->name('general_setting.index');
        Route::get('/activation', 'activation')->name('activation.index');
        Route::get('/payment-method', 'payment_method')->name('payment_method.index');
        Route::get('/file_system', 'file_system')->name('file_system.index');
        Route::get('/social-login', 'social_login')->name('social_login.index');
        Route::get('/smtp-settings', 'smtp_settings')->name('smtp_settings.index');
        Route::get('/google-analytics', 'google_analytics')->name('google_analytics.index');
        Route::get('/google-recaptcha', 'google_recaptcha')->name('google_recaptcha.index');
        Route::get('/google-map', 'google_map')->name('google-map.index');
        Route::get('/google-firebase', 'google_firebase')->name('google-firebase.index');

        //Facebook Settings
        Route::get('/facebook-chat', 'facebook_chat')->name('facebook_chat.index');
        Route::post('/facebook_chat', 'facebook_chat_update')->name('facebook_chat.update');
        Route::get('/facebook-comment', 'facebook_comment')->name('facebook-comment');
        Route::post('/facebook-comment', 'facebook_comment_update')->name('facebook-comment.update');
        Route::post('/facebook_pixel', 'facebook_pixel_update')->name('facebook_pixel.update');

        Route::post('/env_key_update', 'env_key_update')->name('env_key_update.update');
        Route::post('/payment_method_update', 'payment_method_update')->name('payment_method.update');
        Route::post('/google_analytics', 'google_analytics_update')->name('google_analytics.update');
        Route::post('/google_recaptcha', 'google_recaptcha_update')->name('google_recaptcha.update');
        Route::post('/google-map', 'google_map_update')->name('google-map.update');
        Route::post('/google-firebase', 'google_firebase_update')->name('google-firebase.update');

        Route::get('/verification/form', 'seller_verification_form')->name('seller_verification_form.index');
        Route::post('/verification/form', 'seller_verification_form_update')->name('seller_verification_form.update');
        Route::get('/vendor_commission', 'vendor_commission')->name('business_settings.vendor_commission');
        Route::post('/vendor_commission_update', 'vendor_commission_update')->name('business_settings.vendor_commission.update');

        //Shipping Configuration
        Route::get('/shipping_configuration', 'shipping_configuration')->name('shipping_configuration.index');
        Route::post('/shipping_configuration/update', 'shipping_configuration_update')->name('shipping_configuration.update');

        // Order Configuration
        Route::get('/order-configuration', 'order_configuration')->name('order_configuration.index');
    });
});

Route::get('product-detail/{id}/{slug}', [ProductMangeCotroller::class, 'productDetails'])->name('productDetails');

Route::get('merchant/my-order', [OrderController::class, 'merchantMyOrders'])->name('merchant.myOrders');
Route::get('merchant/my-order-invoice/{id}', [OrderController::class, 'merchantMyOrderInvoice'])->name('merchant.myOrder.invoice');

Route::get('admin/contact-us', [UserController::class, 'adminContactUs'])->name('adminContactUs');

Route::get('admin/goldeive/contact-us', [UserController::class, 'admingoldevineContactUs'])->name('admingoldevineContactUs');

Route::resource('admin/about-us', AboutUsController::class);
Route::resource('admin/goldevine-about-us', GoldevineAboutUsController::class);
Route::resource('admin/learn-about-gold', LearnAboutGoldevineController::class);
Route::resource('admin/learn-about-tribrid', LearnAboutTribridController::class);
Route::resource('admin/goldevine-rule', GoldevineRuleController::class);
