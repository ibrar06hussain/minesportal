<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
    <style>
        table {
                border-collapse: collapse; /* Ensures borders are collapsed for clear visibility */
                width: 100%; /* Optional: to make the table occupy full width */
            }
            th, td {
                border: 1px solid black; /* Defines the border for table cells */
                padding: 8px; /* Adds padding for better appearance */
                text-align: left; /* Aligns text to the left */
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

        .unerline {
            text-decoration: underline dotted 2px;
            padding-left: 5px;

        }
        .texunerline{
            text-decoration: underline 1px;


        }
    </style>
</head>
<body>
    <?php $encodedEmail = base64_encode($pending_user->email);?>
    <h1>Dear {{ $pending_user->name }},</h1>
    <p>Greeting From Mines & Minerals Department. Please verify your account by clicking the link given below.</p>
    <div>
        <a href="{{route('verification',['token'=>$encodedEmail])}}"></a>
    </div>
</body>
</html>
