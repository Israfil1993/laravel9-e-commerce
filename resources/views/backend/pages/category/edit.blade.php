@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Add Category</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('backend.category.index') }}">Add Category</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}

            </div>
        @endif
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.category.update', ['id'=>$category->id]) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control select2" name="parent_id" style="width: 100%;">
                                    <option value="0" selected="selected">Main Category</option>
                                    @foreach($categoryList as $rs)
                                        <option value="{{$rs->id}}"  @if ($rs->id ==  $category->parent_id)  selected="selected"  @endif >
                                            {{ \App\Http\Controllers\Backend\CategoryController::getParentsTree($rs, $rs->title) }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$category->title}}">
                            </div>
                            <div class="form-group">
                                <label >Keywords</label>
                                <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{$category->keywords}}">
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"  value="{{$category->description}}">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ isset($category) && $category->status  ? "checked" : "" }}>
                                <label class="form-check-label" for="status">
                                    Should the category be visible on the site?
                                </label>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                            <a href="{{ route('backend.category.index') }}" type="submit" class="btn btn-outline-danger">Back</a>
                        </div>

                    </form>

                </div>

                <div class="card-footer">
                </div>
            </div>
        </section>
    </div>
@endsection
