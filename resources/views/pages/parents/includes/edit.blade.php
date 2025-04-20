 <form action="{{ route('parent.update', ['parent' => $parentInfo->id]) }}" method="POST" enctype="multipart/form-data">
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
                         <label for="full_name" class="form-label">Full Name</label>
                         <input type="text" class="form-control demo-input-height" id="fullname"
                             placeholder="Enter your Name" name="name" value="{{ $parentInfo->name }}" />
                         <span class="text-danger">
                             @error('name')
                                 {{ $message }}
                             @enderror

                         </span>
                     </div>
                     <div class="mb-2">
                         <label for="phone" class="form-label">Phone Number</label><br />
                         <input type="tel" class="form-control demo-input-height w-100" id="phone"
                             placeholder="(234) 000 000 0000" name="phone" value="{{ $parentInfo->phone }}" />
                         <span class="text-danger">
                             @error('phone')
                                 {{ $message }}
                             @enderror

                         </span>

                     </div>
                     <div class="mb-2">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" class="form-control demo-input-height" id="password"
                             placeholder="Enter your Password" name="password" value="{{ old('password') }}" />
                         <span class="text-danger">
                             @error('password')
                                 {{ $message }}
                             @enderror

                         </span>

                     </div>
                     <div class="mb-2">
                         <label for="confirm_password" class="form-label">Confirm Password</label>
                         <input type="password" class="form-control demo-input-height" id="confirm-password"
                             placeholder="Enter your Password" name="confirm_password" value="{{ old('password') }}" />
                         <span class="text-danger">
                             @error('confirm_password')
                                 {{ $message }}
                             @enderror

                         </span>

                     </div>
                     <div class="mb-2">
                         <label for="course" class="form-label">Profile Photo</label>
                         <div class="custom-file-upload">
                             <label for="upload" class="custom-upload-label">
                                 <span class="file-name">File Name</span>
                                 <span class="upload-text">Upload</span>
                             </label>
                             <input type="file" id="upload" class="custom-file-input" name="profile_photo" required/>

                         </div>
                         @error('profile_photo')
                         <span class="text-danger">
                           {{ $message}}
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
