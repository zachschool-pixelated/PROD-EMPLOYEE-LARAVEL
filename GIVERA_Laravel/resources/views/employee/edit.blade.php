<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
</head>
<body>

    <div class="container">
        <h1>Edit Employee</h1>

        @if ($errors->any())
            <div style="margin-bottom: 16px; color: #c0392b;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/employee/{{ $employee->id }}" method="POST" class="employee-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="firstname123">First Name:</label>
                <input type="text" id="firstname123" name="firstname123" value="{{ old('firstname123', $employee->firstname) }}">
            </div>

            <div class="form-group">
                <label for="lastname123">Last Name:</label>
                <input type="text" id="lastname123" name="lastname123" value="{{ old('lastname123', $employee->lastname) }}">
            </div>

            <div class="form-group">
                <label for="job123">Job:</label>
                <input type="text" id="job123" name="job123" value="{{ old('job123', $employee->job) }}">
            </div>

            <div class="form-group">
                <label for="salary123">Salary:</label>
                <input type="text" id="salary123" name="salary123" value="{{ old('salary123', $employee->salary) }}">
            </div>

            <button type="submit" class="btn-submit">Update Employee</button>
        </form>

        <div style="margin-top: 20px;">
            <a href="/employee" class="btn-edit">Back to Employee List</a>
        </div>
    </div>

</body>
</html>
