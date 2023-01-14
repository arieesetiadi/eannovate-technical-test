@extends('admin.layout.main')

@section('content')
    <h2 class="box-title">
        Edit Class
    </h2>

    {{-- Form Section --}}
    <form action="{{ route('class.update', $class->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                   value="{{ $class->name }}"
                   oninput="validateNameInput(event)">
            <small id="nameError"
                   class="text-danger d-none"></small>
        </div>

        {{-- Select Major --}}
        <div class="form-group mb-3 w-50">
            <label for="major">Select Major</label>
            <select name="major"
                    class="form-control"
                    id="major"
                    required
                    onchange="validateMajorSelect(event)">
                <option value=""
                        selected
                        hidden>
                    Select class major 👇
                </option>
                {{-- Looping all majors data --}}
                @foreach ($majors as $major)
                    @if ($major->name == $class->major)
                        <option selected
                                value="{{ $major->name }}">{{ $major->name }} - {{ $major->id }}</option>
                    @else
                        <option value="{{ $major->name }}">{{ $major->name }} - {{ $major->id }}</option>
                    @endif
                @endforeach
            </select>
            <small id="majorError"
                   class="text-danger d-none"></small>
        </div>

        {{-- Submit Button --}}
        <div class="my-4 w-50">
            <button type="submit"
                    class="btn btn-primary w-100">
                <i class="fa-solid fa-circle-check"></i>
                Update
            </button>
        </div>
    </form>

    <hr class="w-50">

    {{-- Delete Student Button --}}
    <div class="my-4 w-50">
        <form action="{{ route('class.destroy', $class->id) }}"
              method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                    onclick="return confirm('Delete this class ?')"
                    class="btn btn-danger text-white w-100">
                <i class="fa-solid fa-trash"></i>
                Delete
                <strong>{{ $class->name }}</strong>
            </button>
        </form>
    </div>
    {{-- End Form Section --}}
@endsection

@push('after-scripts')
    <script src="{{ asset('js/class.js') }}"></script>
@endpush
