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
        <select name="list-shown" id="">
          @for ($i = 10; $i <= 100; $i+=10)
            <option value="{{$i}}" @if ($listShown == $i)
                selected
            @endif>{{ $i }}</option>  
          @endfor
        </select>
      </td>
    </tr>
    <tr>
      <td>Search</td>
      <td>:</td>
      <td>
        <input type="text" name="search" id="" value="{{ $searchQuery }}">
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
    @foreach ($books as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item->book_name }}</td>
          <td>{{ $item->category_name }}</td>
          <td>{{ $item->author_name }}</td>
          <td>{{ $item->rating }}</td>
          <td>{{ $item->voter }}</td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection