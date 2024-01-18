
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>

    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .contain {
            display: grid;
            grid-template-columns: 0fr 0fr;
            grid-template-rows: 0fr 0fr;
            gap: 5px;
            margin: 0 auto;
        }
        .table tbody tr th, .table tbody tr td{
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <center>
        <br>
        <br>
        <div class="contain" style="justify-content: center">
            <div class="column">
                <button type="button" onclick="location.href = '{{ route('welcome') }}'">Back</button>
            </div>
            <div class="column">
                <button type="button" onclick="location.href = '{{ route('employee.create') }}'">Add Employee</button>
            </div>
        </div>

        <br>
        <br>
        <div>
            @if (session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <h2>Employees</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Division</th>
                    <th>Department</th>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->employee_name }}</td>
                        <td>{{ $employee->division }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>{{ $employee->company_name }}</td>
                        <td>{{ $employee->company_address }}</td>
                        <td>{{ $employee->created_at->format('F d, Y') }}</td>
                        <td>
                            <div class="contain">
                                <div class="column">
                                    <button onclick="location.href = '{{ route('employee.edit', ['employee' => $employee]) }}'">Edit</button>
                                </div>
                                <div class="column">
                                    <form action="{{ route('employee.delete', ['employee' => $employee]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>                    
                @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>