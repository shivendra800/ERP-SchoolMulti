<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester');

    .cursive {
        font-family: 'Pinyon Script', cursive;
    }

    .sans {
        font-family: 'Open Sans', sans-serif;
    }

    .bold {
        font-weight: bold;
    }

    .block {
        display: block;
    }

    .underline {
        border-bottom: 1px solid #777;
        padding: 5px;
        margin-bottom: 15px;
    }

    .margin-0 {
        margin: 0;
    }

    .padding-0 {
        padding: 0;
    }

    .pm-empty-space {
        height: 40px;
        width: 100%;
    }

    body {
        padding: 20px 0;
        background: #ccc;
    }

    .pm-certificate-container {
        position: relative;
        width: 800px;
        height: 600px;
        background-color: #618597;
        padding: 30px;
        color: #333;
        font-family: 'Open Sans', sans-serif;
        box-shadow: 0 0 5px rgba(0, 0, 0, .5);
        /*background: -webkit-repeating-linear-gradient(
    45deg,
    #618597,
    #618597 1px,
    #b2cad6 1px,
    #b2cad6 2px
  );
  background: repeating-linear-gradient(
    90deg,
    #618597,
    #618597 1px,
    #b2cad6 1px,
    #b2cad6 2px
  );*/

        .outer-border {
            width: 794px;
            height: 594px;
            position: absolute;
            left: 50%;
            margin-left: -397px;
            top: 50%;
            margin-top: -297px;
            border: 2px solid #fff;
        }

        .inner-border {
            width: 730px;
            height: 530px;
            position: absolute;
            left: 50%;
            margin-left: -365px;
            top: 50%;
            margin-top: -265px;
            border: 2px solid #fff;
        }

        .pm-certificate-border {
            position: relative;
            width: 720px;
            height: 520px;
            padding: 0;
            border: 1px solid #E1E5F0;
            background-color: rgba(255, 255, 255, 1);
            background-image: none;
            left: 50%;
            margin-left: -360px;
            top: 50%;
            margin-top: -260px;

            .pm-certificate-block {
                width: 650px;
                height: 200px;
                position: relative;
                left: 50%;
                margin-left: -325px;
                top: 70px;
                margin-top: 0;
            }

            .pm-certificate-header {
                margin-bottom: 10px;
            }

            .pm-certificate-title {
                position: relative;
                top: 40px;

                h2 {
                    font-size: 34px !important;
                }
            }

            .pm-certificate-body {
                padding: 20px;

                .pm-name-text {
                    font-size: 20px;
                }
            }

            .pm-earned {
                margin: 15px 0 20px;

                .pm-earned-text {
                    font-size: 20px;
                }

                .pm-credits-text {
                    font-size: 15px;
                }
            }

            .pm-course-title {
                .pm-earned-text {
                    font-size: 20px;
                }

                .pm-credits-text {
                    font-size: 15px;
                }
            }

            .pm-certified {
                font-size: 12px;

                .underline {
                    margin-bottom: 5px;
                }
            }

            .pm-certificate-footer {
                width: 650px;
                height: 100px;
                position: relative;
                left: 50%;
                margin-left: -325px;
                bottom: -105px;
            }
        }
    }

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
<link rel="stylesheet" href="{{ url('/') }}/admin_assets/fee/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ url('/') }}/admin_assets/fee/style.css" />
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
                                            <div class="container pm-certificate-container">
                                                <div class="outer-border"></div>
                                                <div class="inner-border"></div>

                                                <div class="pm-certificate-border col-xs-12">
                                                    <div class="row pm-certificate-header">
                                                        <div class="pm-certificate-title cursive col-xs-12 text-center">
                                                            
                                                            @if(!empty($genctlist['getschooldata']['getschooldat']['logo_image']))
                                                            <img style="width: 150; height:150; " src=" {{ asset('admin_assets/school_logo/'.$genctlist['getschooldata']['getschooldat']['logo_image']) }}">
                                                            @else
                                                            <img style="width: 150; height:150px; " src=" {{ asset('admin_assets/school_logo/no-image.png') }}">
                                                        @endif
                                                        </div>
                                                        <div class="pm-certificate-title cursive col-xs-12 text-center">
                                                            <h2>{{ $genctlist['getschooldata']['getschooldat']['school_name'] }}
                                                            </h2>
                                                        </div>
                                                    </div>

                                                    <div class="row pm-certificate-body">

                                                        <div class="pm-certificate-block">
                                                            <div class="col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-xs-2">
                                                                        <!-- LEAVE EMPTY -->
                                                                    </div>
                                                                    <div
                                                                        class="pm-certificate-name underline margin-0 col-xs-8 text-center">
                                                                        <span
                                                                            class="pm-name-text bold">{{ $genctlist['certificate_name'] }}-({{ $genctlist['student_year']['name'] }})</span>
                                                                    </div>
                                                                    <div class="col-xs-2">
                                                                        <!-- LEAVE EMPTY -->
                                                                    </div>
                                                                </div>
                                                            </div>

                                                           

                                                            {{-- <div class="col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-xs-2">
                                                                        <!-- LEAVE EMPTY -->
                                                                    </div>
                                                                    <div class="pm-course-title col-xs-8 text-center">
                                                                        <span class="pm-earned-text block cursive">while
                                                                            completing the training course
                                                                            entitled</span>
                                                                    </div>
                                                                    <div class="col-xs-2">
                                                                        <!-- LEAVE EMPTY -->
                                                                    </div>
                                                                </div>
                                                            </div> --}}

                                                            <div class="col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-xs-2">
                                                                        <!-- LEAVE EMPTY -->
                                                                    </div>
                                                                    <div class="pm-course-title underline col-xs-8 text-center">
                                                                        {{ $genctlist['part_name'] }}
                                                                        <span
                                                                            class="pm-credits-text block bold sans">{{ $genctlist['content'] }}</span>
                                                                    </div>
                                                                    <div class="col-xs-2">
                                                                        <!-- LEAVE EMPTY -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-xs-2">
                                                                        <!-- LEAVE EMPTY -->
                                                                    </div>
                                                                    <div class="pm-earned col-xs-8 text-center">
                                                                        <span
                                                                            class="pm-earned-text padding-0 block cursive">{{$genctlist['ownername']['name']}}</span>
                                                                        <span
                                                                            class="pm-credits-text block bold sans">Signatures</span>
                                                                    </div>
                                                                    <div class="col-xs-2">
                                                                        <!-- LEAVE EMPTY -->
                                                                    </div>
                                                                    <div class="col-xs-12"></div>
                                                                </div>
                                                            </div>

                                                      

                                                    </div>

                                                </div>
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
