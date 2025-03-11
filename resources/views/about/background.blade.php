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
                                    
                                    <li><a href="{{ route('home') }}">Home</a> <span> / </span> </li>
                                    
                                    <li><a href="/about/background">About Us </a> <span> / </span> </li>
                                    
                                    <li>About the Company</li>
                                    
                                 </ol>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

@include('include.footer')