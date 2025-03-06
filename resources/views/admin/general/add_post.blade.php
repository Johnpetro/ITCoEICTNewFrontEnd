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
          <h1 class="m-0">Add New Post</h1>
        </div><!-- /.col -->
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
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="image_preview">Image Preview</label>
                    <br>
                    <img id="image_preview" src="#" alt="Image Preview" style="max-width: 100%; display: none;">
                </div>

                <button type="submit" class="btn btn-primary">Add Leader</button>
            </form>


        </div>
        </div>
      </div><!-- /.container-fluid -->
        <!-- /.row -->
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
