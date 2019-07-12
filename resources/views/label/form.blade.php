@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Label</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/api/labels" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" name="Name" id="Name" @isset($isEdit) value="{{ $Name }}" @endisset />
                                </div>
                                <div class="form-group">
                                    <label for="Slug">Slug</label>
                                    <input type="text" class="form-control" name="Slug" id="Slug"  @isset($isEdit) value="{{ $Slug }}" @endisset />
                                </div>
                                <div class="form-group">
                                    <label for="Path">Path</label>
                                    <input type="text" class="form-control" name="Path" id="Path"  @isset($isEdit) value="{{ $Path }}" @endisset />
                                </div>
                                <div class="form-group">
                                    <label for="TextColour">Text Colour</label>
                                    <input type="text" class="form-control" name="TextColour" id="TextColour" @isset($isEdit) value="{{ $TextColour }}" @endisset />
                                </div>
                                <div class="form-group">
                                    <label for="BGColour">Background Colour</label>
                                    <input type="text" class="form-control" name="BGColour" id="BGColour"  @isset($isEdit) value="{{ $BGColour }}" @endisset />
                                </div>

                                <button type="submit" class="btn btn-primary">Add Label</button>
                            </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
