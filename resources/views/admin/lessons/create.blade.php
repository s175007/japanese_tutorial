@extends('layouts.master')

@section('title')
    Lesson
@endsection



@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Create Table</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo">Create</button>
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
                        <div class="modal-body">
                            <form action="{{ route('admin.lessons.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="category_id">Choose Categories</label>
                                    <select id="category_id" name="category_id" class="custom-select">
                                        <option value="">Chọn category</option>
                                        @forelse ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                            <option value="">Không tìm thấy</option>
                                        @endforelse
                                    </select>
                                </div>
        
                                <div class="form-group">
                                    @error('book_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label for="book_id">Choose Books</label>
                                    <select id="book_id" name="book_id" class="custom-select">
                                    </select>
                                </div>
        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="" value="{{ old('name') }}">
                                </div>
        
        
                                <div class="form-group">
                                    @error('img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" name="img">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                </div>
        
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea type="file" name="description" class="form-control" id="exampleInputPassword1"
                                        placeholder="" value="{{ old('description') }}"></textarea>
                                </div>
        
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                </div>
                            </form>
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
