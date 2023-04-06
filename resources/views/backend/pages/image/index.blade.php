@extends('layouts.backend.app')
@section('title','Image Gallery')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">

                <div class="content-header">
                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{$product->title}} Images</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('backend.images.create')
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">Id</th>

                                        <th>Title</th>
                                        <th>Image</th>
                                        <th style="width: 40px">Update</th>
                                        <th style="width: 40px">Delete</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $images as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->title}} </td>
                                            <td>
                                                @if ($rs->image)
                                                    <img src="{{Storage::url($rs->image)}}" style="height: 100px">
                                                @endif

                                            </td>
                                            <td> Edit</td>
                                            <td><a href="{{route('backend.images.destroy',['pid'=>$product->id,'id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm"
                                                   onclick="return confirm('Deleting !! Are you sure ?')">Delete</a>  </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </section>
                </div>






            </div>
        </section>
    </div>
@endsection

