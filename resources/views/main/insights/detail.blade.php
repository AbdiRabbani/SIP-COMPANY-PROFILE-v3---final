@extends('layouts.main')

@section('content')
<?php use App\BlogTag ?>
<?php use App\TagConnector; ?>
<div class="container d-flex justify-content-around flex-wrap" style="margin-top: 100px;">
    <div class="col-md-9">
        <img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/{{$data->image}}" class="w-100 img-thumbnail" style="height: 500px; object-fit: cover; object-position: center;" alt="">
        <p class="detail-date">{{Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</p>
        <p class="detail-title"><strong>{{$data->title}}</strong></p>
        <div class="d-flex gap-2 flex-wrap">
            @if($data->type == 'Blog')
            @foreach($blogtag as $row)
            <p style="font-size: 15px; margin-bottom: 0 ;">• {{$row->product->name_tech}}</p>
            @endforeach
            @else
            @foreach($tag as $row)
            <p style="font-size: 15px; margin-bottom: 0 ;">#{{$row->tag->tag_name}}</p>
            @endforeach
            @endif
        </div>
        <br>
        <span class="ck-content">{!! $data->paragraph !!}</span>
    </div>
    <div class="col-md-3 d-flex flex-wrap justify-content-around align-items-start" style="max-height: auto">
        @if($data->type == "News")
        @foreach($data_random_2 as $row)
        <a href="{{url('insights/' .$row->id)}}" class="insights-card" style="height: 350px; width: 90%;">
                <img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/{{$row->image}}" alt="" style="height: 200px;">
                <div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="col-md-10 card-title"><strong>{{$row->title}}</strong></p>
                        <p class="col-md-2 text-end" style="font-size: 13px; min-width: 50px; color: grey;">
                            {{Carbon\Carbon::parse($row->created_at)->format('d M')}}</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 tag-content">
                        <?php $tag = TagConnector::where('id_insights', $row->id)->get()->all() ?>
                        @foreach($tag as $tags)
                        <p class="mb-0 rounded" style="font-size: 15px;">#{{$tags->tag->tag_name}}</p>
                        @endforeach
                    </div>
                </div>
            </a>
        @endforeach
        @else
        @foreach($data_random_1 as $row)
        <a href="{{url('insights/' .$row->id)}}" class="insights-card" style="height: 350px; width: 90%;">
                <img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/{{$row->image}}" alt="" style="height: 200px;">
                <div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="col-md-10 card-title"><strong>{{$row->title}}</strong></p>
                        <p class="col-md-2 text-end" style="font-size: 13px; min-width: 50px; color: grey;">
                            {{Carbon\Carbon::parse($row->created_at)->format('d M')}}</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 tag-content">
                        <?php $tag = BlogTag::where('id_insights', $row->id)->get()->all() ?>
                        @foreach($tag as $tags)
                        <p class="mb-0 rounded" style="font-size: 15px;">• {{$tags->product->name_tech}}</p>
                        @endforeach
                    </div>
                </div>
            </a>
        @endforeach
        @endif
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/39.0.1/ckeditor.min.js"
    integrity="sha512-sDgY/8SxQ20z1Cs30yhX32FwGhC1A4sJJYs7kwa2EnvCeepR/S1NbdXNLd6TDJC0J5cV34ObeQIYekYRK8nJkQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
