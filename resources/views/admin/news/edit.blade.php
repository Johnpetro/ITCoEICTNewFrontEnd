@extends('components.admin_layout')

@section('title', 'Edit News')

@section('body')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">Edit News</h1>
    </div>
  </div>

  <section class="content">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Update News</h3>
          </div>

          <div class="card-body">
            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea name="message" class="form-control" rows="4" required>{{ $news->message }}</textarea>
              </div>

              <div class="form-group">
                <label>Date Posted</label>
                <input type="date" name="date_posted" class="form-control" value="{{ $news->date_posted }}" required>
              </div>

              <div class="form-group">
                <label>Current Image</label><br>
                @if($news->image)
                  <img src="{{ asset('storage/' . $news->image) }}" width="150">
                @endif
              </div>

              <div class="form-group">
                <label>Change Image (optional)</label>
                <input type="file" name="image" class="form-control">
              </div>

              <div class="form-group">
                <label>Current Document</label><br>
                @if($news->document)
                  <a href="{{ asset('storage/' . $news->document) }}" target="_blank">View Document</a>
                @endif
              </div>

              <div class="form-group">
                <label>Change Document (optional)</label>
                <input type="file" name="document" class="form-control">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success">Update News</button>
                <a href="{{ route('news.view-news') }}" class="btn btn-secondary">Cancel</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
