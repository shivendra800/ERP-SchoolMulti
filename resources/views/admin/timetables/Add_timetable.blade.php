@extends('admin.layouts.layout')
@section('title', $title)
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add TimeTable</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success:</strong> {{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <section class="content">
        <div class="container-fluid bg-info ">
            <div class="row p-3">

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Add TimeTable</h3>
                            <a href="{{url('/')}}/time-table" class="float-right"><Button class="btn btn-danger">Back</Button></a>
                        </div>
                        <div class="card-body text-dark">
                        <form method="post" action="{{url('/')}}/time-table/{{$getclass['id']}}">
                        @csrf
                          <div class="add_item">
                            <div class="row   p-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Select TimeTable Year <span class="text-danger">*</span></label>
                                         
                                        <div class="controls">
                                            <select name="year_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select
                                                    Year</option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}">
                                                        {{ $year->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="">Select Week Days<span class="text-danger">*</span></label>
                                     
                                    <div class="controls">
                                        <select name="week_days" required="" class="form-control">
                                            <option value="" selected="" disabled="">Select
                                                Week</option>
                                            @foreach ($weekdays as $week)
                                                <option value="{{ $week->id }}">
                                                    {{ $week->week_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> <!-- // end form group -->
                              </div>
                                 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Select stream <span class="text-danger">*</span></label>
                                         
                                        <div class="controls">
                                            <select name="stream_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select
                                                    stream</option>
                                                @foreach ($getstreamas as $stram)
                                                    <option value="{{ $stram->id }}">
                                                        {{ $stram->stream_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Select Section <span class="text-danger">*</span></label>
                                         
                                        <div class="controls">
                                            <select name="Section_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">Select
                                                    Section</option>
                                                @foreach ($getsection as $section)
                                                    <option value="{{ $section->id }}">
                                                        {{ $section->section_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Class Room Number <span class="text-danger">*</span></label>
                                         <input type="text" class="form-control" name="room_no" placeholder="Enter class Room Number"/>
                            
                                    </div> <!-- // end form group -->

                                </div>
                               

                            </div>
                            <div class="row">
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label for="">Select Class Period<span class="text-danger">*</span></label>
                                       
                                        <div class="controls">
                                            <select name="class_period[]" required=""
                                                class="form-control">
                                                <option value="">Select Period</option>
                                                <option value="Period-1">Period-1</option>
                                                <option value="Period-2">Period-2</option>
                                                  <option value="Period-3">Period-3</option>
                                                  <option value="Period-4">Period-4</option>
                                                  <option value="Period-5">Period-5</option>
                                                  <option value="Period-6">Period-6</option>
                                                  <option value="Period-7">Period-7</option>
                                                  <option value="Period-8">Period-8</option>
                                                  <option value="Period-9">Period-9</option>
                                                  <option value="Period-10">Period-10</option>
                                                  <option value="Period-11">Period-11</option>
                                                  <option value="Period-12">Period-12</option>
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Select  Teacher<span class="text-danger">*</span></label>
                                       
                                        <div class="controls">
                                            <select name="teacher_id[]" required=""
                                                class="form-control">
                                                <option value="" selected=""
                                                    disabled="">
                                                    Select Teacher</option>
                                               @foreach ($getteacher as $teacher)
                                                    <option value="{{ $teacher['getsubjectteacher']['id'] }}">
                                                        {{ $teacher['getsubjectteacher']['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Select Techer wise Subject<span class="text-danger">*</span></label>
                                       
                                        <div class="controls">
                                            <select name="subject_id[]" required=""
                                                class="form-control">
                                                <option value="" selected=""
                                                    disabled="">
                                                    Select Subject</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject['school_subject']['id'] }}">
                                                        {{ $subject['school_subject']['subject_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- // end form group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Class Start Time <span class="text-danger">*</span></label>
                                         <input required="" type="time" class="form-control" name="class_start_time[]" placeholder="Enter class Room Number"/>
                            
                                    </div> <!-- // end form group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Class End Time <span class="text-danger">*</span></label>
                                         <input required="" type="time" class="form-control" name="class_end_time[]" placeholder="Enter class Room Number"/>
                            
                                    </div> <!-- // end form group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="col-md-2" style="padding-top: 25px;">
                                        <span class="btn btn-success addeventmore"><i
                                                class="fa fa-plus-circle"></i> </span>
                                    </div><!-- End col-md-5 -->
                                </div>
                              
                            </div>
                           
                          </div>
                         
                          <div class="row">
                            <div class="text-center">
                                <input type="submit" class="btn btn-rounded  bg-maroon color-palette mb-5"
                                    value="Submit">
                            </div>
                          </div>
                        </form>

                           
                          

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>



    <div style="visibility: hidden;">
       
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <hr>
                <div class="form-row">

                    <div class="col-md-3">

                        <div class="form-group">
                            <label for="">Select Class Period<span class="text-danger">*</span></label>
                           
                            <div class="controls">
                                <select name="class_period[]" required=""
                                    class="form-control">
                                    <option value="">Select Period</option>
                                    <option value="Period-1">Period-1</option>
                                    <option value="Period-2">Period-2</option>
                                      <option value="Period-3">Period-3</option>
                                      <option value="Period-4">Period-4</option>
                                      <option value="Period-5">Period-5</option>
                                      <option value="Period-6">Period-6</option>
                                      <option value="Period-7">Period-7</option>
                                      <option value="Period-8">Period-8</option>
                                      <option value="Period-9">Period-9</option>
                                      <option value="Period-10">Period-10</option>
                                      <option value="Period-11">Period-11</option>
                                      <option value="Period-12">Period-12</option>
                                </select>
                            </div>
                        </div> <!-- // end form group -->

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Select  Teacher<span class="text-danger">*</span></label>
                           
                            <div class="controls">
                                <select name="teacher_id[]" required=""
                                    class="form-control">
                                    <option value="" selected=""
                                        disabled="">
                                        Select Teacher</option>
                                   @foreach ($getteacher as $teacher)
                                        <option value="{{ $teacher['getsubjectteacher']['id'] }}">
                                            {{ $teacher['getsubjectteacher']['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <!-- // end form group -->

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Select Techer wise Subject<span class="text-danger">*</span></label>
                           
                            <div class="controls">
                                <select name="subject_id[]" required=""
                                    class="form-control">
                                    <option value="" selected=""
                                        disabled="">
                                        Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject['school_subject']['id'] }}">
                                            {{ $subject['school_subject']['subject_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <!-- // end form group -->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Class Start Time <span class="text-danger">*</span></label>
                             <input type="time" class="form-control" name="class_start_time[]" placeholder="Enter class Room Number"/>
                
                        </div> <!-- // end form group -->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Class End Time <span class="text-danger">*</span></label>
                             <input type="time" class="form-control" name="class_end_time[]" placeholder="Enter class Room Number"/>
                
                        </div> <!-- // end form group -->
                    </div>



                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                    </div><!-- End col-md-2 -->
                </div>
                <hr>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", '.removeeventmore', function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });

        });
    </script>
@endsection

