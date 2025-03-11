<x-layout />
@include('include.header')
<div class="breadcrumbs">
	      <div class="breadcrumb-content-inner">
	        <div class="text-dark block gva-breadcrumb block-system block-bread no-title">
	          <div class="breadcrumb-style" style="background-color: #F6F6F6;background-position: center top;background-repeat: no-repeat;">
	            <div class="container">
	              <div class="content-inner">
	                <div class="content block-content">
	                  <nav class="breadcrumb" role="navigation">
	                    <h2 id="system-breadcrumb" class="visually-hidden">Breadcrumb</h2>
	                    <ol>
	                      <li><a href="{{ route('home') }}">Home</a> <span></span> </li>
	                    </ol>
	                  </nav>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="clearfix"></div>
	      <div role="main" class="main main-page">
	        <div id="content" class="content content-full">
	          <div class="container">
	            <div class="content-main-inner">
	              <div class="row">
	                <div id="page-main-content" class="main-content col-xs-12 col-md-8 sb-r ">
	                  <div class="main-content-inner">
	                    <div class="content-main">
	                      <h1 class="page-title">
	                        <span property="schema:name">Post Detail</span>
	                      </h1>
	                      <div class="block block-system main-content-block no-title">
	                        <div class="content block-content">
	                          <div class="views-element-container">
	                            <div class="categories-view-content layout-list">
	                              <div class="view-content-wrap" data-items="">
	                              
	                             
	                                <div class="item">
	                                  <article role="article" typeof="schema:Article" class="node node-detail clearfix">
	                                    <div class="post-block">
                                            <div class="news-detail">
                                                <div class="container">
                                                  <h1>{{ $newsItem->title }}</h1>
                                                  <p class="post-meta">
                                                    Published on: {{ \Carbon\Carbon::parse($newsItem->published_at)->format('d M Y') }}
                                                  </p>
                                                  <div class="post-description">
                                                    {!! $newsItem->description !!} <!-- Display the full description -->
                                                  </div>
                                            
                                                  <!-- Display Image -->
                                                  {{-- @if($newsItem->image)
                                                    <div class="news-image">
                                                      <img src="{{ asset('storage/' . $newsItem->image) }}" alt="News Image" class="img-fluid">
                                                    </div>
                                                  @endif --}}
                                            
                                                  {{-- @if($newsItem->video_url)
                                                  <div class="news-video">
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ parse_url($newsItem->video_url, PHP_URL_QUERY) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                  </div>
                                                @endif --}}
                                            
                                                {{-- @if($newsItem->video_url)
                                                  <div class="news-video">
                                                    <iframe width="560" height="315" 
                                                            src="https://www.youtube.com/embed/{{ parse_url($newsItem->video_url, PHP_URL_QUERY) }}" 
                                                            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                                            allowfullscreen></iframe>
                                                  </div>
                                                @endif --}}
                                            
                                                
                                                </div>
                                            </div>
	                                
	                                    </div>
	                                  </article>
	                                </div>
	                                	 	
		
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 sidebar sidebar-right theiaStickySidebar">
                    <div class="sidebar-inner">
                        <div class="block block-views">
                            {{-- <div class="block-title-view"><a href="https://mfatanzania.blogspot.com/" target="_blank">View All</a></div> --}}
                            <h2 class="block-title"><span>Recents News</span></h2>
                            <div class="content block-content">
                                <div class="posts-list">
                                    <div class="item-list">
                                        <ul id="recent-posts">
                                            @foreach ($recentPosts as $post)
                                            <li class="view-list-item" onclick="loadPost({{ $post->id }})">
                                                <div class="views-field">
                                                    <div class="field-content">
                                                        <div class="post-block small">
                                                            <div class="post-image">
                                                              <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">

                                                            </div>
                                                            <div class="post-content">
                                                                <div class="post-title">
                                                                    <a href="{{ route('news.show', $post->id) }}">
                                                                        {{ $post->title }}
                                                                    </a>
                                                                </div>
                                                                <div class="post-meta"><span class="post-created">{{ $post->created_at->format('d M Y') }}</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Container to display post details -->
                    <div id="post-details" style="display:none;">
                        <div id="post-title"></div>
                        <div id="post-description"></div>
                        <div id="post-image"></div>
                        <div id="post-video"></div>
                    </div>
                    
                      <!--/video -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




    <script>
        function loadPost(postId) {
    // Send AJAX request to fetch the post data
        fetch(`/post/${postId}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert('Post not found');
                } else {
                    // Display post content in the right sidebar
                    document.getElementById('post-title').innerHTML = data.title;
                    document.getElementById('post-description').innerHTML = data.description;

                    // If the post has an image, display it
                    if (data.image) {
                        document.getElementById('post-image').innerHTML = `<img src="{{ asset('storage') }}/${data.image}" alt="News Image" class="img-fluid">`;
                    }

                    // If the post has a video, display it
                    if (data.video_url) {
                        const videoEmbedUrl = `https://www.youtube.com/embed/${new URL(data.video_url).searchParams.get('v')}`;
                        document.getElementById('post-video').innerHTML = `<iframe width="560" height="315" src="${videoEmbedUrl}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                    }

                    // Show the post details container
                    document.getElementById('post-details').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error fetching post data:', error);
            });
    }

    </script>

@include('partials.footer')




