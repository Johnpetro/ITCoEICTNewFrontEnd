<x-layout />
@include('partials.header')


<style>
    /* Scoped Styling for the leaders section */
.leaders-section {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Auto-adjust column number based on screen size */
    gap: 30px; /* Space between the items */
    padding: 30px;
    justify-items: center;
}

/* Each leader item */
.leaders-section .item {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

/* Hover effect for the items */
.leaders-section .item:hover {
    transform: scale(1.05);
}

/* Styling the post block */
.leaders-section .views-field {
    padding: 15px;
}

/* Post image */
.leaders-section .post-image {
    width: 100%;  /* Makes the image container full width of the parent */
    height: 200px; /* Fixed height to ensure uniformity */
    overflow: hidden;
    position: relative;
}

/* Make sure images are fixed in size and fit within the container */
.leaders-section .post-image img {
    width: 100%;  /* Ensures the image fills the container */
    height: 100%; /* Ensures the image fills the container vertically */
    object-fit: cover; /* Ensures the image keeps its aspect ratio while covering the container */
}

/* Post content (position, title) */
.leaders-section .post-content {
    padding: 15px;
    text-align: center;
}

/* Category link style */
.leaders-section .post-categories {
    font-size: 14px;
    color: #6c757d;
    margin-bottom: 10px;
}

.leaders-section .post-categories a {
    text-decoration: none;
    color: #007bff;
}

.leaders-section .post-categories a:hover {
    text-decoration: underline;
}

/* Title of the leader */
.leaders-section .post-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.leaders-section .post-title a {
    text-decoration: none;
    color: inherit;
}

.leaders-section .post-title a:hover {
    color: #007bff;
}

/* Margin bottom for post block */
.leaders-section .post-block {
    margin-bottom: 30px;
}

/* Optional: Make sure the footer and header also have space */
footer, header {
    margin-top: 30px;
}

</style>
<div class="leaders-section">
    @foreach($leaders as $leader)
    <div class="item">
        <div class="views-field">
            <div class="field-content post-block">
                <div class="post-block margin-bottom-30">
                    <div class="post-image">
                        <a href="#" title="{{ $leader->name }}">
                            <img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}" />
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="post-categories">
                            <a href="#" title="View Leader Details">{{ $leader->position }}</a>
                        </div>
                        <div class="post-title">
                            <a href="#" title="View Leader Details">{{ $leader->name }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>



@include('partials.footer')