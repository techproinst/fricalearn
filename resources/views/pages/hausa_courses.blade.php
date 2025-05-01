@extends('layouts.application')

@section('title')
<x-title title="Hausa :: Courses" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/shared.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/other-course.css') }}" />
@endsection

@section('content')
<section id="course-section">
  <div class="container-lg">
    <div class="row align-items-start">
      <div class="col-lg-6 text-center text-lg-start">
        <h3 class="">
          <div>Koyon Harshen Hausa fún Ọmọde</div>
          <div>(Learning Hausa for Children)</div>
        </h3>
      </div>
      <div class="col-lg-6">
        <p class="text-muted text-center text-lg-start">
          This course introduces children to the basics of the Hausa
          language (Harshen Hausa) and culture.
        </p>
      </div>
    </div>
  </div>
</section>

<section id="sub-course-card-section">
  <div class="container-lg overflow-hidden">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5 my-2">
      @forelse ($courseLevels as $course )
      <div class="col">
        <div class="card">
          <img src="{{ asset('assets/images/hausa-img-3.png') }}" class="card-img-top pt-4 px-4"
            alt="hausa intro class image" />
          <div class="card-body px-4">
            <h5 class="card-title">
              Learning Hausa for Children ({{ $course->level_name }})
            </h5>
            <p class="card-text text-muted">
              Nnọọ! Welcome! This interactive course introduces children to
              the Igbo language and culture through fun
            </p>
            <div class="py-2">
              {{-- <a class="level-btn me-1" href="">4 weeks</a> --}}
              <a class="level-btn" href="">{{ $course->level_name }}</a>
            </div>

            <a href="{{ route('student.create') }}" class="sub-course-explore-btn mt-3">Enroll Now</a>
          </div>
        </div>
      </div>
        
      @empty
      <p>No course available yet!!</p>
        
      @endforelse
      
    </div>
  </div>
</section>

<section id="other-courses">
  <div class="container-lg overflow-hidden">
    <h1 class="text-center text-md-start">
      <div>Other Courses</div>
    </h1>

    <p class="text-muted text-center text-md-start">
      Lorem ipsum dolor sit amet consectetur. Tempus tincidunt etiam eget
      elit id imperdiet et. Cras eu sit dignissim lorem nibh et. Ac cum eget
      habitasse in velit fringilla feugiat senectus in.
    </p>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-5 my-2">
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('assets/images/image (7).png') }}" class="card-img-top pt-4 px-4"
            alt="yoruba other course image" />
          <div class="card-body px-4">
            <h5 class="card-title">
              Kíkó Èdè Yorùbá fún Ọmọde (Learning Yorùbá for Children)
            </h5>
            <p class="card-text text-muted">
              Ẹ kú àbẹ́wò! This course introduces children to the Yorùbá
              language (èdè Yorùbá) and culture
            </p>
            <a href="{{ route('courses.yoruba') }}" class="explore-btn my-2">Explore Courses</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('assets/images/other-image-igbo.png') }}" class="card-img-top pt-4 px-4"
            alt="igbo other course image" />
          <div class="card-body px-4">
            <h5 class="card-title">
              Ịmụ Asụsụ Igbo Maka Ndị Nwatakịrị" (Learning Igbo for
              Children)
            </h5>
            <p class="card-text text-muted">
              Nnọọ! Welcome! This interactive course introduces children to
              the Igbo language and culture through fun
            </p>
            <a href="{{ route('courses.igbo') }}" class="explore-btn my-2">Explore Courses</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<x-faq />
<x-native-section />

@endsection