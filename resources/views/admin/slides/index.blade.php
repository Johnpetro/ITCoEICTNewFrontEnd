
@extends('components.dashmaster')

@section('body')
<style>
    /* Container for slides */
.slides-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

/* Each slide card */
.slide-item {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 15px;
    text-align: center;
}

/* Image styling - ensures uniform size */
.slide-image {
    width: 100%;
    height: 250px; /* Fixed height for all images */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 8px;
    background: #f4f4f4; /* Light background in case of transparent images */
}

.slide-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* Ensures the whole image is visible */
}

/* Title & Description */
.slide-details h3 {
    margin: 10px 0;
    font-size: 18px;
    font-weight: bold;
}

.slide-details p {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

/* Action buttons - arranged in the same row */
.slide-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
}

.btn {
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
}

.btn-edit {
    background: #007bff;
    color: white;
}

.btn-delete {
    background: #dc3545;
    color: white;
}

.btn-delete:hover {
    background: #c82333;
}


</style>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Sliders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('slides.create') }}" class="btn btn-secondary">Add</a></li>
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
         
            <div class="container">   
            <div class="slides-section">
                @foreach($slides as $slide)
                <div class="slide-item">
                    <div class="slide-image">
                        <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
                    </div>
                    <div class="slide-details">
                        <h3>{{ $slide->title }}</h3>
                        <p>{{ $slide->description }}</p>
                    </div>
                    <div class="slide-actions">
                        <a href="{{ route('slides.edit', $slide) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('slides.destroy', $slide) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-delete" onclick="confirmDelete(this)">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination links -->
            <div class="pagination">
                    {{ $slides->links('pagination::bootstrap-4') }}
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


  <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image_preview');
            output.src = reader.result;
            output.style.display = 'block'; // Show the image preview
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script>
function confirmDelete(button) {
    if (confirm("Are you sure you want to delete this slide? This action cannot be undone!")) {
        button.closest("form").submit();
    }
}
</script>


@endsection



