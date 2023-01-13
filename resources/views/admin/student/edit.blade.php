@extends('admin.layout.main')

@section('content')
    <h2 class="box-title">
        Edit Student
    </h2>

    {{-- Form Section --}}
    <form action="{{ route('student.update', $student->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Profile Picture --}}
        <img id="imgPreview"
             src="{{ asset('images/profiles/') . '/' . $student->picture }}"
             width="100px"
             alt="{{ $student->picture }} profile picture"
             class="my-3 rounded-circle {{ $student->picture ? '' : 'd-none' }}">

        <div class="mb-3 w-50">
            <label for="picture"
                   class="form-label">Profile Picture</label>
            <input name="picture"
                   class="form-control"
                   type="file"
                   id="picture"
                   onchange="previewImage(event)">
        </div>

        {{-- Username --}}
        <div class="mb-3 w-50">
            <label for="username"
                   class="form-label">Username</label>
            <input name="username"
                   type="text"
                   class="form-control"
                   id="username"
                   placeholder="Username"
                   value="{{ $student->username }}"
                   required>
        </div>

        {{-- Email --}}
        <div class="mb-3 w-50">
            <label for="email"
                   class="form-label">Email</label>
            <input name="email"
                   type="email"
                   class="form-control"
                   id="email"
                   placeholder="Email"
                   value="{{ $student->email }}"
                   required>
        </div>

        {{-- Age --}}
        <div class="mb-3 w-50">
            <label for="age"
                   class="form-label">Age</label>
            <input name="age"
                   type="number"
                   class="form-control"
                   id="age"
                   placeholder="Age"
                   value="{{ $student->age }}"
                   required>
        </div>

        {{-- Phone Number --}}
        <div class="mb-3 w-50">
            <label for="phone_number"
                   class="form-label">Phone Number</label>
            <input name="phone_number"
                   type="text"
                   class="form-control"
                   id="phone_number"
                   value="{{ $student->phone_number }}"
                   placeholder="Phone number">
        </div>

        {{-- Update Button --}}
        <div class="my-4 w-50">
            <button type="submit"
                    class="btn btn-primary">
                <i class="fa-solid fa-circle-check"></i>
                Update
            </button>
        </div>
    </form>
    {{-- End Form Section --}}
@endsection

@push('after-scripts')
    <script src="{{ asset('js/student.js') }}"></script>
@endpush
