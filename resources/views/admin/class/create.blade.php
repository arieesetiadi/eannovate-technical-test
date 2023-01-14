@extends('admin.layout.main')

@section('content')
    <h2 class="box-title">
        Add Class
    </h2>

    {{-- Form Section --}}
    <form action="{{ route('class.store-page') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        {{-- Class Name --}}
        <div class="mb-3 w-50">
            <label for="name"
                   class="form-label">Class Name</label>
            <input name="name"
                   type="text"
                   id="name"
                   class="form-control"
                   placeholder="Username"
                   required
                   oninput="validateNameInput(event)">
            <small id="nameError"
                   class="text-danger d-none"></small>
        </div>

        {{-- Select Major --}}
        <div class="form-group mb-3 w-50">
            <label for="major">Select Major</label>
            <select class="form-control"
                    id="major"
                    required
                    onchange="validateMajorSelect(event)">
                <option value=""
                        selected>
                    Select class major 👇
                </option>
                {{-- Looping all majors data --}}
                @foreach ($majors as $major)
                    <option value="{{ $major->name }}">{{ $major->name }} - {{ $major->id }}</option>
                @endforeach
            </select>
            <small id="majorError"
                   class="text-danger d-none"></small>
        </div>

        {{-- Submit Button --}}
        <div class="my-4 w-50">
            <button type="submit"
                    class="btn btn-primary">
                <i class="fa-solid fa-circle-check"></i>
                Submit
            </button>
        </div>
    </form>
    {{-- End Form Section --}}
@endsection

@push('after-scripts')
    <script src="{{ asset('js/class.js') }}"></script>
@endpush
