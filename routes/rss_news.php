<?php  

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\UserController;
use App\Models\RssChannel;
use App\Models\RssNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/news', function (Request $request) {
    return view('user.news.index')->with('list', 
        $request->user()->rssNews()
                ->where( function($query) use ($request){
                if( $request->has('rss_channel') ) {
                    $query->where('rss_channel_id', $request->rss_channel );
             }
        } )->get() );
})->name('user.news.index');
 
Route::get('/news/details/{rss_news}', function (RssNew $rss_news) {
    return view('user.news.details')->with('item', $rss_news);
})->name('user.news.details');
 