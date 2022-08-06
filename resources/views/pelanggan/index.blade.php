<x-app :title=$title :breadcumb=$breadcumb>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row ">
                        <div class="col-10">
                            <h6>Pelanggan Tabel</h6>
                        </div>
                        <div class="col-2">search</div>
                    </div>
                    {{-- Button Tambah Admin --}}
                    <a href="" class="btn btn-primary col-2" data-bs-toggle="modal" data-bs-target="#modalTambah"> <i class="fa fa-user"></i>&nbsp;Tambah Pelanggan</a>
                    {{-- Modal Tambah Admin --}}
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.store') }}" method="post" id="addForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email@ginio.id">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control" cols="40" rows="2" placeholder="alamat"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nomer Hp</label>
                                            <input type="text" name="numb" class="form-control" id="exampleFormControlInput1" placeholder="Nomer Hp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="************">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Tambah Admin --}}
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 me-2">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Lengkap</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Hp</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelanggan as $a)
                                    <tr>
                                        <td>
                                            <div class="d-flex py-1">
                                                <div class="me-3">&nbsp; {{ $loop->iteration }}</div>
                                            </div>
                                        </td>
                                        <td>{{ $a['fname'] }} {{ $a['lname'] }}</td>
                                        <td>{{ $a->alamat }}</td>
                                        <td>{{ $a->numb }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary" type="submit">Detail</button>
                                                </form>
                                                <form action="{{ route('admin.destroy',$a->id) }}" method="post">
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
        </div>
    </div>
</x-app>
