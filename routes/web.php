<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Artisan;

Route::get('/create-storage-link', function () {
    Artisan::call('storage:link');
    return 'Tautan simbolik ke folder penyimpanan telah�dibuat.';
});

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

//home
Route::get('/home', 'ViewController@home');
Route::post('/store/subscriber', 'ViewController@subscribe');

//profile
Route::get('/profile', 'ViewController@profile');

//Insights
Route::get('/insights/blog', 'ViewController@insight_b');
Route::get('/insights/news', 'ViewController@insight_n');
Route::get('/insights/data', 'ViewController@insight_b_allData');
Route::get('/insights/data/{id}', 'ViewController@insight_b_data');
Route::get('/insights/search/{name}', 'ViewController@insight_b_search');
Route::get('/insights/data2', 'ViewController@insight_n_allData');
Route::get('/insights/search2/{name}', 'ViewController@insight_n_search');
Route::get('/insights/tag/{id}', 'ViewController@insight_n_tag');
Route::get('/insights/{id}', 'ViewController@insight_show');

Route::get('/tag-tag/{id}', 'ViewController@news_tag_data');
Route::get('/tag-blog/{id}', 'ViewController@blog_tag_data');

//Solution
Route::get('/solution', 'ViewController@solution');
Route::get('/solution/detail', 'ViewController@solution_show');
Route::get('/blog/{id}', 'ViewController@blogData');
Route::get('/blog/all', 'ViewController@blogAllData');

//Campaign
Route::get('/campaign', 'ViewController@campaign');
Route::get('/campaign/{id}', 'ViewController@campaign_show');

//Partnership
Route::get('/partnership', 'ViewController@partnership');
Route::get('/partnership/alldata', 'ViewController@pa_data');
Route::get('/partnership/data/{id}', 'ViewController@p_data');

//Customer
Route::get('/customer', 'ViewController@customer');
Route::get('/customer/data/{id}', 'ViewController@c_data');
Route::get('/customer/alldata', 'ViewController@ca_data');

//Career
Route::get('/career', 'ViewController@career');
Route::get('/join/{id}', 'ViewController@job');
Route::post('/join/send', 'ViewController@job_store');
Route::get('/career/data', 'ViewController@allData');
Route::get('/career/data/{name}', 'ViewController@careerData');
Route::get('/career/detail/{id}', 'ViewController@career_show');

//message
Route::get('/message', 'ViewController@message');
Route::post('/message/send','ViewController@message_store');