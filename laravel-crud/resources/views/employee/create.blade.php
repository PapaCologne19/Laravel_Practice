<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
</head>
<body>
    <a href="{{ route('employee.index') }}">Back</a>
    <center>
        <h1>Add Employee</h1>
        <form action="{{ route('employee.store') }}" method="post">
            @csrf
            @method('post')
            <div class="col-md-12">
                <label for="employee_name" class="form-label">Employee Name</label><br>
                <input type="text" name="employee_name" id="employee_name" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="division" class="form-label">Division</label><br>
                <input type="text" name="division" id="division" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="department" class="form-label">Department</label><br>
                <input type="text" name="department" id="department" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="company_name" class="form-label">Company Name</label><br>
                <input type="text" name="company_name" id="company_name" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="company_address" class="form-label">Company Address</label><br>
                <input type="text" name="company_address" id="company_address" class="form-control" required>
            </div>
            <div class="col-md-12">
                <button type="submit">Submit</button>
            </div>
        </form>
    </center>
</body>
</html>