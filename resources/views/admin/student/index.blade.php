@extends('admin.layout.main')

@section('content')
    <h3 class="box-title">
        <i class="fa-solid fa-users d-inline-block mx-1"></i>
        Students
    </h3>

    {{-- Table Section --}}
    @if (count($students) > 0)
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
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
                        <td>{{ $student->username }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->phone_number }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary">Delete</button>
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
