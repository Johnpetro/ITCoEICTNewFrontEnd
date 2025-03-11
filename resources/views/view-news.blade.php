
@include('include.header')

<main id="main">
  <!-- ======= Hero Slider Section ======= -->
  <!-- <section id="heslider" class="heroslider  col-md-12 mt-2 "  style="margin: 10px   10px0 10px 100px !important radius">
    <div class=" max-width" data-aos="fade-in">
      <div class="row ">
        <div class="col-lg-12 col-md-2 col-sm-6">
          <div class="swiper sliderFeaturedPosts">
            <div class="swiper-wrapper">
              <div class="swiper-slide ">
                <img src="assets/images/picha.jpg" alt="" style="height: 1000px; width: 100%; object-fit: cove; margin:60"  class="radius jumbotron "/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  


</main>



         <div class="clearfix"></div>
            <div role="main" class="main main-page">
               <div id="content" class="content content-full">
                  <div class="container-full clearfix">
                     <div class="content-main-inner">
                        <div class="row">
                           <div id="page-main-content" class="main-content col-md-12 col-xs-12">
                              
                           <div class=" gbb-row bg-size-cover" style="padding-top:20px; background-color:#fff">
                        <div class="bb-inner default">
                     <div class="bb-container container">
                  <div class="row">
               <div class="row-wrapper clearfix">
            
                <div class="gsc-column col-lg-12-half col-md-6-half col-sm-12 col-xs-12 col-md-push-2-half">
            <div class="column-inner bg-size-cover">
               <div class="column-content-inner">
                
           
                <!-- Systems -->
                  <div class="widget block block-view title-align-left remove-margin-off">
                     <!-- <div class="block-title-view"><a href="https://www.foreign.go.tz/resources/links">View All</a></div> -->
                     <h2 class="block-title title-view"><span>Title: {{ $news->title }}</span></h2>
                     <div class="posts-grid v2">
                        <div class="views-view-grid horizontal cols-2 clearfix">
                        <h1>{{ $news->title }}</h1>
                        <p class="post-meta">
                              Published on: {{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}
                               </p>
                               <div class="post-description">
                                 {!! $news->description !!} <!-- Display the full description -->
                               </div>
                        <p class="post-meta">
                           {{ $news->message }}
                        </p>
                        {{-- @if($news->image)
                            <div class="news-image">
                            <img src="{{ asset('storage/new_images/' . $news->image) }}" alt="News Image" class="img-fluid">

                            </div>
                         @endif --}}
                        </div>
                     </div>
                    </div>
                <!--/Systems -->
               </div>
            </div>
         </div>

         <!-- leftie -->
         <div class="gsc-column col-lg-2-half col-md-2-half col-sm-6 col-xs-12 sidebar col-md-pull-6-half">
            <div class="column-inner bg-size-cover" >
               <div class="column-content-inner">
                  <!-- Administration -->
                  <div class="widget block block-view title-align-left style-higlight remove-margin-off" >
                     <div class="posts-grid v2">
                        <div class="view-content-wrap" data-items="">
                        
                           <div class="item">
                              <div class="views-field">
                                 <div class="field-content post-block">
                                    <div class="post-block margin-bottom-30">
                                       
                                       <div class="post-image"> 
                                        <img src="assets/images/wambura.jpg" alt="" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /Administration -->
               </div>
            </div>
         </div>
         <!-- / Leftie -->

<!-- new events and comments modified-->
<div class="gsc-column col-lg-3 col-md-3 col-xs-12">
            <div class="column-inner bg-size-cover">
              <div class="column-content-inner">
              </div>
            </div>
          </div>
          
         
         </div>
<!----  end---->
         </div>
            </div>
               </div>
                  </div>
                     </div>
                        </div>
                           </div>
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
         </div>
      </div>


@include('include.footer')