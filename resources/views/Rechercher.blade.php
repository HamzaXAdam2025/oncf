@extends('Master_page')
@section('title','Rechercher')
@section('content')
@include('incs.flash')
<form action="/traiter-recherche-trajets" method="GET">
    <label for="ville_depart">Ville de départ:</label>
    <select name="ville_depart" id="ville_depart">
        @foreach ($villesDepart as $ville)
            <option value="{{ $ville }}">{{ $ville }}</option>
        @endforeach
    </select>

    <label for="ville_arrivee">Ville d'arrivée:</label>
    <select name="ville_arrivee" id="ville_arrivee">
        @foreach ($villesArrivee as $ville)
            <option value="{{ $ville }}">{{ $ville }}</option>
        @endforeach
    </select>

    <button type="submit">Rechercher</button>
</form>

@isset($voyages)
    @if($voyages->isEmpty())
        <p>Aucun voyage trouvé pour les villes sélectionnées.</p>
    @else
        <h4>Résultats de la recherche : {{$vd}} ===> {{$va}}</h4>

        <div class="table-responsive">
            <table class="table table-bordered mx-auto">
                <thead>
                    <tr>
                        <th>Code Voyage</th>
                        <th>Ville Départ</th>
                        <th>Ville Arrivée</th>
                        <th>Heure Départ</th>
                        <th>Heure Arrivée</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voyages as $voyage)
                        <tr>
                            <td>{{ $voyage->Code_Voyage }}</td>
                            <td>{{ $voyage->Ville_Depart }}</td>
                            <td>{{ $voyage->Ville_Arrivee }}</td>
                            <td>{{ $voyage->Heure_Depart }}</td>
                            <td>{{ $voyage->Heure_Arrivee }}</td>
                            <td>{{ $voyage->Prix }}</td>
                            <td>
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $voyage->id }}">
                                   Choisir la date :  <input type="date" name="datev" />
                                    <select name="quantity">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <button type="submit" class="btn btn-block text-center text-dark" role="button">Add to cart</button>
                                </form>





                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endisset

@endsection
