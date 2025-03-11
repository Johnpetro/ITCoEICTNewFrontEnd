@include('include.header')

<main>
<div class="breadcrumbs">
               <div class="breadcrumb-content-inner">
                  <div class="text-dark block gva-breadcrumb block-system block-bread no-title">
                     <div class="breadcrumb-style" style="background-color: #F6F6F6;background-position: center top;background-repeat: no-repeat;">
                        <div class="container">
                           <div class="content-inner">
                              <h2 class="page-title hidden"></h2>
                              <div class="content block-content">
                                 <nav class="breadcrumb" role="navigation">
                                 <h2 id="system-breadcrumb" class="visually-hidden">Breadcrumb</h2>
                                 <ol>
                                    <li><a href="https://www.foreign.go.tz/">Home</a> <span> / </span> </li>
                                    <li> Feedback and Enquiries </li>
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
                           <div class="main-content col-xs-12 col-md-8 sb-r ">
                              <div class="main-content-inner">
                                 <div class="content-main">
                                 	<h1 class="page-title">
                                       <span property="schema:name">Location and Feedback</span>
                                    </h1>
                                    <div class="block block-system main-content-block no-title">
                                       <div class="content block-content margin-bottom-20">
                                       	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.6297572220824!2d39.277447674756026!3d-6.814807093182818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4b09e848c92d%3A0x90d02db3c3d6c912!2sDar%20es%20Salaam%20Institute%20of%20Technology!5e0!3m2!1sen!2stz!4v1738847605418!5m2!1sen!2stz"  width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
   													<h2 class="page-title">
                                 			<span property="schema:name">Feedback and Enquiries</span>
                               				</h2>
                                           <p>We are glad to receive your comments and will respond to any inquiries you may have. Please enter your details together with your comment or inquiry.</p>

                                           <form id="contact_form" class="contact_form" method="POST" action="{{ route('send.message') }}">
                                             @csrf
                                             <div class="row">
                                                 <div class="col-sm-6">
                                                     <div class="form-group">
                                                         <label for="name">Name*</label>
                                                         <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-6">
                                                     <div class="form-group">
                                                         <label for="email">Email*</label>
                                                         <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-6">
                                                     <div class="form-group">
                                                         <label for="subject">Subject*</label>
                                                         <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" required>
                                                     </div>
                                                 </div>
                                                 <div class="col-sm-6">
                                                     <div class="form-group">
                                                         <label for="phone">Phone</label>
                                                         <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                                                     </div>
                                                 </div>
                                             </div>
                                         
                                             <div class="form-group">
                                                 <label for="message">Message*</label>
                                                 <textarea class="form-control" id="message" name="message" placeholder="Enter your message" rows="5" required></textarea>
                                             </div>
                                         
                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <button type="submit" class="btn btn-primary">Send Message</button>
                                                 </div>
                                             </div>
                                         </form>
                                         
                                     </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebar sidebar-right theiaStickySidebar">
                              <div class="sidebar-inner">
                                 <div class="block block-block-content no-title">
                                    <div class="content block-content">
                                    	<h2 class="block-title"><span>Contact Details</span></h2>
                                       <div class="field field__item">
                                          <div class="contact-info-page margin-top-20">
                                              <p><strong>Physical Location and Offices</strong><br>Dar Es Salaam Institute Of Technology(DIT),<br>Bibititi and Morogoro Rd Junction,<br>2958 &nbsp;Dar-es-salaam, Tanzania.</p><p><strong>Postal Address</strong><br>Bibititi and Morogoro Rd Junction,&nbsp;<br>P.O. Box 2958, &nbsp;Dar-es-salaam, Tanzania.&nbsp;</p><p><strong>Telephone Contacts</strong><br><strong>Phone</strong>: :+255 22 2150174<br><strong>Fax</strong>: +255 22 2152504</p><p><strong>E-mail</strong>: dg@company.dit.ac.tz</p> 
                  									
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
</main>
@include('include.footer')