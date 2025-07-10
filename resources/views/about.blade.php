@extends('layouts.application')

@section('title')

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/shared.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/index.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/course.css') }}" />
@endsection


@section('content')
<section class="bg-white py-16">
    <div class="container mx-auto px-4 md:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-gray-800 mt-15 mb-4">About Frica Learn</h1>
            <p class="text-lg text-gray-600 mb-10">
                FricaLearn is an online educational platform dedicated to teaching African languages and culture to children in the diaspora. Our interactive 
lessons, starting with Yoruba, make learning fun and meaningful, helping kids connect with their heritage. Join us to explore words like ‘Bawo’ (hello) and ‘O 
ṣe’ (thank you) through stories, songs, and games.
            </p>
        </div>

        <div class="mt-12 grid md:grid-cols-2 gap-10 items-center">
            <div>
                       <img class="img-fluid me-5 test" src="{{ asset('assets/images/image 68.png')}}" alt="hero-image" />

            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-8">Our Mission</h2>
                <p class="text-gray-600 mb-4">
                    To preserve and promote Nigerian heritage through accessible, engaging, and interactive language learning experiences for children and 
families worldwide.
                </p>

                <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-3">What Makes Us Unique</h2>
                <ul class="list-disc pl-5 text-gray-600 space-y-2">
                    <li>Structured courses in three levels: Beginner, Introductory, and Intermediate</li>
                    <li>Admin-managed class scheduling based on timezones</li>
                    <li>Parent and student dashboards with real-time access</li>
                    <li>Demo course registration and downloadable resources</li>
                </ul>
            </div>
        </div>

        <div class="mt-16 text-center">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Join Us in Preserving Our Heritage</h2>
            <p class="text-gray-600 mb-6">We believe language is a powerful link to culture, identity, and history. Let’s keep our native languages alive — one 
lesson at a time.</p>
            <a href="{{ url('/courses') }}" class="inline-block bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition">Explore Our Courses</a>
        </div>
    </div>
</section>
@endsection

