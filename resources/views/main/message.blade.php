@extends('layouts.main')

@section('content')
<style>
    .floating-button {
        display: none;
    }

    .nav-link-custom {
        color: grey;
    }

    .nav-link-custom:hover {
        color: black;
    }

</style>
<div class="container" style="margin-top: 100px;">
    <p class=" text-center" style="font-size: 48px;"><strong>Contact Us</strong></p>
    <div class="form-request ms-auto me-auto col-md-6">
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom active" id="quotation-tab" data-bs-toggle="tab"
                    style="min-width: max-content" data-bs-target="#quotation-tab-pane" type="button" role="tab"
                    aria-controls="quotation-tab-pane" aria-selected="true">Quotation</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="career-tab" data-bs-toggle="tab"
                    style="min-width: max-content" data-bs-target="#career-tab-pane" type="button" role="tab"
                    aria-controls="career-tab-pane" aria-selected="false">Career
                    Inquiry</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="req-company-tab" data-bs-toggle="tab"
                    style="min-width: max-content" data-bs-target="#req-company-tab-pane" type="button" role="tab"
                    aria-controls="req-company-tab-pane" aria-selected="false">Req Company Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="help-desk-tab" data-bs-toggle="tab"
                    style="min-width: max-content" data-bs-target="#help-desk-tab-pane" type="button" role="tab"
                    aria-controls="help-desk-tab-pane" aria-selected="false">Help Desk</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <form action="{{url('message/send')}}" method="post" class="tab-pane text-black fade show active"
                id="quotation-tab-pane" role="tabpanel" aria-labelledby="quotation-tab" tabindex="0">
                @csrf
                <div class="mt-3">
                    <label for="name">Your Name</label>
                    <input required name="attention" type="text" id="name" class="form-control">
                    <input name="for" type="text" value="Quotation" hidden>
                </div>
                <div class="mt-3">
                    <label for="business">Phone</label>
                    <input required name="phone" type="number" id="business" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="email"> Email</label>
                    <input required name="email" type="mail" id="email" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="business">Business / Organization</label>
                    <input name="to" type="text" id="business_display" class="form-control mt-2" required>
                </div>
                <div class="mt-3">
                    <label for="job">Job Title</label>
                    <input required name="job_title" type="text" id="job" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="depart">Department</label>
                    <input required name="department" type="text" id="depart" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="business">Give a title</label>
                    <input required name="title" type="text" id="business" class="form-control"
                        placeholder="eg: price quotation">
                </div>
                <div class="my-3 d-flex row">
                    <label for="request">Message</label>
                    <textarea required name="project" id="request" rows="5" class="form-control"></textarea>
                </div>
                <div class="my-3 d-flex">
                    <div class="me-1">
                        <input type="checkbox" id="quotate-check1" onClick="privacy()">
                    </div>
                    <p for="">I agree to the <span data-bs-toggle="modal" data-bs-target="#regulation">Sinergy Informasi
                            Pratama Website Terms & Conditions of Use</span>.</p>
                </div>
                <div class="text-end">
                    <button class="btn" id="btn-quote1" style="color: white; background: var(--red);" disabled>Contact
                        Us</button>
                </div>
            </form>
            <form action="{{url('message/send')}}" method="post" class="tab-pane text-black fade" id="career-tab-pane"
                role="tabpanel" aria-labelledby="career-tab" tabindex="0">
                @csrf
                <div class="mt-3">
                    <label for="name">Your Name</label>
                    <input required name="name" type="text" id="name" class="form-control">
                </div>
                <input name="for" type="text" value="Career" hidden>
                <div class="mt-3">
                    <label for="business">Phone</label>
                    <input required name="phone" type="number" id="business" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="email"> Email</label>
                    <input required name="email" type="mail" id="email" class="form-control">
                </div>
                <div class="my-3 d-flex row">
                    <label for="request">Message</label>
                    <textarea required name="request" id="request" rows="5" class="form-control"></textarea>
                </div>
                <div class="my-3 d-flex">
                    <div class="me-1">
                        <input type="checkbox" id="quotate-check2" onClick="privacy()">
                    </div>
                    <p for="">I agree to the <span data-bs-toggle="modal" data-bs-target="#regulation">Sinergy Informasi
                            Pratama Website Terms & Conditions of Use</span>.</p>
                </div>
                <div class="text-end">
                    <button class="btn" style="color: white; background: var(--red);" id="btn-quote2" disabled>Contact
                        Us</button>
                </div>
            </form>
            <form action="{{url('message/send')}}" method="post" class="tab-pane text-black fade"
                id="req-company-tab-pane" role="tabpanel" aria-labelledby="req-company-tab" tabindex="0">
                @csrf
                <div class="mt-3">
                    <label for="name">Your Name</label>
                    <input required name="name" type="text" id="name" class="form-control">
                    <input name="for" type="text" value="Company Profile" hidden>
                </div>
                <div class="mt-3">
                    <label for="business">Phone</label>
                    <input required name="phone" type="number" id="business" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="email"> Email</label>
                    <input required name="email" type="mail" id="email" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="business">Business / Organization</label>
                    <input required name="business" type="text" id="business" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="job">Job Title</label>
                    <input required name="job_title" type="text" id="job" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="depart"> Department</label>
                    <input required name="department" type="text" id="depart" class="form-control">
                </div>
                <div class="my-3 d-flex row">
                    <label for="request">Message</label>
                    <textarea required name="request" id="request" rows="5" class="form-control"></textarea>
                </div>
                <div class="my-3 d-flex">
                    <div class="me-1">
                        <input type="checkbox" id="quotate-check3" onClick="privacy()">
                    </div>
                    <p for="">I agree to the <span data-bs-toggle="modal" data-bs-target="#regulation">Sinergy Informasi
                            Pratama Website Terms & Conditions of Use</span>.</p>
                </div>
                <div class="text-end">
                    <button class="btn" style="color: white; background: var(--red);" id="btn-quote3" disabled>Contact
                        Us</button>
                </div>
            </form>
            <form action="{{url('message/send')}}" method="post" class="tab-pane text-black fade"
                id="help-desk-tab-pane" role="tabpanel" aria-labelledby="help-desk-tab" tabindex="0">
                @csrf
                <div class="mt-3">
                    <label for="name">Your Name</label>
                    <input required name="name" type="text" id="name" class="form-control">
                    <input name="for" type="text" value="Help Desk" hidden>
                </div>
                <div class="mt-3">
                    <label for="business">Phone</label>
                    <input required name="phone" type="number" id="business" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="email"> Email</label>
                    <input required name="email" type="mail" id="email" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="business">Business / Organization</label>
                    <input required name="business" type="text" id="business" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="job">Job Title</label>
                    <input required name="job_title" type="text" id="job" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="depart"> Department</label>
                    <input required name="department" type="text" id="depart" class="form-control">
                </div>
                <div class="my-3 d-flex row">
                    <label for="request">Message</label>
                    <textarea required name="request" id="request" rows="5" class="form-control"></textarea>
                </div>
                <div class="my-3 d-flex">
                    <div class="me-1">
                        <input type="checkbox" id="quotate-check4" onClick="privacy()">
                    </div>
                    <p for="">I agree to the <span data-bs-toggle="modal" data-bs-target="#regulation">Sinergy Informasi
                            Pratama Website Terms & Conditions of Use</span>.</p>
                </div>
                <div class="text-end">
                    <button class="btn" style="color: white; background: var(--red);" id="btn-quote4" disabled>Contact
                        Us</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="regulation" tabindex="-1" aria-labelledby="regulationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="fs-5 mt-2 "><strong>Ownership of Site; Agreement to Terms of Use</strong></p>
            <p>These Terms and Conditions of Use (the "Terms of Use") apply to the Sinergy web site located at
                www.sinergy.co.id, and all associated sites linked to www.sinergy.co.id by Sinergy, its subsidiaries
                and
                affiliates, including Sinergy sites around the world (collectively, the "Site"). The Site is the
                property of Sinergy. BY USING THE SITE, YOU AGREE TO THESE TERMS OF USE; IF YOU DO NOT AGREE, DO NOT
                USE
                THE SITE.</p>
            <p class="fs-5 "><strong>Content</strong></p>
            <p>All text, graphics, user interfaces, visual interfaces, photographs, trademarks, logos, sounds,
                music,
                artwork and computer code (collectively, "Content"), including but not limited to the design,
                structure,
                selection, coordination, expression, "look and feel" and arrangement of such Content, contained on
                the
                Site is owned, controlled or licensed by or to Sinergy, and is protected by trade dress, copyright,
                patent and trademark laws, and various other intellectual property rights and unfair competition
                laws.
            </p>
            <p class="fs-5 "><strong>Privacy</strong></p>
            <p>Sinergy's Privacy Policy applies to use of this Site, and its terms are made a part of these Terms of
                Use
                by this reference. To view Sinergy's Privacy Policy, click here. Additionally, by using the Site,
                you
                acknowledge and agree that Internet transmissions are never completely private or secure. You
                understand
                that any message or information you send to the Site may be read or intercepted by others, even if
                there
                is a special notice that a particular transmission (for example, credit card information) is
                encrypted.
            </p>
        </div>
    </div>
</div>

@if(session()->has('message'))
<div class="message-floating">
    {{ session()->get('message') }}

    <p onClick="closeQuotation()">x</p>
</div>
@endif

<script>
    function privacy() {
        const check_quote1 = document.querySelector('#quotate-check1')
        const check_quote2 = document.querySelector('#quotate-check2')
        const check_quote3 = document.querySelector('#quotate-check3')
        const check_quote4 = document.querySelector('#quotate-check4')

        if (check_quote1.checked == true) {
            document.querySelector("#btn-quote1").disabled = false;

        } else {
            document.querySelector("#btn-quote1").disabled = true;
        }

        if (check_quote2.checked == true) {
            document.querySelector("#btn-quote2").disabled = false;

        } else {
            document.querySelector("#btn-quote2").disabled = true;
        }

        if (check_quote3.checked == true) {
            document.querySelector("#btn-quote3").disabled = false;

        } else {
            document.querySelector("#btn-quote3").disabled = true;
        }

        if (check_quote4.checked == true) {
            document.querySelector("#btn-quote4").disabled = false;

        } else {
            document.querySelector("#btn-quote4").disabled = true;
        }
    }

    const message_floating = document.querySelector('.message-floating')

    function closeQuotation() {
        message_floating.style.display = 'none'
    }

</script>
@endsection
