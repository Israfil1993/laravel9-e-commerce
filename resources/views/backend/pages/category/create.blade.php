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
                    <form action="{{ route('backend.category.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control " select2 name="parent_id" style="width: 100%;" >
                                    <option selected="selected"  value="0">Main Category</option>
                                    @foreach($category as $rs)
                                        <option value="{{ $rs->id }}">{{ \App\Http\Controllers\Backend\CategoryController::getParentsTree($rs, $rs->title) }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                            </div>
                            <div class="form-group">
                                <label >Keywords</label>
                                <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords">
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" >
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2 " name="status" style="width: 100%;">
                                    <option selected="selected"  value="0">False</option>
                                    <option  value="1">True</option>

                                </select>
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
