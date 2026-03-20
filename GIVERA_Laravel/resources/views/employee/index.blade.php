<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
</head>
<body>

    <div class="container">
        <h1>Employee</h1>
        <form action="/employee123" method="POST" class="employee-form">
            @csrf

            <div class="form-group">
                <label for="firstname123">First Name:</label>
                <input type="text" id="firstname" name="firstname123">
            </div>

            <div class="form-group">
                <label for="lastname123">Last Name:</label>
                <input type="text" id="lastname" name="lastname123">
            </div>

            <div class="form-group">
                <label for="job123">Job:</label>
                <input type="text" id="job" name="job123">
            </div>

            <div class="form-group">
                <label for="salary123">Salary:</label>
                <input type="text" id="salary" name="salary123">
            </div>

            <button type="submit" class="btn-submit">Save</button>
        </form>

        <hr>

        <table class="employee-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Job</th>
                    <th>Salary</th>
                </tr>
            </thead>

            <tbody>
                @foreach($workers as $worker)
                    <tr>
                        <td>{{ $worker->id }}</td>
                        <td>{{ $worker->firstname }}</td>
                        <td>{{ $worker->lastname }}</td>
                        <td>{{ $worker->job }}</td>
                        <td>{{ $worker->salary }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>