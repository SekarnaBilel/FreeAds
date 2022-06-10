@extends('layouts.app')

@section('content')
<div class="container"> 
<h1>Contacter le vendeur</h1>
<form method="POST" action="#">
    <div class="form-group">
        <label for="content">Votre message</label>
        <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>

    </div>
    <input type="hidden" name="seller_id" value="{{ $seller_id}}">
    <input type="hidden" name="ad_id" value="{{ $ad_id}}">
    <input type="hidden" name="buyer_id" value="{{ auth()->user()->id }}">
    <button type="submit" class="btn btn-success">Envoyer le message</button>
</form>
</div>
@endsection