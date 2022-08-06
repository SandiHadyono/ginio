<x-app :title=$title :breadcumb=$breadcumb>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row ">
                        <div class="col-8">
                            <h6>Admin Tabel</h6>
                        </div>
                        <div class="ms-md-auto pe-md-3 col-2 align-items-center">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" placeholder="Type here...">
                            </div>
                        </div>
                    </div>
                    {{-- Button Tambah Admin --}}
                    <a href="" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#modalTambah"> <i
                            class="fa fa-user"></i>&nbsp;Tambah Admin</a>
                    {{-- Modal Tambah Admin --}}
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.store') }}" method="post" id="addForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fname" class="form-control-label">Nama Depan</label>
                                                    <input class="form-control" type="text" name="fname" id="fname"
                                                        placeholder="Nama Depan">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lname" class="form-control-label">Nama Belakang</label>
                                                    <input class="form-control" type="text" name="lname" id="lname"
                                                        placeholder="Nama Belakang">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="email@ginio.id">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control" cols="40" rows="2" placeholder="Alamat"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="numb" class="form-label">Nomer Hp</label>
                                            <input type="text" name="numb" class="form-control" id="numb"
                                                placeholder="Nomer Hp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="************">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="tambahSubmit">Save
                                        changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#tambahSubmit').click(function(e) {
                                e.preventDefault();
                                .ajax({
                                    url: {{ url('/admin/store') }},
                                    method: 'POST',
                                    data: {
                                        fname: $('#fname').val(),
                                        lname: $('#lname').val(),
                                        alamat: $('#alamat').val(),
                                        email: $('#email').val(),
                                        numb: $('#numb').val(),
                                        level:2,
                                        password: $('#password').val(),
                                    },
                                    success: function(result) {
                                        if (result.errors) {
                                            $('.alert-danger').html('');
                                            $.each(result.errors, function(key, value) {
                                                $('.alert-danger').show();
                                                $('.alert-danger').append('<li>' + value + '</li>');
                                            });
                                        } else {
                                            $('.alert-danger').hide();
                                            $('#modalTambah').modal('hide');
                                        }
                                    }
                                });
                            });
                        });
                    </script>


                    {{-- End Modal Tambah Admin --}}
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 me-2">
                                        #</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Lengkap</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Alamat</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        No Hp</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admin as $a)
                                    <tr>
                                        <td>
                                            <div class="d-flex py-1">
                                                <div class="me-3">&nbsp; {{ $loop->iteration }}</div>
                                            </div>
                                        </td>
                                        <td>{{ $a->fname }} {{ $a->lname }}</td>
                                        <td>{{ $a->alamat }}</td>
                                        <td>{{ $a->numb }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalUpdate-{{ $a->id }}">Ubah</a>
                                                <div class="modal fade" id="modalUpdate-{{ $a->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Update Data</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.update', $a->id) }}"
                                                                    method="post" id="updateForm">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="fname"
                                                                                    class="form-control-label">Nama
                                                                                    Depan</label>
                                                                                <input class="form-control"
                                                                                    type="text" name="fname"
                                                                                    value="{{ $a->fname }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="lname"
                                                                                    class="form-control-label">Nama
                                                                                    Belakang</label>
                                                                                <input class="form-control"
                                                                                    type="text" name="lname"
                                                                                    value="{{ $a->lname }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="alamat"
                                                                            class="form-label">Alamat</label>
                                                                        <textarea name="alamat" class="form-control" cols="40" rows="2">{{ $a->alamat }}</textarea>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="numb" class="form-label">Nomer
                                                                            Hp</label>
                                                                        <input type="text" name="numb"
                                                                            class="form-control" id="numb"
                                                                            value="{{ $a->numb }}">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('admin.destroy', $a->id) }}" method="DELETE">
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $admin->links('/vendor/pagination/bootstrap-4') }}
        </div>
    </div>

</x-app>
