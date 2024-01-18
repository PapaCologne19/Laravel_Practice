<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Applicants</title>
</head>
<body>
    <a href="{{ route('applicant.index') }}">Back</a>
    <center>
        <h1>Add Applicant</h1>
        <form action="{{ route('applicant.store') }}" method="post">
            @csrf
            @method('post')
            <div class="col-md-12">
                <label for="applicant_name" class="form-label">Applicant Name</label><br>
                <input type="text" name="applicant_name" id="applicant_name" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="age" class="form-label">Age</label><br>
                <input type="text" name="age" id="age" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label">Address</label><br>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="email_address" class="form-label">Email Address</label><br>
                <input type="email" name="email_address" id="email_address" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="gender" class="form-label">Gender</label><br>
                <input type="text" name="gender" id="gender" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="civil_status" class="form-label">Civil Status</label><br>
                <input type="text" name="civil_status" id="civil_status" class="form-control" required>
            </div>
            <div class="col-md-12">
                <button type="submit">Submit</button>
            </div>
        </form>
    </center>
</body>
</html>