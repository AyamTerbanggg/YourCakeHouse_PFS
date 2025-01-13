@extends('user.layout.index')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Receipt</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>Rp {{ number_format($item['price'], 2) }}</td>
                <td>Rp {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h4 class="text-right">Total Belanja: Rp {{ number_format($totalBelanja, 2) }}</h4>
    <button class="btn btn-primary" onclick="window.print()">Print Receipt</button>
</div>
@endsection