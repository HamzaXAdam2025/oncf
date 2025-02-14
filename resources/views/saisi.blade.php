@extends('Master_page')

@section('title', 'Saisie des voyageurs')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Saisie des informations des voyageurs</div>

                    <div class="panel-body">
                        <!-- Formulaire pour saisir les informations des voyageurs -->
                        <form method="POST" action="{{ route('valider') }}">
                            @csrf
                            @php $counter = 1 @endphp
                            <!-- Boucle sur les voyages dans le panier -->
                            @foreach($cart as $id => $details)
                                <input type="hidden" name="voyageurs[{{ $id }}][code_voyage]" value="{{ $details['Code_Voyage'] }}">
                                <input type="hidden" name="voyageurs[{{ $id }}][prix]" value="{{ $details['price'] }}">
                                <input type="hidden" name="voyageurs[{{ $id }}][ville_depart]" value="{{ $details['ville_depart'] }}">
                                <input type="hidden" name="voyageurs[{{ $id }}][ville_arrivee]" value="{{ $details['ville_arrivee'] }}">
                                <input type="hidden" name="voyageurs[{{ $id }}][heure_depart]" value="{{ $details['heure_depart'] }}">
                                <input type="hidden" name="voyageurs[{{ $id }}][heure_arrivee]" value="{{ $details['heure_arrivee'] }}">
                                <input type="hidden" name="voyageurs[{{ $id }}][date_voyage]" value="{{ $details['date_voyage'] }}">

                                <!-- Affichage du code de voyage -->
                                <h3>Code Voyage : {{ $details['Code_Voyage'] }}</h3>

                                <!-- Boucle sur la quantité de voyages -->
                                @for ($i = 1; $i <= $details['quantity']; $i++)
                                    <h4>Voyageur {{ $counter }}</h4>
                                    <div class="form-group">
                                        <label for="name">Nom:</label>
                                        <input type="text" class="form-control" id="name" name="voyageurs[{{ $id }}][{{ $i }}][nom]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="passport">Numéro de passeport:</label>
                                        <input type="text" class="form-control" id="passport" name="voyageurs[{{ $id }}][{{ $i }}][passport]" required>
                                    </div>
                                    @php $counter++ @endphp
                                    @endfor

                            @endforeach

                            <!-- Section pour le formulaire de paiement -->
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Paiement par carte</strong></div>
                                <div class="card-logos">
                                    <img src="{{ asset('logobank.png') }}" alt="Visa Logo" width="50" height="50" class="card-logo">
                                    <!-- Ajoutez d'autres logos de carte si nécessaire -->
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="card_number">Numéro de carte:</label>
                                        <input type="text" class="form-control" id="card_number" name="card_number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="expiry_date">Date d'expiration:</label>
                                        <input type="text" class="form-control" id="expiry_date" name="expiry_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cvv">CVV:</label>
                                        <input type="text" class="form-control" id="cvv" name="cvv" required>
                                    </div>

                                </div>
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Valider et Générer les billets</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
