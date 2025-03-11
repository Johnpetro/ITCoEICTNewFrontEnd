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
            <h1 class="m-0">All News</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Add News</a></li>
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

                <div class="row">
                    <div class="container">
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    {{-- <th>Video URL</th> --}}
                                    <th>Published Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! Str::limit($post->description, 150) !!}</td>
                                    <td>
                                        @if($post->image)
                                        <img src="{{ asset('storage/new_images/' . $post->image) }}" width="100px" height="100px" style="object-fit: cover;">
                                        @endif
                                    </td>
                                    
                                    {{-- <td><a href="{{ $post->video_url }}" target="_blank">View Video</a></td> --}}
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="{{ route('news.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('news.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination links -->
                    <div class="pagination">
                        {{ $news->links('pagination::bootstrap-4') }}
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
    // JavaScript to dynamically update the delete form action when the modal is shown
    $('#confirmDeleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var leaderId = button.data('id'); // Extract leader ID from data-* attributes
        actionUrl = actionUrl.replace(':id', leaderId); // Replace the :id placeholder with the actual leader ID
        
        // Update the form's action attribute to point to the correct route
        var form = $(this).find('#deleteForm');
        form.attr('action', actionUrl);
    });
</script>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this post?');
    }
</script>


@endsection



