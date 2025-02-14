@extends('Master_page')

@section('title', 'Cart')

@section('content')
    @include('incs.flash')

    <div class="container mt-5">
        <div class="card shadow-lg rounded">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Votre Panier</h4>
            </div>
            <div class="card-body">
                <table id="cart" class="table table-striped table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>Voyage</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th class="text-center">Sous-total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr>
                                    <td>
                                        <h5 class="font-weight-bold">{{ $details['Code_Voyage'] }}</h5>
                                    </td>
                                    <td>{{ $details['price'] }} DH</td>
                                    <td>

                                        <form action="{{ url('update-cart') }}" method="POST" class="d-inline">
                                            @method('PATCH')
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control text-center" style="width: 80px;" />
                                            <input type="hidden" name="id" value="{{ $id }}" />
                                            <button type="submit" class="btn btn-sm btn-outline-info mt-2">Modifier</button>
                                        </form>
                                    </td>
                                    <td class="text-center font-weight-bold">{{ $details['price'] * $details['quantity'] }} DH</td>
                                    <td>

                                        <form action="{{ url('remove-from-cart') }}" method="POST" onsubmit="return confirmDelete()">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}" />
                                            <button type="submit" class="btn btn-sm btn-outline-danger mt-2">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right font-weight-bold">Total :</td>
                            <td class="text-center font-weight-bold">{{ $total }} DH</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-center">
                                <a href="{{ url('/rechercher-trajets') }}" class="btn btn-outline-warning mr-2">
                                    <i class="fa fa-angle-left"></i> Continuer la réservation
                                </a>
                                <a href="/saisie-voyageurs" class="btn btn-primary">Procéder au paiement</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        function confirmDelete() {
            return confirm("Êtes-vous sûr de vouloir supprimer cette réservation ?");
        }
    </script>
    @endsection
@endsection
