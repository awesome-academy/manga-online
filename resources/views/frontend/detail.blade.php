@extends('frontend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/home.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 m-portlet__body">
        <h4 class="m--font-primary"><a href="/"><b>{{ __('trans.Home') }}</b></a> >> {{ $manga->name }}</h4><br>
        <h3 class="text-center m--font-success text-uppercase">{{ $manga->name }}</h3><br>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <a href="{{ asset('manga') }}/{{ $manga->slug }}">
                    <img class="width200" src="{{ asset('storage') }}{{ $manga->image }}">
                </a>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <ul class="list-info">
                    <li class="author row">
                        <p class="name col-xs-4 "><i class="fa fa-user"></i>{{ __('trans.Author') }} :</p> &nbsp
                        @foreach ($authors as $author)
                            <a href="" class="col-xs-8">{{ $author->name }} &nbsp</a>
                        @endforeach
                    </li>
                    <li class="status row">
                        <p class="name col-xs-4"><i class="fa fa-rss"></i> {{ __('trans.Status') }} : </p>&nbsp
                        <p class="col-xs-8">Hoàn thành</p>
                    </li>
                    <li class="kind row">
                        <p class="name col-xs-4"><i class="fa fa-tags"></i> {{ __('trans.Category') }} : </p>&nbsp
                        @foreach ($category as $category)
                            <a href="{{ asset('category') }}/{{ $category->slug }}" class="col-xs-8">{{ $category->name }} &nbsp</a>
                        @endforeach
                    </li>
                    <li class="row">
                        <p class="name col-xs-4"><i class="fa fa-eye"></i> {{ __('trans.View') }} : &nbsp</p>
                        <p class="col-xs-8">{{ $manga->view }}</p>
                    </li>
                    <li class="row">
                        <p class="name col-xs-4">{{ $manga->created_at->diffForHumans() }}</p>
                    </li>
                </ul>
                <div>{{ __('trans.Ranking') }}: <span>0</span>/ 0 - <span>0</span>{{ __('trans.Evaluate') }}.</div><br>
                <div>
                    <a class="follow-link btn btn-success"><i class="fa fa-heart"></i> Theo dõi</a>
                    <span><b> 0 </b> {{ __('trans.Follow') }}</span>
                </div>
            </div><br><br>
        </div><br>
        <h3 class="m--font-warning">{{ __('trans.Content') }}</h3><hr>
        <h6>{{ $manga->description }}</h6><br>

        <h3 class="m--font-warning">{{ __('trans.Chapter') }}</h3><hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('trans.Chapter') }}</th>
                    <th>{{ __('trans.View') }}</th>
                    <th>{{ __('trans.Description') }}</th>
                    <th>{{ __('trans.Date create') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chapters as $chapter)
                <tr>
                    <td><a href="{{ asset('manga') }}/{{ $manga->slug }}/{{ $chapter->slug }}">{{ $chapter->name }}</a></td>
                    <td>{{ $chapter->view }}</td>
                    <td>{{ $chapter->description }}</td>
                    <td>{{ $chapter->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 m-portlet" id="menuright">
        <div class="m-portlet__body"> 
            <h4 class="m--font-info">{{ __('trans.Top view manga') }}</h4><br>
            @foreach ($top5view as $key => $manga)   
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <h2>{{ $key + 1 }}</h2>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <a href="{{ asset('manga') }}/{{ $manga->slug }}">
                        <img class="width70" src="{{ asset('storage') }}{{ $manga->image }}">
                    </a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <h6 class="m--font-brand"><a href="{{ asset('manga') }}/{{ $manga->slug }}">{{ $manga->name }}</a></h6>
                    <p>{{ $manga->created_at->diffForHumans() }}</p>
                    <i class="fa fa-eye"></i> {{ $manga->view }} &nbsp <i class="fa fa-comment"></i>21
                </div>
            </div>    
            <br>                                 
            @endforeach

            <h4 class="m--font-warning">{{ __('trans.Category') }}</h4><br>
            @foreach ($categories as $category)   
            <span><button type="button" class="btn m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning"><a href="{{ asset('category') }}/{{ $category->slug }}">{{ $category->name }}</a></button></span>
            @endforeach
            <br><br>

            <h4 class="m--font-warning">{{ __('trans.Suggestions') }}</h4><br>
            @foreach ($suggest as $key => $suggest)   
            @if ($key > 0 && $key < 6)
                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <a href="{{ asset('manga') }}/{{ $suggest->slug }}">
                            <img class="width70" src="{{ asset('storage') }}{{ $suggest->image }}">
                        </a>
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                        <h6 class="m--font-brand"><a href="{{ asset('manga') }}/{{ $suggest->slug }}">{{ $suggest->name }}</a></h6>
                        <p>{{ $suggest->created_at->diffForHumans() }}</p>
                        <i class="fa fa-eye"></i> {{ $suggest->view }} &nbsp <i class="fa fa-comment"></i>21
                    </div>
                </div>    
                <br>
            @endif 
            @endforeach
            <br>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('js/client/detail.js') }}"></script>
@endsection
