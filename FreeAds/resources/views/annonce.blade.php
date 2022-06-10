@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Déposer une annonce</h1>
        <hr>
   
    <form method="POST" action="{{ route('ad.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Titre de l'annonce</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
        </div>
        <div class="form-group">
            <label for="Photo">Ajouter une photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <div class="form-group"></div> 
        <label for="description">Description de l'annonce</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
        <div class="form-group">
            <label for="localisation">Localisation</label>
            <input type="text" class="form-control" id="localisation" name="localisation">
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="text" class="form-control" id="price" name="price">
        </div><br>
        @guest
                <h1>Vos infromations</h1>
                <hr>
            <div class="form-group">
            <label for="name">Votre nom</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Votre email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password">
        </div><br>
        @endguest
      
        <button type="submit" class="btn btn-primary">Soumettre mon annonce</button>
    </form>
</div>
@endsection
