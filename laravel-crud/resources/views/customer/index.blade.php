<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .contain {
            display: grid;
            grid-template-columns: 0fr 0fr;
            grid-template-rows: 0fr 0fr;
            gap: 5px;
            margin: 0 auto;
        }

        .table tbody tr th,
        .table tbody tr td {
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
                <button type="button" onclick="location.href = '{{ route('customer.create') }}'">Add Customer</button>
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
        <table class="table">
            <thead>
                <tr style="padding: 1rem;">
                    <th>Customer ID</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>Email Address</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="padding: 1rem;">
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->firstname }}</td>
                        <td>{{ $customer->middlename }}</td>
                        <td>{{ $customer->lastname }}</td>
                        <td>{{ $customer->email_address }}</td>
                        <td>{{ $customer->created_at->format('F d, Y - H:i:s A') }}</td>
                        <td>
                            <div class="contain">
                                <div class="column">
                                    <button
                                        onclick="location.href= '{{ route('customer.edit', ['customer' => $customer]) }}'">Edit</button>
                                </div>
                                <div class="column">
                                    <form action="{{ route('customer.delete', ['customer' => $customer]) }}"
                                        method="post">
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
