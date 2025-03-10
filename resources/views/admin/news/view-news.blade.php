@extends('components.admin_layout')

@section('title', 'News & Events')

@section('body')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">News & Events</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-newspaper"></i> All News & Events</h3>
              <div class="card-tools">
                <a href="{{ route('news.create') }}" class="btn btn-success btn-sm">
                  <i class="fas fa-plus"></i> Add News
                </a>
              </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead class="bg-primary text-white">
                  <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 25%;">News Title</th>
                    <th style="width: 30%;">Description</th>
                    <th style="width: 15%;">Posted Date</th>
                    <th style="width: 30%;">image</th>
                    <th style="width: 15%;">document</th>
                    <th style="width: 20%;" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($news as $index => $item)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $item->title }}</td>
                      <td>{{ Str::limit($item->message, 100) }}</td>
                      <td>{{ $item->date_posted }}</td>
                      <td class="text-center">
                        <!-- Edit Button -->
                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary btn-sm">
                          <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Button (With Confirmation) -->
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this news?');">
                            <i class="fas fa-trash"></i> Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <strong>Copyright &copy; <span id="currentYear"></span> 
    <a href="https://www.dit.ac.tz/">Visit Our Website</a>.
  </strong> All rights reserved.
</footer>

@endsection
