
<style>
    body {
        margin-top: 20px;
        background-color: #f7f7ff;
    }

    #invoice {
        padding: 0px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #0d6efd
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #0d6efd
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #0d6efd;
        background: #e7f2ff;
        padding: 10px;
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,
    .invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #0d6efd;
        font-size: 1.2em
    }

    .invoice table .qty,
    .invoice table .total,
    .invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #0d6efd
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #0d6efd;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0);
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }

    .invoice table tfoot tr:last-child td {
        color: #0d6efd;
        font-size: 1.4em;
        border-top: 1px solid #0d6efd
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px !important;
            overflow: hidden !important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #0d6efd;
        background: #e7f2ff;
        padding: 10px;
    }

</style>
<link rel="stylesheet" href="{{ url('/') }}/admin_assets/fee/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin_assets/fee/style.css"/>
<script src="{{ url('/') }}/admin_assets/fee/jquery.min.js"></script>
<script src="{{ url('/') }}/admin_assets/fee/app.js"></script>
<script src="{{ url('/') }}/admin_assets/fee/html2canvas.js"></script>
<script src="{{ url('/') }}/admin_assets/fee/jspdf.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div class="invoice-4 invoice-content">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="invoice-inner clearfix">
                <div class="invoice-info clearfix" id="invoice_wrapper">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div id="invoice">
                                    <div class="invoice overflow-auto">
                                        <div style="min-width: 600px">
                                            <header>
                                                <div class="row">
                                                    <div class="col">
                                                        @if(!empty($getstudentfeeReport['getschooldata']['getschooldat']['logo_image']))
                                                        <img style="width: 150; height:150; " src=" {{ asset('admin_assets/school_logo/'.$getstudentfeeReport['getschooldata']['getschooldat']['logo_image']) }}">
                                                        @else
                                                        <img style="width: 150; height:150px; " src=" {{ asset('admin_assets/school_logo/no-image.png') }}">
                                                    @endif
                                                    </div>
                                                    <div class="col company-details">
                                                        <h2 class="name">
                                                            <a target="_blank" href="javascript:;">
                                                                
                                                                {{ $getstudentfeeReport['getschooldata']['getschooldat']['school_name'] }}
                                                            </a>
                                                        </h2>
                                                        <div>{{ $getstudentfeeReport['getschooldata']['getschooldat']['school_address'] }}</div>
                                                        <div>(+91) {{ $getstudentfeeReport['getschooldata']['getschooldat']['mobile_no'] }}</div>
                                                        <div class="email"><a href="mailto:{{ $getstudentfeeReport['getschooldata']['getschooldat']['email'] }}">{{ $getstudentfeeReport['getschooldata']['getschooldat']['email'] }}</a>
                                                    </div>
                                                </div>
                                            </header>
                                            <main>
                                                <div class="row contacts">
                                                    <div class="col invoice-to">
                                                        <div class="text-gray-light">INVOICE TO: </div>
                                                        <span class="to">ID: <strong>{{ $getstudentfeeReport['student']['student_id'] }}</strong></span><br> 
                                                        <span class="to">STD Name: <strong>{{ $getstudentfeeReport['student']['s_name'] }}</strong></span><br>
                                                        <span class="to">Class: <strong>{{ $getstudentfeeReport['getclass']['class_name'] }}</strong></span><br>
                                                        
                                                        
                                                      
                                                      </a>
                                                    </div>
                                                    
                                                    <div class="col invoice-details">
                                                        <h4 class="invoice-id text-dark">INVOICE # <strong class="text-primary">{{ $getstudentfeeReport['inovice_no'] }}</strong></h4>
                                                        <div class="date">Date of Invoice: {{ date('d-m-Y ',strtotime($getstudentfeeReport['created_at'])) }}</div>
                                                    </div>
                                                </div>
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th class="text-left">Month</th>
                                                            <th class="text-left">Fee Amount</th>
                                                            <th class="text-right">Fine</th>
                                                            <th class="text-right">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td >1</td>
                                                            <td>{{ $getstudentfeeReport['getmonth']['month'] }}</td>
                                                            <td class="text-left">
                                                                <h3>
                                                                    <a target="_blank" href="javascript:;">
                                                                        {{ $getstudentfeeReport['fee_amount'] }}
                                                                    </a>
                                                                </h3>
                                                            </td>
                                                            <td class="text-left">
                                                                <h3>
                                                                    <a target="_blank" href="javascript:;">
                                                                        {{ $getstudentfeeReport['late_fee_charges'] }}
                                                                    </a>
                                                                </h3>
                                                            </td>
                                                           
                                                            <td >Rs.{{ $getstudentfeeReport['total_fee_amount'] }}</td>
                                                        </tr>

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">SUBTOTAL</td>
                                                            <td>Rs.{{ $getstudentfeeReport['total_fee_amount'] }}</td>
                                                        </tr>
                                                      
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">GRAND TOTAL</td>
                                                            <td>Rs.{{ $getstudentfeeReport['total_fee_amount'] }}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="thanks">Thank you!</div>
                                                <div class="notices">
                                                    <div>NOTICE:</div>
                                                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                                                </div>
                                            </main>
                                            <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                                        </div>
                                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="invoice-btn-section clearfix d-print-none">
                    <a href="javascript:window.print()" class="btn btn-lg btn-print">
                        <i class="fa fa-print"></i> Print Invoice
                    </a>
                    <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                        <i class="fa fa-download"></i> Download Invoice
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- @endsection --}}
