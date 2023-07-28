<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChannelRequest;
use App\Models\RssChannel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ChannelController extends Controller
{


    /*
     *  @param \App\Http\Requests\ChannelRequest $request
     *  @return \Illuminate\Http\RedirectResponse 
     */
    function add(ChannelRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->rssChannel()->create($validated);

        return redirect()->back()->with('successMessage', __('Successfully operation!'));
    }


    /*
    *  @param \App\Http\Requests\ChannelRequest $request
    *  @return \Illuminate\Http\RedirectResponse
    **/
    function edit(ChannelRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->rssChannel()->update($validated);

        return redirect()->back()->with('successMessage', __('Successfully operation!'));
    }


    /*
     *  @param \App\Models\RssChannel $rss_channel
     *  @return \Illuminate\Http\RedirectResponse  
    */
    function delete(RssChannel $rss_channel): RedirectResponse
    {
        $rss_channel->delete();

        return redirect()->back()->with('successMessage', __('Successfully operation!'));
    }

    /*
    * @param \App\Models\RssChannel $rss_channel
    * @param bool $redirect
    * @return mixed
    */
    function refresh(RssChannel $rss_channel, $redirect = true): mixed
    {

        set_time_limit(0);

        $channelurl = $rss_channel->url;

        try {
            $content = file_get_contents($channelurl);

            // Instantiate XML element
            $a = new \SimpleXMLElement($content);
            foreach ($a->channel->item as $entry) {
                $rss_channel->rssNews()->updateorcreate([
                    'link' => $entry->link
                ], [
                    "title" => $entry->title,
                    "description" => $entry->description,
                    "author" => $entry->author,
                    "pub_date" => $entry->pubDate,
                    "image" => $entry->enclosure
                ]);

                $rss_channel->update(['last_refresh'=>time()]);
            }
        } catch (\Exception $e) {
            dd($e);
        }

       
            return $redirect ? 
                redirect()->back()->with('successMessage', __('Successfully operation!')) : true ;

    }


    /*
     * @param \Illuminate\Http\Request $request
     * @return void
    */
    function refreshAll(Request $request): RedirectResponse
    {
        foreach ($request->user()->rssChannel as $channel) {
            $this->refresh($channel, false);
        }

        return redirect()->back()->with('successMessage', __('Successfully operation!'));
    }


    function refreshGlobaly() : void 
    {   $count=0;
        foreach (RssChannel::get() as $channel) {
            
            if($channel->last_refresh + ($channel->refresh_interval*60) < time()) {
                $this->refresh($channel, false);
                $count++;
            }
        }
        print "{$count} channels in the app, successfully refreshed!";
    }
}
