
@extends('Master_page')

@section('title', 'Cart')

@section('content')
                @include('incs.flash')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Voyage</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        @php $total = 0 @endphp
<!-- by this code session get all product that user chose -->
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                @php $total += $details['price'] * $details['quantity'] @endphp

                <tr>
                    <td data-th="Product">
                        <div class="row">
                             <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['Code_Voyage'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['price'] }}-DH</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }}-DH</td>
                    <td class="actions" data-th="">
                    <!-- this button is to update card -->
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Modifier</button>
                       <!-- this button is for update card -->
                        <button class="btn btn-danger btn-sm remove-from-cart delete" data-id="{{ $id }}">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>

        <tr>
            <td><a href="{{ url('/rechercher-trajets') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue booking</a><a href="/saisie-voyageurs" class="btn btn-primary">Paiement</a>
            </td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total {{ $total }} -DH</strong></td>
        </tr>
        </tfoot>
    </table>

@endsection


@section('scripts')
<script>



// this function is for update card
        $(".update-cart").click(function (e) {

           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();

                    }
                });
            }
        });

    </script>

@endsection


