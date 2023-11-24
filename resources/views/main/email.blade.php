<!DOCTYPE html>
<html lang="en">
    <?php use App\Customer; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="container-fluid pt-5 d-flex row align-items-center justify-content-center">
    <p class="fw-semibold fs-5 text-center">Message</p>
    <div class="bg-white p-4 rounded shadow col-md-8">
        @if($data['for'] != 'Quotation')        
        <p>From : {{$data['name']}}</p>
        <p>Email : {{$data['email']}}</p>
        <p>Phone : {{$data['phone']}}</p>
        @if(isset($data['department']))
        <p>Department : {{$data['department']}}</p>
        @endif
        @if(isset($data['business']))
        <p>Company : {{$data['business']}}</p>
        @endif
        @if(isset($data['job_title']))
        <p>Company : {{$data['job_title']}}</p>
        @endif
        <p>For : {{$data['for']}}</p>
        <p style="text-align: justify;">Request : {{$data['request']}}</p>
        @else
        <p>From : {{$data['attention']}}</p>
        <p>Email : {{$data['email']}}</p>
        <p>Phone : {{$data['phone']}}</p>
        <p>Job Title : {{$data['job_title']}}</p>
        <p>Department : {{$data['department']}}</p>
        <p>Company : {{$data['to']}}</p>
        <p>For : {{$data['title']}}</p>
        <p style="text-align: justify;">Request : {{$data['project']}}</p>
        @endif
        <div class="text-end">
            @if($data['for'] != 'Quotation')        
            <a href="{{url('http://localhost:8000/message')}}" target="_blank" class="btn btn-success btn-sm">Go to website</a>
            @else 
            <a href="{{url('http://localhost:8000/quote')}}" target="_blank" class="btn btn-success btn-sm">Go to website</a>
            @endif
        </div>
    </div>
</body>
</html>