@extends('layouts.main')

@section('content')

<form method="POST" action="{{ route('reservations.store') }}">
    @CSRF
  <div class="form-group">
    <label for="nome">Nome e cognome ospite</label>
    <input type="text" class="form-control" id="nome" name="guest_full_name" placeholder="Inserisci nominativo">
    @error('guest_full_name')
    <div>
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="carta">N. carta di credito</label>
    <input type="text" class="form-control" id="carta" name="guest_credit_card" placeholder="Inserisci carta di credito">
    @error('guest_credit_card')
    <div>
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="stanza">N. stanza</label>
    <input type="text" class="form-control" id="stanza"
    name="room" placeholder="Inserisci stanza">
    @error('room')
    <div>
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="inizio">Data inizio prenotazione</label>
    <input type="text" class="form-control" id="inizio"
    name="from_date" placeholder="Inserisci data">
    @error('from_date')
    <div>
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="fine">Data fine prenotazione</label>
    <input type="text" class="form-control" id="fine"
    name="to_date" placeholder="Inserisci data">
    @error('to_date')
    <div>
        {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="dettagli">Informazioni dettagliate</label>
    <input type="text" class="form-control" id="dettagli"
    name="more_details" placeholder="Inserisci ulteriori dettagli">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
