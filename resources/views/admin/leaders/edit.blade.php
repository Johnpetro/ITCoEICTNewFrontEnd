

@extends('components.dashmaster')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Edit Leader</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('leaders.index') }}" class="btn btn-secondary">Back</a></li>
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
        <div class="container">
            <form action="{{ route('leaders.update', $leader->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $leader->name }}" required>
                </div>
                <div class="form-group">
                    <label>Position:</label>
                    <input type="text" name="position" class="form-control" value="{{ $leader->position }}" required>
                </div>
                <div class="form-group">
                    <label>Current Image:</label><br>
                    <img src="{{ asset('storage/' . $leader->image) }}" width="100"><br>
                    <label>New Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>

                    <!-- Buttons in the same row with minimal space -->
                    <div class="d-flex mt-3">
                            <button type="submit" class="btn btn-success me-2">Update</button> <!-- 'me-2' adds a small margin-right -->
                            
                        </div>

            </form>
        </div>


          <!-- ./col -->
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

@endsection




