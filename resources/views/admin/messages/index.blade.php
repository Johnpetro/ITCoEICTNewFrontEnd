@extends('components.admin_layout')

@section('body')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Messages</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
       
        <div class="row">
        <div class="container">
                
                <div class="row">
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th> <!-- New Column for Numbering -->
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Received At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($messages as $index => $message)
                              <tr>
                                  <td>{{ $messages->firstItem() + $index }}</td>
                                  <td>{{ $message->name }}</td>
                                  <td>{{ $message->email }}</td>
                                  <td>{{ $message->subject }}</td>
                                  <td>{{ $message->phone }}</td>
                                  <td>{{ $message->message }}</td>
                                  <td>{{ $message->created_at->format('d M Y, H:i') }}</td>
                                  <td>
                                      <!-- Delete Button -->
                                      <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirmDelete();">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                    
                       
                    
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
    function confirmDelete() {
        return confirm('Are you sure you want to delete this message?');
    }
</script>

@endsection
