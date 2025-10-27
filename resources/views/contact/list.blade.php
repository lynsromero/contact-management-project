<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <title>Contact List</title>
  <style>
    /* Pagination Styling */
    .pagination {
      justify-content: center;
    }

    .pagination li a,
    .pagination li span {
      color: rgba(0, 0, 0, 0.6) !important; /* faded black */
      border: none !important;
      background: none !important;
    }

    .pagination li.active span {
      color: #ffffff !important;
      font-weight: bold;
      background: rgba(0, 0, 0, 0.856) !important;
      border-radius: 4px;
      padding: 0.25rem 0.5rem;
    }

    .pagination li a:hover {
      color: #000 !important;
      text-decoration: underline;
    }

    /* Search input same height as buttons */
    .d-flex .form-control {
      height: calc(2.25rem + 2px);
    }
  </style>
</head>

<body>
  @include('massege')

  <div class="container mt-4">
    <h2 class="mb-3 text-center">Contact List</h2>

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
      <div class="mb-2">
        <a href="{{ url('home') }}" class="btn btn-success me-2">Home</a>
        <a href="{{ url('contact/create') }}" class="btn btn-primary">Add Contact</a>
      </div>

      <form action="{{ url('contact/list') }}" class="d-flex mb-2">

        <input class="form-control me-2" type="text" placeholder="Search" name="search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    </div>

    <table class="table table-striped table-bordered text-center">
      <thead class="table-dark">
        <tr>
          <th>No.</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Mobile No</th>
          <th>City</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $key => $contact)
        <tr>
          <td>{{ ($contacts->currentPage() - 1) * $contacts->perPage() + $key + 1 }}</td>

          <td>{{ $contact->first_name }}</td>
          <td>{{ $contact->last_name }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->gender }}</td>
          <td>{{ $contact->mo_no }}</td>
          <td>{{ $contact->city_id }}</td>
          <td>
            <a href="{{ url('contact/edit/' . $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ url('contact/delete/' . $contact->id) }}" class="btn btn-danger btn-sm">Delete</a>
            <a href="{{ url('contact/show/' . $contact->id) }}" class="btn btn-danger btn-sm">Show</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
      {!! $contacts->appends(['search'=>$search])->links() !!}
    </div>

  </div>
</body>

</html>
