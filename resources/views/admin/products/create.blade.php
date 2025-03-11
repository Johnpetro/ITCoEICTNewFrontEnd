@extends('components.admin_layout')

@section('body')


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Product</h1>
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
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload Product Video</label>
                                <input type="file" name="video" id="videoInput" class="form-control" accept="video/mp4,video/x-m4v,video/*">
                            </div>

                            <div class="text-center">
                                <video id="previewVideo" class="img-thumbnail d-none" style="max-width: 250px;" controls>
                                    <source src="#" type="video/mp4">
                                </video>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary px-4">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://www.dit.ac.tz/">Visit Our Website</a>.</strong>
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