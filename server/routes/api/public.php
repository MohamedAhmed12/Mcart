<?php

Route::get('/categories', \App\Categories\Actions\IndexCategoriesAction::class);
Route::get('/products', \App\Products\Actions\IndexProductsAction::class);

// Route::group(['prefix' => 'auth'], function () {
//     Route::post('register', );
// });

Route::get('/products/{product}', \App\Products\Actions\ShowProductAction::class);
