@extends('layouts.application')

@section('title')
    <x-title title="Contact :: Us" />
@endsection

@section('other_css')
    <link rel="stylesheet" href="{{ asset('assets/styles/contact.css') }}" />
@endsection

@section('content')
    <section id="form-section">
        <div class="container">
            <div class="row mx-2 bg-white pt-5 pb-5 px-5 form-wrapper">

                <div class="col-12 col-md-10 col-lg-8 mx-auto border-end border-lg-end">
                    <form action="{{ route('contact.store') }}" method="POST" class="row g-3 me-5">
                      @csrf
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" id="firstname" class="form-control input-height input-width"
                                placeholder="Enter First Name" aria-label="First name" name="firstname" />
                                @error('firstname')
                                 <span class="text-danger">
                                  {{ $message }}
                                  </span>                                  
                                @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" id="lastname" class="form-control input-height input-width"
                                placeholder="Enter Last Name" aria-label="Last name" name="lastname" />
                                @error('lastname')
                                <span class="text-danger">
                                 {{ $message }}
                                 </span>                                  
                               @enderror

                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control input-height input-width"
                                placeholder="Enter Your Email" aria-label="email" name="email" />
                                @error('email')
                                <span class="text-danger">
                                 {{ $message }}
                                 </span>                                  
                               @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" id="phone" class="form-control input-height input-width"
                                placeholder="Enter Your Phone" aria-label="Phone" name="phone"/>
                                @error('phone')
                                <span class="text-danger">
                                 {{ $message }}
                                 </span>                                  
                               @enderror
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" class="form-control input-height input-width"
                                placeholder="Enter Your Subject" aria-label="subject" name="subject"/>
                                @error('subject')
                                <span class="text-danger">
                                 {{ $message }}
                                 </span>                                  
                               @enderror
                        </div>

                        <div class="col-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control input-width" id="message" rows="5" placeholder="Enter your Message here..." name="message"></textarea>
                            @error('message')
                            <span class="text-danger">
                             {{ $message }}
                             </span>                                  
                           @enderror
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="submit-btn">
                                Send Your Message
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-3  d-none d-lg-block d-flex flex-column align-self-start gap-3 ms-5">
                    <div class="text-center contact-wrapper p-4 mb-4">
                        <i class="bi bi-envelope-fill icon-color"></i>
                        <p class="m-0">Info@fricalearn.com</p>
                    </div>
                    <div class="text-center contact-wrapper p-4 mb-4">
                        <i class="bi bi-telephone-fill icon-color"></i>
                        <p class="m-0">+447351662748</p>
                    </div>
                    <div class="text-center contact-wrapper p-3 mb-4">
                        <i class="bi bi-geo-alt-fill icon-color"></i>
                        <p class="m-0">3a, High Street Gillingham Kent ME7 5AA</p>
                    </div>
                    <div class="text-center contact-wrapper p-3 contact-social-link">
                        <p class="m-0">Follow us on</p>
                        <a href="https://x.com/FricaLearn"> <img src="{{ asset('assets/images') }}/contact-x.png" alt="" /></a>
                        <a href="https://www.linkedin.com/in/fricalearn/"> <img src="{{ asset('assets/images') }}/linkedin.png" alt="" /></a>
                        <a href="https://www.instagram.com/fricalearn/"> <img src="{{ asset('assets/images') }}/instagram.png" alt="" /></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="mobile-contact">
        <div class="container">
            <div class="row bg-white p-5 mx-2 rounded">
                <!-- First Row -->
                <div class="col-md-6 d-flex flex-column justify-content-between align-items-center">
                    <div class="text-center contact-wrapper p-4 mb-4">
                        <i class="bi bi-envelope-fill icon-color"></i>
                        <p class="m-0">Info@fricalearn.com</p>
                    </div>
                    <div class="text-center contact-wrapper p-4 mb-4">
                        <i class="bi bi-telephone-fill icon-color"></i>
                        <p class="m-0">+447351662748</p>
                    </div>
                </div>

                <!-- Second Row -->
                <div class="col-md-6 d-flex flex-column justify-content-between align-items-center">
                    <div class="text-center contact-wrapper p-3 mb-4">
                        <i class="bi bi-geo-alt-fill icon-color"></i>
                        <p class="m-0">3a, High Street Gillingham Kent ME7 5AA</p>
                    </div>
                    <div class="text-center contact-wrapper p-3 contact-social-link">
                        <p class="m-0">Follow us on</p>
                        <a href="https://web.facebook.com/profile.php?id=61570586593408"> <img src="{{ asset('assets/images/Button (2).png') }}" alt="facebook" /></a>
                        <a href="https://x.com/FricaLearn"> <img src="{{ asset('assets/images/contact-x.png') }}" alt="twitter" /></a>
                        <a href="https://www.linkedin.com/in/fricalearn/"> <img src="{{ asset('assets/images/linkedin.png') }}" alt="linkedin" /></a>
                        <a href="https://www.instagram.com/fricalearn/"> <img src="{{ asset('assets/images/instagram.png') }}" alt="instagram" /></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="map-section">
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <img class="img-fluid w-100" src="{{ asset('assets/images/map-logo.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
@endsection
