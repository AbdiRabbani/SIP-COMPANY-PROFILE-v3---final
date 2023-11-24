@extends('layouts.main')

@section('content')
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: var(--purple);
    }

    .nav-link {
        color: var(--purple);
    }

</style>
<?php use App\TagConnector ?>
<div class="container">
    <p class="text-center" style="margin-top: 100px; font-size: 48px;"><a href=""
            style="text-decoration: none; color: black;"><strong>News</strong></a></p>
    <div class="d-flex justify-content-end">
        <div class="search_insights col-md-2 mb-3">
            <input type="text" class="form-control" id="search_input" onChange="dataSearch()">
            <button href="" type="submit" style="border: none; background-color: white;" onClick="dataSearch()">
                <img onerror="replaceImage(this)" src="{{asset('custom/icon/ic_search.png')}}" alt="">
            </button>
        </div>
    </div>
    <div class="d-flex col-md-12">
        <ul class="nav nav-pills mb-3" role="tablist" style="min-width: fit-content;">
            <li class="nav-item" role="presentation" style="min-width: fit-content;">
                <button class="nav-link" type="button" role="tab" aria-selected="true" onClick="allData()">Show
                    All</button>
            </li>
        </ul>
        <ul class="nav nav-pills mb-3" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
            @foreach($all_tag as $row)
            <li class="nav-item" role="presentation" style="min-width: fit-content;">
                <button class="nav-link" type="button" role="tab" aria-selected="true"
                    onClick="dataTag('{{$row->id}}')">#{{$row->tag_name}}</button>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="d-flex flex-wrap-reverse align-items-end">
        <div class="d-flex flex-wrap col-md-9 justify-content-between px-5" id="loop_data">

        </div>
        <div class="col-md-3 rounded p-3 tag-bar mb-3">
            <p style=""><strong>Lastest Tag</strong></p>
            <ul>
                @foreach($tag as $row)
                <li class="my-2">
                    <a onclick="dataTag('{{$row->id}}')">#{{$row->tag_name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"
    integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(allData(), 1000);
    });

    

    function dataSearch() {
        const name = document.getElementById('search_input').value
        if (name != "") {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/insights/search2/" + name,
                success: function (response) {
                    var data = ""
                    if (response.length > 0) {
                        $.each(response, function (key, value) {
                            var createdAtDate = new Date(value.created_at);

                            // Mendapatkan tanggal, bulan, dan tahun dari objek Date
                            var day = createdAtDate.getDate();
                            var month = createdAtDate.toLocaleString('default', {
                                month: 'short'
                            });
                            var year = createdAtDate.getFullYear();

                            // Membuat tampilan tanggal dengan format "DD MMM YYYY"
                            var formattedDate = day + " " + month + " " + year;

                            $.ajax({
                                type: "GET",
                                dataType: "json",
                                url: "/tag-tag/" + value.id,
                                success: function (tag_response) {
                                    var tag = ""
                                    $.each(tag_response, function (index, result) {
                                        console.log(result.tag_name);
                                        tag = tag +'<p class="mb-0 rounded" style="font-size: 15px;">#' + result.tag_name + '</p>'
                                    });
                                    $("#tag-tag" + value.id).html(tag);
                                }

                            })

                            data = data + '<a href="/insights/' + value.id + '" class="insights-card col-md-5" style="height: 350px;">'
                            data = data + '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/' + value.image + '" alt="" style="height: 200px;">'
                            data = data + '<div>'
                            data = data + '<div class="d-flex justify-content-between mt-2">'
                            data = data + '<p class="col-md-10"style="font-size: 18px; max-height: 25px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;"><strong>'+ value.title +'</strong></p>'
                            data = data + '<p class="col-md-2 text-end" style="font-size: 13px; min-width: 50px; color: grey;">' + formattedDate + '</p>'
                            data = data + '</div>'
                            data = data + '<div class="d-flex flex-wrap gap-2 tag-content" id="tag-tag' + value.id + '">'
                            data = data + '</div>'
                            data = data + '</div>'
                            data = data + '</a>'
                        });
                    } else {
                        data =
                            '<p class="rounded p-1 mt-5" style="background: var(--purple); color: white;">Cannot find the news</p>';
                    }
                    $('#loop_data').html(data);
                }
            })
        } else {
            allData()
        }
    };


    function dataTag(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/insights/tag/" + id,
            success: function (response) {
                var data = ""
                if (response.length > 0) {
                    $.each(response, function (key, value) {

                        var createdAtDate = new Date(value.created_at);

                        // Mendapatkan tanggal, bulan, dan tahun dari objek Date
                        var day = createdAtDate.getDate();
                        var month = createdAtDate.toLocaleString('default', {
                            month: 'short'
                        });
                        var year = createdAtDate.getFullYear();

                        // Membuat tampilan tanggal dengan format "DD MMM YYYY"
                        var formattedDate = day + " " + month + " " + year;

                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "/tag-tag/" + value.id,
                            success: function (tag_response) {
                                var tag = ""
                                $.each(tag_response, function (index, result) {
                                    console.log(result.tag_name);
                                    tag = tag +
                                        '<p class="mb-0 rounded" style="font-size: 15px;">#' +
                                        result.tag_name + '</p>'
                                });
                                $("#tag-tag" + value.id).html(tag);
                            }

                        })

                            data = data + '<a href="/insights/' + value.id + '" class="insights-card col-md-5" style="height: 350px;">'
                            data = data + '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/' + value.image + '" alt="" style="height: 200px;">'
                            data = data + '<div>'
                            data = data + '<div class="d-flex justify-content-between mt-2">'
                            data = data + '<p class="col-md-10"style="font-size: 18px; max-height: 25px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;"><strong>'+ value.title +'</strong></p>'
                            data = data + '<p class="col-md-2 text-end" style="font-size: 13px; min-width: 50px; color: grey;">' + formattedDate + '</p>'
                            data = data + '</div>'
                            data = data + '<div class="d-flex flex-wrap gap-2 tag-content" id="tag-tag' + value.id + '">'
                            data = data + '</div>'
                            data = data + '</div>'
                            data = data + '</a>'
                    });
                } else {
                    data =
                        '<p class="rounded p-1 mt-5" style="background: var(--purple); color: white;">Cannot find the news</p>';
                }
                $('#loop_data').html(data);
            }
        })
    };

    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/insights/data2",
            success: function (response) {
                var data = ""
                if (response.length > 0) {
                    $.each(response, function (key, value) {
                        var createdAtDate = new Date(value.created_at);

                        // Mendapatkan tanggal, bulan, dan tahun dari objek Date
                        var day = createdAtDate.getDate();
                        var month = createdAtDate.toLocaleString('default', {
                            month: 'short'
                        });
                        var year = createdAtDate.getFullYear();

                        // Membuat tampilan tanggal dengan format "DD MMM YYYY"
                        var formattedDate = day + " " + month + " " + year;
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "/tag-tag/" + value.id,
                            success: function (tag_response) {
                                var tag = ""
                                $.each(tag_response, function (index, result) {
                                    console.log(result.tag_name);
                                    tag = tag +
                                        '<p class="mb-0 rounded" style="font-size: 15px;">#' +
                                        result.tag_name + '</p>'
                                });
                                $("#tag-tag" + value.id).html(tag);
                            }

                        })

                            data = data + '<a href="/insights/' + value.id + '" class="insights-card col-md-5" style="height: 350px;">'
                            data = data + '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/' + value.image + '" alt="" style="height: 200px;">'
                            data = data + '<div>'
                            data = data + '<div class="d-flex justify-content-between mt-2">'
                            data = data + '<p class="col-md-10"style="font-size: 18px; max-height: 25px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;"><strong>'+ value.title +'</strong></p>'
                            data = data + '<p class="col-md-2 text-end" style="font-size: 13px; min-width: 50px; color: grey;">' + formattedDate + '</p>'
                            data = data + '</div>'
                            data = data + '<div class="d-flex flex-wrap gap-2 tag-content" id="tag-tag' + value.id + '">'
                            data = data + '</div>'
                            data = data + '</div>'
                            data = data + '</a>'
                    });
                } else {
                    data =
                        '<p class="rounded p-1 mt-5" style="background: var(--purple); color: white;">Cannot find the news</p>';
                }
                $('#loop_data').html(data);
            }
        })
    };

</script>
@endsection
