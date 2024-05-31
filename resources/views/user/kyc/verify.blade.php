@extends('layouts.user.app')

@section('title')
| {{@$title}}
@endsection
@section('content')

<section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header border-bottom bg-light p-2">
                            <p class="text-center h4 text-primary">User Deatials   <b>@if($kyc->status == 'active')
                              <button type="button" class="btn btn-success rounded-pill m-2 btn-sm"> Verified </button> @endif</b></p>
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

      </div>
    </div>
</div>
</div>


</div>
</div>

@endsection