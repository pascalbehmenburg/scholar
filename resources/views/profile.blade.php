@extends('master')
@section('title', 'Profile')
@section('content')
    @extends('modals.change_password')
    @extends('modals.change_email')
    <div class="container emp-profile pt-md-3">

        {!! csrf_field() !!}
        <div class="container">
            <h1>Welcome, {{ucfirst(Auth::user()->forename)}} {{ucfirst(Auth::user()->surname)}}.</h1>
            <hr>
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <!-- edit form column -->
                <div class="personal-info">
                    @cannot('user-edit')
                    <fieldset disabled>
                    @else
                    <form action="/profile/edit" method="post">
                    {!! csrf_field() !!}
                    @endcannot
                        <ul class="card list-group mb-lg-2">
                            <li class="list-group-item bg-dark text-white" style="font-weight: bold; font-size: medium;">Personal Info</li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="forename" class="col-form-label text-left">{{ __('Forename') }}</label>
                                    <input value="{{Auth::user()->forename}}" placeholder="Forename" id="forename" type="text" class="col-md-8 float-right form-control @error('forename') is-invalid @enderror" name="forename" required autocomplete="given-name">
                                    @error('forename')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="surname" class="col-form-label text-left">{{ __('Surname') }}</label>
                                    <input value="{{Auth::user()->surname}}" placeholder="Surname" id="surname" type="text" class="col-md-8 float-right form-control @error('surname') is-invalid @enderror" name="surname" required autocomplete="family-name">
                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="birthdate" class="col-form-label text-left">{{ __('Birthdate') }}</label>
                                    <input value="{{date("Y-m-d", strtotime(Auth::user()->birthdate))}}" id="birthdate" type="date" class="col-md-8 float-right form-control @error('birthdate') is-invalid @enderror" name="birthdate" required autocomplete="bday">
                                    @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="city" class="col-form-label text-left">{{ __('City') }}</label>
                                    <input value="{{Auth::user()->city}}" id="city" type="text" class="col-md-8 float-right form-control @error('city') is-invalid @enderror" name="city" required autocomplete="on">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="street" class="col-form-label text-left">{{ __('Street') }}</label>
                                    <input value="{{Auth::user()->street}}" id="city" type="text" class="col-md-8 float-right form-control @error('street') is-invalid @enderror" name="street" required autocomplete="on">
                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="phone_number" class="col-form-label text-left">{{ __('Phone number') }}</label>
                                    <input value="{{Auth::user()->phone_number}}" id="city" type="text" class="col-md-8 float-right form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="tel">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="rank" class="col-form-label text-left">{{ __('Status') }}</label>
                                    <select id="rank" class="col-md-8 float-right form-control @error('rank') is-invalid @enderror" name="rank" required autocomplete="off">
                                        <option hidden selected>{{ucfirst(Auth::user()->rank)}}</option>
                                        <option>Student</option>
                                        <option>Teacher</option>
                                        <option>Admin</option>
                                    </select>
                                    @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </li>
                            @can('user-edit')
                            <li class="list-group-item">
                                <div class="form-group">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </li>
                            @endcan
                        </ul>
                    @cannot('user-edit')
                    </fieldset>
                    @else
                    </form>
                    @endcannot
                    <ul class="card list-group mb-lg-2">
                        <li class="list-group-item bg-dark text-white" style="font-weight: bold; font-size: medium;">Login</li>
                        <li class="list-group-item">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr data-toggle="modal" data-target="#changeEmailModal" style="cursor:pointer;">
                                        <th scope="col"><label class="text-left mr-5">Email:</label></th>
                                            <th scope="col"><p class="text-secondary">{{Auth::user()->email}}</p></th>
                                        <th scope="col"><button type="button" class="float-right badge badge-primary btn">Edit</button></th>
                                    </tr>
                                    <tr data-toggle="modal" data-target="#changePasswordModal" style="cursor:pointer;">
                                        <th scope="col"><label class="text-left mr-5">Password:</label></th>
                                        <th scope="col"><p class="text-secondary">You may choose a strong and unique password.</p></th>
                                        <th scope="col"><button type="button" class="float-right badge badge-primary btn">Edit</button></th>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                    </div>
                </div>
            <hr>
        </div>
    </div>
@endsection