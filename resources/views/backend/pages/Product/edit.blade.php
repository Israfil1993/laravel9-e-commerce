@extends('layouts.backend.app')
@section('title', 'Product-Edit')

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
                            <li class="breadcrumb-item active"><a href="{{ route('backend.product.index') }}">Add Product</a></li>
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
                    <form action="{{ route('backend.product.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control " select2 name="category_id" style="width: 100%;" >

                                    @foreach($category as $rs)
                                        <option  value="{{ $rs->id }}" @if($rs->id == $product->category_id) selected="selected" @endif>{{ $rs->title }}</option>

                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$product->title}}">
                            </div>
                            <div class="form-group">
                                <label >Keywords</label>
                                <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{$product->keywords}}">
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"  value="{{$product->description}}">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control @error('title') is-invalid @enderror" name="image">
                                @if($product->image)
                                    <img src="{{ Storage::url($product->image) }}" height="50" alt="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <input type="number" class="form-control @error('title') is-invalid @enderror" name="category_id" value="{{$product->category_id}}">
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <input type="number" class="form-control @error('title') is-invalid @enderror" name="user_id" value="{{$product->user_id}}">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control @error('title') is-invalid @enderror" name="price" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control @error('title') is-invalid @enderror" name="quantity" value="{{$product->quantity}}">
                            </div>
                            <div class="form-group">
                                <label>Minquantity</label>
                                <input type="number" class="form-control @error('title') is-invalid @enderror" name="minquantity" value="{{$product->minquantity}}">
                            </div>
                            <div class="form-group">
                                <label>Tax</label>
                                <input type="number" class="form-control @error('title') is-invalid @enderror" name="tax" value="{{$product->tax}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Detail </label>
                                <textarea class="form-control" id="detail" name="detail">

                            </textarea>
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '#detail' ) )
                                        .then( editor => {
                                            console.log( editor );
                                        } )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2 " name="status" style="width: 100%;">
                                    <option selected="selected"  value="0">{{ $product->status }}</option>
                                    <option value="0">False</option>
                                    <option  value="1">True</option>

                                </select>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                            <a href="{{ route('backend.product.index') }}" type="submit" class="btn btn-outline-danger">Back</a>
                        </div>

                    </form>

                </div>

                <div class="card-footer">
                </div>
            </div>
        </section>
    </div>
@endsection
