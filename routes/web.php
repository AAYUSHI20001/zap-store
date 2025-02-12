<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('index');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/add-product', function () {
    return view('add-product');
});
Route::get('/edit', function () {
    return view('edit');
});
Route::get('/create', function () {
    return view('create');
});
Route::get('/purchases', function () {
    return view('purchases');
});
Route::get('/create-purchases', function () {
    return view('create-purchases');
});
Route::get('/sales', function () {
    return view('sales');
});
Route::get('/create-sales', function () {
    return view('create-sales');
});
Route::get('/add-sales', function () {
    return view('add-sales');
});
Route::get('/pos', function () {
    return view('pos');
});
Route::get('/login', function () {
    return view('login');
});