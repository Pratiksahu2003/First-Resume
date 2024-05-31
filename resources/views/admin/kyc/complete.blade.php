@extends('layouts.admin.app')

@section('title')

| {{@$title}}
@endsection


@section('content')

<div class="container-fluid">
    
<div class=" col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">KYC Complete</h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Name</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Father Name</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Status</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Action</h6>
                </th>
              </tr>
            </thead>
            <tbody>
@php 
$i = 1;
@endphp


@foreach ($kcm as $item )
    
              <tr class="border-bottom ">
                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{@$i}}</h6></td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{@$item->full_name}}</h6>                      
                </td>

                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">{{@$item->father_name}}</h6>                      
                </td>
                
                <td class="border-bottom-0">
                  <div class="d-flex align-items-center gap-2">
                  @if($item->status == 'active')
                  <span class="badge bg-primary rounded-3 fw-semibold"> Completed  </span>
                        @else
                        <span class="badge bg-danger rounded-3 fw-semibold"> Pending </span>

                        @endif
                  
                  </div>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4"><a href="{{ route('kyc.show', ['id' => encrypt($item->id), 'status' => encrypt($item->status)]) }}"  class=" btn xs-btn btn-primary m-1">Verify</a></h6>
                </td>
              </tr> 
              @php 
$i +=1;
@endphp
              @endforeach                          
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
