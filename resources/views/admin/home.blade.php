@extends('layouts.admin.app')

@section('title')

| {{@$title}}
@endsection

@section('content')

<!--  Header End -->
<div class="container-fluid">
   
      <div class="col-lg-12">
        <div class="row">
        
             {{-- Monthly Earnings  --}}
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="row alig n-items-start">
                  <div class="col-8">
                    <h5 class="card-title mb-9 fw-semibold">Registered User</h5>
                    <h4 class="fw-semibold mb-3">NO.{{@$user}}</h4>
                    <div class="d-flex align-items-center pb-1">
                     
                    
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="d-flex justify-content-end">
                      <div
                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-user-plus"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
{{-- End  --}}

  {{-- Monthly Earnings  --}}
  <div class="col-lg-4">
    <div class="card">
      <div class="card-body">
        <div class="row alig n-items-start">
          <div class="col-8">
            <h5 class="card-title mb-9 fw-semibold"> KYC Pending </h5>
            <h4 class="fw-semibold mb-3">NO. {{@$kpd}}</h4>
            <div class="d-flex align-items-center pb-1">
             
            
            </div>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-end">
              <div
                class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                <i class="ti ti-user-plus"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- End  --}}


  {{-- Monthly Earnings  --}}
  <div class="col-lg-4">
    <div class="card">
      <div class="card-body">
        <div class="row alig n-items-start">
          <div class="col-8">
            <h5 class="card-title mb-9 fw-semibold"> KYC Complete </h5>
            <h4 class="fw-semibold mb-3">NO. {{@$kcm}}</h4>
            <div class="d-flex align-items-center pb-1">
             
            
            </div>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-end">
              <div
                class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                <i class="ti ti-user-plus"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- End  --}}


        </div>
      </div>
    </div>

@endsection
