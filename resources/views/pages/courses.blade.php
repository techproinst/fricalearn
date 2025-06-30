@extends('layouts.application')

@section('title')
<x-title title="Courses" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/shared.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/index.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/course.css') }}" />
@endsection

@section('content')
<section id="course-section">
  <div class="container-lg">
    <div class="row align-items-start">
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class="">
          <div>Our Courses</div>
        </h1>
      </div>
      <div class="col-lg-6">
        <p class="text-muted text-center text-lg-start">
          Each course combines fun lessons, colorful visuals, songs, and storytelling to help children learn naturally and joyfully. Whether your child is just starting out or already understands a bit, our courses make language learning playful, interactive, and rooted in culture.
        </p>
      </div>
    </div>
  </div>
</section>

<section id="card-section">
  <div class="container-lg overflow-hidden">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5 my-2">
      <div class="col">
        <div class="card h-100">
          <img src="{{ asset('assets/images/yourba-img-3.png') }}" class="card-img-top pt-4 px-4" alt="..." />
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
          <img src="{{ asset('assets/images/igbo.png') }}" class="card-img-top pt-4 px-4" alt="..." />
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
          <img src="{{ asset('assets/images/hausa.png') }}" class="card-img-top pt-4 px-4" alt="..." />
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

@endsection
