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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sliders</h3>

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
                                Slider Label
                            </th>
                            <th style="width: 30%">
                                Slider Title
                            </th>
                            <th style="width: 20%">
                                Slider Image
                            </th>
                            <th style="width: 10%" class="text-center">
                                Slider Status
                            </th>
                            <th style="width: 10%" class="text-center">
                                Slider Edit
                            </th>
                            <th style="width: 10%" class="text-center">
                                Slider Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($sliders) > 0)
                            @foreach ($sliders as $slider)
                                <tr>

                                    <td>
                                        {{ $slider->label_name }}
                                    </td>
                                    <td>
                                        {{ $slider->slide_text }}
                                    </td>
                                    <td>
                                        @if ($slider->slide_img)
                                            <img src="{{ asset($slider->slide_img) }}" alt="" width="60">
                                        @else
                                            <h4>No Image Found</h4>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-success ">{{ $slider->slide_status }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="{{route('admin.slider.edit', $slider->id)}}"><i
                                                class="fas fa-pencil-alt"></i>Edit</a>
                                    </td>
                                    <td class="text-right text-center">
                                        <form action="{{route('admin.slider.destroy', $slider->id)}}" method="POST" role="form">
                                            @method('DELETE')
                                            @csrf
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
                    {{ $sliders->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
