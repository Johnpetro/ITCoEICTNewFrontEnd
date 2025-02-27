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
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
  <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>description</th>
                      <th>Posted date</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class=""><a class="tag tag-success btn btn-danger ml-2">delete</a><a href="btn btn-success " class="tag  btn btn-success ml-2">View</a><a href="btn btn-success" class="tag  btn btn-warning  ml-2  ">Edit</a></td>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class=""><a class="tag tag-success btn btn-danger ml-2">delete</a><a href="btn btn-success " class="tag  btn btn-success ml-2">View</a><a href="btn btn-success" class="tag  btn btn-warning  ml-2  ">Edit</a></td>
                    </tr>

                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class=""><a class="tag tag-success btn btn-danger ml-2">delete</a><a href="btn btn-success " class="tag  btn btn-success ml-2">View</a><a href="btn btn-success" class="tag  btn btn-warning  ml-2  ">Edit</a></td>
                    </tr>

                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class=""><a class="tag tag-success btn btn-danger ml-2">delete</a><a href="btn btn-success " class="tag  btn btn-success ml-2">View</a><a href="btn btn-success" class="tag  btn btn-warning  ml-2  ">Edit</a></td>
                    </tr>

                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class=""><a class="tag tag-success btn btn-danger ml-2">delete</a><a href="btn btn-success " class="tag  btn btn-success ml-2">View</a><a href="btn btn-success" class="tag  btn btn-warning  ml-2  ">Edit</a></td>
                    </tr>
                    
                   
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
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
