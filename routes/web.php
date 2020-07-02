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


Route::get('/', function () {
    return view('welcome');
});*/

use App\Tickets;
//use Request;

Route::get('/', 'TicketsController@create');

Route::post('/store', 'TicketsController@store');

Route::get('/tickets/{ticket_id?}', 'TicketsController@show');

Route::post('/search', 'TicketsController@search');

Route::get('/login', 'AuthController@index');

Route::post('open_ticket/{ticket_id}', 'TicketsController@open');

Route::post('close_ticket/{ticket_id}', 'TicketsController@close');

Route::post('comment', 'TicketsController@UpdateComment');

Route::get('/logout', 'AuthController@logout');

Auth::routes();

Route::get('/home', 'TicketsController@index')->name('home');


Route::any ( '/search_customer', function () {
    $q = Request::get ( 'q' );
    if($q != ""){
    $tickets = Tickets::where ( 'customer_name', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
    $pagination = $tickets->appends ( array (
                'q' => Request::get ( 'q' ) 
        ) );
    if (count ( $tickets ) > 0)
        return view('tickets.index', compact('tickets'))->withQuery ( $q );
    }
    return view('tickets.index', compact('tickets'));
} );
