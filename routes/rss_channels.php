<?php  

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\UserController;
use App\Models\RssChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/channels', function (Request $request) {
    return view('user.channel.index')->with('list', $request->user()->rssChannel );
})->name('user.channel.index');

Route::get('/channel/add', function () {
    return view('user.channel.add');
})->name('user.channel.add');

Route::post('/channel/add', [ChannelController::class, 'add'] )
->name('user.channel.add.post');

Route::get('/channel/edit/{rss_channel}', function (RssChannel $rss_channel) {
    return view('user.channel.edit')->with('item', $rss_channel);
})->name('user.channel.edit');

Route::put('/channel/edit', [ChannelController::class, 'edit'] )
->name('user.channel.edit.put');

Route::delete('/channel/delete/{rss_channel}', [ChannelController::class, 'delete'] )
->name('user.channel.delete');

Route::get('/channel/refresh/{rss_channel}', [ChannelController::class, 'refresh'] )
->name('user.channel.refresh');

Route::get('/channel/refreshall', [ChannelController::class, 'refreshall'] )
->name('user.channel.refreshall');