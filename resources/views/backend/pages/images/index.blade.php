@extends('layouts.backend.app')
@section('title','Product')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <tr>
                            <td>
                                <a href="#" type="button" class="btn btn-block btn-success" style="width: 200px;">Add Product</a>
                            </td>
                        </tr>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            @if(count($images))
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Id</th>
                                                <th class="sorting sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">ProductId</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Actions</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="odd">
                                                @foreach($images as $rs)
                                                    <td class="dtr-control" tabindex="0">{{ $rs->id }}</td>
                                                    <td class="sorting_1">{{ $rs->product_id}}</td>
                                                    <td style="">{{ $rs->title}}</td>
                                                    <td style="">{{ $rs->image}}</td>
                                                    <td>

                                                        </a>
                                                        <form action="{{ route('backend.images.delete', ['pid'=>$rs->id]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" onclick="return confirm('Silmək istədiyinizdən əminsinizmi?')"  class="btn btn-outline-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-5">
                                        {!! $images->links()!!}

                                    </div>
                                    @else
                                        <div class="card-body">
                                            <div class="alert alert-info">No category</div>

                                        </div>
                                    @endif

                                </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>
@endsection

