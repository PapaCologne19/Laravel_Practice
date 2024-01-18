
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applicants</title>

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
                <button type="button" onclick="location.href = '{{ route('applicant.create') }}'">Add Applicant</button>
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
        <h2>Applicants</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Applicant ID</th>
                    <th>Applicant Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Email Address</th>
                    <th>Gender</th>
                    <th>Civil Status</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                    <tr>
                        <td>{{ $applicant->id }}</td>
                        <td>{{ $applicant->applicant_name }}</td>
                        <td>{{ $applicant->age }}</td>
                        <td>{{ $applicant->address }}</td>
                        <td>{{ $applicant->email_address }}</td>
                        <td>{{ $applicant->gender }}</td>
                        <td>{{ $applicant->civil_status }}</td>
                        <td>{{ $applicant->created_at->format('F d, Y') }}</td>
                        <td>
                            <div class="contain">
                                <div class="column">
                                    <button onclick="location.href = '{{ route('applicant.edit', ['applicant' => $applicant]) }}'">Edit</button>
                                </div>
                                <div class="column">
                                    <form action="{{ route('applicant.delete', ['applicant' => $applicant]) }}" method="post">
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