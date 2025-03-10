@extends('components.admin_layout')

@section('title', 'View News')

@section('body')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0">News Details</h1>
    </div>
  </div>

  <section class="content">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $news->title }}</h3>
            <a href="{{ route('news.view-news') }}" class="btn btn-secondary float-right">Back</a>
          </div>

          <div class="card-body">
            <p><strong>Date Posted:</strong> {{ $news->date_posted }}</p>
            <p><strong>Description:</strong> {{ $news->message }}</p>

            <div class="mb-3">
              <strong>Image:</strong><br>
              @if($news->image)
                <img src="{{ asset('storage/public/' . $news->image) }}" width="100%">
              @else
                <p>No image available</p>
              @endif
            </div>

            <div class="mb-3">
              <strong>Document:</strong><br>
              @if($news->document)
                <a href="{{ asset('storage/public/' . $news->document) }}" target="_blank">View Document</a>
              @else
                <p>No document available</p>
              @endif
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>

@endsection
