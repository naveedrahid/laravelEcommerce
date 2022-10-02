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
        {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif --}}
        {{-- @if (session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
                 @endif

                @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
              @endif --}}
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Products Categories</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 20%">
                                Category Created
                            </th>

                            <th style="width: 50%">
                                Category Title
                            </th>
                            <th style="width: 15%" class="text-center">
                                Edi Category
                            </th>
                            <th style="width: 15%" class="text-center">
                                Delete Category
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories) > 0)
                            {{-- @php
                               dd($category);
                           @endphp --}}
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <small>Created </small>
                                        <br />
                                        {{ $category->created_at->toDateString() }}
                                        <br />
                                        <small>Last Updated </small>
                                        <br />
                                        {{ $category->updated_at->toDateString() }}
                                    </td>
                                    <td>
                                        {{ $category->cat_title }}
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="{{route('admin.category.edit', $category->id)}}"><i
                                                class="fas fa-pencil-alt"></i>Edit</a>
                                    </td>
                                    <td class="text-right text-center">
                                        <form action="{{route('admin.category.destroy', $category->id)}}" method="POST" role="form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure ?')">
                                                <i class="fas fa-trash"></i>
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
                    {{ $categories->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
