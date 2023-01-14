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
        <div class="container-fluid">
            <div class="row">

                {{-- General Info --}}
                <div class="col-6">
                    <h5 class="mb-3">
                        <strong>
                            General Info
                        </strong>
                    </h5>

                    {{-- Profile Picture --}}
                    <img id="imgPreview"
                         src="{{ asset('images/profiles/') . '/' . $student->picture }}"
                         width="100px"
                         alt="{{ $student->picture }} profile picture"
                         class="my-3 rounded-circle {{ $student->picture ? '' : 'd-none' }}">

                    <div class="mb-3">
                        <label for="picture"
                               class="form-label">Profile Picture</label>
                        <input name="picture"
                               class="form-control"
                               type="file"
                               id="picture"
                               onchange="previewImage(event)">
                    </div>

                    {{-- Username --}}
                    <div class="mb-3">
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
                    <div class="mb-3">
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
                    <div class="mb-3">
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
                    <div class="mb-3">
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
                    <div class="mt-4">
                        <button type="submit"
                                class="btn btn-primary w-100">
                            <i class="fa-solid fa-circle-check"></i>
                            Update
                        </button>
                    </div>
                </div>

                {{-- Assign Class --}}
                <div class="col-6">
                    <h5 class="mb-3">
                        <strong>
                            Assign Class
                        </strong>
                    </h5>

                    @if (count($classes) > 0)
                        <table class="table table-sm">
                            @foreach ($classes as $i => $class)
                                @if (!in_array($class->id, $selectedClassIds))
                                    <tr>
                                        <td>
                                            <input type="checkbox"
                                                   name="classes[]"
                                                   value="{{ $class->id }}">
                                        </td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->major }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    @else
                        <h6>There is no class available.</h6>
                    @endif

                    <hr class="my-5">

                    {{-- Student current classes --}}
                    <h5 class="mb-3">
                        <strong>
                            Student Current Class(es).
                        </strong>
                    </h5>

                    @if (count($classes) > 0)
                        <table class="table table-sm">
                            @foreach ($selectedClasses as $i => $selectedClass)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $selectedClass->name }}</td>
                                    <td>{{ $selectedClass->major }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h6>The student has no class yet.</h6>
                    @endif
                </div>
            </div>
        </div>
    </form>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <hr>

                {{-- Delete Student Button --}}
                <div class="">
                    <form action="{{ route('student.destroy', $student->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Delete this student ?')"
                                class="btn btn-danger text-white w-100">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                            <strong>{{ $student->username }}</strong>
                        </button>
                    </form>
                </div>
                {{-- End Form Section --}}
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script src="{{ asset('js/student.js') }}"></script>
@endpush
