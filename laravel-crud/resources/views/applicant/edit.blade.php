<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Applicant</title>
</head>
<body>
    <a href="{{ route('applicant.index') }}">Back</a>
    <center>
        <h1>Update Applicant</h1>
        <form action="{{ route('applicant.update', ['applicant' => $applicant]) }}" method="post">
            @csrf
            @method('put')
            <div class="col-md-12">
                <label for="applicant_name" class="form-label">Applicant Name</label><br>
                <input type="text" name="applicant_name" id="applicant_name" class="form-control" value="{{ $applicant->applicant_name }}" required>
            </div>
            <div class="col-md-12">
                <label for="age" class="form-label">Age</label><br>
                <input type="text" name="age" id="age" class="form-control" value="{{ $applicant->age }}" required>
            </div>
            <div class="col-md-12">
                <label for="address" class="form-label">Address</label><br>
                <input type="text" name="address" id="address" class="form-control" value="{{ $applicant->address }}" required>
            </div>
            <div class="col-md-12">
                <label for="email_address" class="form-label">Email Address</label><br>
                <input type="text" name="email_address" id="email_address" class="form-control" value="{{ $applicant->email_address }}" required>
            </div>
            <div class="col-md-12">
                <label for="gender" class="form-label">Gender</label><br>
                <input type="text" name="gender" id="gender" class="form-control" value="{{ $applicant->gender }}" required>
            </div>
            <div class="col-md-12">
                <label for="civil_status" class="form-label">Civil Status</label><br>
                <input type="text" name="civil_status" id="civil_status" class="form-control" value="{{ $applicant->civil_status }}" required>
            </div>
            <div class="col-md-12">
                <button type="submit">Submit</button>
            </div>
        </form>
    </center>
</body>
</html>