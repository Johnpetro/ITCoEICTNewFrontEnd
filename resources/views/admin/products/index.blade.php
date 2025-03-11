@extends('components.admin_layout')

@section('body')

<style>
    /* Container for slides */
    .slides-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    /* Each slide card */
    .slide-item {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 15px;
        text-align: center;
    }

    /* Video styling - ensures uniform size */
    .slide-video {
        width: 100%;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 8px;
        background: #f4f4f4;
    }

    .slide-video video {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    /* Title & Description */
    .slide-details h3 {
        margin: 10px 0;
        font-size: 18px;
        font-weight: bold;
    }

    .slide-details p {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
    }

    /* Action buttons */
    .slide-actions {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    .btn {
        padding: 8px 12px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
    }

    .btn-edit {
        background: #007bff;
        color: white;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #c82333;
    }
</style>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.create') }}"
                                class="btn btn-secondary">Add</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="slides-section">
                        @foreach($products as $product)
                            <div class="slide-item">
                                <div class="slide-video">
                                    <video controls>
                                        <source src="{{ asset('storage/' . $product->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="slide-details">
                                    <h3>{{ $product->title }}</h3>
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="slide-actions">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-edit">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-delete"
                                            onclick="confirmDelete(this)">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://www.dit.ac.tz/">Visit Our
            Website</a>.</strong>
    All rights reserved.
</footer>

<script>
    function confirmDelete(button) {
        if (confirm("Are you sure you want to delete this product? This action cannot be undone!")) {
            button.closest("form").submit();
        }
    }
</script>



@endsection