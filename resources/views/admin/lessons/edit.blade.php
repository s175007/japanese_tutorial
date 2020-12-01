@extends('layouts.master')

@section('title')
    Lesson
@endsection



@section('content')
    // Create

    // END CREATE


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lesson Edit</h4>
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
                    <form action="{{ route('admin.lessons.update', ['lesson' => $lesson]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleInputEmail1">Chọn Books</label>
                        <select name="book_id" class="custom-select">
                            @forelse ($books as $book)
                                <option value="{{ $book->id }}" {{ $book->id == $lesson->book_id ? 'selected' : '' }}>
                                    {{ $book->name }}
                                </option>
                            @empty
                                <option value="">Không tìm thấy</option>
                            @endforelse
                        </select>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="" value="{{ $lesson->name }}">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea type="file" name="description" class="form-control" id="exampleInputPassword1" placeholder=""
                                value="{{ old('description') }}"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="file" name="img" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
<script src="{{ asset('js/book.js') }}"></script>
@endsection
