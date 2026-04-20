<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
  <h1>Edit Product</h1>

  <form action="/products/{{ $item->id }}" method="POST" class="product-form">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $item->name) }}">
    </div>

    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $item->price) }}">
    </div>

    <div class="form-group">
      <label for="category_input">Category: </label>
      <select name="category_id" id="category_input" class="form-control">
        <option value="">-- select category --</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ (old('category_id', optional($item->category)->id) == $category->id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-submit">Update</button>
      <a href="/products" class="btn btn-cancel">Cancel</a>
    </div>
  </form>
</div>
</body>
</html>