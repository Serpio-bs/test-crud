@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Edit Section</div>
        <div class="card-body">
            <form method="post" action="{{ route('sections.update', $section->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form"> Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" value="{{ $section->name }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Description</label>
                    <div class="col-sm-10">
                        <input type="text" name="description" class="form-control" value="{{ $section->description }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-label-form">Published</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="published"  value="0"/>
                        <input type="checkbox" name="published"  value="1" {{ $section->published=="published" ? 'checked' : '' }}/>
                    </div>
                </div>

                <div class="text-center">
                    <input type="hidden" name="hidden_id" value="{{ $section->id }}" />
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </form>
        </div>
    </div>

@endsection('content')
