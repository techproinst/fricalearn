<form action="{{ route('student.update', ['student' => $student->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control demo-input-height" id="name"
                            placeholder="Enter your Name" name="name" value="{{ $student->name}}" required />
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Birthday" class="form-label">Birthday</label>
                        <input class="form-control demo-input-height" type="text" id="daypicker"
                            placeholder="e.g. December-29 " name="birthday" value="{{ $student->birthday }}" required>
                        @error('birthday')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="age_range" class="form-label">Age Range</label>
                        <select class="form-select demo-input-height mb-3" aria-label="age_range" id="age_range"
                            name="age_range" required>
                            <option value="">--Age Range</option>
                            @foreach (App\Enums\AgeRange::cases() as $range)
                                <option value="{{ $range->value }}" @selected(old('age_range', $student->age_range) == $range->value)>{{ $range->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('age_range')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <div class="mb-2">
                            <label for="course" class="form-label">Profile Photo</label>
                            <div class="custom-file-upload">
                                <label for="upload" class="custom-upload-label">
                                    <span class="file-name">File Name</span>
                                    <span class="upload-text">Upload</span>
                                </label>
                                <input type="file" id="upload" class="custom-file-input" name="profile_photo"
                                    required />
                            </div>
                            @error('profile_photo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
</form>
