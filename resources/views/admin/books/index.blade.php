@extends('layouts.master')

@section('title')
    Book
@endsection



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Book Table</h4>
                    <a href="{{ route('admin.books.create') }}" class="btn btn-primary" role="button"
                    aria-pressed="true">Create</a>
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
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <th scope="row">{{ $books->firstItem() + $loop->index }}</th>
                                        <td>{{ $book->category->name }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td><img src="{{ Storage::url($book->img) }}" class="img-fluid" alt="không tồn tại">
                                        </td>
                                        <td>
                                            <div class="row">
                                                <form method="POST"
                                                    action="{{ route('admin.books.destroy', ['book' => $book]) }}">

                                                    {{-- <a
                                                        href="{{ route('admin.books.show', $book->id) }}" title="show">
                                                        <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                                    </a> --}}

                                                    <a href="{{ route('admin.books.edit', $book->id) }}">
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
                                <p>Không có book nào</p>
                            @endforelse
                        </table>
                        <div class="pagination__link">
                            {{ $books->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')

@endsection
