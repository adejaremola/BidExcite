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
Route::get('bids', array('as' => 'my_bids', 'uses' => 'BidController@getMyBids'));
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
Route::get('notifications', array('as' => 'notifs', 'uses' => 'NotificationController@getNotifications'));





//blog routes
Route::model('blog', 'Blog');

Route::get('blog', array('as' => 'blogs', 'uses' => 'BlogController@getAllBlogs'));
Route::get('blog/{blog}', array('as' => 'a_blog', 'uses' => 'BlogController@getABlog'));
Route::get('my_blogs/{id}', array('as' => 'my_blogs', 'uses' => 'BlogController@getMyBlogs'));
Route::get('blogs/{blog}/edit', array('as' => 'edit_blog', 'before' => 'auth', 'uses' => 'BlogController@editBlog'));
Route::get('blogs/{blog}/delete', array('as' => 'delete_blog', 'before' => 'auth', 'uses' => 'BlogController@deleteBlog'));
Route::get('blogs/create', array('as' => 'create_blog', 'uses' => 'BlogController@makeBlog'));


Route::post('blog', array('as' => 'blog_created', 'uses' => 'BlogController@postCreateBlog'));
Route::put('blogs/{blog}', array('as' => 'blog_edited', 'uses' => 'BlogController@postEditBlog'));
Route::delete('blogs/{blog}', array('as' => 'blog_deleted', 'uses' => 'BlogController@postDeleteBlog'));
