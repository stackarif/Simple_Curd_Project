@extends('layouts.backend_app')

@section('title' ,'isAdmin?')

@section('app_content')
<div class="login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <h3 class="login-box-msg">Are You Authenticate?</h3>

            <form action="{{ route('admin.isadmin') }}" method="POST">
                @if(session('status'))
                <span class="text-success">{{ session('status') }}</span>
                @endisset
                @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter valid number" name="is_admin">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                @error('is_admin')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
            </form>
           
          </div>
        </div>
    </div>
</div>

@stop
