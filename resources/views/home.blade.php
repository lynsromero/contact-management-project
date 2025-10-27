<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <title>Home</title>
</head>
<body>
  <div class="container">
    @include('massege');
    <h1>Welcome {{ $user->first_name. ' '. $user->last_name }} at Home</h1>
    <div class="container">
  <div class="card" style="width:400px">
    <img class="card-img-top" src="{{ asset('storage/' .$user->image) }}" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{ $user->first_name. ' '. $user->last_name }} </h4>
      <p class="card-text">Email: {{ $user->email }}</p>
      <p class="card-text">Mobile: {{ $user->mo_no }}</p>
      <p class="card-text">City: {{ $user->city_id }}</p>
      <p class="card-text">Gender: {{ $user->gender }}</p>
      <p class="card-text">Interested at: {{ $user->hobby }}</p>
      <a href="{{ url('contact/create') }}" class="btn btn-success">Add Contact</a>
      <a href="{{ url('contact/list') }}" class="btn btn-primary">Contact List</a>
      <a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>
    </div>
  </div>
  </div>
</body>
</html>