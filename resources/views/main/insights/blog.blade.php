@extends('layouts.main')

@section('content')
<style>
    .nav-pills {
        border-bottom: none;
        gap: 10px;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: var(--purple);
    }

    .nav-link {
        color: var(--purple);
        box-shadow: 0px 0px 3px var(--purple);
        margin: 10px 0px;
    }

    .nav-link:hover {
        color: white;
        background: var(--purple);
    }

    .tab-content {
        margin: 20px 0px !important;
    }
</style>

<div class="container">
    <div class="partnership-header">
        <p class="text-center"><strong>Blog</strong></p>
        <div class="col-ms-12 d-flex justify-content-end">
            <div class="search_insights mb-3 col-md-2">
                <input type="text" class="form-control" id="search_input" onChange="dataSearch()">
                <button href="" type="submit" style="border: none; background-color: white;" onClick="dataSearch()">
                    <img onerror="replaceImage(this)" src="{{asset('custom/icon/ic_search.png')}}" alt="">
                </button>
            </div>
        </div>
        <ul class="nav nav-pills" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="filter-button btn-all pills-profile-tab" onClick="allData()"
                    data-bs-toggle="pill" role="tab" aria-controls="pills-profile" type="submit"
                    aria-selected="false">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" style="min-width: max-content;" id="network-tab" data-bs-toggle="pill"
                    data-bs-target="#network" type="button" role="tab" aria-controls="network"
                    aria-selected="false">Enterprise Network
                    Infrastructure</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button datacenter-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="datacenter" data-bs-target="#datacenter"
                    type="submit" aria-selected="false">Data center &
                    Cloud</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button cyber-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="cyber" data-bs-target="#cyber" type="submit"
                    aria-selected="false">Cyber Security</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button collaboration-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="collaboration" data-bs-target="#collaboration"
                    type="submit" aria-selected="false">Collaboration &
                    Facility</button>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="network" role="tabpanel" aria-labelledby="network-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category1 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name_tech}}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="datacenter" role="tabpanel" aria-labelledby="datacenter-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category2 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name_tech}}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="cyber" role="tabpanel" aria-labelledby="cyber-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category3 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name_tech}}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="collaboration" role="tabpanel" aria-labelledby="collaboration-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category4 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name_tech}}</button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="d-flex flex-wrap gap-3" id="loop_data">
        </div>
    </div>
</div>
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
                url: "/insights/search/" + name,
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
                            url: "/tag-blog/" + value.id,
                            success: function(tag_response) {
                                var tag = ""
                                $.each(tag_response, function(index, result) {
                                    console.log(result.name_tech);
                                    tag = tag + '<p class="mb-0 rounded" style="font-size: 15px;">#' + result.name_tech + '</p>'
                                });
                                $("#tag-tag" + value.id).html(tag);
                            }

                        })

                            data = data + '<a href="/insights/' + value.id + '" class="insights-card" style="height: 350px; width: 400px;">'
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

    function data(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/insights/data/" + id,
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
                            url: "/tag-blog/" + value.id,
                            success: function(tag_response) {
                                var tag = ""
                                $.each(tag_response, function(index, result) {
                                    console.log(result.name_tech);
                                    tag = tag + '<p class="mb-0 rounded" style="font-size: 15px;">• ' + result.name_tech + '</p>'
                                });
                                $("#tag-tag" + value.id).html(tag);
                            }

                        })
                            data = data + '<a href="/insights/' + value.id + '" class="insights-card" style="height: 350px; width: 400px;">'
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
                        '<p class="rounded p-1 mt-5" style="background: var(--purple); color: white;">Cannot find the blog</p>';
                }
                $('#loop_data').html(data);
            }
        })
    };

    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/insights/data",
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
                            url: "/tag-blog/" + value.id,
                            success: function(tag_response) {
                                var tag = ""
                                $.each(tag_response, function(index, result) {
                                    console.log(result.name_tech);
                                    tag = tag + '<p class="mb-0 rounded" style="font-size: 15px;">• ' + result.name_tech + '</p>'
                                });
                                $("#tag-tag" + value.id).html(tag);
                            }

                        })

                        data = data + '<a href="/insights/' + value.id + '" class="insights-card" style="height: 350px; width: 400px;">'
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
