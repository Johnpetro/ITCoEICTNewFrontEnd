@extends('components.admin_layout')

@section('title', 'Dashboard')

@section('body')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add News or events</h1>
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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                {{ session('status') }}
                    </div>
            @endif
            <div class="container">   
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" >
                </div>

                <!-- Short Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">Short Message <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="message" name="message" rows="3" ></textarea>
                </div>

                <!-- Date Posted -->
                <div class="mb-3">
                    <label for="date_posted" class="form-label">Date Posted <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="date_posted" name="date_posted" >
                </div>

                <!-- Picture Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image (Optional)</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <!-- Document Upload -->
                <div class="mb-3">
                    <label for="document" class="form-label">Upload Document (Optional)</label>
                    <input type="file" class="form-control" id="document" name="document" accept=".pdf,.doc,.docx">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Submit</button>
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
@endsection
