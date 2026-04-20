<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">
  <h1>Products</h1>

  <form action="/products" method="POST" class="product-form">
    @csrf

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}">
    </div>

    <div class="form-group">
      <label for="category_input">Category:</label>
      <select name="category_id" id="category_input" class="form-control">
        <option value="">-- select category --</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-submit">Save</button>
    </div>
  </form>

  <hr>

  <table class="product-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ optional($item->category)->category_name }}</td>
        <td>{{ $item->price }}</td>
        <td>
          <a href="/products/{{ $item->id }}/edit" class="btn btn-edit">Edit</a>
          <form action="/products/{{ $item->id }}" method="POST" class="delete-form" style="display:inline-block; margin-left:8px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>