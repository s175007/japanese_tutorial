@extends('layouts.master')

@section('title')
    Lesson
@endsection



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Vocabulary Table</h4>
                        <a href="{{ route('admin.vocabularies.create') }}" class="btn btn-primary" role="button" aria-pressed="true">Create</a>
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
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Kanji</th>
                                    <th scope="col">Hiragana</th>
                                    <th scope="col">Mean</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vocabularies as $vocabulary)
                                <tr>
                                    <th scope="row">{{ $vocabularies->firstItem() + $loop->index }}</th>
                
                                    <td>
                                        @if (isset($vocabulary->lesson))
                                            {{ $vocabulary->lesson->name }}
                                        @endif
                                    </td>
                                    <td>{{ $vocabulary->kanji }}</td>
                                    <td>{{ $vocabulary->hiragana }}</td>
                                    <td>{{ $vocabulary->mean }}</td>
                                    <td>
                                        <div class="row">
                                            <form method="POST"
                                                action="{{ route('admin.vocabularies.destroy', ['vocabulary' => $vocabulary]) }}">
                
                                                {{-- <a href="{{ route('admin.vocabularies.show', $vocabulary->id) }}" title="show">
                                                    <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                                </a> --}}
                
                                                <a href="{{ route('admin.vocabularies.edit', $vocabulary->id) }}">
                                                    <i class="fas fa-edit fa-lg" style="color: #A9A9A9"></i>
                                                </a>
                
                                                @csrf
                                                @method('DELETE')
                
                                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
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
                            {{ $vocabularies->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
@endsection
