@extends('layouts.master')

@section('title', 'Products')

@section('content')
    <h1>Products</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)                
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->unit}}</td>
                    <td>Operation</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection