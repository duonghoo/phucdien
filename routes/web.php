<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Route::get('/img/{key?}/{slug}', 'ImagesController@proxy');

Route::get('/amp', 'HomeController@ampIndex');

Route::get('/load-more-posts/{category_id}/{page}', 'CategoryController@loadMorePost');
Route::get('/load-more-posts-home/{page}', 'ProductController@index');

Route::get('/product', 'ProductController@index');
Route::get('/product/{product}', 'ProductController@Product');

/*post*/
Route::get('/amp/{slug}-p{id}.html', 'PostController@ampIndex')->where(['slug' => '[\s\S]+', 'id' => '[0-9]+']);
Route::get('/{slug}-p{id}.html', 'PostController@index')->where(['slug' => '[\s\S]+', 'id' => '[0-9]+']);

/*Category*/
Route::get('/amp/{slug}-c{id}', 'CategoryController@ampIndex')->where(['slug' => '[\s\S]+', 'id' => '[0-9]+']);
Route::get('/amp/{slug}-c{id}/{page}', 'CategoryController@ampIndex')->where(['slug' => '[\s\S]+', 'id' => '[0-9]+','page' => '[0-9]+']);

Route::get('/{slug}-c{id}', 'CategoryController@index')->where(['slug' => '[\s\S]+', 'id' => '[0-9]+']);
Route::get('/{slug}-c{id}/{page}', 'CategoryController@index')->where(['slug' => '[\s\S]+', 'id' => '[0-9]+','page' => '[0-9]+']);

/*Sitemap*/
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap-category.xml', 'SitemapController@category');
Route::get('/sitemap-news.xml', 'SitemapController@news');
Route::get('/sitemap-page.xml', 'SitemapController@page');
Route::get('/sitemap-posts-{year}-{month}.xml', 'SitemapController@post')->where(['year'=>'\d+', 'month'=>'\d+']);
/*Rss*/
Route::get('/rss-feed', 'RssController@index');
Route::get('/rss/home.rss', 'RssController@home');
Route::get('/rss/{slug}.rss', 'RssController@detail')->where(['slug' => '[\s\S]+']);;

// rate 
Route::post('/post/ajax_rate','PostController@ajax_rate')->name('rating');
/*page*/
Route::get('/amp/{slug}.html', 'PageController@ampIndex')->where(['slug' => '[\s\S]+']);
Route::get('/{slug}.html', 'PageController@index')->where(['slug' => '[\s\S]+']);