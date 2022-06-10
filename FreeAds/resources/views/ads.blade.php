@extends('layouts.app')

@section('content')
    <div class="class container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <form method="POST" action="{{ route('ad.search')}}" onsubmit="search(event)" id="searchForm">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control mb-3" id="words">
                </div>
                <button type="submit" class="btn btn-primary mb-5">Recherche</button>
            </form>
        <div id="results">
        @foreach ($ads as $ad)
        <div class="card mb-3" style="width: 100%;">
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
            <h5 class="card-title">{{ $ad->title}}</h5>
            <small>{{ Carbon\carbon::parse($ad->created_at)->diffForHumans() }}</small>
            <p class="card-text text-info">{{ $ad->localisation}}</p>
            <p class="card-text">{{ $ad->description}}</p>
            <p class="card-text">{{ $ad->price}}</p>
            <a href="#" class="btn btn-primary">Voir l'annonce</a>
            <a href="{{ route('message.create', ['seller_id' => $ad->user_id, 'ad_id' => $ad->id]) }}" class="btn btn-primary">Contacter le vendeur</a>
        </div>
        </div>
        
        @endforeach

        </div>
    </div> 
    <!-- {{ $ads->links() }} -->
        </div>
    </div>
@endsection

@section('extra-js')
<script>
    function search(event){
        event.preventDefault();
        const words = document.querySelector('#words').value
        const url= document.querySelector('#searchForm').getAttribute('action');
        axios.post(`${url}`, {words:words})
        
        .then(function (response) {
            // console.log(response);
            const ads = response.data.ads;
            console.log(response.length);
            
            let results = document.querySelector('#results');
            results.innerHTML = '';
        for(let i = 0; i < ads.length; i++){
        let card = document.createElement('div');
            card.classList.add('card', 'mb-3');
        let cardBody = document.createElement('div');
            cardBody.classList.add('card-body');
        let title = document.createElement('div');
            title.classList.add('card-title');
            title.innerHTML = ads[i].title 
        let localisation = document.createElement('p');
            localisation.classList.add('card-title', 'text-info' );
            localisation.innerHTML = ads[i].localisation
        let description = document.createElement('p');
            description.innerHTML = ads[i].description
            let price = document.createElement('p');
            price.classList.add('card-title',);
            price.innerHTML = ads[i].price

        cardBody.appendChild(title)
        cardBody.appendChild(localisation)
        cardBody.appendChild(description)
        cardBody.appendChild(price)
        card.appendChild(cardBody)
        results.appendChild(card)
        
    }
    
  })
  .catch(function (error) {
    console.log(error);
  });
    }
</script>
@endsection
