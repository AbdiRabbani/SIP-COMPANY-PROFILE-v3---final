@extends('layouts.main')

@section('content')
<div class="mt-5 pb-4 d-flex container justify-content-between flex-wrap">
    <div class="col-md-9 detail-content">
        <div>
            <img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}campaign/{{$data->image}}" alt="" style="height: 100%; object-fit: cover;">
        </div>
        <p class="detail-date">{{Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</p>
        <p class="detail-title"><strong>{{$data->title}}</strong></p>
        <span class="ck-content">{!! $data->paragraph !!}</span>
    </div>
    <div class="mt-4 side-detail col-md-3">
        @foreach($data_random as $row)
        <a class="card shadow my-card mt-4 col-md-10" style="text-decoration: none;"
            href="{{url('campaign', $row->id)}}">
            <div class="card-img-top rounded d-flex align-items-center" style="overflow: hidden;">
                <img onerror="replaceImage(this)" style="width: 100%; min-height: 100%; object-fit: cover;"
                    src="{{env('STORAGE_LINK')}}campaign/{{$row->image}}" alt="Card image cap">
            </div>
            <p class="card-date mx-3 mb-0">{{Carbon\Carbon::parse($row->created_at)->format('d M Y')}}</p>
            <div class="card-body">
                <p class="card-title"><strong>{{$row->title}}</strong></p>
                <div class="d-flex justify-content-end">
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/39.0.1/ckeditor.min.js"
    integrity="sha512-sDgY/8SxQ20z1Cs30yhX32FwGhC1A4sJJYs7kwa2EnvCeepR/S1NbdXNLd6TDJC0J5cV34ObeQIYekYRK8nJkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
