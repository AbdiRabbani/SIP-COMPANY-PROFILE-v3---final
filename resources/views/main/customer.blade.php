@extends('layouts.main')

@section('content')
<style>
    .nav-pills {
        border-bottom: none;
        gap: 10px;
    }

    .nav-pills .nav-link-custom.active,
    .nav-pills .show>.nav-link-custom {
        background-color: var(--purple);
    }

    .nav-link-custom {
        color: var(--purple);
        box-shadow: 0px 0px 3px var(--purple);
        margin: 10px 0px;
    }

    .nav-link-custom:hover {
        color: white;
        background: var(--purple);
    }

</style>

<div class="container">
    <div class="partnership-header">
        <p class="text-center" style=""><strong>Our Customer</strong></p>
        <ul class="nav nav-pills px-1 mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom active" id="filter-button btn-all pills-profile-tab"
                    onClick="allData()" data-bs-toggle="pill" role="tab" aria-controls="pills-profile" type="submit"
                    aria-selected="false">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="filter-button pills-profile-tab" onClick="data(1)"
                    style="min-width: max-content;" data-bs-toggle="pill" role="tab" aria-controls="pills-profile"
                    type="submit" aria-selected="false">Enterprise Network
                    Infrastructure</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="filter-button pills-profile-tab" onClick="data(2)"
                    style="min-width: max-content;" data-bs-toggle="pill" role="tab" aria-controls="pills-profile"
                    type="submit" aria-selected="false">Data center &
                    Cloud</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="filter-button pills-profile-tab" onClick="data(3)"
                    style="min-width: max-content;" data-bs-toggle="pill" role="tab" aria-controls="pills-profile"
                    type="submit" aria-selected="false">Cyber Security</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="filter-button pills-profile-tab" onClick="data(4)"
                    style="min-width: max-content;" data-bs-toggle="pill" role="tab" aria-controls="pills-profile"
                    type="submit" aria-selected="false">Collaboration &
                    Facility</button>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="mt-4 d-flex row justify-content-center">
            <div class="mt-5 d-flex">
                <div class="img-customer">
                    <img onerror="replaceImage(this)" src="{{asset('custom/icon/fsi.png')}}" style="width: 100%; height: 100%;" alt="">
                </div>
                <p class="fs-5 customer-title"><strong>FSI and Banking</strong></p>
            </div>
            <p class="mb-0 mt-2" id="title-project1"></p>
            <div>
                <img onerror="replaceImage(this)" style="height: 75px; width: auto;" class="rounded border my-3 p-2" id="img-project1" alt="">
            </div>
            <p style="text-align: justify;" id="text-project1"></p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2" id="data_loop_1">

            </div>
        </div>
        <div class="mt-4 d-flex row justify-content-center">
            <div class="mt-5 d-flex">
                <div class="img-customer">
                    <img onerror="replaceImage(this)" src="{{asset('custom/icon/government.png')}}" style="width: 100%; height: 100%;" alt="">
                </div>
                <p class="fs-5 customer-title"><strong>Government</strong></p>
            </div>
            <p class="mb-0 mt-2" id="title-project2"></p>
            <div>
                <img onerror="replaceImage(this)" style="height: 75px; width: auto;" class="rounded border my-3 p-2" id="img-project2" alt="">
            </div>
            <p style="text-align: justify;" id="text-project2"></p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2" id="data_loop_2">

            </div>
        </div>
        <div class="mt-4 d-flex row justify-content-center">
            <div class="mt-5 d-flex">
                <div class="img-customer">
                    <img onerror="replaceImage(this)" src="{{asset('custom/icon/manufacturing.png')}}" style="width: 100%; height: 100%;" alt="">
                </div>
                <p class="fs-5 customer-title"><strong>Manufacturing</strong></p>
            </div>
            <p class="mb-0 mt-2" id="title-project3"></p>
            <div>
                <img onerror="replaceImage(this)" style="height: 75px; width: auto;" class="rounded border my-3 p-2" id="img-project3" alt="">
            </div>
            <p style="text-align: justify;" id="text-project3"></p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2" id="data_loop_3">

            </div>
        </div>
        <div class="mt-4 d-flex row justify-content-center">
            <div class="mt-5 d-flex">
                <div class="img-customer">
                    <img onerror="replaceImage(this)" src="{{asset('custom/icon/telco.png')}}" style="width: 100%; height: 100%;" alt="">
                </div>
                <p class="fs-5 customer-title"><strong>Telco & Service Provider</strong></p>
            </div>
            <p class="mb-0 mt-2" id="title-project4"></p>
            <div>
                <img onerror="replaceImage(this)" style="height: 75px; width: auto;" class="rounded border my-3 p-2" id="img-project4" alt="">
            </div>
            <p style="text-align: justify;" id="text-project4"></p>
            <div class="d-flex row col-md-12 flex-wrap gap-2 my-2" id="data_loop_4">

            </div>
        </div>
        <div class="mt-4 d-flex row justify-content-center">
            <div class="mt-5 d-flex">
                <div class="img-customer">
                    <img onerror="replaceImage(this)" src="{{asset('custom/icon/retail.png')}}" style="width: 100%; height: 100%;" alt="">
                </div>
                <p class="fs-5 customer-title"><strong>Retail</strong></p>
            </div>
            <p class="mb-0 mt-2" id="title-project5"></p>
            <div>
                <img onerror="replaceImage(this)" style="height: 75px; width: auto;" class="rounded border my-3 p-2" id="img-project5" alt="">
            </div>
            <p style="text-align: justify;" id="text-project5"></p>
            <div class="d-flex row col-md-12 flex-wrap gap-2 my-2" id="data_loop_5">

            </div>
        </div>
        <div class="mt-4 d-flex row justify-content-center">
            <div class="mt-5 d-flex">
                <div class="img-customer">
                    <img onerror="replaceImage(this)" src="{{asset('custom/icon/education.png')}}" style="width: 100%; height: 100%;" alt="">
                </div>
                <p class="fs-5 customer-title"><strong>Education</strong></p>
            </div>
            <p class="mb-0 mt-2" id="title-project6"></p>
            <div>
                <img onerror="replaceImage(this)" style="height: 75px; width: auto;" class="rounded border my-3 p-2" id="img-project6" alt="">
            </div>
            <p style="text-align: justify;" id="text-project6"></p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2" id="data_loop_6">

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(allData(), 1000);
    });

    function data(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/customer/data/" + id,
            success: function (response) {
                var data_1 = "";
                var data_2 = "";
                var data_3 = "";
                var data_4 = "";
                var data_5 = "";
                var data_6 = "";

                $.each(response, function (key, value) {
                    if (key == 1) {
                        $.each(value, function (index, user) {
                            data_1 += '<div class="collapse-customer-item">'
                            data_1 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_1 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_1 += '</div>'
                        });
                    } else if (key == 2) {
                        $.each(value, function (index, user) {
                            data_2 += '<div class="collapse-customer-item">'
                            data_2 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_2 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_2 += '</div>'
                        });
                    } else if (key == 3) {
                        $.each(value, function (index, user) {
                            data_3 += '<div class="collapse-customer-item">'
                            data_3 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_3 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_3 += '</div>'
                        });
                    } else if (key == 4) {
                        $.each(value, function (index, user) {
                            data_4 += '<div class="collapse-customer-item">'
                            data_4 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_4 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_4 += '</div>'
                        });
                    } else if (key == 5) {
                        $.each(value, function (index, user) {
                            data_5 += '<div class="collapse-customer-item">'
                            data_5 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_5 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_5 += '</div>'           
                        });
                    } else if (key == 6) {
                        $.each(value, function (index, user) {
                            data_6 += '<div class="collapse-customer-item">'
                            data_6 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_6 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_6 += '</div>'
                        });
                    }
                });
                $('#data_loop_1').html(data_1);
                $('#data_loop_2').html(data_2);
                $('#data_loop_3').html(data_3);
                $('#data_loop_4').html(data_4);
                $('#data_loop_5').html(data_5);
                $('#data_loop_6').html(data_6);

                if (response.p1) {
                    document.querySelector('#title-project1').innerText = "Project Reference"
                    document.querySelector('#text-project1').innerText = response.p1.desc
                    document.querySelector('#img-project1').src = "{{env('STORAGE_LINK')}}project/" + response.p1.image
                    document.querySelector('#img-project1').style.display = "block"
                } else {
                    document.querySelector('#title-project1').innerText = ""
                    document.querySelector('#text-project1').innerText = ""
                    document.querySelector('#img-project1').style.display = "none"
                }

                if (response.p2) {
                    document.querySelector('#title-project2').innerText = "Project Reference"
                    document.querySelector('#text-project2').innerText = response.p2.desc
                    document.querySelector('#img-project2').src = "{{env('STORAGE_LINK')}}project/" + response.p2.image
                    document.querySelector('#img-project2').style.display = "block"
                } else {
                    document.querySelector('#title-project2').innerText = ""
                    document.querySelector('#text-project2').innerText = ""
                    document.querySelector('#img-project2').style.display = "none"
                }

                if (response.p3) {
                    document.querySelector('#title-project3').innerText = "Project Reference"
                    document.querySelector('#text-project3').innerText = response.p3.desc
                    document.querySelector('#img-project3').src = "{{env('STORAGE_LINK')}}project/" + response.p3.image
                    document.querySelector('#img-project3').style.display = "block"
                } else {
                    document.querySelector('#title-project3').innerText = ""
                    document.querySelector('#text-project3').innerText = ""
                    document.querySelector('#img-project3').style.display = "none"
                }

                if (response.p4) {
                    document.querySelector('#title-project4').innerText = "Project Reference"
                    document.querySelector('#text-project4').innerText = response.p4.desc
                    document.querySelector('#img-project4').src = "{{env('STORAGE_LINK')}}project/" + response.p4.image
                    document.querySelector('#img-project4').style.display = "block"
                } else {
                    document.querySelector('#title-project4').innerText = ""
                    document.querySelector('#text-project4').innerText = ""
                    document.querySelector('#img-project4').style.display = "none"
                }

                if (response.p5) {
                    document.querySelector('#title-project5').innerText = "Project Reference"
                    document.querySelector('#text-project5').innerText = response.p5.desc
                    document.querySelector('#img-project5').src = "{{env('STORAGE_LINK')}}project/" + response.p5.image
                    document.querySelector('#img-project5').style.display = "block"
                } else {
                    document.querySelector('#title-project5').innerText = ""
                    document.querySelector('#text-project5').innerText = ""
                    document.querySelector('#img-project5').style.display = "none"
                }

                if (response.p6) {
                    document.querySelector('#title-project6').innerText = "Project Reference"
                    document.querySelector('#text-project6').innerText = response.p6.desc
                    document.querySelector('#img-project6').src = "{{env('STORAGE_LINK')}}project/" + response.p6.image
                    document.querySelector('#img-project6').style.display = "block"
                } else {
                    document.querySelector('#title-project6').innerText = ""
                    document.querySelector('#text-project6').innerText = ""
                    document.querySelector('#img-project6').style.display = "none"
                }
            }
        });
    };

    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/customer/alldata",
            success: function (response) {
                var data_1 = "";
                var data_2 = "";
                var data_3 = "";
                var data_4 = "";
                var data_5 = "";
                var data_6 = "";

                $.each(response, function (key, value) {
                    if (key == 1) {
                        $.each(value, function (index, user) {
                            data_1 += '<div class="collapse-customer-item">'
                            data_1 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_1 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_1 += '</div>'
                        });
                    } else if (key == 2) {
                        $.each(value, function (index, user) {
                            data_2 += '<div class="collapse-customer-item">'
                            data_2 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_2 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_2 += '</div>'
                        });
                    } else if (key == 3) {
                        $.each(value, function (index, user) {
                            data_3 += '<div class="collapse-customer-item">'
                            data_3 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_3 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_3 += '</div>'
                        });
                    } else if (key == 4) {
                        $.each(value, function (index, user) {
                            data_4 += '<div class="collapse-customer-item">'
                            data_4 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_4 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_4 += '</div>'
                        });
                    } else if (key == 5) {
                        $.each(value, function (index, user) {
                            data_5 += '<div class="collapse-customer-item">'
                            data_5 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_5 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_5 += '</div>'           
                        });
                    } else if (key == 6) {
                        $.each(value, function (index, user) {
                            data_6 += '<div class="collapse-customer-item">'
                            data_6 += '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/' + user.logo + '" alt="' + user.brand_name + '">'
                            data_6 += '<p class="text-center mt-3"style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' + user.brand_name + '</p>'
                            data_6 += '</div>'
                        });
                    }
                });
                $('#data_loop_1').html(data_1);
                $('#data_loop_2').html(data_2);
                $('#data_loop_3').html(data_3);
                $('#data_loop_4').html(data_4);
                $('#data_loop_5').html(data_5);
                $('#data_loop_6').html(data_6);

                document.querySelector('#title-project1').innerText = ""
                document.querySelector('#text-project1').innerText = ""
                document.querySelector('#img-project1').style.display = "none"

                document.querySelector('#title-project2').innerText = ""
                document.querySelector('#text-project2').innerText = ""
                document.querySelector('#img-project2').style.display = "none"

                document.querySelector('#title-project3').innerText = ""
                document.querySelector('#text-project3').innerText = ""
                document.querySelector('#img-project3').style.display = "none"

                document.querySelector('#title-project4').innerText = ""
                document.querySelector('#text-project4').innerText = ""
                document.querySelector('#img-project4').style.display = "none"

                document.querySelector('#title-project5').innerText = ""
                document.querySelector('#text-project5').innerText = ""
                document.querySelector('#img-project5').style.display = "none"

                document.querySelector('#title-project6').innerText = ""
                document.querySelector('#text-project6').innerText = ""
                document.querySelector('#img-project6').style.display = "none"
            }
        })
    };

</script>
@endsection
