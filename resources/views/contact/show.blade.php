<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <title>Contact Details</title>
  <style>
    body {
      background: #f8f9fa;
    }
    .contact-card {
      max-width: 500px;
      margin: 40px auto;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      overflow: hidden;
      transition: transform 0.3s;
    }
    .contact-card:hover {
      transform: translateY(-5px);
    }
    .contact-card .card-body {
      background: #fff;
      padding: 30px;
      text-align: center;
    }
    .contact-card .card-title {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 15px;
      color: #343a40;
    }
    .contact-card .card-text {
      font-size: 1rem;
      color: #6c757d;
      margin-bottom: 8px;
    }
    .contact-card .btn-danger {
      margin-top: 15px;
      border-radius: 50px;
      padding: 10px 30px;
      font-weight: 500;
    }
  </style>
</head>
<body>

  <div class="container">
    @include('massege')
    <h2 class="text-center my-4 text-dark">Contact Details</h2>

    <div class="contact-card card">
      <div class="card-body">
        <h4 class="card-title">{{ $contact->first_name . ' ' . $contact->last_name }}</h4>
        <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
        <p class="card-text"><strong>Mobile:</strong> {{ $contact->mo_no }}</p>
        <p class="card-text"><strong>City:</strong> {{ $contact->city_id }}</p>
        <p class="card-text"><strong>Gender:</strong> {{ $contact->gender }}</p>
        <a href="{{ url('contact/delete/'.$contact->id) }}" class="btn btn-danger">Delete</a>
        <a href="{{ url('contact/list') }}" class="btn btn-danger">Back To List</a>
      </div>
    </div>
  </div>

</body>
</html>
