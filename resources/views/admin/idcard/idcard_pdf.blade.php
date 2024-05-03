<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>All Student ID Card</title>
    
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
  </head>
  <body>
    <div class="id-card-tag"></div>
    <div class="id-card-tag-strip"></div>
    <div class="id-card-hook"></div>
    @foreach ($allData as $value)
    
    <div class="id-card-holder">

        <div class="id-card">
            <div class="header">
                @if (!empty($details['getschooldata']['getschooldat']['logo_image']))
                    <?php $image_path = '/admin_assets/school_logo/' . $value['getschooldata']['getschooldat']['logo_image']; ?>
            <img src="{{ public_path() . $image_path }}" style="width: 60px; height:60px;">
                @else
                    <img style="width: 60px; height:60px;" src=" {{ asset('admin_assets/school_logo/no-image.png') }}">
                @endif
            </div>

            <div class="photo">

                <?php $image_path = '/upload/student_images/' . $value['student']['stu_image']; ?>
            <img src="{{ public_path() . $image_path }}" style="width: 60px; height:60px;">

            </div>
            <h2><span class="text-danger">Name:</span> {{ $value['student']['s_name'] }}</h2>

            <h3><span class="text-danger">ID:</span> {{ $value['student']['student_id'] }}</h3>
            <h3><span class="text-danger">Class:</span> {{ $value['student_class']['class_name'] }}</h3>
            {{-- <h3>Section: {{ $value['sectiondata']['section_name'] }}</h3> --}}
            <h3><span class="text-danger">Mobile:</span> {{ $value['student']['f_mobile_no'] }}</h3>
            <h3><span class="text-danger">Address:</span> {{ $value['student']['s_address'] }}</h3>

            <hr>
            <p style="font-size: 5px">
                <strong>{{ $value['getschooldata']['getschooldat']['school_name'] }}</strong>{{ $value['getschooldata']['getschooldat']['school_address'] }}
            <p style="font-size: 5px">Ph: {{ $value['getschooldata']['getschooldat']['mobile_no'] }} | E-ail:
                {{ $value['getschooldata']['getschooldat']['email'] }}</p>

        </div>

    </div>
    <br>
    <br>
@endforeach
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>



