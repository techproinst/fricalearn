@extends('layouts.application')

@section('title')
<x-title title="Frica Learn" />
@endsection
@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/shared.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/index.css') }}" />
@endsection



@section('content')

<section id="hero-section">
  <div class="container-lg">
    <div class="row align-items-center text-center text-md-start">
      <div class="col-12 col-md-6">
        <h1>
          <div class="fw-bold">Explore Your Mother's</div>
          <div class="fw-bold">Language and Culture</div>
        </h1>
        <div class="my-2">
          <div class="hero-text">
            Discover the beauty of your mother's tongue and dive into the
          </div>
          <div class="hero-text">
            Vibrant culture of Africa with learning and methods tailored
            just for you!
          </div>
        </div>

        <a class="demo-btn my-4" href="{{ route('demo_class.create') }}">Explore Our Demo Classes</a>
      </div>
      <div class="col-12 col-md-6 d-flex justify-content-center">
        <img class="img-fluid me-5 test" src="{{ asset('assets/images/hero-image.png')}}" alt="hero-image" />
      </div>
    </div>
  </div>
</section>

<section class="rating">
  <div class="container-lg">
    <div class="row d-flex justify-content-center align-items-center text-center">
      <div class="col-12 col-md-6 col-lg-3 mb-4 rating-border text-color">
        <h1 class="mb-0">5+</h1>
        <p class="mb-0">Years in Business</p>
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-4 second-rating-border text-color">
        <h1 class="mb-0">5+</h1>
        <p class="mb-0">Years in Business</p>
      </div>
      <div class="col-12 col-md-6 col-lg-3 mb-4 rating-border text-color">
        <h1 class="mb-0">7k+</h1>
        <p class="mb-0">Happy Customers</p>
      </div>
      <div class="col-12 col-md-6 col-lg-3 text-color">
        <h1 class="mb-0">20+</h1>
        <p class="mb-0">Succesful Partners</p>
      </div>
    </div>
  </div>
</section>

<section id="courses">
  <div class="container-lg overflow-hidden">
    <h1 class="mb-4 text-center text-md-start">
      <div class="fw-bold">Our Courses</div>
    </h1>
    <div class="row align-items-center">
      <div class="col-md-9 col-lg-8">
        <div class="text-muted">
          Lorem ipsum dolor sit amet. Error facere unde quibusdam optio cum
          quasi?
        </div>
        <div class="text-muted">
          Lorem ipsum dolor. Omnis eaque optio voluptas quos cum tempore ea
          qui earum odit magni.
        </div>
      </div>
      <div class="col-md-3 col-lg-4 d-flex justify-content-center justify-content-md-end my-3">
        <a class="view-btn" href="">View All</a>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5 my-2">
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('assets/images/yourba-img-3.png') }}" class="card-img-top pt-4 px-4" alt="yoruba-image" />
          <div class="card-body px-4">
            <h5 class="card-title">
              Kíkọ Ẹ̀dè Yorùbá fún Ọmọdé (Learning Yorùbá for Children)
            </h5>
            <p class="card-text text-muted">
              È kú àbẹ̀wò! This course introduces children to the Yoruba
              language (Ẹ̀dè).
            </p>
            <a href="{{ route('courses.yoruba') }}" class="explore-btn my-2">Explore Courses</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('assets/images/igbo.png') }}" class="card-img-top pt-4 px-4" alt="igbo-image" />
          <div class="card-body px-4">
            <h5 class="card-title">
              Ìmù Àsụsụ Ìgbò Màkà Ndí Nwa (Learning Igbo for Children)
            </h5>
            <p class="card-text text-muted">
              Nnọọ! Welcome! This Interactive course introduces children to
              the language.
            </p>
            <a href="{{ route('courses.igbo') }}" class="explore-btn my-2">Explore Courses</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('assets/images/hausa.png') }}" class="card-img-top pt-4 px-4" alt="hausa-image" />
          <div class="card-body px-4">
            <h5 class="card-title">
              Koyon Harshen Hausa fun Omode (Learning Hausa for Children)
            </h5>
            <p class="card-text text-muted">
              This course introduces children to the basics of the Hausa
              language.
            </p>
            <a href="{{ route('courses.hausa') }}" class="explore-btn my-2">Explore Courses</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="exciting">
  <div class="container-lg">
    <div class="exciting-intro text-center">
      <h6>
        <span><i class="bi bi-lightning-charge"></i></span>
        Join Thousands of Kids Learning Their Home Language!
      </h6>

      <h1 style="color: white">
        <div>Exciting & Fun Ways to Learn Your Native</div>
        <div>Language!</div>
      </h1>
    </div>

    <div class="row pt-5 d-flex justify-content-center align-items-center">
      <div class="col-md-6 text-center">
        <img class="img-fluid pt-md-5 kids-lang-img" src="{{ asset('assets/images/image 68.png') }}"
          alt="Kids learning their native language" />
      </div>
      <div class="col-md-6">
        <div class="py-4 border-bottom text-white d-flex justify-content-around">
          <div class="text-center">
            <h1 class="display-5">640<strong>+</strong></h1>
            <p>Kids Learning</p>
          </div>
          <div class="text-center">
            <h1 class="display-5">253<strong>+</strong></h1>
            <p>Fun Lessons</p>
          </div>
        </div>
        <div class="py-5 text-white d-flex justify-content-around">
          <div class="text-center">
            <h1 class="display-5">93<strong>%</strong></h1>
            <p>of Kids Love It!</p>
          </div>
          <div class="text-center">
            <h1 class="display-5">28<strong>+</strong></h1>
            <p>Friendly Teachers</p>
          </div>
        </div>
      </div>

      <div class="text-center my-4">
        <a class="touch-btn" href="">Get in Touch <span><i class="bi bi-arrow-right"></i></span></a>
      </div>
    </div>
  </div>
</section>

<section id="connect">
  <div class="container-lg">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="root-wrapper text-center text-lg-start">
          <div>Connect with Your Roots</div>
          <div>and <span>Culture</span></div>
        </h1>

        <p class="lead text-muted pt-3">
          Help your child deepen their connection to their heritage through
          language! 🌍 With culturally rich stories, traditions, and
          interactive lessons, they’ll embrace their roots while building
          fluency in a fun and meaningful way.
        </p>
      </div>
      <div class="col-lg-6 d-flex justify-content-center">
        <img class="img-fluid" src="{{ asset('assets/images/student.png') }}" alt="" />
      </div>
    </div>

    <div class="row py-5 align-items-center">
      <div class="col-lg-6 d-flex justify-content-center order-2 order-lg-1">
        <img class="img-fluid" src="{{ asset('assets/images/clock.png') }}" alt="" />
      </div>
      <div class="col-lg-6 order-1 order-lg-2">
        <h1 class="root-wrapper text-center text-lg-start">
          <div>Learn at Your</div>
          <div><span>Pace</span></div>
        </h1>

        <p class="lead text-muted py-3">
          Empower your child to learn their native language at a comfortable
          pace! With flexible lessons, engaging activities, and expert
          guidance, they can progress confidently, anytime, anywhere.
        </p>
      </div>
    </div>

    <div class="row py-md-5 align-items-start">
      <div class="col-lg-6">
        <h1 class="root-wrapper text-center text-lg-start pt-5">
          <div>Class Management Tools</div>
          <div>for <span>Our Student</span></div>
        </h1>

        <p class="lead text-muted py-3">
          Effortlessly manage your child's learning with our class
          management tools! Track progress, schedule lessons, and stay
          involved—all in one place!
        </p>
      </div>
      <div class="col-lg-6 d-flex justify-content-center">
        <img class="img-fluid" src="{{ asset('assets/images/group.png') }}" alt="" />
      </div>
    </div>
  </div>
</section>

<x-faq/>
<x-native-section />

@endsection