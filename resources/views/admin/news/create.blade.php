@extends('components.admin_layout')

@section('title', 'Dashboard')

@section('body')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create News</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a></li>
              <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
          <div class="container mt-4">
            <div class="card shadow-sm p-4">
                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title:</label>
                            <input type="text" name="title" required class="form-control">
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <textarea name="description" id="description" required class="form-control"></textarea>
                        </div>
                
                        <div class="mb-3">
                          <label class="form-label">Image:</label>
                          <input type="file" name="image" required class="form-control" id="imageInput" onchange="previewImage(event)">
                          <!-- Image Preview -->
                          <div id="imagePreviewContainer" style="margin-top: 10px;">
                              <img id="imagePreview" src="" alt="Image Preview" style="max-width: 300px; max-height: 80px; display: none;">
                          </div>
                      </div>
                
                        {{-- <div class="mb-3">
                            <label class="form-label">Video URL:</label>
                            <input type="text" name="video_url" class="form-control">
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Publish Date:</label>
                            <input type="date" name="published_at" class="form-control">
                        </div> --}}
                
                        <button type="submit" class="btn btn-success mt-2">Save</button>
                    </form>
                
                
            </div>
        </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://www.dit.ac.tz/">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.2.0 -->
    </div>
</footer>


  <!-- <aside class="control-sidebar control-sidebar-dark">
    Control sidebar content goes here
  </aside> -->




<!-- Include Summernote CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 300
        });
    });
</script>


<script>
    function previewImage(event) {
        var file = event.target.files[0]; // Get the file
        var reader = new FileReader();
        
        reader.onload = function() {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result; // Set the image source to the result of the FileReader
            imagePreview.style.display = 'block'; // Make the image visible
        };
        
        if (file) {
            reader.readAsDataURL(file); // Read the file as a data URL
        }
    }
</script>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://www.dit.ac.tz/">Visit Our Website</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <!-- <b>Version</b> 3.2.0 -->
  </div>
</footer>
@endsection
