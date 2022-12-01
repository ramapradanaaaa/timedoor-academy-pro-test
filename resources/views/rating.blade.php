@extends('layout')

@section('body')
<h1>Insert Rating</h1>
<hr>
<form action="{{ route('rating.rate') }}" method="POST">
  @csrf
  <table>
    <tr>
      <td>Book Author</td>
      <td>:</td>
      <td>
        <select required name="author" id="author-option">
          <option value="">--- select author ---</option>  
          @foreach ($authors as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>  
          @endforeach
        </select>
      </td>
    </tr>
    <tr>
      <td>Book Name</td>
      <td>:</td>
      <td>
        <select required name="book" id="book-option">
         <option value="">--- select author first ---</option>  
        </select>
      </td>
    </tr>
    <tr>
      <td>Rating</td>
      <td>:</td>
      <td>
        <select required name="rating" id="">
         @for ($i = 1; $i <= 10; $i++)
             <option value="{{ $i }}">{{ $i }}</option>
         @endfor  
        </select>
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

<script>
  const authorOption = document.getElementById('author-option');
  const bookOption = document.getElementById('book-option');

  authorOption.addEventListener('input', function(e) {
    updateBookList(authorOption.value);
  })

  const updateBookList = (authorId) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `/api/authors/${authorId}/books`);
    xhr.send();
    xhr.onload = function(e) {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        var response = JSON.parse(xhr.responseText);
        renderBookList(response);
      }
      else {
        alert('Unable to load books');
      }
    }
  }

  const renderBookList = (books) => {
    let options = '<option value="">--- select book ---</option>';
    
    for (key in books) {
      options +=  `<option value="${books[key].id}">${books[key].name}</option>`;
    }

    bookOption.innerHTML = options;
  }
</script>
@endsection