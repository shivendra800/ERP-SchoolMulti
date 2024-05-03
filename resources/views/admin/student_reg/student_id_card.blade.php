{{-- @extends('admin.layouts.layout')
@section('title', 'Student Wise Id Card')

@section('content') --}}

    <style>
        body {
            background-color: #d7d6d3;
            font-family: 'verdana';
        }

        .id-card-holder {
            width: 225px;
            padding: 4px;
            margin: 0 auto;
            background-color: #1f1f1f;
            border-radius: 5px;
            position: relative;
        }

        .id-card-holder:after {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            border-radius: 0 5px 5px 0;
        }

        .id-card-holder:before {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            left: 222px;
            border-radius: 5px 0 0 5px;
        }

        .id-card {

            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 1.5px 0px #b9b9b9;
        }

        .id-card img {
            margin: 0 auto;
        }

        .header img {
            width: 100px;
            margin-top: 15px;
        }

        .photo img {
            width: 80px;
            margin-top: 15px;
        }

        h2 {
            font-size: 15px;
            margin: 5px 0;
        }

        h3 {
            font-size: 12px;
            margin: 2.5px 0;
            font-weight: 300;
        }

        .qr-code img {
            width: 50px;
        }

        p {
            /* font-size: 5px; */
            margin: 2px;
        }

        .id-card-hook {
            background-color: #000;
            width: 70px;
            margin: 0 auto;
            height: 15px;
            border-radius: 5px 5px 0 0;
        }

        .id-card-hook:after {
            content: '';
            background-color: #d7d6d3;
            width: 47px;
            height: 6px;
            display: block;
            margin: 0px auto;
            position: relative;
            top: 6px;
            border-radius: 4px;
        }

        .id-card-tag-strip {
            width: 45px;
            height: 40px;
            background-color: #0950ef;
            margin: 0 auto;
            border-radius: 5px;
            position: relative;
            top: 9px;
            z-index: 1;
            border: 1px solid #0041ad;
        }

        .id-card-tag-strip:after {
            content: '';
            display: block;
            width: 100%;
            height: 1px;
            background-color: #c1c1c1;
            position: relative;
            top: 10px;
        }

        .id-card-tag {
            width: 0;
            height: 0;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
            border-top: 100px solid #0958db;
            margin: -10px auto -30px auto;
        }

        .id-card-tag:after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-top: 100px solid #d7d6d3;
            margin: -10px auto -30px auto;
            position: relative;
            top: -130px;
            left: -50px;
        }
    </style>

    <div class="id-card-tag"></div>
    <div class="id-card-tag-strip"></div>
    <div class="id-card-hook"></div>
    <div class="id-card-holder">
        <div class="id-card">
            <div class="header">
                @if (!empty($studentidcard['getschooldata']['getschooldat']['logo_image']))
                <?php $image_path = '/admin_assets/school_logo/'.$studentidcard['getschooldata']['getschooldat']['logo_image']; ?>
                <img src="{{ public_path() . $image_path }}" style="width: 60px; height:60px;">
              
              
            @else
                <img style="width: 60px; height:60px;" src=" {{ asset('admin_assets/school_logo/no-image.png') }}">
            @endif
            </div>
            <div class="photo">

                <?php $image_path = '/upload/student_images/'.$studentidcard['stu_image']; ?>
                <img src="{{ public_path() . $image_path }}" style="width: 60px; height:60px;">
             
            </div>
            <h2><span class="text-danger">Name:</span> {{ $studentidcard['s_name'] }}</h2>
            
            <h3><span class="text-danger">ID:</span> {{ $studentidcard['student_id'] }}</h3>
            <h3><span class="text-danger">Class:</span> {{ $studentidcard['classdata']['class_name'] }}</h3>
            {{-- <h3>Section: {{ $studentidcard['sectiondata']['section_name'] }}</h3> --}}
            <h3><span class="text-danger">Mobile:</span> {{ $studentidcard['f_mobile_no'] }}</h3>
            <h3><span class="text-danger">Address:</span> {{ $studentidcard['s_address'] }}</h3>
            <hr>
            <p style="font-size: 5px"><strong>{{ $studentidcard['getschooldata']['getschooldat']['school_name'] }}</strong>{{ $studentidcard['getschooldata']['getschooldat']['school_address'] }}
            <p style="font-size: 5px">Ph: {{ $studentidcard['getschooldata']['getschooldat']['mobile_no'] }} | E-ail:
                {{ $studentidcard['getschooldata']['getschooldat']['email'] }}</p>

        </div>
    </div>


{{-- @endsection --}}
