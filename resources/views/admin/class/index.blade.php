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
        Class
        {{-- Add Class Button --}}
        <a href="{{ route('class.create-page') }}"
           class="btn btn-sm btn-primary mx-2">
            <i class="fa-solid fa-door-closed"></i>
            Add
        </a>

    </h2>

    {{-- Table Section --}}
    @if (count($classes) > 0)
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $i => $class)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $clas->name }}</td>
                        <td>{{ $clas->major }}</td>
                        <td class="d-flex">
                            {{-- Delete Button --}}
                            <form action="{{ route('class.destroy-page', $class->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-primary"
                                        onclick="return confirm('Delete this student ?')">
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
            {{ $classes->links() }}
        </div>
    @else
        <h6 class="text-center">Classes data is not exist.</h6>
    @endif
    {{-- End Table Section --}}
@endsection
