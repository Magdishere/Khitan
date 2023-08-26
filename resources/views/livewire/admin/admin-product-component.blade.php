<style>
    nav svg{
        height: 20px;
    }
    nav .hidden{
        display: block;
    }
    th{
        color: hsl(330, 80%, 61%) !important;
    }
    .edit-link{
        color: hsl(330, 81%, 29%) !important;

    }
</style>
<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Products
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header  bg-white rounded-lg">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="text-xl px-2 text-bold">All Products</span>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.product.add')}}" class="btn float-end"><i class="fa fa-plus"></i> Add New Product</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="py-3 px-6 text-left font-bold text-center ">#</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Image</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Name</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Stock</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Price</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Category</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Date</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300">
                                        @php
                                            $i = ($products->currentPage()-1)*$products->perPage();
                                        @endphp
                                        @foreach($products as $product)
                                            <tr class="hover:bg-gray-100">
                                                <td class="py-4 px-6 text-center">{{++$i}}</td>
                                                <td class="py-4 px-6 text-center"><img src="{{asset('assets/imgs/products')}}/{{$product->image}}" alt="{{$product->name}}" width="60" /></td>
                                                <td class="py-4 px-6 text-center">{{$product->name}}</td>
                                                <td class="py-4 px-6 text-center">{{$product->stock_status}}</td>
                                                <td class="py-4 px-6 text-center">${{$product->regular_price}}</td>
                                                <td class="py-4 px-6 text-center">{{$product->category->name}}</td>
                                                <td class="py-4 px-6 text-center">{{$product->created_at}}</td>
                                                <td class="py-4 px-6 text-center">
                                                    <a href="{{ route('admin.product.edit', ['product_id' => $product->id]) }}" class="text-info edit-link">Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{$product->id}})" style="margin-left: 20px">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Are you sure you want to delete this product?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteProduct()">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('product_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteProduct(){
            @this.call('deleteProduct');
            $('#deleteConfirmation').modal('hide');

        }
    </script>
@endpush
