@extends('admin.layout.main')

@section('content')
    <h2 class="box-title">
        Add Student
    </h2>

    <hr>

    {{-- Form Section --}}
    <form action="{{ route('student.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h5 class="mb-3">
                        <strong>
                            General Info
                        </strong>
                    </h5>

                    {{-- Profile Picture --}}
                    <img id="imgPreview"
                         src=""
                         width="100px"
                         alt="Profile Picture"
                         class="my-3 rounded-circle d-none">
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
                               placeholder="Phone number">
                    </div>

                    {{-- Submit Button --}}
                    <div class="my-4">
                        <button type="submit"
                                class="btn btn-primary">
                            <i class="fa-solid fa-circle-check"></i>
                            Submit
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
                            @foreach ($classes as $class)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               name="classes[]"
                                               value="{{ $class->id }}">
                                    </td>
                                    <td>{{ $class->name }}</td>
                                    <td>{{ $class->major }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h6>There is no class available.</h6>
                    @endif
                </div>
            </div>
        </div>
    </form>
    {{-- End Form Section --}}
@endsection

@push('after-scripts')
    <script src="{{ asset('js/student.js') }}"></script>
@endpush
