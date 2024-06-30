@extends('layouts.user.app')

@section('title')
    | Personal Details
@endsection

@section('content')
<section class="container-fluid">
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card shadow-sm" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="card-header bg-light border-bottom p-2">
                            <h5 class="text-center text-primary mb-0">Additional Details</h5>
                        </div>
                        <div class="container-fluid py-3">
                            <form action="{{ route('resume.personal.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            
                                <input type="hidden" name="id" value="{{ $kyc->id ?? '' }}">

                                <div class="mb-3">
                                    <label for="objective" class="form-label">Objective:</label>
                                    <textarea id="objective" rows="5" class="form-control" name="objective" required>{{ $kyc->objective ?? '' }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="aboutUs" class="form-label">About Us:</label>
                                    <textarea id="aboutUs" rows="5" class="form-control" name="about_us" required>{{ $kyc->about_us ?? '' }}</textarea>
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
    <!-- Summernote CDN -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#objective').summernote({
                placeholder: 'Enter your objective here...',
                height: 150, // Adjust the height as needed
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });

            $('#aboutUs').summernote({
                placeholder: 'Enter about us here...',
                height: 150, // Adjust the height as needed
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>
@endsection
