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

    .preview-media {
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
                    <h1 class="m-0">Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a></li>
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
                            <!-- Form to Edit Product -->
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $product->title) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="video" class="form-label">Upload New Video (Optional)</label>
                                    <input type="file" id="videoInput" name="video" class="form-control" accept="video/mp4,video/x-m4v,video/*">
                                    
                                    @if($product->video)
                                        <div class="mt-2">
                                            <label>Current Video:</label><br>
                                            <video controls class="preview-media">
                                                <source src="{{ asset('storage/' . $product->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endif
                                    
                                    <div class="text-center mt-3">
                                        <video id="previewVideo" class="preview-media d-none" controls>
                                            <source src="#" type="video/mp4">
                                        </video>
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary px-4 submit-btn">
                                        <i class="fas fa-save"></i> Update Product
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
    document.getElementById("videoInput").addEventListener("change", function (event) {
        let videoPreview = document.getElementById("previewVideo");
        let file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                videoPreview.src = e.target.result;
                videoPreview.classList.remove("d-none");
            };
            reader.readAsDataURL(file);
        }
    });
</script>


@endsection