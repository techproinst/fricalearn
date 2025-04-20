<div class="card p-4 border-0">
    <div class="text-center border-bottom">
        <h5 class="pt-2 text-color">Your Profile</h5>
        @if ($parentInfo->profile_photo)
            <img width="100" height="100" class="rounded-circle border border-3" 
                src="{{ asset('storage/uploads/' . $parentInfo->profile_photo) }}" alt="user">
        @else
            <img src="{{ asset('assets/images/profile-img.png') }}" alt="user" />
        @endif

        <h5 class="pt-2 text-color">{{ Str::ucfirst($parentInfo->name) }}</h5>
        <p class="text-muted">Parent</p>
    </div>
    <div class="d-flex justify-content-between pt-2">
        <h6 class="personal">Personal Information</h6>
        <a class="text-muted edit-text" href="" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">Edit</a>

    </div>
    <div class="">
        <p><i class="bi bi-envelope me-1 ms-1"></i> {{ Str::ucfirst($parentInfo->email) }}</p>
    </div>
    <div class="">
        <p>
            <img src="{{ asset('assets/images/Phone Rounded.svg') }}" alt="" />
            {{ Str::ucfirst($parentInfo->phone ?? 'N/A') }}
        </p>
    </div>
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('parent.enrollments') }}"> <img src="{{ asset('assets/images/btn.png') }}"
                alt="" /></a>
        <h6 class="mb-0 ms-2">Enrollments History</h6>

    </div>


</div>