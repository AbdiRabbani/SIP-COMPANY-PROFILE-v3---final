@extends('layouts.main')

@section('content')
<style>
    .floating-button {
        display: none;
    }

</style>
<div class="container request-header">
    <p class="text-center mb-0 mt-5 pt-5"><strong>Join Our Company</strong></p>
    <p class="text-center">Tell everyone that you can do it!!</p>

    <div class="form-request ms-auto me-auto col-md-6">
        <form action="{{url('/join/send')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name</label>
            <input required type="text" name="name" class="form-control">

            <label for="">Email</label>
            <input required type="email" name="email" class="form-control">

            <label for="">Your CV</label>
            <input required type="file" name="cv" id="cv-input" class="form-control">
            <p style="color: grey; font-size: 13px; padding-left: 2px;">use PDF file</p>

            <label for="">Job</label>
            <input type="text" value="{{$data->position}}" disabled class="form-control">
            <input type="number" name="id_job" value="{{$data->id}}" hidden>

            <div class="mt-3 text-end">
                <button class="btn btn-success">Send</button>
            </div>

	    @if($errors->any())
  		@foreach($errors->all() as $error)
  		<div class="alert alert-warning mt-3" role="alert">
  		{{$error}}
  		</div>
  		@endforeach
	    @endif

        </form>
    </div>
</div>
@endsection
