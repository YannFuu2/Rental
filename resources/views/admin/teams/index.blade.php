@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Semua Data</h3>
                            <a href="{{ route('admin.teams.create') }}" class="btn btn-success shadow-sm float-right"> <i
                                    class="fa fa-plus"></i> Tambah </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Photo</th>
                                            <th>Jabatan</th>
                                            <th>Bio</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($teams as $team)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $team->nama }}</td>
                                                <td>
                                                    <a href="{{ Storage::url($team->photo) }}" target="_blank">
                                                        <img src="{{ Storage::url($team->photo) }}" width="80"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td>{{ $team->jabatan }}</td>
                                                <td>{{ $team->bio }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('admin.teams.edit', $team) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form onclick="return confirm('are you sure !')"
                                                            action="{{ route('admin.teams.destroy', $team) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" team="submit"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Data Kosong !</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('style-alt')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
    </script>
@endpush
