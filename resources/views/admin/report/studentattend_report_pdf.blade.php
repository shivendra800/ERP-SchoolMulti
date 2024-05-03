<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>

  @if($allData->count() > 0)
    <table id="customers">
        <tr>
            <td>
                <h2>
                    <?php $image_path = '/admin_assets/school_logo/' . $allData['0']['getschooldata']['getschooldat']['logo_image']; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="100">

                </h2>
            </td>
            <td>
                <h2>{{ $allData['0']['getschooldata']['getschooldat']['school_name'] }} </h2>
                {{-- <p>School Address</p> --}}
                <p>Phone : {{ $allData['0']['getschooldata']['getschooldat']['mobile_no'] }}</p>
                <p>Email : {{ $allData['0']['getschooldata']['getschooldat']['email'] }}</p>

            </td>
        </tr>

    </table>
    <br> <br>
    <strong>Class Name : </strong>{{ $allData['0']['getclass']['class_name'] }} , <strong> Section :
    </strong>{{ $allData['0']['getsection']['section_name'] }}, <strong> Date : </strong>
    {{ $month_start }}----{{ $month_end }}
    <br> <br>
    <table id="customers">

        <tr>
            <td width="50%">
                <h4>Student Name</h4>
            </td>
            <td width="50%">
                <h4>Student ID</h4>
            </td>
            <td width="50%">
                <h4>Date</h4>
            </td>

            <td width="50%">
                <h4> Attend Status </h4>
            </td>
        </tr>

        @foreach ($allData as $value)
            <tr>
                <td width="50%"> {{ $value['getstudent']['s_name'] }} </td>
                <td width="50%"> {{ $value['getstudent']['student_id'] }} </td>
                <td width="50%"> {{ date('d-m-Y', strtotime($value->date)) }} </td>
                <td width="50%"> {{ $value->attend_status }} </td>
            </tr>
        @endforeach

        <tr>
            <td colspan="4">
                <strong>Total Absent : </strong> {{ $absents }} , <strong> Total Leave : </strong>
                {{ $leaves }}

            </td>
        </tr>

    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Print Data : {{ date('d M Y') }}</i>

    <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">
@else
 
<table id="customers">
  <tr>
      <td>
          <h2 >
          <strong style="color:red">Opps! There is no Attendance !</strong> 

          </h2>
      </td>
     
  </tr>

</table>

@endif



</body>

</html>
