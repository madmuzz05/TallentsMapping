<table>
    <thead>
        <tr>
            <th><b>No.</b></th>
            <th><b>No Pegawai</b></th>
            <th><b>Nama</b></th>
            <th><b>Alamat</b></th>
            <th><b>Telepon</b></th>
            <th><b>Email</b></th>
            <th><b>Hak Akses</b></th>
            <th><b>Departemen</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->no_pegawai}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->telepon}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->hak_akses}}</td>
            <td>{{$item->unit_kerja->departemen}}</td>
        </tr>
        @endforeach
    </tbody>
</table>