<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
  <h1>Employees</h1>

  <form action="/employees123" method="POST" class="product-form">
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
      @foreach($persons as $person)
      <tr>
        <td>{{ $person->id }}</td>
        <td>{{ $person->firstname }}</td>
        <td>{{ $person->lastname }}</td>
        <td>{{ $person->job }}</td>
        <td>{{ $person->salary }}</td>
      </tr>
      @endforeach
    </tbody>

  </table>

</div>



</body>

</html>