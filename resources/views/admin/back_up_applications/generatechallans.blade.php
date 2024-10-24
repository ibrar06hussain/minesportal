@extends('layouts.leaseApplications')


<link href="https://fonts.googleapis.com/css2?family=Carlito:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

<style>

  @media print {
    @page {
      size: A4 landscape; /* Set page orientation to landscape */
      margin: 20mm; /* Adjust margins as needed */
    }

    /* Additional print styles */
    body {
      margin: 0;
      padding: 0;
    }

    .no-print {
      display: none; /* Hide elements not needed in print */
    }
  }

        p{
            font-family: "Carlito", system-ui;
            margin: 7px 0px;
        }


        td {
            border-right: solid 1px;
            font-family: "Carlito", system-ui;
            padding-left: 7px;
        }
        strontg{
            font-family: "Carlito", system-ui;
        }

        .underline {
            text-decoration: underline dotted 2px;
            padding-left: 5px;

        }
        .texunderline{
            text-decoration: underline 1px;


        }

.card-body.user-profile h3 {
    width: 100%;
    margin-bottom: 20px;
}

@keyframes blink {
    0% {
        opacity: 1;
    }

    50% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.blinking-text {
    text-align: center;
    margin-top: 20%;
    font-size: 24px;
    color: green;
    animation: blink 1s infinite;
}
</style>

<style>
.section-heading {
    background-color: #f8f9fa;
    padding: 10px;
    border-left: 5px solid #007bff;
    margin-top: 20px;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 1.5rem;
}

.section-heading span {
    font-size: 1.25rem;
    color: #007bff;
}

.card-body p {
    margin-bottom: 10px;
}

.card-body a {
    color: #007bff;
    text-decoration: none;
}

.card-body a:hover {
    text-decoration: underline;
}
</style>

@section('content')
<!-- Main content -->
<section class="content">

    <div class="container">
        <div class="clearfix blog-list">

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif



            <div class="container mt-2">


            <div>

            <div class="row">
            <div class="col-md-12">
            <h1 class="text-center">Generate Challan</h1>
            <p class="text-center">Select the application and challan type and click submit button. Your online challan would be generated.
                After a challan is generated hit save button to get a soft copy of challan. Download the saved challan through save button and
                after submitting your challan fee upload it in our portal as soon as possible.
            </p>
            </div>

            <div class="col-md-4">

    <button class="btn btn-success" id="printButton"  >Save & Print Challan</button>

            </div>
            </div>
            <div id="printArea">
                 <table class="mt-1" style="border:1px solid;">
                 <colgroup>
                    <col>
                    <col>
                    <col>
                </colgroup>
                <tbody>
                 <tr>
                    <td colspan="3" style="border-bottom:1px solid;">
                        <p style="text-align: center;font-weight:bold">DEPARTMENT OF MINES &amp; MINERALS GOVERNMENT OF GILGIT-BALTISTAN</p>
                    </td>
                 </tr>
                <tr>
                    <td style="border-bottom:1px solid;text-align: center;">
                        <p style="text-decoration:underline"><strong>Applicant Copy</strong></p>
                        <div class="qrcode" style="dislay:inline-block; width:100px; height:100px; margin:auto;">{!! $barcode !!}</div>
                        <p><strong>Fee Challan</strong></p>

                    </td>
                    <td style="border-bottom:1px solid;text-align: center;">
                        <p style="text-decoration:underline"><strong>Bank Copy</strong></p>
                        <div  class="qrcode" style="dislay:inline-block; width:100px; height:100px; margin:auto;">{!! $barcode !!}</div>
                        <p><strong>Fee Challan</strong></p>
                    </td>
                    <td style="border-bottom:1px solid;text-align: center;">
                        <p style="text-decoration:underline"><strong>Department Copy</strong></p>
                        <div  class="qrcode" style="dislay:inline-block; width:100px; height:100px; margin:auto;">{!! $barcode !!}</div>
                        <p><strong>Fee Challan</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>Account Title:</strong><strong class="bankaccount underline" style="margin-left: 10px;"> {{ $challanData[0]->bank_name }}</strong></p>

                        <p><strong>Account No: </strong><strong class="accountno underline" style="margin-left: 10px;">{{ $challanData[0]->account_no }}</strong></p>

                        <p><strong>Date:</strong>……………………………..</p>
                        <p><strong>M/S: </strong><strong class="company_name  underline" style="margin-left: 10px;">{{ $challanData[0]->company_name }}</strong></p>

                        <p>…………………………………………………………………………</p>
                        <p><strong>Type of Mineral Concession: </strong><strong class="concession  underline" style="margin-left: 10px;">{{ $challanData[0]->licence_for }}</strong></p>

                        <p><strong>Area: </strong><strong class="area  underline" style="margin-left:10px;">{{ $challanData[0]->covered_area }}</strong></p>

                        <p><strong>Location: </strong><strong class="location  underline" style="margin-left:10px;">{{ $challanData[0]->location }}</strong></p>

                        <p><strong>Type of Fee:</strong> <strong class="typefee  underline" style="margin-left:10px;"> <span  class="challanTitle ms-3"></span>{{ $challanData[0]->fee_title }}</strong></p>

                        <p><strong>Amount Rs: </strong><strong><span class="challanFee  underline"></span>{{ $challanData[0]->fee_amount }}</strong></p>
                        <p><strong>Amount In Words:</strong><strong><span class="challanFeeInWords underline"></span>{{ $challanData[0]->fee_amount_in_words }}</strong></p>
                    </td>
                    <td>
                        <p><strong>Account Title</strong><strong class="bankaccount underline" style="margin-left:10px;">{{ $challanData[0]->bank_name }}</strong></p>

                        <p><strong>Account No: </strong><strong class="accountno underline" style="margin-left:10px;">{{ $challanData[0]->account_no }}</strong></p>

                        <p><strong>Date:</strong>……………………………..</p>
                        <p><strong>M/S: </strong><strong class="company_name underline" style="margin-left:10px;">{{ $challanData[0]->company_name }}</strong></p>

                        <p>…………………………………………………………………………</p>
                        <p><strong>Type of Mineral Concession: </strong><strong class="concession underline" style="margin-left:10px;">{{ $challanData[0]->licence_for }}</strong></p>

                        <p><strong>Area: </strong><strong class="area underline" style="margin-left:10px;">{{ $challanData[0]->covered_area }}</strong></p>

                        <p><strong>Location: </strong><strong class="location underline" style="margin-left:10px;">{{ $challanData[0]->location }}</strong></p>

                        <p><strong>Type of Fee:</strong> <strong class="feetype underline" style="margin-left:10px;"> <span  class="challanTitle ms-3"></span>{{ $challanData[0]->fee_title }}</strong> </p>

                        <p><strong>Amount Rs: </strong><strong><span class="challanFee underline"></span>{{ $challanData[0]->fee_amount }}</strong></p>
                        <p><strong>Amount In Words:</strong><strong><span class="challanFeeInWords underline"></span>{{ $challanData[0]->fee_amount_in_words }}</strong></p>
                    </td>
                    <td>

                        <p><strong>Account Title</strong><strong class="bankaccount underline" style="margin-left:10px;">{{ $challanData[0]->bank_name }}</strong></p>

                        <p><strong>Account No: </strong><strong class="accountno underline" style="margin-left:10px;">{{ $challanData[0]->account_no }}</strong></p>

                        <p><strong>Date:</strong>……………………………..</p>
                        <p><strong>M/S: </strong><strong class="company_name underline" style="margin-left:10px;">{{ $challanData[0]->company_name }}</strong></p>

                        <p>…………………………………………………………………………</p>
                        <p><strong>Type of Mineral Concession: </strong><strong class="concession underline" style="margin-left:10px;">{{ $challanData[0]->licence_for }}</strong></p>

                        <p><strong>Area: </strong><strong class="area underline" style="margin-left:10px;">{{ $challanData[0]->covered_area }}</strong></p>

                        <p><strong>Location: </strong><strong class="location underline" style="margin-left:10px;">{{ $challanData[0]->location }}</strong></p>

                        <p><strong>Type of Fee:</strong> <strong class="feetype underline" style="margin-left:10px;"> <span id="challanTitle" class="challanTitle ms-3"></span>{{ $challanData[0]->fee_title }}</strong> </p>

                        <p><strong>Amount Rs:</strong><strong><span class="challanFee underline"></span>{{ $challanData[0]->fee_amount }}</strong></p>
                        <p><strong>Amount In Words:</strong><strong><span class="challanFeeInWords underline"></span>{{ $challanData[0]->fee_amount_in_words }}</strong></p>


                    </td>


                </tr>
                <tr>
                    <td>
                        <p style="text-align: center;"><strong class="texunderline">For Bank Use Only</strong></p>

                        <p>Received Payment Rs………………</p>

                        <p>Sig &amp; Stamp Bank Officer</p>

                        <p> ________________________</p>


    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Application Coordinates</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <td>{{ $coordinates}}</td>

            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
                    </td>
                    <td>
                        <p style="text-align: center;"><strong class="texunderline">For Bank Use Only</strong></p>

                        <p>Received Payment Rs………………</p>

                        <p>Sig &amp; Stamp Bank Officer</p>

                        <p> _____________________</p>


    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Application Coordinates</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <td>{{ $coordinates}}</td>

            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
                    </td>
                    <td>
                        <p style="text-align: center;"><strong class="texunderline">For Bank Use Only</strong></p>

                        <p>Received Payment Rs………………</p>

                        <p>Sig &amp; Stamp Bank Officer</p>

                        <p> ___________________________</p>



    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Application Coordinates</th>

            </tr>
        </thead>
        <tbody>
        <tr>

                <td>{{ $coordinates}}</td>

            </tr>

            <!-- Add more rows as needed -->
        </tbody>
    </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <p>……………………………………………………………………………………………………………………………………………………………….....................................................................</p>

        <p><strong>Note</strong><strong>: </strong><strong>-</strong> Coordinates of the area should be mentioned in back side of the challan, and submit the fee challan online within one week after deposition in the bank. Otherwise, the challan will be considered as null and wide.</p>


</div>
    </div>
                    </div>
                </div>
            </div>


            <!-- Verify Modal End-->
            <hr class="invis" />

        </div>
        <!-- end blog-list -->
    </div>

    </div>



</section>

@endsection



@push('scripts')
<script>


    var comp_id={!! json_encode($challanData[0]->company_id) !!};
    var challan_type={!! json_encode($challanData[0]->fee_id) !!};
    var account_no={!! json_encode($challanData[0]->account_no) !!};
    var type_of_concession={!! json_encode($challanData[0]->licence_for) !!};
    var application_id={!! json_encode($appid) !!};
    var account_title={!! json_encode($challanData[0]->bank_name) !!};
    var email = {!! json_encode($user_email) !!};
        $('#printButton').on('click', function() {

            var qr = "{{ $ranAl }}";

            var formData = {
                application_id: application_id,
                account_no: account_no,
                challan_type: challan_type,
                bank_name: account_no,
                type_of_concession: type_of_concession,
                qr_code: qr,
                company_id: comp_id,
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            };
            console.log(formData);

    // AJAX request to save data
    $.ajax({
        url: '{{ route('challan.save') }}', // Define your route
        type: 'POST',
        data: formData,
        success: function(response) {
            if (response.success) {
                printDiv('printArea');
                window.location.href = '/applications/leaseapplications/' + encodeURIComponent(email);

            } else {
                alert('Failed to save data.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });

    function printDiv(divId) {
    var contentToPrint = document.getElementById(divId).innerHTML;
    var originalContent = document.body.innerHTML;

    document.body.innerHTML = contentToPrint;
    window.print();
    document.body.innerHTML = originalContent;
}
});


    </script>

@endpush
