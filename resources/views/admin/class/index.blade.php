@extends('admin.layout.main')

@section('content')
    {{-- Show alert if exist --}}
    @if (session('status'))
        <div class="alert alert-{{ session('status')['type'] }}"
             role="alert">
            {{ session('status')['message'] }}
        </div>
    @endif

    <h2 class="box-title mb-4">
        Class
        {{-- Add Class Button --}}
        <a href="{{ route('class.create') }}"
           class="btn btn-sm btn-primary mx-2">
            <i class="fa-solid fa-door-closed"></i>
            Add
        </a>
    </h2>

    {{-- Table Section --}}
    @if (count($classes) > 0)
        <table class="table table-sm data-table">
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
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->major }}</td>
                        <td class="d-flex">
                            {{-- Edit Button --}}
                            <a href="{{ route('class.edit', $class->id) }}"
                               class="btn btn-sm btn-light">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('class.destroy', $class->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-primary"
                                        onclick="return confirm('Delete this class ?')">
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
            {{-- {{ $classes->links() }} --}}
        </div>
    @else
        <h6 class="text-center">Classes data is not exist.</h6>
    @endif
    {{-- End Table Section --}}
@endsection
