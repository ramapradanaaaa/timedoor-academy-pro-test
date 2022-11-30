@extends('layout')

@section('body')
<h1>Top 10 Most Famous Author</h1>
<hr>
<br><br>
<table class="data">
  <thead>
      <tr>
        <th>No</th>
        <th>Author Name</th>
        <th>Voter</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($authors as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->voter }}</td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection