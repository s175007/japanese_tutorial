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
                    <h4 class="card-title"> Vocabulary Create</h4>
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
                    <form action="{{ route('admin.vocabularies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="category_id">Choose Categories</label>
                            <select id="category_id" name="category_id" class="form-control">
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
                            <select id="book_id" name="book_id" class="form-control">
                            </select>
                        </div>
        
                        <div class="form-group">
                            @error('vocabulary_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="lesson_id">Choose Lessons</label>
                            <select id="lesson_id" name="lesson_id" class="form-control">
                            </select>
                        </div>
        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kanji</label>
                            @error('kanji')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="kanji" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" value="{{ old('name') }}">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiragana</label>
                            @error('hiragana')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="hiragana" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" value="{{ old('name') }}">
                        </div>
        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mean</label>
                            @error('mean')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea type="file" name="mean" class="form-control" id="exampleInputPassword1" placeholder=""
                                value="{{ old('mean') }}"></textarea>
                        </div>
        
                        <div class="form__button">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
<script src="{{ asset('js/lesson.js') }}"></script>
@endsection
