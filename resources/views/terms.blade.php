@extends('layouts.application')

@section('title')

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/shared.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/index.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/course.css') }}" />
@endsection



@section('content')
<section class="bg-white py-16">
    <div class="container mx-auto px-4 md:px-8 max-w-4xl">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Terms of Service</h1>

        <p class="text-gray-700 mb-4">
            Welcome to Frica Learn! These Terms of Service govern your use of our platform, including all content, functionality, and services offered on or 
through www.fricalearn.com.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">1. Acceptance of Terms</h2>
        <p class="text-gray-700 mb-4">
            By accessing or using our platform, you agree to be bound by these Terms. If you do not agree, please do not use our services.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">2. User Responsibilities</h2>
        <ul class="list-disc text-gray-700 pl-5 mb-4 space-y-2">
            <li>You agree to provide accurate information when registering.</li>
            <li>You are responsible for maintaining the confidentiality of your login credentials.</li>
            <li>Parents are responsible for managing their child’s use of the platform.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">3. Subscription & Payments</h2>
        <p class="text-gray-700 mb-4">
            Access to premium features and full course content requires a monthly subscription. Payments must be made in accordance with our pricing plan and 
payment methods.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">4. Intellectual Property</h2>
        <p class="text-gray-700 mb-4">
            All content on Frica Learn (videos, PDFs, illustrations, and lesson materials) are owned by Frica Learn or licensed to us. You may not copy, 
reproduce, or redistribute any part without our consent.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">5. Termination</h2>
        <p class="text-gray-700 mb-4">
            We reserve the right to terminate or suspend your access to the platform at our discretion, without notice, for conduct that violates these Terms.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">6. Changes to Terms</h2>
        <p class="text-gray-700 mb-4">
            Frica Learn reserves the right to update these Terms at any time. Continued use of the platform after changes constitutes acceptance.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-3">7. Contact Us</h2>
        <p class="text-gray-700">
            If you have any questions about these Terms, please contact us at <a href="mailto:support@fricalearn.com" class="text-blue-700 
underline">info@fricalearn.com</a>.
        </p>
    </div>
</section>
@endsection

