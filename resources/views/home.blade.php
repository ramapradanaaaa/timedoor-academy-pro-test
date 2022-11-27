@extends('layout')

@section('body')
<h1>List of Books</h1>
<hr>
<form action="" method="GET">
  <table>
    <tr>
      <td>List shown</td>
      <td>:</td>
      <td>
        <select name="" id="">
          @for ($i = 10; $i <= 100; $i+=10)
            <option value="{{$i}}">{{ $i }}</option>  
          @endfor
        </select>
      </td>
    </tr>
    <tr>
      <td>Search</td>
      <td>:</td>
      <td>
        <input type="text" name="search" id="">
      </td>
    </tr>

    <tr>
      <td></td>
      <td></td>
      <td>
        <button type="submit">Submit</button>
      </td>
    </tr>
  </table>
</form>

<br><br>
<table class="data">
  <thead>
      <tr>
        <th>No</th>
        <th>Book Name</th>
        <th>Category Name</th>
        <th>Author Name</th>
        <th>Average Rating</th>
        <th>Voter</th>
      </tr>
  </thead>
  <tbody>
    <tr></tr>
  </tbody>
</table>
@endsection