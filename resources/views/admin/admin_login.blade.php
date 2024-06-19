@extends('admin.layouts.login_nav')

@section('content')
    <form class="p-4 my-5 mx-auto shadow rounded w-50" action="{{route('login.auth')}}" method="post">
        @csrf
        <img src="<?=ROOT?>/assets/img/afbciLogo.png" alt="" class="rounded-circle d-block mx-auto" style="width: 100px;">
        <h1 class="text-primary text-center mb-5">Administration</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <div class="form-floating mb-3">   
            <input type="text" class="form-control my-2" name="username" id="floatingInput" placeholder="First Name" autofocus>
            <label for="username">Username</label>
        </div>
        <div class="form-floating mb-3">   
            <input type="password" class="form-control my-2" name="password" id="floatingInput" placeholder="First Name" autofocus>
            <label for="password">Password</label>
        </div>
        <input class="btn btn-primary w-100" type="submit" value="Login">
    </form>
@endsection