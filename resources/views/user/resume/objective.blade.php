@extends('layouts.user.app')

@section('title')
    | Personal Details
@endsection

@section('content')
<section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header border-bottom bg-light p-2">
                            <p class="text-center h4 text-primary">Additional Details</p>
                        </div>
                        <div class="container-fluid p-3">
                            <form action="{{ route('resume.personal.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            
                                <input type="hidden" name="id" value="{{ $kyc->id ?? '' }}">

                                <div class="mb-3">
                                    <label for="objective" class="form-label">Objective:</label>
                                    <textarea id="objective" rows="5"  name="objective" required>{{ $kyc->objective ?? '' }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="aboutUs" class="form-label">About Us:</label>
                                    <textarea id="aboutUs" rows="5" name="about_us" required>{{ $kyc->about_us ?? '' }}</textarea>
                                </div>

                                <div class="card-footer p-2 text-center">
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </div>

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#objective'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#aboutUs'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
