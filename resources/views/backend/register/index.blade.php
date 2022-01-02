@extends('backend.masterBackend')
@section('title', 'Admin | Dashboard Admin')


@section('backend')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Data User</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark btn-md" data-toggle="modal" data-target="#exampleModal">
                            <i class="menu-icon fa  fa-plus-square"></i>
                            Add Data User
                        </button>


                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Insert Data User</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('register-user-store') }}" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name"
                                                        class="form-control @error('name') ins-invalid @enderror"
                                                        value="{{ old('name') }}" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>User Role</label>
                                                    <select class="custom-select" id="inputGroupSelect01" name="user_role">
                                                        <option selected>Pilih Option</option>
                                                        <option value="staff">Staff</option>
                                                        <option value="walikelas">Wali Kelas</option>
                                                        <option value="guru">Guru</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="custom-select" id="inputGroupSelect01"
                                                        name="jenis_kelamin">
                                                        <option selected>Pilih Option</option>
                                                        <option value="Laki-laki">Laki - laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email"
                                                        class="form-control @error('email') ins-invalid @enderror"
                                                        value="{{ old('email') }}" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                    <label for="password">Password</label>
                                                    <input type="text" class="form-control" disabled name="password"
                                                        @error('password') ins-invalid @enderror" value="qwerty" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                    <button class="btn btn-success" type="submit">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('style') }}" id="alert-notification">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h6>{{ session('message') }}</h6>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span id="close-notification">&times;</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>User Role</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $d)

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$d->user_role}}</td>
                                            <td>{{$d->name}}</td>
                                            <td>{{$d->jenis_kelamin ? $d->jenis_kelamin : "-"}}</td>
                                            <td>{{$d->email}}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="" class="btn btn-warning btn-sm m-1" data-toggle="modal"
                                                        data-target="#edit{{ $loop->iteration }}" style="border-radius: 5rem">EDIT</a>
                                                    <a href="{{url('/backend/register-user/delete/'.$d->id)}}" class="btn btn-danger btn-sm m-1" style="border-radius: 5rem">Hapus</a>

                                                    <div class="modal fade" id="edit{{ $loop->iteration }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="edit{{ $loop->iteration }}Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="edit{{ $loop->iteration }}Label">Update Data
                                                                        User
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('register-user-store', $d->id) }}" method="POST">
                                                                        @csrf
                                                                        <div class="form-row">
                                                                            <div class="form-group col-lg-6">
                                                                                <label for="name">Name</label>
                                                                                <input type="text" name="name"
                                                                                    class="form-control" value="{{$d->name}}" required>
                                                                            </div>
                                                                            <div class="form-group col-lg-6">
                                                                                <label for="user_role">User Role</label>
                                                                                <select class="custom-select"
                                                                                    id="inputGroupSelect01"
                                                                                    name="user_role">
                                                                                    <option value="staff">Staff</option>
                                                                                    <option value="guru">Guru</option>
                                                                                    <option value="walikelas">Wali Kelas</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-lg-6">
                                                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                                                                    <option value="Laki-laki {{ $d->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}">Laki-laki</option>
                                                                                    <option value="Perempuan {{ $d->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}">Perempuan</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-lg-6">
                                                                                <label for="email">Email</label>
                                                                                <input type="text" name="email" class="form-control @error('email') ins-invalid @enderror"  value="{{ $d->email }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-lg-12">
                                                                                <label for="password">Password</label>
                                                                                <input type="text" class="form-control" name="password_exist" @error('password') ins-invalid @enderror"  value="{{ $d->password_exist }}" required>

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-lg-12">
                                                                                <button class="btn btn-success"
                                                                                    type="submit">Simpan</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        });
    </script>
@endsection

@endsection
