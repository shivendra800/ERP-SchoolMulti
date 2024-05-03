@extends('admin.layouts.layout')
@section('title', 'ContentUnit List')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ContentUnit List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">ContentUnit List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header  ">
                            <h3 class="card-title text-center">
                                <a href="#"> <button type="button"
                                        class="btn btn-block bg-maroon color-palette btn-flat ">All Uploaded ContentUnit List</button></a>
                            </h3>
                        </div>
                    </div>



                    <div class="card bg-info">
                        <div class=" card-header ">
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-primary card-outline">
                                      
                                       
                                        <!-- /.card-body -->
                                        <div class="card-footer ">
                                          <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                            @if(!empty($subjectwiseunitlist))
                                            @foreach ($subjectwiseunitlist as $subjectwiseunitlist)
                                            @if(substr ($subjectwiseunitlist['upload_note'], -3)  == "pdf")

                                            <li style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                              
                                                <div class="mailbox-attachment-info">
                                                  <a href="{{url('/')}}/document/upload_note/{{$subjectwiseunitlist['upload_note']}}" class="mailbox-attachment-name" target="_blank"><i class="fas fa-paperclip"></i> {{$subjectwiseunitlist['topic_name']}}</a>
                                                      <span class="mailbox-attachment-size clearfix mt-1">
                                                        <span>{{$subjectwiseunitlist['upload_note']}}</span>
                                                        <a href="{{url('/')}}/document/upload_note/{{$subjectwiseunitlist['upload_note']}}" class="btn btn-default btn-sm float-right" download=""><i class="fas fa-cloud-download-alt"></i></a>
                                                      </span>
                                                </div>
                                              </li>
                                              @elseif(substr ($subjectwiseunitlist['upload_note'], -3)  == "png" || substr ($subjectwiseunitlist['upload_note'], -3)  == "jpg")

                                              <li style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <span class="mailbox-attachment-icon has-img"><img src="{{url('/')}}/admin_assets/education-supplies-concept-isola.png" alt="Attachment"></span>
                              
                                                <div class="mailbox-attachment-info">
                                             
                                                  <a href="{{url('/')}}/document/upload_note/{{$subjectwiseunitlist['upload_note']}}" target="_blank" class="mailbox-attachment-name"><i class="fas fa-camera"></i> {{$subjectwiseunitlist['topic_name']}}</a>
                                                      <span class="mailbox-attachment-size clearfix mt-1">
                                                        <span>{{$subjectwiseunitlist['upload_note']}}</span>
                                                        <a href="{{url('/')}}/document/upload_note/{{$subjectwiseunitlist['upload_note']}}" download="" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                                      </span>
                                                </div>
                                              </li>
                                             
                                              
                                              @endif
                                                
                                            @endforeach
                                            
                                            @else
                                            <div class="col-md-12 text-center" >
                                                <span class=" btn btn-danger p-3">Opps! There is no unit content uploaded Yet!</span>
                                            </div>
                                            
                                            @endif
                                           
                                          </ul>
                                        </div>
                                      
                                      </div>
                                </div>
                              </div>

                        </div>
                        <!-- /.card-header -->

                       
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>



@endsection
