<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Product Category
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tag
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Product
    Route::apiResource('products', 'ProductApiController');

    // Video
    Route::post('videos/media', 'VideoApiController@storeMedia')->name('videos.storeMedia');
    Route::apiResource('videos', 'VideoApiController');

    // Task Status
    Route::apiResource('task-statuses', 'TaskStatusApiController');

    // Task Tag
    Route::apiResource('task-tags', 'TaskTagApiController');

    // Task
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');
});
Route::post('register', 'Api\\AuthController@register');
Route::post('login', 'Api\\AuthController@login');
