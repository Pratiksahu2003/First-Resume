@extends('layouts.user.app')
@section('title')
    | {{@$title}}
@endsection

@section('content')<section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header border-bottom bg-light p-2">
                            <p class="text-center h4 text-primary">{{@$title}} | Know Your Customer</p>
                        </div>
                        <div class="container-fluid p-3">
                            <form action="{{route('kyc.submit')}}"  method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ @$kyc->id }}">
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="fullName" class="form-label">Full Name:</label>
                                        <input type="text" class="form-control" id="fullName" aria-describedby="fullNameHelp" name="full_name" required value="{{ @$kyc->full_name }}">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="fatherName" class="form-label">Father's Name:</label>
                                        <input type="text" class="form-control" id="fatherName" aria-describedby="fatherNameHelp" name="father_name" value="{{ @$kyc->father_name }}">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label d-block">Gender:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                            <label class="form-check-label" for="female" @if(@$kyc->gender == 'female' )  checked @endif >Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male"  @if(@$kyc->gender == 'male' )  checked @endif >
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="other" value="other"  @if(@$kyc->gender == 'other' )  checked @endif >
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label d-block">Marital Status:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status" id="single" value="single" @if(@$kyc->marital_status == 'single' )  checked @endif  >
                                            <label class="form-check-label" for="single">Single</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status" id="married" value="married" @if(@$kyc->marital_status == 'married' )  checked @endif >
                                            <label class="form-check-label" for="married">Married</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="dob" class="form-label">Date Of Birth:</label>
                                        <input type="date" class="form-control" id="dob" aria-describedby="dobHelp" name="dob" required  value="{{ @$kyc->dob }}">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="country" class="form-label">Country:</label>
                                        <input type="text" class="form-control" id="country" aria-describedby="dobHelp" name="country" required  value="{{ @$kyc->country }}">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="state" class="form-label">State:</label>
                                        <input type="text" class="form-control" id="state" aria-describedby="dobHelp" name='state' required value="{{ @$kyc->state }}" >
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="district" class="form-label">District:</label>
                                        <input type="text" class="form-control" id="district" aria-describedby="dobHelp" name='district' required   value="{{ @$kyc->district }}">
                                    </div>


                                    <div class="mb-3 col-lg-6">
                                        <label for="doc_no" class="form-label">Document No.:</label>
                                        <select class="form-select" id="doc_type" aria-describedby="docNoHelp" name='doc_type' required>
                                            <option value="">Select Document No.</option>
                                            @foreach ($doc as $doc )
                                                
                                            <option value="{{@$doc->id}}" {{ @$doc->id == @$kyc->doc_type ? 'selected' : '' }}>{{@$doc->doc_type}}</option>
                                            @endforeach
                                         
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                    


                                    <div class="mb-3 col-lg-6">
                                        <label for="district" class="form-label">Docuument No.:</label>
                                        <input type="text" class="form-control" id="district" aria-describedby="dobHelp" name='doc_no' required   value="{{ @$kyc->doc_no }}">
                                    </div>

                                    
                                 

                            <div class="mb-3 col-lg-6">
                                <label for="formFileSm" class="form-label"> Proof of Address : Front Side</label>
                                <!-- Update your form field -->
<input class="form-control form-control" id="formFileSm" type="file" name="doc_front" accept="image/*" value="{{ @$kyc->doc_front }}" >
@if(!empty($kyc->doc_front))
<img src="{{asset(@$kyc->doc_front)}}" alt="" height="120px" width="100%" >
@endif
     
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="formFileSm" class="form-label"> Proof of Address : Back Side</label>
                        <!-- Update your form field -->
<input class="form-control form-control" id="formFileSm" type="file" name="doc_back" accept="image/*"  value="{{ @$kyc->doc_back }}" >

@if(!empty($kyc->doc_back))
<img src="{{asset(@$kyc->doc_back)}}" alt="" height="120px" width="100%" >
@endif

      
            </div>
            <div class="mb-3 col-lg-12">
                <label for="address" class="form-label">Address:</label>
<textarea  id="address"  rows="5" class='form-control ' name='address' required>{{ @$kyc->address }}</textarea>        
    </div>     
    
    <div class="mb-3 col-lg-12">
        <label for="address" class="form-label text-justify">Declaration:</label>
        <br>
        <input type="checkbox" name="agree" id=""  value="1" required> {{ general()->kyc_agree}}
</div>   
<div class="card-footer p-2 text-center">
    <button type="submit" class="btn btn-outline-primary  "> Submit </button>
    <button type="reset" class="btn btn-outline-primary  "> Reset </button>

</div>


@if ($errors->any())
<div class="alert alert-danger ">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

  

@endsection