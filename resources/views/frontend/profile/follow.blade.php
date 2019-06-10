@section('title', trans('frontend.List follow'))
@section('head_icon', 'flaticon-share')
@section('head_title', trans('frontend.List follow'))
@extends('frontend.profile.profile')
@section('content_profile')
    <div class="m-portlet__body">
        <table class="table m-table m-table--head-bg-brand">
            <thead>
            <tr>
                <th>#</th>
                <th>@lang('frontend.manga_name')</th>
                <th>@lang('frontend.recent')</th>
                <th>@lang('frontend.last_chapter')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mangas as $manga)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a class="m-link"
                           href="{{ route('client.getmanga', ['slug' => $manga->manga->slug]) }}">{{ $manga->manga->name }}</a>
                    </td>
                    <td>
                        <a class="m-link"
                           href="{{ route('client.getChapter', ['manga' => $manga->manga->slug, 'chapter' => $manga->chapter->slug]) }}">{{ $manga->chapter->name }}</a><br>
                        <span>{{ $manga->updated_at->diffForHumans() }}</span>
                    </td>
                    <td>
                        <a class="m-link"
                           href="{{ route('client.getChapter', ['manga' => $manga->manga->slug, 'chapter' => $manga->manga->lastChapter->slug]) }}">{{ $manga->manga->lastChapter->name }}</a><br>
                        <span>{{ $manga->manga->lastChapter->created_at->diffForHumans() }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $mangas->links() }}
    </div>
@endsection
