@extends('admin.layout.main')

@section('content')
    {{-- Show alert if exist --}}
    @if (session('status'))
        <div class="alert alert-{{ session('status')['type'] }}"
             role="alert">
            {{ session('status')['message'] }}
        </div>
    @endif

    <h2 class="box-title">
        Students
        <a href="{{ route('student.create') }}"
           class="btn btn-sm btn-primary mx-2">
            <i class="fa-solid fa-user-plus"></i> Add
        </a>
    </h2>

    {{-- Table Section --}}
    @if (count($students) > 0)
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th></th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $i => $student)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <th>
                            @if ($student->picture)
                                <img src="{{ asset('images/profiles/') . '/' . $student->picture }}"
                                     alt="{{ $student->username }} profile picture"
                                     width="35px"
                                     height="35px">
                            @else
                                <img src="{{ asset('images/profiles/default.png') }}"
                                     alt="Default profile picture"
                                     width="35px"
                                     height="35px">
                            @endif
                        </th>
                        <td>{{ $student->username }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->phone_number }}</td>
                        <td>
                            {{-- Delete Button --}}
                            <form action="{{ route('student.destroy', $student->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-primary"
                                        onclick="return confirm('Delete this student?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $students->links() }}
        </div>
    @else
        <h6 class="text-center">Student data is not exist.</h6>
    @endif
    {{-- End Table Section --}}
@endsection

@push('after-scripts')
    <script src="{{ asset('js/student.js') }}"></script>
@endpush
