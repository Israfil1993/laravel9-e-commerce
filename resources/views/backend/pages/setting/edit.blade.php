@extends('layouts.backend.app')
@section('title', 'Product-create')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Edit Setting</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Setting</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form role="form" action="{{route('backend.setting.update')}}" method="post"  enctype="multipart/form-data">
            <section class="content">
                @csrf
                <div class="row">
                    <div class="card card-yellow card-tabs col-12" >
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-general-tab" data-toggle="pill" href="#custom-tabs-one-general" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-smtp-tab" data-toggle="pill" href="#custom-tabs-one-smtp" role="tab" aria-controls="custom-tabs-one-smtp" aria-selected="false">Smtp Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-social-tab" data-toggle="pill" href="#custom-tabs-one-social" role="tab" aria-controls="custom-tabs-one-social" aria-selected="false">Social Media</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-about-tab" data-toggle="pill" href="#custom-tabs-one-about" role="tab" aria-controls="custom-tabs-one-about" aria-selected="false">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-contact-tab" data-toggle="pill" href="#custom-tabs-one-contact" role="tab" aria-controls="custom-tabs-one-contact" aria-selected="false">Contact Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-references-tab" data-toggle="pill" href="#custom-tabs-one-references" role="tab" aria-controls="custom-tabs-one-references" aria-selected="false">References</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-general" role="tabpanel" aria-labelledby="custom-tabs-one-general-tab">
                                    <input type="hidden" id="id" name="id"  value="{{$setting->id}}" class="form-control">
                                    <div class="form-group">
                                        <label >Title</label>
                                        <input type="text" id="title" name="title"  value="{{$setting->title}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label >Keywords</label>
                                        <input type="text" name="keywords" value="{{$setting->keywords}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Description</label>
                                        <input type="text" name="description"  value="{{$setting->description}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >company</label>
                                        <input type="text" name="company" value="{{$setting->company}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Address</label>
                                        <input type="text" name="address" class="form-control"  value="{{$setting->address}}"  >
                                    </div>
                                    <div class="form-group">
                                        <label >Phone</label>
                                        <input type="text" name="phone" value="{{$setting->phone}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >email</label>
                                        <input type="text" name="email"  value="{{$setting->email}}" class="form-control"   >
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            <option selected="selected">{{$setting->status}}</option>
                                            <option>True</option>
                                            <option>False</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-smtp" role="tabpanel" aria-labelledby="custom-tabs-one-smtp-tab">
                                    <div class="form-group">
                                        <label >Smtp Server</label>
                                        <input type="text" name="smtpserver"  value="{{$setting->smtpserver}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Smtp Email</label>
                                        <input type="text" name="smtpemail"  value="{{$setting->smtpemail}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Smtppassword</label>
                                        <input type="password" name="smtppassword"  value="{{$setting->smtppassword}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Smtpport</label>
                                        <input type="number" name="smtpport"  value="{{$setting->smtpport}}" class="form-control"   >
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-social" role="tabpanel" aria-labelledby="custom-tabs-one-social-tab">
                                    <div class="form-group">
                                        <label >Fax</label>
                                        <input type="text" name="fax"  value="{{$setting->fax}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Facebook</label>
                                        <input type="text" name="facebook"  value="{{$setting->facebook}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Instagram</label>
                                        <input type="text" name="instagram"  value="{{$setting->instagram}}" class="form-control"   >
                                    </div>
                                    <div class="form-group">
                                        <label >Twitter</label>
                                        <input type="text" name="twitter"  value="{{$setting->twitter}}" class="form-control"   >
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-about" role="tabpanel" aria-labelledby="custom-tabs-one-about-tab">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">About Us</label>
                                        <textarea class="form-control" id="aboutus" name="aboutus">

                            </textarea>
                                        <script>
                                            ClassicEditor
                                                .create( document.querySelector( '#aboutus' ) )
                                                .then( editor => {
                                                    console.log( editor );
                                                } )
                                                .catch( error => {
                                                    console.error( error );
                                                } );
                                        </script>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-contact" role="tabpanel" aria-labelledby="custom-tabs-one-contact-tab">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact Page</label>
                                        <textarea class="form-control" id="contact" name="contact">

                            </textarea>
                                        <script>
                                            ClassicEditor
                                                .create( document.querySelector( '#contact' ) )
                                                .then( editor => {
                                                    console.log( editor );
                                                } )
                                                .catch( error => {
                                                    console.error( error );
                                                } );
                                        </script>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-references" role="tabpanel" aria-labelledby="custom-tabs-one-references-tab">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">references</label>
                                        <textarea class="form-control" id="references" name="references">

                            </textarea>
                                        <script>
                                            ClassicEditor
                                                .create( document.querySelector( '#references' ) )
                                                .then( editor => {
                                                    console.log( editor );
                                                } )
                                                .catch( error => {
                                                    console.error( error );
                                                } );
                                        </script>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update Setting</button>
                                </div>
                            </div>

                        </div>

                        <!-- /.card -->
                    </div>

                </div>


            </section>
            <!-- /.content -->
        </form>
    </div>
@endsection
