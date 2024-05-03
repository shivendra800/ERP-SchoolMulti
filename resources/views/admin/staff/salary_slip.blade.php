<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        table td {
            line-height: 25px;
            padding-left: 15px;
        }

        table th {
            background-color: #fbc403;
            color: #363636;
        }

    </style>

</head>
<body>
    <table border="1">
        <tr height="100px" style="background-color:#363636;color:#ffffff;text-align:center;font-size:24px; font-weight:600;">
            <td colspan='2' style="background-color: #410808">
                @if(!empty($salarySlip['getschooldetails']['getschooldat']['logo_image']))
                <img style="width: 90px; height:90px; " src=" {{ asset('admin_assets/school_logo/'.$salarySlip['getschooldetails']['getschooldat']['logo_image']) }}">
                @else
                <img style="width: 90px; height:60px; " src=" {{ asset('admin_assets/school_logo/no-image.png') }}">
               @endif
                </td>
            <td colspan='2' style="background-color: #410808">{{ $salarySlip['getschooldetails']['getschooldat']['school_name'] }}</td>
        </tr>
        <tr>
            <th>Salary Slip NO:</th>
            <td>{{ $salarySlip['salaray_slip_no'] }}</td>
            <th>Employee Name</th>
            <td>{{ $salarySlip['staffdetails']['name'] }}</td>
        </tr>
        <!-----2 row--->
        <tr>
            <th>Bank Name</th>
            <td>{{ $salarySlip['staffdetails']['bank_name'] }}</td>
            <th>Bank A/c No.</th>
            <td>{{ $salarySlip['staffdetails']['account_no'] }}</td>
        </tr>
        <!------3 row---->
        <tr>
            <th>DOB</th>
            <td>{{ $salarySlip['staffdetails']['e_dob'] }}</td>
            <th>Salary Month Name</th>
            <td>{{ $salarySlip['salary_month'] }}</td>
        </tr>
        <!------4 row---->
        <tr>
            <th>Salary Paid Date</th>
            <td>{{ \Carbon\Carbon::parse($salarySlip['created_at'])->isoFormat('MMM Do YYYY')}}</td>
            <th>Total days</th>
            <td>30</td>
        </tr>
        <!------5 row---->
        <tr>
            <th>Location</th>
            <td>India</td>
            <th>Working Days</th>
            <td>30</td>
        </tr>
        <!------6 row---->
        <tr>
            <th>Empolyee ID Card</th>
            <td>{{ $salarySlip['staff_member_id'] }}</td>
            <th>Designation</th>
            <td>{{ $salarySlip['staff_type'] }}</td>
        </tr>
    </table>
    <tr></tr>
    <br />
    <table border="1">
        <tr>
            <th>Earnings</th>
            <th>Amount</th>
            <th>Deductions</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Basic Salary</td>
            <td>Rs.{{ $salarySlip['salary'] }}</td>
            <td>Provident Fund</td>
            <td>{{ $salarySlip['providant_fund'] }}</td>
        </tr>
        <tr>
            <td>Medical Allowance</td>
            <td>Rs.{{ $salarySlip['medical_allowance'] }}</td>
            <td>Employee Tax </td>
            <td>Rs.{{ $salarySlip['employee_tax'] }}</td>
        </tr>
        <tr>
            <td>Bonus</td>
            <td>Rs.{{ $salarySlip['bonus'] }}</td>
        </tr>
        <tr>
            <td>Transportation Allowance</td>
            <td>Rs.{{ $salarySlip['transportation_allow'] }}</td>
        </tr>
        <tr>
            <th>Gross Earnings</th>
            <td>Rs.{{ $salarySlip['total'] }}</td>
            <th>Gross Deductions</th>
            <td>Rs.{{ $salarySlip['total_dedunction'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td><strong>NET PAY</strong></td>
            <td>Rs.{{ $salarySlip['total_paid'] }}</td>
            <td></td>
        </tr>
    </table>
</body>
</html>
