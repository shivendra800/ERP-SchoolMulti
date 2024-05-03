
@extends('admin.layouts.layout')
@section('title', 'TimeTable class wise List')

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
            
            {{-- error meg with close button---- --}}
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            {{-- error meg --}}


            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">TimeTable ClassWise List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
									
			
                    <div class="card " >
                        <div class="card-body" >
                        <form method="post" action="{{ url('SaveUpdated-time-table') }}">
                            @csrf
                            <div class="row p-3" style="background-color: darkmagenta;">



                                <div class="col-md-2">

                                    <div class="form-group">
                                        <label class="text-white">Year <span class="text-danger"> </span></label>
                                        <div class="controls">
                                            <select name="year_id" id="year_id" required=""
                                                class="form-control">
                                                <option value="" selected="" disabled="">Select Year
                                                </option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div> <!-- End Col md 3 -->


 
                                <div class="col-md-2">

                                    <div class="form-group">
                                        <label class="text-white">Class <span class="text-danger"> </span></label>
                                        <div class="controls">
                                            <select name="class_id" id="class_id" required=""
                                                class="form-control">
                                                <option value="" selected="" disabled="">Select Class
                                                </option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id}}">{{ $class->class_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div> <!-- End Col md 3 -->
                                

                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-white">Select stream <span class="text-danger">*</span></label>
                                         
                                        <div class="controls">
                                            <select name="stream_id" id="stream_id" required="" class="form-control">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="text-white">Select Section <span class="text-danger">*</span></label>
                                         
                                        <div class="controls">
                                            <select name="Section_id" id="Section_id" required="" class="form-control">
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


                            




                                <div class="col-md-2 mt-4">

                                    <a id="search" class="btn btn-primary" name="search"> Search</a>

                                </div> <!-- End Col md 3 -->
                            </div><!--  end row -->


                            <!--  ////////////////// Mark Entry table /////////////  -->


                            <div class="row d-none mt-3" id="marks-entry">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped" style="width: 100%">
                                        <thead class="bg-warning">
                                            <tr>
                                                <th>ID No</th>
                                                <th>Year</th>
                                                <th>Week Day</th>
                                                <th>Class </th>
                                                <th>Subject </th>
                                                <th>Stream</th>
                                                <th>Section</th>
                                                <th>Room No</th>
                                                <th>Class Period  </th>
                                                <th>Class Start Time</th>
                                                <th>Class Start Time</th>
                                                <th>Current Treacher </th>
                                                <th>Update Treacher </th>
                    
                                            </tr>
                                        </thead>
                                        <tbody id="marks-entry-tr">

                                        </tbody>

                                    </table>
                                    <input type="submit" class="btn btn-rounded btn-primary" value="Submit">

                                </div>

                            </div>


                        </form>
                        </div>
                    </div>
                </div>
            </div>
          

          
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
@section('script')


<script type="text/javascript">
    $(document).on('click', '#search', function() {
       
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var stream_id = $('#stream_id').val();
        var Section_id = $('#Section_id').val();
        $.ajax({
            url: "{{ url('/') }}/Get-timetbaledata",
            type: "GET",
            data: {
                'year_id': year_id,
                'class_id': class_id,
                'stream_id': stream_id,
                'Section_id': Section_id,
            },
            success: function(data) {
                console.log('j',data);
                $('#marks-entry').removeClass('d-none');
                var html = '';
                $.each(data, function(key, v) {
                    html +=
                        '<tr>' +
                        '<td>' + v.id + '</td>' +
                        '<input type="hidden" name="time_table_id[]" value="' + v.id +'">' +
                        
                        '<td>' + v.getyears.name + '</td>' +
                        '<td>' + v.getweek.week_name + '</td>' +
                        '<td>' + v.student_class.class_name +
                        '<td>' + v.school_subject.subject_name + '</td>' +
                        '<td>' + v.getstream.stream_name +
                        '<td>' + v.getsection.section_name +
                        '<td>' + v.room_no + '</td>' +
                        '<td>' + v.class_period + '</td>' +
                        '<td><input type="time" class="form-control form-control-sm" name="class_start_time[]" value=' + v.class_start_time +' ></td>' +
                        '<td><input type="time" class="form-control form-control-sm" name="class_end_time[]" value=' + v.class_end_time +' ></td>' +
                        '<td>' + v.getteacher.name + '</td>' +
                        '<td> <select name="teacher_id[]" id="teacher_id" required="" class="form-control"><option value="' + v.teacher_id +'" selected="" >Select Teacher</option>@foreach ($getteacher as $teacher)<option value="{{ $teacher['getsubjectteacher']['id']}}">{{ $teacher['getsubjectteacher']['name'] }}</option>@endforeach</select></td>' +
                        '</tr>';
                });
                html = $('#marks-entry-tr').html(html);
            }
        });
    });
</script>





@endsection
