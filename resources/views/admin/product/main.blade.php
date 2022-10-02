@extends('admin.adminLayout.adminMaster')
@section('admin')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 17%">
                                    Product Name
                                </th>
                                <th style="width: 13%">
                                    Short Desc
                                </th>
                                <th style="width: 10%">
                                    Product Image
                                </th>
                                <th style="width: 10%">
                                    Category
                                </th>
                                <th style="width: 10%">
                                    Product Price
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Product Status
                                </th>
                                <th style="width: 10%" class="text-center">
                                    Product Qty
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products) > 0)
                                @foreach ($products as $product)
       
                                    <tr>
                                        <td>
                                            <a>
                                                {{ $product->product_title }}
                                            </a>
                                            <br />
                                            <small>
                                                Created {{ $product->created_at->toDateString() }}
                                            </small>
                                        </td>
                                        <td>
                                            {{ $product->product_short_desc }}
                                        </td>
                                        <td style="text-align: center;">
                                            @if ($product->product_image)
                                                <img src="{{ asset($product->product_image) }}" alt=""
                                                    width="60">
                                            @else
                                                <h4>No Image Found</h4>
                                            @endif
                                        </td>
                                        <td class="project_progress">
                                            {{$product->category->cat_title}}
                                        </td>
                                        <td class="project-state">
                                            ${{ $product->amount }}
                                        </td>
                                        <td class="project-state">
                                            <span class="badge badge-success">{{ $product->product_status }}</span>
                                        </td>
                                        <td class="text-center">
                                            {{ $product->product_qnty }}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.products.edit', $product->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST" role="form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure ?')">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div style="width: 200px;margin: auto;">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
@endsection
