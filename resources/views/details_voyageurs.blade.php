@extends('Master_page')

@section('title', 'Détails des voyageurs')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Détails des voyageurs</div>

                    <div class="panel-body">
                        @if(count($voyageurs) > 0)

                            @php $voyageurCounter = 1; @endphp
                            @foreach ($voyageurs as $voyageId => $voyage)

                                <div class="billet">
                                    <div class="billet-info">

                                        @foreach ($voyage as $key => $detail)
                                            @if (is_array($detail) && $key != 'code_voyage' && $key != 'prix')
                                                <h3>Voyageur: {{ $voyageurCounter }}</h3>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong> Informations du voyageur : </strong></p>
                                                        <p>Nom: {{ $detail['nom'] }} / Passport: {{ $detail['passport'] }}</p>
                                                        <p><strong> Informations du voyage : </strong></p>
                                                        <p>Code de Voyage: {{ $voyage['code_voyage'] }}</p>
                                                        <p>Prix: {{ $voyage['prix'] }}</p>
                                                        <p>Départ: {{ $voyage['ville_depart'] }} / Arrivée: {{ $voyage['ville_arrivee'] }}</p>
                                                        <p>Heure départ: {{ $voyage['heure_depart'] }} / Heure d'arrivée: {{ $voyage['heure_arrivee'] }}</p>
                                                        <p>Date_Voyage : {{ $voyage['date_voyage'] }}</p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <img src="{{ asset('logo.jpg') }}" alt="Logo" class="billet-logo"   width="300" height="150">
                                                    </div>
                                                </div>

                                                <img src="{{ asset('qr.png') }}" width="100" height="100" alt="QR Code" class="billet-qr">

                                                <!-- Incrémenter le compteur -->
                                                @php $voyageurCounter++; @endphp
                                            @endif

                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Aucun voyageur à afficher.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
