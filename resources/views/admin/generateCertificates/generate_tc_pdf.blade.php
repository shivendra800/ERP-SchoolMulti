<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 6px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 3px;
  padding-bottom: 3px;
  text-align: left;
  background-color: #f4f8f4;
  color: rgb(11, 10, 10);
}
</style>

</head>
<body>


<table id="customers">
  <tr>
    <td><h2>
   <?php $image_path = '/admin_assets/school_logo/'.$getstudentDetails['getschooldata']['getschooldat']['logo_image']; ?>
   <img src="{{ public_path() . $image_path }}" width="200" height="100">
 
     </h2></td>
     <td><h2>{{ $getstudentDetails['getschooldata']['getschooldat']['school_name'] }} </h2>
 {{-- <p>School Address</p> --}}
 <p>Phone : {{ $getstudentDetails['getschooldata']['getschooldat']['mobile_no']}}</p>
 <p>Email : {{$getstudentDetails['getschooldata']['getschooldat']['email']}}</p>
 
     </td> 
   </tr>
  
   
</table>

<table id="customers">
  <tr>
  <td style="text-align: center"> <h3>Transfer Certificate</h3></td>
  </tr>

</table>



<table id="customers">
 
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Student Name</b></td>
    <td>{{ $getstudentDetails['student']['s_name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Student ID No</b></td>
    <td>{{ $getstudentDetails['student']['student_id'] }}</td>
  </tr>

    <tr>
    <td>3</td>
    <td><b>Student Role</b></td>
    <td>{{ $getstudentDetails['student']['reg_no'] }}</td>
  </tr>

  <tr>
    <td>4</td>
    <td><b>Father's Name</b></td>
    <td>{{ $getstudentDetails['student']['father_name'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Mother's Name</b></td>
    <td>{{ $getstudentDetails['student']['mother_name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Mobile Number </b></td>
    <td>{{ $getstudentDetails['student']['f_mobile_no'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Address</b></td>
    <td>{{ $getstudentDetails['student']['s_address'] }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Gender</b></td>
    <td>{{ $getstudentDetails['student']['s_gender'] }}</td>
  </tr>

    <tr>
    <td>9</td>
    <td><b>Religion</b></td>
    <td>{{ $getstudentDetails['student']['s_relision'] }}</td>
  </tr>


    <tr>
    <td>10</td>
    <td><b>Date of Birth</b></td>
    <td>{{ $getstudentDetails['student']['s_dob'] }}</td>
  </tr>
    <tr>
    <td>11</td>
    <td><b>School/Board/Annual Examination last taken with result </b></td>
    <td>Passed</td>
  </tr>
  <tr>
    <td>11</td>
    <td><b>Whether Qualified for promotion to the next higher class :</b></td>
    <td>Yes</td>
  </tr>
  <tr>
    <td>12</td>
    <td><b>Whether the pupil has paid all dues to the vidyalaya  </b></td>
    <td>Yes</td>
  </tr>

  <tr>
    <td>13</td>
    <td><b>Year </b></td>
    <td>{{ \Carbon\Carbon::parse($getstudentDetails['created_at'])->isoFormat('YYYY')}}</td>
  </tr>
    <tr>
    <td>14</td>
    <td><b>Class  </b></td>
    <td>{{ $getstudentDetails['student_class']['class_name'] }}</td>
  </tr>
    <tr>
    <td>15</td>
    <td><b>Stream </b></td>
    <td>{{$getstudentDetails['student_stream']['stream_name'] }}</td>
  </tr>
</tr>
<tr>
<td>16</td>
<td><b> Date of issue of certificate  </b></td>
<td>{{ date("d M Y") }}</td>
</tr>

<tr>
  <td>17</td>
  <td><b> General conduct : </b></td>
  <td>GOOD</td>
  </tr>
  
 
   
</table>
<br>
<table id="customers">
  <tr>
  <td style="text-align: center"> <h5>
    Prepared by</h5></td>
  <td style="text-align: center"> <h5>Checked by</h5></td>
  <td style="text-align: center"> <h5>Sign. of Principal</h5>
    <span>(Official Seal)</span>
  </td>
  </tr>

</table>


</body>
</html>
