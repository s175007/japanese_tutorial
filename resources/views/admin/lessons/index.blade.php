@extends('layouts.master')

@section('title')
    Lesson
@endsection



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Lesson Table</h4>
                    <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary" role="button" aria-pressed="true">Create</a>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


                    @if (session('fail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('fail') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Books Name</th>
                                    <th scope="col">Lesson</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lessons as $lesson)
                                    <tr>
                                        <th scope="row">{{ $lessons->firstItem() + $loop->index }}</th>
                                        <td>{{ $lesson->book->category->name }}</td>
                                        <td>{{ $lesson->book->name }}</td>
                                        <td>{{ $lesson->name }}</td>
                                        <td><img src="{{ Storage::url($lesson->img) }}" class="img-fluid" alt="không tồn tại">
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($lesson->description, 20, $end = '...') }}</td>
                                        <td>
                                            <div class="row">
                                                <form method="POST"
                                                    action="{{ route('admin.lessons.destroy', ['lesson' => $lesson]) }}">

                                                    {{-- <a
                                                        href="{{ route('admin.lessons.show', $lesson->id) }}" title="show">
                                                        <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                                    </a> --}}

                                                    <a href="{{ route('admin.lessons.edit', $lesson->id) }}">
                                                        <i class="fas fa-edit fa-lg" style="color: #A9A9A9"></i>
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" title="delete"
                                                        style="border: none; background-color:transparent;">
                                                        <i class="fas fa-trash fa-lg" style="color: #A9A9A9"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                                <p>Không có lesson nào</p>
                            @endforelse
                        </table>
                        <div class="pagination__link">
                            {{ $lessons->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="{{ asset('js/book.js') }}"></script>
@endsection
