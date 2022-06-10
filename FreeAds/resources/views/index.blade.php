@extends('layouts.app')


@section('conten')
<div class="container">
    <div class="row justify-content-center">
        @if (session('success'))
        <div class="alert alert-sucess">
            {{ session('success')}}
        </div>
         @endif

         
       
    </div>
    
</div>
@endsection

@section('div')
<div class="container">
    <div class="row justify-content-center">
      
        <h1>Welcome to Freeads</h1>
    </div>
</div>

@endsection

@section('footer')
<footer class="bg-dark text-center text-white fixed-bottom">
  <!-- Grid container -->
 
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright: Freeads
  </div>
  <!-- Copyright -->
</footer>

@endsection
