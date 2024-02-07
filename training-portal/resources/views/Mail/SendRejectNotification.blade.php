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
                <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">I hope this message finds you well. We appreciate your prompt response and the effort you put into submitting your request. </p>
    
                <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                    After careful consideration, we regret to inform you that your request for {{ $training_title }}  training has been declined at this time. We understand that this decision may be disappointing, and we want to assure you that it was not made lightly.
                </p>
                <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                    We encourage you to continue exploring opportunities with us, and we look forward to the possibility of working together in the future.
                </p>
                <br>
                <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                    Thank you for your understanding.
                </p>
                <br>
            </div>
            <div class="footer-message">
                <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; ">Best regards,<br><br>
                    PCN Promopro Inc.</p>
            </div>
        </div>
    </center>
</body>
</html>