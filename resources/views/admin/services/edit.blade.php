@extends('components.admin_layout')

@section('body')

<style>
    .content-wrapper {
        margin-left: 250px; /* Adjust according to sidebar width */
        padding: 20px;
    }

    @media (max-width: 992px) {
        .content-wrapper {
            margin-left: 0;
        }
    }

    .form-group label {
        font-weight: bold;
    }

    .card {
        max-width: 600px;
        margin: auto;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .submit-btn {
        font-weight: bold;
    }

    .preview-img {
        max-width: 150px;
        margin-top: 10px;
        border-radius: 5px;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Service Business</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container mt-4">
                    <div class="card shadow-sm p-4">
                        <div class="card-body">
                            <!-- Form to Edit Service Business -->
                            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload New Image (Optional)</label>
                                    <input type="file" id="imageInput" name="image" class="form-control">
                                    
                                    @if($service->image)
                                        <div class="mt-2">
                                            <label>Current Image:</label><br>
                                            <img src="{{ asset('storage/' . $service->image) }}" class="preview-img" alt="Current Image">
                                        </div>
                                    @endif
                                    
                                    <div class="text-center mt-3">
                                        <img id="previewImage" src="#" class="preview-img d-none" alt="New Image Preview">
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary px-4 submit-btn">
                                        <i class="fas fa-save"></i> Update Service Business
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<footer class="main-footer">
    <strong>&copy; <span id="currentYear"></span> <a href="https://www.dit.ac.tz/">Visit Our Website</a>.</strong>
    All rights reserved.
</footer>

<script>
    document.getElementById("imageInput").addEventListener("change", function (event) {
        let imagePreview = document.getElementById("previewImage");
        let file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove("d-none");
            };
            reader.readAsDataURL(file);
        }
    });
</script>









@endsection