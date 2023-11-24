@extends('layouts.main')

@section('content')
<?php use App\Partnership ?>
<?php use App\Customer ?>
<?php use App\ProjectReference ?>
<?php use App\PartnerConnector ?>
<?php use App\CustomerConnector ?>
<?php use App\BlogTag ?>
<style>
    .floating-button {
        display: none;
    }

    .nav-link-custom {
        color: grey;
        font-size: 14px !important;
    }

    .nav-pills {
        border-bottom: none;
    }

    .nav-link-custom:hover {
        color: grey;
    }

    .carousel-control-prev {
        justify-content: left;
    }

    .carousel-control-next {
        justify-content: right;
    }

    .active {
        color: black;
    }

</style>
<div class="solution-detail-header" style="background: url('{{$image}}');">
    <div class="mask-content">
        <p class="text-white px-2"><strong>{{$title}}</strong></p>
    </div>
</div>
<div class="solution-detail-content container">
    <p style="font-size: 16px;">{{$desc}}</p>

    <ul class="nav nav-underline" id="myTab" role="tablist" style="overflow: scroll; flex-wrap: nowrap;">
        @foreach($product as $row)
        <li class="nav-item" role="presentation">
            <button class="nav-link nav-link-custom" id="{{$row->id}}-tab" data-bs-toggle="tab"
                data-bs-target="#{{$row->id}}-tab-pane" type="button" role="tab" aria-controls="{{$row->id}}-tab-pane"
                aria-selected="true" onClick="blogData({{$row->id}})"
                style="min-width: max-content;"><strong>{{$row->name_tech}}</strong></button>
        </li>
        @endforeach
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach($product as $row)
        <div class="tab-pane fade" id="{{$row->id}}-tab-pane" role="tabpanel" aria-labelledby="{{$row->id}}-tab"
            tabindex="0">
            <p class="fs-5 pt-3" style=""><strong>Partnership</strong></p>
            <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll; border: none; padding-left: 0;">
                <?php $partnership = partnerConnector::where('standarization', 'Seasoned')->where('technology', $row->id)->join('tb_partnership','tb_partnership.id_partnership', '=', 'tb_partnership_technology.id_partnership')->get()->all() ?>
                @foreach($partnership as $partner)
                @if($partner)
                <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                    src="{{env('PARTNERSHIP_STORAGE')}}{{$partner->logo}}" alt="{{$partner->partner}}">
                @else
                <p class="rounded text-white fs-6" style="background: var(--purple);">Cannot find partnership</p>
                @endif
                @endforeach
            </div>

            <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll; border: none; padding-left: 0;">
                <?php $partnership = partnerConnector::where('standarization', '!=', 'Seasoned')->where('technology', $row->id)->join('tb_partnership','tb_partnership.id_partnership', '=', 'tb_partnership_technology.id_partnership')->get()->all() ?>
                @foreach($partnership as $partner)
                @if($partner)
                <img onerror="replaceImage(this)" style="height: 65px; width: 130px; object-fit: contain" class="rounded shadow p-2"
                    src="{{env('PARTNERSHIP_STORAGE')}}{{$partner->logo}}" alt="{{$partner->partner}}">
                @else
                <p class="rounded text-white fs-6" style="background: var(--purple);">Cannot find partnership</p>
                @endif
                @endforeach
            </div>

            <p class="fs-5 mt-4" style=""><strong>Customer</strong></p>
            <ul class="nav nav-underline" id="pills-tab" style="overflow: scroll; flex-wrap: nowrap;" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-custom active" id="fsi{{$row->id}}-tab" data-bs-toggle="pill"
                        data-bs-target="#fsi{{$row->id}}" type="button" role="tab" style="min-width: max-content;"
                        aria-controls="fsi{{$row->id}}" aria-selected="true">FSI and Banking</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-custom" id="goverment{{$row->id}}-tab" data-bs-toggle="pill"
                        data-bs-target="#goverment{{$row->id}}" type="button" role="tab" style="min-width: max-content;"
                        aria-controls="goverment{{$row->id}}" aria-selected="true">Government</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-custom" id="manufacturing{{$row->id}}-tab" data-bs-toggle="pill"
                        data-bs-target="#manufacturing{{$row->id}}" type="button" role="tab"
                        style="min-width: max-content;" aria-controls="manufacturing{{$row->id}}"
                        aria-selected="true">Manufacturing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-custom" id="telco{{$row->id}}-tab" data-bs-toggle="pill"
                        data-bs-target="#telco{{$row->id}}" type="button" role="tab" style="min-width: max-content;"
                        aria-controls="telco{{$row->id}}" aria-selected="true">Telco & Service</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-custom" id="retail{{$row->id}}-tab" data-bs-toggle="pill"
                        data-bs-target="#retail{{$row->id}}" type="button" role="tab" style="min-width: max-content;"
                        aria-controls="retail{{$row->id}}" aria-selected="true">Retail</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-custom" id="education{{$row->id}}-tab" data-bs-toggle="pill"
                        data-bs-target="#education{{$row->id}}" type="button" role="tab" style="min-width: max-content;"
                        aria-controls="education{{$row->id}}" aria-selected="true">Education</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="fsi{{$row->id}}" role="tabpanel"
                    aria-labelledby="fsi{{$row->id}}-tab" tabindex="0">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll; border: none; padding-left: 0;">
                        <?php $fsi = CustomerConnector::where('id_product', $row->id)->join('tb_contact', 'tb_customer_connector.id_customer', '=', 'tb_contact.id_customer')->where('tb_contact.type', 1)->where('tb_contact.nik_request', '!=', 'null')->get()->all(); ?>
                        @foreach($fsi as $fsidata)
                        <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain" class="shadow rounded p-2"
                            src="{{env('STORAGE_LINK')}}customer/{{$fsidata->logo}}" alt="{{$fsidata->brand_name}}">
                        @endforeach
                    </div>
                    <p class="fs-5"><strong>Project Reference</strong></p>
                    <div class="card card-body d-flex justify-content-around flex-wrap" style="border: none; padding-left: 0;">
                        <?php $project1 = ProjectReference::where('id_product', $row->id)->where('type', 1)->get()->first(); ?>
                        @if($project1)
                        <div class="img-partnership col-md-2 mt-3">
                            <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain"
                                src="{{env('STORAGE_LINK')}}project/{{$project1->image}}" class="shadow rounded p-2"
                                alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project1->desc}}</p>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="goverment{{$row->id}}" role="tabpanel"
                    aria-labelledby="goverment{{$row->id}}-tab" tabindex="0">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll; border: none; padding-left: 0;">
                        <?php $government = CustomerConnector::where('id_product', $row->id)->join('tb_contact', 'tb_customer_connector.id_customer', '=', 'tb_contact.id_customer')->where('tb_contact.type', 2)->where('tb_contact.nik_request', '!=', 'null')->get()->all(); ?>
                        @foreach($government as $governmentdata)
                        <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain" class="shadow rounded p-2"
                            src="{{env('STORAGE_LINK')}}customer/{{$governmentdata->logo}}"
                            alt="{{$governmentdata->brand_name}}">
                        @endforeach
                    </div>
                    <p class="fs-5"><strong>Project Reference</strong></p>
                    <div class="card card-body d-flex justify-content-around flex-wrap" style="border: none; padding-left: 0;">
                        <?php $project2 = ProjectReference::where('id_product', $row->id)->where('type', 2)->get()->first(); ?>
                        @if($project2)
                        <div class="img-partnership col-md-2 mt-3">
                            <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain"
                                src="{{env('STORAGE_LINK')}}project/{{$project2->image}}" class="shadow rounded p-2"
                                alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project2->desc}}</p>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="manufacturing{{$row->id}}" role="tabpanel"
                    aria-labelledby="manufacturing{{$row->id}}-tab" tabindex="0">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll; border: none; padding-left: 0;">
                        <?php $manufacturing = CustomerConnector::where('id_product', $row->id)->join('tb_contact', 'tb_customer_connector.id_customer', '=', 'tb_contact.id_customer')->where('tb_contact.type', 3)->where('tb_contact.nik_request', '!=', 'null')->get()->all(); ?>
                        @foreach($manufacturing as $manufacturingdata)
                        <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                            src="{{env('STORAGE_LINK')}}customer/{{$manufacturingdata->logo}}"
                            alt="{{$manufacturingdata->brand_name}}">
                        @endforeach
                    </div>
                    <p class="fs-5"><strong>Project Reference</strong></p>
                    <div class="card card-body d-flex justify-content-around flex-wrap" style="border: none; padding-left: 0;">
                        <?php $project3 = ProjectReference::where('id_product', $row->id)->where('type', 3)->get()->first(); ?>
                        @if($project3)
                        <div class="img-partnership col-md-2 mt-3">
                            <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain"
                                src="{{env('STORAGE_LINK')}}project/{{$project3->image}}" class="shadow rounded p-2"
                                alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project3->desc}}</p>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="telco{{$row->id}}" role="tabpanel"
                    aria-labelledby="telco{{$row->id}}-tab" tabindex="0">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll; border: none; padding-left: 0;">
                        <?php $telco = CustomerConnector::where('id_product', $row->id)->join('tb_contact', 'tb_customer_connector.id_customer', '=', 'tb_contact.id_customer')->where('tb_contact.type', 4)->where('tb_contact.nik_request', '!=', 'null')->get()->all(); ?>
                        @foreach($telco as $telcodata)
                        <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                            src="{{env('STORAGE_LINK')}}customer/{{$telcodata->logo}}" alt="{{$telcodata->brand_name}}">
                        @endforeach
                    </div>
                    <p class="fs-5"><strong>Project Reference</strong></p>
                    <div class="card card-body d-flex justify-content-around flex-wrap" style="border: none; padding-left: 0;">
                        <?php $project4 = ProjectReference::where('id_product', $row->id)->where('type', 4)->get()->first(); ?>
                        @if($project4)
                        <div class="img-partnership col-md-2 mt-3">
                            <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain"
                                src="{{env('STORAGE_LINK')}}project/{{$project4->image}}" class="shadow rounded p-2"
                                alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project4->desc}}</p>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="retail{{$row->id}}" role="tabpanel"
                    aria-labelledby="retail{{$row->id}}-tab" tabindex="0">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll; border: none; padding-left: 0;">
                        <?php $retail = CustomerConnector::where('id_product', $row->id)->join('tb_contact', 'tb_customer_connector.id_customer', '=', 'tb_contact.id_customer')->where('tb_contact.type', 5)->where('tb_contact.nik_request', '!=', 'null')->get()->all(); ?>
                        @foreach($retail as $retaildata)
                        <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                            src="{{env('STORAGE_LINK')}}customer/{{$retaildata->logo}}"
                            alt="{{$retaildata->brand_name}}">
                        @endforeach
                    </div>
                    <p class="fs-5"><strong>Project Reference</strong></p>
                    <div class="card card-body d-flex justify-content-around flex-wrap" style="border: none; padding-left: 0;">
                        <?php $project5 = ProjectReference::where('id_product', $row->id)->where('type', 5)->get()->first(); ?>
                        @if($project5)
                        <div class="img-partnership col-md-2 mt-3">
                            <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain"
                                src="{{env('STORAGE_LINK')}}project/{{$project5->image}}" class="shadow rounded p-2"
                                alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project5->desc}}</p>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="education{{$row->id}}" role="tabpanel"
                    aria-labelledby="education{{$row->id}}-tab" tabindex="0">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll; border: none; padding-left: 0;">
                        <?php $education = CustomerConnector::where('id_product', $row->id)->join('tb_contact', 'tb_customer_connector.id_customer', '=', 'tb_contact.id_customer')->where('tb_contact.type', 6)->where('tb_contact.nik_request', '!=', 'null')->get()->all(); ?>
                        @foreach($education as $educationdata)
                        <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                            src="{{env('STORAGE_LINK')}}customer/{{$educationdata->logo}}"
                            alt="{{$educationdata->brand_name}}">
                        @endforeach
                    </div>
                    <p class="fs-5"><strong>Project Reference</strong></p>
                    <div class="card card-body d-flex justify-content-around flex-wrap" style="border: none; padding-left: 0;">
                        <?php $project6 = ProjectReference::where('id_product', $row->id)->where('type', 6)->get()->first(); ?>
                        @if($project6)
                        <div class="img-partnership col-md-2 mt-3">
                            <img onerror="replaceImage(this)" style="height: 85px; width: 165px; object-fit: contain"
                                src="{{env('STORAGE_LINK')}}project/{{$project6->image}}" class="shadow rounded p-2"
                                alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project6->desc}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-5">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist" style="overflow: scroll; flex-wrap: nowrap;">
                <button style="min-width: max-content;" class="nav-link nav-link-custom active" id="nav-consultant-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-consultant" type="button" role="tab"
                    aria-controls="nav-consultant" aria-selected="true">Consultant</button>
                <button style="min-width: max-content;" class="nav-link nav-link-custom" id="nav-delivery-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-delivery" type="button" role="tab"
                    aria-controls="nav-delivery" aria-selected="false">Delivery</button>
                <button style="min-width: max-content;" class="nav-link nav-link-custom" id="nav-service-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-service" type="button" role="tab"
                    aria-controls="nav-service" aria-selected="false">Managed Service</button>
            </div>
        </nav>
        <div class="tab-content pt-4" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-consultant" role="tabpanel"
                aria-labelledby="nav-consultant-tab" tabindex="0">
                <div id="carousel1" class="carousel carousel-dark slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>Solution
                                            as a Service</strong></p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>Service</strong>
                                    </p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>Assesment</strong>
                                    </p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab"
                tabindex="0">
                <div id="carousel2" class="carousel carousel-dark slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>System
                                            Integrator</strong></p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>Service
                                            Seasoned</strong></p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>Supply
                                            Only</strong></p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-service" role="tabpanel" aria-labelledby="nav-service-tab" tabindex="0">
                <div id="carousel3" class="carousel carousel-dark slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>
                                            Maintenance</strong></p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>
                                            Subscription</strong></p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img onerror="replaceImage(this)" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fs-5" style=""><strong>Rental</strong>
                                    </p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel3"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel3"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 py-5 mt-2"
    style="background: url('/custom/images/bg-network.png'); background-attachment: fixed; background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="reach-us container">
        <p class="fs-5 mb-0 text-white"><strong>Intrested with this company?</strong></p>
        <a href="{{url('/message')}}" class="bg-white nav-link py-2 px-3 rounded"
            style="color: var(--purple);"><strong>Get
                Company Profile</strong></a>
    </div>
</div>

<div class="container">
    <div class="d-flex justify-content-between mt-5">
        <p class="fs-5" style=""><strong>Blog</strong></p>
        <a style="color: var(--purple); text-decoration: none" href="{{url('insights/blog')}}">see all</a>
    </div>

    <div class="d-flex flex-wrap gap-2" id="blog-content">

    </div>

    <div class="d-flex flex-wrap gap-3" id="blog-all">
        @foreach($blog as $row)
        <a href="{{url('insights/' .$row->insights->id)}}" class="insights-card my-3"
            style="height: 350px; width: 400px;">
            <img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/{{$row->insights->image}}" alt="">
            <div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="col-md-10 card-title"><strong>{{$row->insights->title}}</strong></p>
                    <p class="col-md-2 text-end" style="font-size: 13px; min-width: 50px; color: grey;">
                        {{Carbon\Carbon::parse($row->insights->created_at)->format('d M')}}</p>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <?php $tag = BlogTag::where('id_insights', $row->insights->id)->get()->all() ?>
                    @foreach($tag as $tags)
                    <p class="mb-0 rounded">• {{$tags->product->name_tech}}</p>
                    @endforeach
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<script>
    function blogData(id) {
        document.querySelector('#blog-all').setAttribute('style', 'display: none !important');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/blog/" + id,
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
                            success: function (tag_response) {
                                var tag = ""
                                $.each(tag_response, function (index, result) {
                                    console.log(result.name_tech);
                                    tag = tag +
                                        '<p class="mb-0 rounded" style="font-size: 15px;">• ' +
                                        result.name_tech + '</p>'
                                });
                                $("#tag-tag" + value.id).html(tag);
                            }

                        })

                        data = data + '<a href="/insights/' + value.id +
                            '" class="insights-card" style="height: 350px; width: 400px;">'
                        data = data + '<img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/' + value.image +
                            '" alt="" style="height: 200px;">'
                        data = data + '<div>'
                        data = data + '<div class="d-flex justify-content-between mt-2">'
                        data = data +
                            '<p class="col-md-10"style="font-size: 18px; max-height: 25px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">' +
                            value.title + '</p>'
                        data = data +
                            '<p class="col-md-2 text-end" style="font-size: 13px; min-width: 50px; color: grey;"><strong>' +
                            formattedDate + '</strong></p>'
                        data = data + '</div>'
                        data = data +
                            '<div class="d-flex flex-wrap gap-2 tag-content" id="tag-tag' + value
                            .id + '">'
                        data = data + '</div>'
                        data = data + '</div>'
                        data = data + '</a>'
                    });
                } else {
                    data =
                        '<p class="rounded p-1 mt-5" style="background: var(--purple); color: white;">No Blog for this Product</p>';
                }
                $('#blog-content').html(data);
            }
        })
    }

</script>
@endsection
