@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1 class="display-3">Create a New Thread</h1>
            <p class="lead">Topic name</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('partials.form-error-message')
                <form action="/{{$topic->id}}" method="POST">
                    {{ method_field('PUT') }}
                    <div class="row">
                        <!--Inputs -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" name="title" id="title" value="{{old('title')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Content</label>
                                <textarea name="content" id="content" rows="3" class="form-control summernote {{ $errors->has('content') ? 'is-invalid' : ''}}" required>
                                    {{old('content')}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12 centered">
                            <button type="submit" class="btn btn-primary">Create a New Thread</button>
                        </div>
                        @csrf
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                
                    
                    
                
            </div>
        </div>
    </div>
@endsection