@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    My Profile 
                </div>

                <div class="card-body">
                    <form action="{{ route('user.update-profile') }}" method="POST">

                       @csrf
                       @method('PUT')

                       <div class="form-group">
                           <label for="name">Name</label>
                           <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                       </div>

                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                       </div><br>
                       

                       <button type="submit" class="btn btn-success">Update Profile</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
