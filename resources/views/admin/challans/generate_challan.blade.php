<link href="https://fonts.googleapis.com/css2?family=Carlito:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

<style>

/* Set A4 dimensions in landscape mode */
@page {
            size: A3 landscape;
            margin: 10mm; /* Set the page margins */
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px; /* Adjust the base font size to fit content */
            margin: 0;
            padding: 0;
        }

        /* Wrapper to control content width */
        .content {
            width: 100%; /* Make sure the content stretches the full width */
            text-align: center;
            margin: auto;
            padding: 15px; /* Padding inside the content */
        }

        .title {
            font-size: 18px; /* Adjust title size to fit the page */
            font-weight: bold;
            margin-bottom: 15px;
        }

        .details {
            font-size: 12px;
            line-height: 1.5; /* Ensure good readability */
            margin-bottom: 10px;
        }

        table {
            width: 100%; /* Make table full width */
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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


</style>


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
                        <p>Voucher No: <strong>{{$voucher_no}}</strong></p>

                    </td>
                    <td style="border-bottom:1px solid;text-align: center;">
                        <p style="text-decoration:underline"><strong>Bank Copy</strong></p>
                        <div  class="qrcode" style="dislay:inline-block; width:100px; height:100px; margin:auto;">{!! $barcode !!}</div>
                        <p><strong>Fee Challan</strong></p>
                        <p>Voucher No: <strong>{{$voucher_no}}</strong></p>
                    </td>
                    <td style="border-bottom:1px solid;text-align: center;">
                        <p style="text-decoration:underline"><strong>Department Copy</strong></p>
                        <div  class="qrcode" style="dislay:inline-block; width:100px; height:100px; margin:auto;">{!! $barcode !!}</div>
                        <p><strong>Fee Challan</strong></p>
                        <p>Voucher No: <strong>{{$voucher_no}}</strong></p>
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
</div>
