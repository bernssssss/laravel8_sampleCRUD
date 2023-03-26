@extends('products.layout')

@section('content')
<div style="margin-top: 3rem;">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-3 mb-2 text-dark pull-left"><h2>Tadashi Product Listing</h2></div>
        <div class="pull-right" style="margin-bottom: 1rem;  " >
            <a class="btn btn-gray" href="{{ route('products.create') }}"> + Add Product</a>
        </div>
    </div>

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="margin-top: 3rem">
            <p>{{ $message }}</p>
        </div>
    @endif
 

    <table class="table table-bordered">
        <tr style="background: linear-gradient(150deg, #ADF7F2,#15AAFF);">
            <th>ID</th>
            <th>Model</th>
            <th>Descriptions</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr style="background: #a4d7f7;" >
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn " href="{{ route('products.show',$product->id) }}"><u>Show</a></u>
                    <a class="btn " href="{{ route('products.edit',$product->id) }}"><u>Edit</a></u>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=" btn" style="background:#a4d7f7; color:#e20707;"><u>Delete</button></u>
                </form>
            </td>
        </tr>
    
        @endforeach

    </table>
</div>

    {{ $products->links() }}


@endsection
