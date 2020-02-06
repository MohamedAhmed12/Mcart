<?php
/**
 * Apis for Guest users(to allow them to login, register, etc.)
 * PHP version 7.2
 */
Route::group(
    ['prefix' => 'auth'],
    function () {
        Route::post('register', App\Users\Actions\RegisterUserAction::class);
    }
);
