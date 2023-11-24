@extends('layouts.main')

@section('content')
<?php use App\TagConnector ?>
<?php use App\BlogTag ?>
<style>
    #footer {
        padding-top: 0px;
    }
    #search {
        height: 50px;
        font-family: Arial, FontAwesome;
    }

    #search::placeholder {
        text-align: end;
    }

</style>
<div style="width: 100vw; height: 100vh;" class="mt-5 pt-5">
    <div class="w-100 h-50 d-flex align-items-end">
        <p class="w-100 text-header-landingpage"><strong>Find<br>Your IT Business Solution<br>Here</strong></p>
    </div>
    <div class="w-100 h-50 d-flex align-items-center mt-3" style="flex-direction: column;">
        <div id="form-search" class="col-md-6 d-flex gap-2" style="max-height: 50px;">
            <input type="text" id="search" class="form-control shadow fas" placeholder="&#xF002;" onkeydown="enter()">
            <button style="background: var(--purple); text-decoration: none; padding: 10px 0px;"
                class="text-white px-5 rounded mb-0" onclick="submit()">Search</button>
        </div>
        <div class="col-md-6 mt-3 px-3">
            <div class="d-flex gap-2 col-md-10 flex-wrap">
                @foreach($search_data as $row)
                <p class="btn-keyword mb-0" onclick="setKeyword('{{$row}}')">{{$row}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="content-solution">
    <div class="container">
        <p class="content-header text-white"><strong>Know more our Business Solution</strong></p>
        <div class="d-flex justify-content-around flex-wrap">
            <a href="{{url('solution/detail?t=1')}}" class="bg-white p-4 my-2 text-center solution-card"
                style="width: 300px; border-radius: 25px;">
                <img onerror="replaceImage(this)" src="{{asset('/custom/icon/ic_enterprise.png')}}" alt="">
                <p class="btn mt-2 fw-bold" style="font-size: 16px; border: none;">Enterprise Network
                    Infrastructure</p>
            </a>
            <a href="{{url('solution/detail?t=2')}}" class="bg-white p-4 my-2 text-center solution-card"
                style="width: 300px; border-radius: 25px;">
                <img onerror="replaceImage(this)" src="{{asset('/custom/icon/ic_datacenter.png')}}" alt="">
                <button class="btn mt-2 fw-bold" style="font-size: 16px; border: none;">Data Center & Cloud</button>
            </a>
            <a href="{{url('solution/detail?t=3')}}" class="bg-white p-4 my-2 text-center solution-card"
                style="width: 300px; border-radius: 25px;">
                <img onerror="replaceImage(this)" src="{{asset('/custom/icon/ic-cybersecurity.png')}}" alt="">
                <button class="btn mt-2 fw-bold" style="font-size: 16px; border: none;">Cyber Security &
                    Analytics</button>
            </a>
            <a href="{{url('solution/detail?t=4')}}" class="bg-white p-4 my-2 text-center solution-card"
                style="width: 300px; border-radius: 25px;">
                <img onerror="replaceImage(this)" src="{{asset('/custom/icon/ic_facility.png')}}" alt="">
                <button class="btn mt-2 fw-bold" style="font-size: 16px; border: none;">Facility &
                    Collaboration</button>
            </a>
        </div>
    </div>
</div>

<div class="container">
    <p class="content-header"><strong>Support System</strong></p>
    <div>
        <div class="d-flex flex-wrap gap-4 justify-content-center pb-5">
            <button type="button" class="collapse-service-content">
                <div class="collapse-service-item">
                    <p class="text-white text-center"><strong>Hardware Integration & Implementation</strong></p>
                    <p class="text-white">Infrastructure Development. Application Administration & Maintainance. Enterprise System Integration. Telecomunication System Integration & Managed Services. Outsourcing & Joint Development Services</p>
                </div>
                <div href="" class="collapse-service-title border">
                    <p class="mb-0"><strong>Hardware Integration & Implementation</strong></p>
                </div>
            </button>
            <button type="button" class="collapse-service-content">
                <div class="collapse-service-item">
                    <p class="text-white text-center"><strong>Managed Service & Engineer On Site</strong></p>
                    <p class="text-white">Network Blue Printing & Architecture. Network Administration & Maintainance. Network & Infrastructure Deployment, Enterprise Network Solutions. Carrier Grade Network Management Services.</p>
                </div>
                <div href="" class="collapse-service-title border">
                    <p class="mb-0"><strong>Managed Service & Engineer On Site</strong></p>
                </div>
            </button>
            <button type="button" class="collapse-service-content">
                <div class="collapse-service-item">
                    <p class="text-white text-center"><strong>Seccond Level Maintenance Support</strong></p>
                    <p class="text-white">Available Support Any Time. Operate Continuously At All Times With Complete Shoft Staff.</p>
                </div>
                <div href="" class="collapse-service-title border">
                    <p class="mb-0"><strong>Seccond Level Maintenance Support</strong></p>
                </div>
            </button>
            <button type="button" class="collapse-service-content">
                <div class="collapse-service-item">
                    <p class="text-white text-center"><strong>IT Consultant & Design Architecture</strong></p>
                    <p class="text-white">Network Cabling Termination. Fiber Optic Cabling Deployment. Electrical Cabling Solution</p>
                </div>
                <div href="" class="collapse-service-title border">
                    <p class="mb-0"><strong>IT Consultant & Design Architecture</strong></p>
                </div>
            </button>
            <button type="button" class="collapse-service-content">
                <div class="collapse-service-item">
                    <p class="text-white text-center"><strong>IT Device Rental & Supply</strong></p>
                    <p class="text-white">Application Architectures Supporting Digital Business, Mobile, Cloud And APIs Include Services That Integrate Exiting Assets Or Implement New Capabilities</p>
                </div>
                <div href="" class="collapse-service-title border">
                    <p class="mb-0"><strong>IT Device Rental & Supply</strong></p>
                </div>
            </button>
        </div>
    </div>

    <p class="content-header">Business Partner</p>
    <div>
        <div class="d-flex flex-wrap gap-3 py-5">
            @foreach($partnership as $row)
            <div class="collapse-partner-item" style="background: url({{env('PARTNERSHIP_STORAGE') .$row->logo}})">
                <div href="" class="collapse-partner-title border">
                    <p class="mb-0">{{$row->partner}}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center" style="border-bottom: 1px solid #747A7A; padding: 70px 0;">
            <a href="{{url('/partnership')}}" class="collapse-partner-button">Know More</a>
        </div>
        <p class="mb-0 py-5" style="text-align: center; font-size: 25px; font-weight: bold;">Are you the next one?</p>
        <div class="d-flex flex-wrap gap-3 py-5 justify-content-around">
            @foreach($customer as $row)
            <div class="collapse-customer-item">
                <img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}customer/{{$row->logo}}" alt="">
                <p class="text-center mt-3"
                    style="max-width: 150px; overflow: hidden; display: -webkit-box;-webkit-line-clamp: 1;line-clamp: 1;-webkit-box-orient: vertical;">
                    {{$row->brand_name}}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{url('/customer')}}" class="collapse-partner-button">Know More</a>
        </div>
    </div>
  
</div>


<div class="content-insights mt-5 d-flex flex-wrap justify-content-around py-5">
    <div class="col-md-3 pb-3">
        <p style="color: white; font-size: 25px; font-weight: bold;">Blog & News</p>
        <p style="color: white;">Get some information or update in here</p>
        <form action="{{url('/store/subscriber')}}" class="d-flex gap-1" method="post">
            @csrf
            <input type="email" name="email" placeholder="Email" class="form-control">
            <button class="btn" style="border: 1px solid white; background: var(--red); color: white;">Subscribe</button>
        </form>
    </div>
    <div class="col-md-9 d-flex align-items-center gap-3 ps-3" style="overflow: scroll;">
        @foreach($insights as $row)
        <a href="{{url('insights/' .$row->id)}}" class="insights-main-card">
            <img onerror="replaceImage(this)" src="{{env('STORAGE_LINK')}}insights/{{$row->image}}" alt="">
            <div class="bg-white p-3" style="height: 200px;">
                <p style="font-size: 13px; margin-bottom: 0;">{{Carbon\Carbon::parse($row->created_at)->format('d M')}}</p>
                <p class="card-title mt-2"><strong>{{$row->title}}</strong></p>
                <div class="d-flex flex-wrap gap-2 mt-3" style="max-height: 100px; overflow: scroll;">
                @if($row->type == "News")
                <?php $tag = TagConnector::where('id_insights', $row->id)->get()->all() ?>
                    @foreach($tag as $tags)
                    <p class="mb-0 rounded">#{{$tags->tag->tag_name}}</p>
                    @endforeach
                @else
                <?php $tag = BlogTag::where('id_insights', $row->id)->get()->all() ?>
                        @foreach($tag as $tags)
                        <p class="mb-0 rounded">• {{$tags->product->name_tech}}</p>
                        @endforeach
                @endif
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

<script>
    const service_modal_title = document.querySelector('.service-modal-title')
    const service_desc = document.querySelector('.service-desc')
    const service_img = document.querySelector('.img-service-modal')

    function sendMail() {

    var params = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        message: document.getElementById("message").value,
    }

    const serviceID = "service_6aethk5"
    const templateID = "template_nyg22s6"

    emailjs.send(serviceID, templateID, params).then((response) => {
        document.getElementById("name").value = ""
        document.getElementById("email").value = ""
        document.getElementById("message").value = ""
        console.log(response);
        alert('success send message')
    }).catch((e) => {
        console.log(e);
    })
    }

    function getServiceValue(name) {
        service_modal_title.innerText = name

        if (name == "IT SERVICES BY PROJECT & SERVICE LEVEL AGREEMENT") {
            service_desc.innerText =
                "Infrastructure Development. Application Administration & Maintainance. Enterprise System Integration. Telecomunication System Integration & Managed Services. Outsourcing & Joint Development Services"
            service_img.setAttribute('src', '/custom/icon/ic_service1.png')
        } else if (name == "HARDWARE INTEGRATION & IMPLEMENTATION") {
            service_desc.innerText =
                "Network Blue Printing & Architecture. Network Administration & Maintainance. Network & Infrastructure Deployment, Enterprise Network Solutions. Carrier Grade Network Management Services."
            service_img.setAttribute('src', '/custom/icon/ic_service2.png')

        } else if (name == "24/7 SUPPORT") {
            service_desc.innerText =
                "Available Support Any Time. Operate Continuously At All Times With Complete Shoft Staff."
            service_img.setAttribute('src', '/custom/icon/ic_service3.png')

        } else if (name == "CABLING SYSTEM INSTALLATION") {
            service_desc.innerText =
                "Network Cabling Termination. Fiber Optic Cabling Deployment. Electrical Cabling Solution"
            service_img.setAttribute('src', '/custom/icon/ic_service4.png')

        } else if (name == "APLICATION & SERVICE IMPLEMENTATION") {
            service_desc.innerText =
                "Application Architectures Supporting Digital Business, Mobile, Cloud And APIs Include Services That Integrate Exiting Assets Or Implement New Capabilities"
            service_img.setAttribute('src', '/custom/icon/ic_service5.png')

        } else {
            service_desc.innerText =
                "Physical Building Security Solution. Enterprise Specific Security Services. Integrated Security"
            service_img.setAttribute('src', '/custom/icon/ic_service6.png')

        }
    }

    var searchValue = ""

    function setKeyword(value) {
        $('#search').val(value)
        return searchValue = value
    }

    function submit() {
        let ele = $('#search').val()
        if (ele == "blog" || ele == "news") {
            searchValue = "/insights/" + ele
            location.href = searchValue
        } else if (ele == "about") {
            searchValue = "/profile"
            location.href = searchValue
        } else if (ele == "partner") {
            searchValue = "/partnership"
            location.href = searchValue
        } else if (ele == "quotation") {
            searchValue = "/message"
            location.href = searchValue
        } else if (ele == "partnership" || ele == "customer" || ele == "campaign" || ele == "career" || ele ==
            "profile" || ele == "message") {
            searchValue = ele
            location.href = searchValue
        } else if (ele == "") {
            Swal.fire({
                title: "please enter the keyword",
                icon: "warning"
            });
        } else {
            Swal.fire({
                title: "Not Found",
                icon: "error"
            });
        }
    }

    function enter() {
        if (event.key == "Enter") {
            setTimeout(function () {
                submit()
            }, 5);
        }
    }

</script>
@endsection
