@extends('layouts.admin.app')

@section('title')
| {{@$title}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="card-body">
        <div class="card-header border-bottom bg-light p-2">
            <p class="text-center h4 text-primary">{{@$title}}</p>
        </div>

<div class="col-lg-12 text-center">
<div class="card mb-4">
<div class="card-body">
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Full Name :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{ @$kyc->full_name }}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Father Name :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->father_name}}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Gender :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->gender}}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Marital Status :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->marital_status}}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Date Of Birth :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->dob}}</p>
</div>
</div>
<hr>

<div class="row">
<div class="col-sm-3">
<p class="mb-0">District :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->district}}</p>
</div>
</div>

<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">State :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->state}}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Country :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->country}}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Address :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->address}}</p>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<p class="mb-0">Document Name :</p>
</div>
<div class="col-sm-8">
<p class="text-muted mb-0">{{ doc_type($kyc->doc_type)}}</p>

</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Document NO :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->doc_no}}</p>

</div>
</div>
<hr>
<div class="row">
<div class="col-sm-4">
<p class="mb-0">Document Image :</p>
</div>
<div class="col-sm-8 d-flex flex-wrap ">
<div class="mb-3 col-lg-6">      
<img src="{{asset(@$kyc->doc_front)}}" alt="" height="120px" width="100%" >
</div>

<div class="mb-3 col-lg-6">      
<img src="{{asset(@$kyc->doc_back)}}" alt="" height="120px" width="100%" >
    </div>

</div>
</div>
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Complete On :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->created_at}}</p>
</div>
</div>

@if(!empty($kyc->created_at))
<hr>
<div class="row">
<div class="col-sm-3">
<p class="mb-0">Updated On :</p>
</div>
<div class="col-sm-9">
<p class="text-muted mb-0">{{@$kyc->updated_at}}</p>
</div>
</div>
@endif
<hr>
<div class="row text-center">
   
    <div class="col-sm-12">
        <h6 class="fw-semibold mb-0 fs-4"><a href="{{ route('kyc.update', ['id' => encrypt($kyc->id), 'status' => encrypt($kyc->status)]) }}"  class=" btn xs-btn btn-primary m-1">
        
            @if($kyc->status == 'active')
            Reject KYC
            @else
            Accept KYC
            @endif
        
        </a></h6>
    </div>
    </div>


</div>
</div>
</div>

@endsection