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
</style>
<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Categories
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
                                        <span class="text-xl px-2 text-bold">All Categories</span>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.category.add')}}" class="btn float-end"><i class="fa fa-plus"></i> Add New Category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="py-3 px-6 text-left font-bold text-center ">#</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Name</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Slug</th>
                                            <th class="py-3 px-6 text-left font-bold text-center ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300">
                                        @php
                                            $i = ($categories->currentPage()-1)*$categories->perPage();
                                        @endphp
                                        @foreach($categories as $category)
                                            <tr class="hover:bg-gray-100">
                                                <td class="py-4 px-6 text-center">{{++$i}}</td>
                                                <td class="py-4 px-6 text-center">{{$category->name}}</td>
                                                <td class="py-4 px-6 text-center"><a href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->slug }}</a></td>
                                                <td class="py-4 px-6 text-center"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
