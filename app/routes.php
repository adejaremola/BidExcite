<?php

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


Route::get('/', array('as' => 'index', 'uses' => 'IndexController@getIndex'));

//auth routes
Route::post('/user/signup', array('as' => 'signedup', 'uses' => 'UserController@register'));
Route::post('/user/login', array('as' => 'loggedin', 'uses' => 'UserController@postLogin'));
Route::post('/user/logout', array('as' => 'logout', 'uses' => 'UserController@postLogout'));



//comment routes 
Route::model('comment', 'Comment');
Route::get('my_comments/{id}', array('as' => 'my_comments', 'uses' => 'CommentController@getComments'));

//post routes
Route::post('comments', array('as' => 'comment_created', 'uses' => 'CommentController@postCreateComment'));
Route::put('comments/{comment}', array('as' => 'comment_edited', 'uses' => 'CommentController@postEditComment'));
Route::delete('comments/{comment}', array('as' => 'comment_deleted', 'uses' => 'CommentController@postDeleteComment'));



//deal routes 
Route::model('deal', 'Deal');
Route::get('deals/{deal}', array('as' => 'deal', 'uses' => 'DealController@getDeal'));
Route::get('deals', array('as' => 'deals', 'uses' => 'DealController@getAllDeals'));
Route::get('my_deals/{id}', array('as' => 'my_deals', 'uses' => 'DealController@getDeals'));
Route::get('deal/create', array('as' => 'create_deal', 'before' => 'auth', 'uses' => 'DealController@createDeal'));
Route::get('deal/{deal}/edit', array('as' => 'edit_deal', 'before' => 'auth', 'uses' => 'DealController@editDeal'));
Route::get('deal/{deal}/delete', array('as' => 'delete_deal', 'before' => 'auth', 'uses' => 'DealController@deleteDeal'));

Route::delete('deal/{deal}', array('as' => 'deal_deleted', 'uses' => 'DealController@postDeleteDeal'));
Route::post('deal', array('as' => 'deal_created', 'uses' => 'DealController@postCreateDeal'));
Route::put('deal/{deal}', array('as' => 'deal_edited', 'uses' => 'DealController@postEditDeal'));



//bid routes 
Route::model('bid', 'Bid');
//Route::get('bids/{id}', array('as' => 'bids', 'uses' => 'BidController@getBids'));
Route::get('bids/create/{id}', array('as' => 'create_bid', 'uses' => 'BidController@createBid'));
Route::get('bids/{bid}/edit', array('as' => 'edit_bid', 'uses' => 'BidController@editBid'));
Route::get('bids/{bid}/delete', array('as' => 'delete_bid', 'uses' => 'BidController@deleteBid'));


Route::post('bid', array('as' => 'bid_created', 'uses' => 'BidController@createdBid'));
Route::put('bid/{bid}', array('as' => 'bid_edited', 'uses' => 'BidController@editedBid'));
Route::delete('bid/{bid}', array('as' => 'bid_deleted', 'uses' => 'BidController@deletedBid'));
Route::post('bid/{bid}/accept', array('as' => 'bid_accepted', 'uses' => 'BidController@acceptedBid'));





//profile routes
Route::get('profile/{id}/create', array('as' => 'create_profile', 'uses' => 'UserController@getCreateProfile'));

Route::post('profile/{id}', array('as' => 'profile_create', 'uses' => 'UserController@postCreateProfile'));





//notification routes
Route::get('/notifications', array('as' => 'notifications', 'uses' => 'DealController@getNotifications'));





//news routes
Route::model('news', 'News');

Route::get('news', array('as' => 'news', 'uses' => 'NewsController@getAllNews'));
Route::get('news/{news}', array('as' => 'a_news', 'uses' => 'NewsController@getANews'));
Route::get('my_news/{id}', array('as' => 'my_news', 'uses' => 'NewsController@getMyNews'));
Route::get('news/{news}/edit', array('as' => 'edit_news', 'before' => 'auth', 'uses' => 'NewsController@editNews'));
Route::get('news/{news}/delete', array('as' => 'delete_news', 'before' => 'auth', 'uses' => 'NewsController@deleteNews'));
Route::get('newz/create', array('as' => 'create_news', 'uses' => 'NewsController@makeNews'));


Route::post('news', array('as' => 'news_created', 'uses' => 'NewsController@postCreateNews'));
Route::put('news/{news}', array('as' => 'news_edited', 'uses' => 'NewsController@postEditNews'));
Route::delete('news/{news}', array('as' => 'news_deleted', 'uses' => 'NewsController@postDeleteNews'));
