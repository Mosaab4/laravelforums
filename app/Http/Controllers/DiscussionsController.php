<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Auth;
use Session;
class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss');
    }

    public function store()
    {
        $r = request();

        $this->validate(request() ,[
            'channel_id'=>'required',
            'content'=>'required',
            'title'=>'required'
        ]);

        $discussion = Discussion::create([
            'title'=>$r->title,
            'content'=>$r->content,
            'channel_id'=>$r->channel_id,
            'user_id'=> Auth::id(),
            'slug'=>str_slug($r->title)
        ]);

        Session::flash('success', 'Discussion succesfully created');
        
        return redirect()->route('discussion', ['slug'=>$discussion->slug]);
    }

    public function show($slug)
    {
        return view('discussions.show')->with('discussion',Discussion::where('slug',$slug)->first());
    }
}

