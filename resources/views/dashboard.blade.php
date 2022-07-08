@extends('template.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        @foreach($poll as $polling)
        <div class="col-md-12 p-3">
            <div class="card p-4 h-100 position-relative">
            <form action="/" method="POST">
                @csrf
                <input type="hidden" name="poll_id" value="{{$polling->id}}">
                <p> Created by : {{$polling->User->username}} | Deadline : {{$polling->deadline}}</p>
                <h3>{{$polling->title}}</h3>
                <p>{{$polling->description}}</p>

                    @php
                        $done = DB::table('votes')->where('user_id', auth()->user()->id)->where('poll_id', $polling->id)->count();
                    @endphp

                @foreach($polling->Choices as $choice)
                <div class="form-inline my-1">
                    @if ($done == 0 && $polling->deadline > date('Y-m-d H:i:s', strtotime(now())) && auth()->user()->role != 'admin') 
                        <input type="radio" name="choice_id" id="1" class="d-inline pt-1" value="{{$choice->id}}">
                        <label class="d-inline ml-2" for="1">{{$choice->choice}}</label>
                    @else
                        @php
                            $result = DB::table('votes')->where('choice_id', $choice->id)->where('poll_id',$polling->id)->count();   
                            $total = DB::table('votes')->where('poll_id',$polling->id)->count();
                            
                            if ( $total == 0){
                                $score = 0; 
                            } else  {
                                $score = $result/$total*100;
                            }
                        @endphp
                    
                        <label class="d-inline ml-2" for="1">{{$choice->choice}} {{number_format($score,2)}}%</label>
                    @endif
                </div>
                @endforeach
                    @if ($done == 0 && $polling->deadline > date('Y-m-d H:i:s', strtotime(now())) && auth()->user()->role != 'admin') 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-3 px-3">Vote</button>
                    </div>
                    @endif
            </form>
            </div>
        </div>
        @endforeach
    </div>
</div> 
@endsection