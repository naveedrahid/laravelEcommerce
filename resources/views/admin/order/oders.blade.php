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
                <h3 class="card-title">All Order</h3>

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
                            <th style="width: 40%">
                                Order
                            </th>
                            <th style="width: 15%">
                                Date
                            </th>
                            <th style="width: 15%">
                                Order Status
                            </th>
                            <th style="width: 15%">
                                Total
                            </th>
                            <th style="width: 15%">
                                Order View
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($oders) > 0)
                            @foreach ($oders as $oder)
                                <tr>
                                    <td>
                                        #{{ $oder->id }} {{ $oder->first_name . ' ' . $oder->last_name }}
                                    </td>
                                    <td>
                                        <small>
                                            {{ $oder->created_at->toDateString() }}
                                        </small>
                                    </td>
                                    <td>
                                        @if ($oder->order_status == 'complete')
                                            <span class="badge badge-success">{{ $oder->order_status }}</span>
                                        @elseif($oder->order_status == 'cancelled')
                                            <span class="badge alert-cancelled">{{ $oder->order_status }}</span>
                                        @elseif($oder->order_status == 'on-hold')
                                            <span class="badge bg-gray">{{ $oder->order_status }}</span>
                                        @elseif($oder->order_status == 'refund')
                                            <span class="badge alert-refund">{{ $oder->order_status }}</span>
                                        @elseif($oder->order_status == 'processing')
                                            <span class="badge alert-primary">{{ $oder->order_status }}</span>
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        ${{ $oder->order_total}}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{route('admin.order.edit', $oder->id )}}">
                                            <i class="fas fa-pencil-alt"></i>
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div style="width: 200px;margin: auto;">
                    {{ $oders->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
