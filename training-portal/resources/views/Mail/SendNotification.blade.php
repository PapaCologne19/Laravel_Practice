<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="container" style="margin: 1rem;">
            <div class="div-message">
                <h3 style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">Dear {{ $name }},</h3>
                <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">We trust this message finds you well. We want to notify you that your request for {{ $training_title }} training has been successfully submitted. Please await the approval of the administrator. Thank you for your patience, and have a wonderful day.</p>
            </div>
            <div class="footer-message">
                <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; ">Best regards,<br><br>
                    PCN Promopro Inc.</p>
            </div>
        </div>
    </center>
</body>

</html>
