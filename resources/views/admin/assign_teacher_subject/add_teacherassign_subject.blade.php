@extends('admin.layouts.layout')

@section('title', 'Add-TeacherAssign-Subject')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <section class="content-header">
        <div class="container-fluid">
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
                    <h1>Add-TeacherAssign-Subject </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Add-TeacherAssign-Subject</li>

                    </ol>
                </div>


            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid bg-info ">
            <div class="row p-3">
              

                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header bg-navy disabled color-palette">
                            <h3 class="card-title">Add-TeacherAssign-Subject</h3>
                        </div>
                        <div class="card-body text-dark">


                            <form method="post" action="{{ url('TeacherAssign-subject-save') }}" class="forms-sample">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-fields product_data">

                                            <div class="form-group">
                                                <h5>Select Teacher ID<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="teacher_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Teacher
                                                        </option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">
                                                                {{ $teacher->id }}--{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> <!-- // end form group -->

                                            <div class="form-group">
                                                <h5>Select Year<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="year_id" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Year
                                                        </option>
                                                        @foreach ($years as $years)
                                                            <option value="{{ $years->id }}">
                                                                 {{ $years->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> <!-- // end form group -->


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Select Class <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="class_id[]" required=""  
                                                                class="form-control class_id" onchange="getItemprice(this);">
                                                                <option value="" selected="" disabled="">Select
                                                                    Menu Item</option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}">
                                                                        {{ $class->class_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> <!-- // end form group -->
                                                </div> <!-- End col-md-5 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Select Subject <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subject_id[]" required=""  
                                                                class="form-control subject_id" >
                                                                <option value="" selected="" disabled="">Select
                                                                    Menu Item</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div> <!-- // end form group -->
                                                </div> <!-- End col-md-5 -->
 
                                            </div> <!-- end Row -->

                                        </div>
                                        <div class="col-md-2" style="padding-top: 25px;">
                                            <span class="btn btn-success addeventmore" id="add-more-field"><i
                                                    class="fa fa-plus-circle"></i> </span>
                                        </div>

                                        <div class="text-center">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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




   
    <script type="text/javascript">
      $(document).ready(function() {
        getItemprice();
      });
        function getItemprice(ele) {
            // var item_id = $(".item_id").val();
            var class_id = $(ele).closest('.product_data').find('.class_id').val();
            var subject_id = "{{ old('subject_id') }}";
            // alert(class_id);

            $.ajax({
                url: "{{ url('/') }}/getclasswisesubject/" + class_id,
                dataType: "json",
                success: function(data) {
                    console.log("data", data);
                    // console.log("hhghg",data.data[0].menu_item_price);
                    // var price = document.getElementById("price").value = data.data[0].menu_item_price;
                    // $(ele).closest('.product_data').find('.itemprice').val(data.data[0].menu_item_price);
                    // $(ele).closest('.product_data').find('.menu_cat_id').val(data.data[0].menu_cat_id);
                    // $(ele).closest('.product_data').find('.menu_subcat_id').val(data.data[0].menu_subcat_id);

                    var option = "<option value=''>Select Subject</option>";
                    for (var i = 0; i < data.data.length; i++) {
                        if (subject_id == data.data[i].id) {
                            option += "<option selected value=" + data.data[i].subject_id + ">" + data.data[
                                    i]
                                .subject_name + "</option>";
                        } else {
                            option += "<option value=" + data.data[i].subject_id + ">" + data.data[i]
                                .subject_name + "</option>";
                        }
                    }
                    // $(".subject_id").html(option);
                    $(ele).closest('.product_data').find('.subject_id').html(option);


                }
            });
        }

        // /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////

        $(document).ready(function() {
            // Add More buuton work ----jquery here
            $(function() {
                var max_fields = 10;
                var x = 1;
                var more_fields = `
                                       
                                         
                                         <div class="row One-div product_data">
                                            
                                               <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Select Class <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="class_id[]" required=""  
                                                                class="form-control class_id" onchange="getItemprice(this);">
                                                                <option value="" selected="" disabled="">Select
                                                                    Menu Item</option>
                                                                @foreach ($classes as $class)
                                                                    <option value="{{ $class->id }}">
                                                                        {{ $class->class_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div> <!-- // end form group -->
                                                </div> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Select Subject <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subject_id[]" required=""  
                                                                class="form-control subject_id">
                                                                <option value="" selected="" disabled="">Select
                                                                    Menu Item</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div> <!-- // end form group -->
                                                </div> 
                                              
                                           
                                           
                                          
                                           <a href="#" class="delete  ">Delete</a>
                                        </div>
                                       
                                           
                     
                `;
                //  add more button --
                $('#add-more-field').on('click', (function(e) {

                    e.preventDefault();
                    if (x < max_fields) {
                        x++;
                        $(".input-fields").append(more_fields);
                    } else {
                        alert('You Reached the limits')
                    }
                }));
                // delete button--
                $(".input-fields").on("click", ".delete", function(e) {
                    e.preventDefault();
                    $(this).parent('.One-div').remove();
                    x--;

                })



            }); //add more button function end -----------------------


        });
    </script>



@endsection
