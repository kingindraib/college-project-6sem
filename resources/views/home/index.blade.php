@extends('home.master')
@section('title','home')
@section('body')
<div class="banner-section">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 dream-box">
          <h1>Find Your Dream Property</h1>
          <ul class="tabs">
            <li class="active" rel="tab1">Any Status</li>
            <li rel="tab2">For Sale</li>
            <li rel="tab3">For Rent</li>
          </ul>
          <div class="tab_container">
            <h3 class="d_active tab_drawer_heading" rel="tab1">Any Status</h3>
            <div id="tab1" class="tab_content">
              <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                <div class="row">
                 <div class="col-md-12">
                  <div class="md-form">
                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Enter address e.g. street city"></textarea>
                  </div>
                 </div> 
                </div>
                <div class="row">
                    <div class="col-md-8">
                      <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Listing ID">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <select>
                        <option>Any Type</option>
                        <option>Apartment</option>
                        <option>House</option>
                        <option>Land</option>
                        <option>Flat</option>
                        <option>Commercial Building</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="md-form">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Min Price (NPR)">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="md-form">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Max Price (NPR)">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="md-form">
                        <a class="btn btn-primary">Search</a>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
            <!-- #tab1 -->
            <h3 class="tab_drawer_heading" rel="tab2">For Sale</h3>
            <div id="tab2" class="tab_content">
              <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                <div class="row">
                 <div class="col-md-12">
                  <div class="md-form">
                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Enter address e.g. street city"></textarea>
                  </div>
                 </div> 
                </div>
                <div class="row">
                    <div class="col-md-8">
                      <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Listing ID">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <select>
                        <option>Any Type</option>
                        <option>Apartment</option>
                        <option>House</option>
                        <option>Land</option>
                        <option>Flat</option>
                        <option>Commercial Building</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="md-form">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Min Price (NPR)">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="md-form">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Max Price (NPR)">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="md-form">
                        <a class="btn btn-primary">Search</a>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
            <!-- #tab2 -->
            <h3 class="tab_drawer_heading" rel="tab3">For Rent</h3>
            <div id="tab3" class="tab_content">
              <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                <div class="row">
                 <div class="col-md-12">
                  <div class="md-form">
                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Enter address e.g. street city"></textarea>
                  </div>
                 </div> 
                </div>
                <div class="row">
                    <div class="col-md-8">
                      <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Listing ID">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <select>
                        <option>Any Type</option>
                        <option>Apartment</option>
                        <option>House</option>
                        <option>Land</option>
                        <option>Flat</option>
                        <option>Commercial Building</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="md-form">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Min Price (NPR)">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="md-form">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Max Price (NPR)">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="md-form">
                        <a class="btn btn-primary">Search</a>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="welcome-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-7">
        <h3>Welcome to Ilam Housing</h3>
        <p>Lorem ipsum dolor sit amet, ea pro error pertinacia, nam id munere detraxit. Wisi decore discere eum an, autem erant usu eu, per ubique legendos intellegam in. An est melius vivendo. Hinc temporibus nec te, vero consetetur an qui nam. Lorem ipsum dolor sit amet, ea pro error pertinacia, nam id munere detraxit. Wisi decore discere eum an, autem erant usu eu, per ubique legendos intellegam in. An est melius vivendo. Hinc temporibus nec te, vero consetetur an qui nam.</p>
        <p>Lorem ipsum dolor sit amet, ea pro error pertinacia, nam id munere detraxit. Wisi decore discere eum an, autem erant usu eu, per ubique legendos intellegam in. An est melius vivendo. Hinc temporibus nec te, vero consetetur an qui nam. Lorem ipsum dolor sit amet, ea pro error pertinacia, nam id munere detraxit.</p>
        <a href="#" class="btn btn-read">Read More <i class="fa fa-paper-plane"></i></a>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-5">
        <img src="{{url('home/images/about1.png')}}" alt="">
      </div>
    </div>
  </div>
</div>
<div class="property-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h4>New Property <a href="#">View All</a></h4>
      </div>
      <div class="col-12 col-sm-12 property-item owl-carousel">
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house1.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house2.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house3.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house4.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house5.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house6.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house7.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house8.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
<div class="place-section">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
          <h4>Find Best Place For Living</h4>
          <p>Lorem ipsum dolor sit amet, ea pro error pertinacia, nam id munere detraxit. Wisi decore discere eum an, autem erant usu eu, per ubique legendos intellegam in. </p>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <a href="#" class="btn btn-contact">Contact Now <i class="fa fa-paper-plane"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="listing-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h4>Top Listing <a href="#">View All</a></h4>
      </div>
      <div class="col-12 col-sm-12 listing-item owl-carousel">
        <div class="listing-grid">
          <a href="#">
            <img src="{{url('home/images/house1.jpg')}}" alt="">
          </a>
          <div class="list-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="listing-grid">
          <a href="#">
            <img src="{{url('home/images/house2.jpg')}}" alt="">
          </a>
          <div class="list-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="listing-grid">
          <a href="#">
            <img src="{{url('home/images/house3.jpg')}}" alt="">
          </a>
          <div class="list-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="listing-grid">
          <a href="#">
            <img src="{{url('home/images/house4.jpg')}}" alt="">
          </a>
          <div class="list-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="listing-grid">
          <a href="#">
            <img src="{{url('home/images/house5.jpg')}}" alt="">
          </a>
          <div class="list-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="listing-grid">
          <a href="#">
            <img src="{{url('home/images/house6.jpg')}}" alt="">
          </a>
          <div class="list-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
<div class="property-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h4>Feature Listing <a href="#">View All</a></h4>
      </div>
      <div class="col-12 col-sm-12 property-item owl-carousel">
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house1.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house2.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house3.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house4.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house5.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house6.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house7.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>
        <div class="property-grid">
          <a href="#">
            <img src="{{url('home/images/house8.jpg')}}" alt="">
          </a>
          <div class="pro-box">
            <p class="for-sale">For Sale</p>
            <h5><a href="#">House at Ilam</a></h5>
            <p><i class="fa fa-map-marker-alt"></i> Anamnagar, Kathmandu</p>
            <ul>
              <li>Listing Id: 1234</li>
              <li>Area: 15 Katha</li>
            </ul>
            <h6>Rs. 5,00.000 <span> (Five Lakh)</span></h6>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
<div class="portal-section">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h4>Property Portal for real state</h4>
          <p>Lorem ipsum dolor sit amet, ea pro error pertinacia, nam id munere detraxit. Wisi decore discere eum an, autem erant usu eu, per ubique legendos intellegam in. An est melius vivendo. Hinc temporibus nec te, vero consetetur an qui nam. Lorem ipsum dolor sit amet, ea pro error pertinacia, nam id munere detraxit. Wisi decore discere eum an, autem erant usu eu, per ubique legendos intellegam in. An est melius vivendo. Hinc temporibus nec te, vero consetetur an qui nam.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h3>Clients Testimonials</h3>
      </div>
      <div class="col-12 col-sm-12 testi-item owl-carousel">
        <div class="testi-box">
          <p>Ut eu diam vel leo aliquam consectetu Proin torto elit rutrum donec rhoncu. Cras eradest cursdus sed dignissim sed euismod Maecenas tortor tellus hendrerit venenatis malesuada. Ut eu diam vel leo aliquam consectetu Proin torto elit rutrum donec rhoncu.</p>
          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          <h4>John Deo</h4>
          <p><strong>Kathmandu, Nepal</strong></p>
        </div>
        <div class="testi-box">
          <p>Ut eu diam vel leo aliquam consectetu Proin torto elit rutrum donec rhoncu. Cras eradest cursdus sed dignissim sed euismod Maecenas tortor tellus hendrerit venenatis malesuada. Ut eu diam vel leo aliquam consectetu Proin torto elit rutrum donec rhoncu.</p>
          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          <h4>John Deo</h4>
          <p><strong>Kathmandu, Nepal</strong></p>
        </div>
        <div class="testi-box">
          <p>Ut eu diam vel leo aliquam consectetu Proin torto elit rutrum donec rhoncu. Cras eradest cursdus sed dignissim sed euismod Maecenas tortor tellus hendrerit venenatis malesuada. Ut eu diam vel leo aliquam consectetu Proin torto elit rutrum donec rhoncu.</p>
          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          <h4>John Deo</h4>
          <p><strong>Kathmandu, Nepal</strong></p>
        </div>
        <div class="testi-box">
          <p>Ut eu diam vel leo aliquam consectetu Proin torto elit rutrum donec rhoncu. Cras eradest cursdus sed dignissim sed euismod Maecenas tortor tellus hendrerit venenatis malesuada. Ut eu diam vel leo aliquam consectetu Proin torto elit rutrum donec rhoncu.</p>
          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          <h4>John Deo</h4>
          <p><strong>Kathmandu, Nepal</strong></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="find-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h4>Didn’t find what you are looking for? Please let us know.</h4>
        <a href="#" class="btn btn-find">Let Us Know</a>
      </div>
    </div>
  </div>
</div>

@endsection