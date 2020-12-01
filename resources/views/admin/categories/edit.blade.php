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
                    <h4 class="card-title">Edit</h4>
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
                    <form action="{{ route('admin.categories.update' , ['category' => $category]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="" value="{{$category->name}}">
                        </div>
        
        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Icon</label>
                            @error('icon')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" name="icon">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
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
@endsection
