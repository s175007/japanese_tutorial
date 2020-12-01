@extends('layouts.master')

@section('title')
    DASHBOARD
@endsection



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Category List</h4>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" role="button"
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
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Icon
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td><img src="{{ Storage::url($category->icon) }}" class="img-fluid"
                                                alt="không tồn tại"></td>
                                        <td>
                                            <div class="row">
                                                <form method="POST"
                                                    action="{{ route('admin.categories.destroy', ['category' => $category]) }}">

                                                    {{-- <a
                                                        href="{{ route('admin.categories.show', $category->id) }}" title="show">
                                                        <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                                    </a> --}}
                                                    <a href="{{ route('admin.categories.edit', $category->id) }}">
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
                                <p>Không có Category nào</p>
                            @endforelse
                        </table>
                        <div class="pagination__link">
                            {{ $categories->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')

@endsection
