@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{ asset($d->user->avatar) }}" alt="{{ $d->user->name }}" width="40px" height="40px">&nbsp;&nbsp;&nbsp;

            <span>{{ $d->user->name }} <b>({{ $d->user->points }})</b></span>

           
            @if ($d->is_being_watched_by_auth_user())
                <a href="{{ route('discussion.unwatch',['id'=>$d->id ]) }}" style="margin-left:9px;" class="btn btn-default btn-xs pull-right">unwatch</a>
            @else
                <a href="{{ route('discussion.watch',['id'=>$d->id ]) }}" style="margin-left:9px;" class="btn btn-default btn-xs pull-right">Watch</a>
            @endif

            @if(Auth::id() == $d->user->id)
                @if(!$d->hasBestAnswer())
                    <a href="{{ route('discussions.edit',['slug'=>$d->slug ]) }}" style="margin-left:9px;" class="btn btn-info btn-xs pull-right">Edit</a>                
                @endif
            @endif


            @if($d->hasBestAnswer())
                <span class="btn btn-success pull-right btn-xs">closed</span>                
            @else
                <span class="btn btn-danger pull-right btn-xs">open</span>
            @endif


        </div>

        <div class="panel-body">
            <h4 class="text-center">
                <b>{{ $d->title }}</b>
            </h4>

            <hr>

            <p class="text-center">
                {!! Markdown::convertToHtml($d->content) !!}
            </p>

            <hr>

            @if($best_answer)
               <div class="text-center" style="padding:40px;">
                    <h3 class="text-center">BEST ANSWER</h3>
                   <div class="panel panel-success">
                       <div class="panel-heading">
                            <img src="{{ asset($best_answer->user->avatar) }}" alt="{{ $best_answer->user->name }}" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <span>{{ $best_answer->user->name }} <b>({{ $best_answer->user->points }})</span>            
                       </div>

                       <div class="panel-body">
                           {!! Markdown::convertToHtml($best_answer->content) !!}
                       </div>
                   </div>
               </div> 
            @endif
        </div>
        
        <div class="panel-footer">
            <span>{{ $d->replies->count() }} Replies</span>
            <a href="{{ route('channel',['slug'=>$d->channel->slug] )}}" class="pull-right btn btn-default btn-xs">{{ $d->channel->title }}</a>
        </div>
    </div>

    
    @foreach ($d->replies as $r)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ asset($r->user->avatar) }}" alt="{{ $r->user->name }}" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
    
                <span>{{ $r->user->name }} <b>({{ $r->user->points }})</span>

                @if(!$best_answer)
                    @if(Auth::id() == $d->user->id)
                        <a href="{{ route('discussion.best.answer',['id'=>$r->id ] ) }} " class="btn btn-xs btn-primary pull-right" style="margin-left:8px;">Mark as best answer</a>                        
                    @endif
                @endif
                
                @if(Auth::id() == $r->user->id)
                    @if(!$r->best_answer) 
                        <a href="{{ route('reply.edit',['id'=>$r->id ] ) }} " class="btn btn-xs btn-info pull-right">Edit</a>
                    @endif
                @endif
    
            </div>
    
            <div class="panel-body">
                <p class="text-center">
                    {!! Markdown::convertToHtml($r->content) !!}
                </p>
            </div>
    
            <div class="panel-footer">
                @if ($r->is_liked_by_auth_user())
                    <a href="{{ route('reply.unlike', ['id'=>$r->id]) }}" class="btn btn-xs btn-danger">Unlike <span class="badge">{{ $r->likes->count() }}</a>
                @else
                <a href="{{ route('reply.like', ['id'=>$r->id]) }}" class="btn btn-xs btn-success">Like <span class="badge">{{ $r->likes->count() }}</span></a>
                @endif
            </div>
        </div>
    @endforeach

    <div class="panel panel-default">
        <div class="panel-body">
            @if (Auth::check())                                
                <form action="{{ route('discussion.reply',['id'=>$d->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="reply">Leave a reply</label>
                        <textarea name="reply" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary pull-right">Leave a reply</button>
                    </div>
                </form>
            @else
                <div class="text-center">
                    <h2><a href="{{ route('login') }}" style="text-decoration:none;">Sign in</a> to leave a reply</h2>
                </div>
            @endif

    </div>
@endsection
