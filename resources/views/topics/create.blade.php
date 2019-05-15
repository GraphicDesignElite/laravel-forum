@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-3">Create a New Topic</h1>
        <p class="lead">Add a new top level topic category.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('partials.form-error-message')
                <form action="/topics" method="POST">
                    <div class="row">
                        <!--Inputs -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Topic Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" value="{{old('name')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" required>
                                    {{old('description')}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12 centered">
                            <button type="submit" class="btn btn-primary">Create a Topic</button>
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