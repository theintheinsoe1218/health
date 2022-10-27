@extends('template')
@section('content')
    
  <div class="about">
    <div class="container my-5">
      <div class="row">
        <div class="col text-center">
          <div class="section_title">A few words about us</div>
          <!-- <div class="section_subtitle">too choose from</div> -->
        </div>
      </div>
      <div class="row about_row row-eq-height">
        <div class="col-lg-4">
          <div class="logo">
            <a href="#">health<span>+</span></a>  
          </div>
          <div class="about_text_highlight">We have mandated measurable Turn Around Times (TAT’s) benchmarked against International Best Practice. Detailed auditing of this data will assist the Imaging department to provide a more efficient and timely service for our patients.</div>
          <div class="about_text">
            <p>We have mandated measurable Turn Around Times (TAT’s) benchmarked against International Best Practice.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="about_text_2 my-1">
            <p>The installation of a Radiology Information System and Picture Archiving and Communication System (RIS / PACS) enables our hospital to be fully integrated and fully filmless allowing remote access for the review of images and reports by your Specialist plus the capacity to conduct video based real time consultations.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="about_image"><img src="blog/images/about_1.jpg" alt=""></div>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Milestones -->

  <!-- <div class="milestones">
    <div class="container">
      <div class="row">
  
        Milestone
        <div class="col-lg-3 milestone_col">
          <div class="milestone d-flex flex-row align-items-center justify-content-start">
            <div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="blog/images/icon_7.svg" alt=""></div>
            <div class="milestone_content">
              <div class="milestone_counter" data-end-value="365">0</div>
              <div class="milestone_text">Days a year</div>
            </div>
          </div>
        </div>
  
        Milestone
        <div class="col-lg-3 milestone_col">
          <div class="milestone d-flex flex-row align-items-center justify-content-start">
            <div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="blog/images/icon_6.svg" alt=""></div>
            <div class="milestone_content">
              <div class="milestone_counter" data-end-value="25" data-sign-after="k">0</div>
              <div class="milestone_text">Patients a year</div>
            </div>
          </div>
        </div>
  
        Milestone
        <div class="col-lg-3 milestone_col">
          <div class="milestone d-flex flex-row align-items-center justify-content-start">
            <div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="blog/images/icon_8.svg" alt=""></div>
            <div class="milestone_content">
              <div class="milestone_counter" data-end-value="125">0</div>
              <div class="milestone_text">Amazing Doctors</div>
            </div>
            
          </div>
        </div>
  
        Milestone
        <div class="col-lg-3 milestone_col">
          <div class="milestone d-flex flex-row align-items-center justify-content-start">
            <div class="milestone_icon d-flex flex-column align-items-center justify-content-center"><img src="blog/images/icon_9.svg" alt=""></div>
            <div class="milestone_content">
              <div class="milestone_counter" data-end-value="12" data-sign-after="k">0</div>
              <div class="milestone_text">Lab Results</div>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </div> -->

  <!-- CTA -->
  

  <!-- <div class="container my-5">
    
  <div class="cta my-5">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="blog/images/cta_1.jpg" data-speed="0.8"></div>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="cta_container d-flex flex-xl-row flex-column align-items-xl-start align-items-center justify-content-xl-start justify-content-center">
            <div class="cta_content text-xl-left text-center">
              <div class="cta_title">Make an appointment with one of our professional Doctors.</div>
              <div class="cta_subtitle">Morbi arcu neque, scelerisque eget ligula ac, congue tempor felis. Integer tempor, eros a egestas.</div>
            </div>
            <div class="button cta_button ml-xl-auto"><a href="#"><span>call now</span><span>call now</span></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div> -->

  <!-- Doctors -->
<!-- 
  <div class="doctors">
    <div class="doctors_image"><img src="blog/images/doctors.jpg" alt=""></div>
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="section_title">Our Doctors</div>
          <div class="section_subtitle">to choose from</div>
        </div>
      </div>
      <div class="row doctors_row">
        
        Doctor
        <div class="col-xl-3 col-md-6">
          <div class="doctor">
            <div class="doctor_image"><img src="blog/images/doc_1.jpg" alt=""></div>
            <div class="doctor_content">
              <div class="doctor_name"><a href="#">Michael Smith</a></div>
              <div class="doctor_title">Surgeon</div>
              <div class="doctor_link"><a href="#">+</a></div>
            </div>
          </div>
        </div>

        Doctor
        <div class="col-xl-3 col-md-6">
          <div class="doctor">
            <div class="doctor_image"><img src="blog/images/doc_2.jpg" alt=""></div>
            <div class="doctor_content">
              <div class="doctor_name"><a href="#">Christian Williams</a></div>
              <div class="doctor_title">Surgeon</div>
              <div class="doctor_link"><a href="#">+</a></div>
            </div>
          </div>
        </div>

        Doctor
        <div class="col-xl-3 col-md-6">
          <div class="doctor">
            <div class="doctor_image"><img src="blog/images/doc_3.jpg" alt=""></div>
            <div class="doctor_content">
              <div class="doctor_name"><a href="#">Jessica Walsh</a></div>
              <div class="doctor_title">Surgeon</div>
              <div class="doctor_link"><a href="#">+</a></div>
            </div>
          </div>
        </div>

        Doctor
        <div class="col-xl-3 col-md-6">
          <div class="doctor">
            <div class="doctor_image"><img src="blog/images/doc_4.jpg" alt=""></div>
            <div class="doctor_content">
              <div class="doctor_name"><a href="#">Martha James</a></div>
              <div class="doctor_title">Surgeon</div>
              <div class="doctor_link"><a href="#">+</a></div>
            </div>
          </div>
        </div>

        Doctor
        <div class="col-xl-3 col-md-6">
          <div class="doctor">
            <div class="doctor_image"><img src="blog/images/doc_5.jpg" alt=""></div>
            <div class="doctor_content">
              <div class="doctor_name"><a href="#">Michael Smith</a></div>
              <div class="doctor_title">Surgeon</div>
              <div class="doctor_link"><a href="#">+</a></div>
            </div>
          </div>
        </div>

        Doctor
        <div class="col-xl-3 col-md-6">
          <div class="doctor">
            <div class="doctor_image"><img src="blog/images/doc_6.jpg" alt=""></div>
            <div class="doctor_content">
              <div class="doctor_name"><a href="#">Christina Smith</a></div>
              <div class="doctor_title">Laboratory</div>
              <div class="doctor_link"><a href="#">+</a></div>
            </div>
          </div>
        </div>

        Doctor
        <div class="col-xl-3 col-md-6">
          <div class="doctor">
            <div class="doctor_image"><img src="blog/images/doc_7.jpg" alt=""></div>
            <div class="doctor_content">
              <div class="doctor_name"><a href="#">Jessica Walsh</a></div>
              <div class="doctor_title">Pediatrist</div>
              <div class="doctor_link"><a href="#">+</a></div>
            </div>
          </div>
        </div>

        Doctor
        <div class="col-xl-3 col-md-6">
          <div class="doctor">
            <div class="doctor_image"><img src="blog/images/doc_8.jpg" alt=""></div>
            <div class="doctor_content">
              <div class="doctor_name"><a href="#">Martha James</a></div>
              <div class="doctor_title">Eye Doctor</div>
              <div class="doctor_link"><a href="#">+</a></div>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col">
          <div class="button doctors_button ml-auto mr-auto"><a href="#"><span>see all doctors</span><span>see all doctors</span></a></div>
        </div>
      </div>
    </div>
  </div> -->

@endsection('content')