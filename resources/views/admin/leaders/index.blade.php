
@extends('components.dashmaster')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leaders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('leaders.create') }}" class="btn btn-primary">Add Leader</a></li>
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
                <!-- <a href="{{ route('leaders.create') }}" class="btn btn-primary">Add Leader</a> -->

                <div class="row">
                    @foreach($leaders as $leader)
                        <div class="col-md-3">
                            <div class="card">
                                <!-- Set the image size with CSS class -->
                                <img src="{{ asset('storage/' . $leader->image) }}" class="card-img-top leader-image" alt="{{ $leader->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $leader->name }}</h5>
                                    <p class="card-text">{{ $leader->position }}</p>
                                    <a href="{{ route('leaders.edit', $leader->id) }}" class="btn btn-warning">Edit</a>
                                    
                                    <!-- Delete Button -->
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $leader->id }}">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination links -->
                <div class="pagination">
                    {{ $leaders->links('pagination::bootstrap-4') }}
                </div>
            </div>

            <!-- Modal for Confirmation -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this leader?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <!-- Delete Form -->
                            <form id="deleteForm" method="POST" action="" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
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
        var actionUrl = '{{ route('leaders.destroy', ':id') }}';
        actionUrl = actionUrl.replace(':id', leaderId); // Replace the :id placeholder with the actual leader ID
        
        // Update the form's action attribute to point to the correct route
        var form = $(this).find('#deleteForm');
        form.attr('action', actionUrl);
    });
</script>


@endsection



