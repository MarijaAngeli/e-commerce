@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @if (Auth::user()->is_admin() == true)

                <div class="panel-body">
                    <form action="{{ route('products.update', ['id' => $product->id ]) }}" method="post" enctype="multipart/form-data">
                      <input name="_method" type="hidden" value="PUT">
                        <input name="_token" type="hidden" value="somelongrandom string">
                        {{ csrf_field() }}
                        {{-- {{ method_field('PATCH') }} --}}
                        <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="image">Price</label>
                              <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                              <button class="form-control btn btn-success">Save Product</button>
                        </div>
                  </form>
                </div>

                @else
                    <a href="/" class="btn btn-info btn-sm">Go to store</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
