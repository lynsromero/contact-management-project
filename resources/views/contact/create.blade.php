<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Create Contact</title>

    <style>
        .gradient-custom-2 {
            background: #fccb90;
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-8">
                    <div class="card rounded-3 text-black">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                    style="width: 185px;" alt="logo">
                                <h4 class="mt-3">Add New Contact</h4>
                            </div>

                            <form action="{{ url('contact/store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name') }}" placeholder="Enter First Name" />
                                        @error('first_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name') }}" placeholder="Enter Last Name" />
                                        @error('last_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="Enter Email Address" />
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Gender</label><br>
                                    <input type="radio" name="gender" value="male" checked /> Male
                                    <input type="radio" name="gender" value="female" /> Female
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" name="mo_no" class="form-control" value="{{ old('mo_no') }}"
                                        placeholder="Enter Mobile Number" />
                                    @error('mo_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">City</label>
                                    <select name="city_id" class="form-control">
                                        <option value="">-- Select City --</option>
                                        <option value="1">Dhaka</option>
                                        <option value="2">Rajshahi</option>
                                        <option value="3">Chattagram</option>
                                        <option value="4">Sylhet</option>
                                    </select>
                                    @error('city_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-center gap-3 mb-5">
                                    <button class="btn btn-primary fa-lg gradient-custom-2" type="submit">
                                        Update Contact
                                    </button>
                                    <a href="{{ url('contact/list') }}" class="btn btn-outline-secondary">
                                        Back to List
                                    </a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>