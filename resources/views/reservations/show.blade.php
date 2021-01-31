@extends('layouts.main')

@section('content')

<table class="table">
  <thead>
    <tr>
        @foreach($columns as $column)
        <th scope="col">{{ $column }}</th>
        @endforeach
    </tr>
  </thead>
  <tbody>
        <tr>
            <th scope="row">{{ $reservation->id }}</th>
            <td>{{ $reservation->guest_full_name }}</td>
            <td>{{ $reservation->guest_credit_card }}</td>
            <td>{{ $reservation->room }}</td>
            <td>{{ $reservation->from_date }}</td>
            <td>{{ $reservation->to_date }}</td>
            <td>{{ $reservation->more_details }}</td>
        </tr>
  </tbody>
</table>

@endsection
