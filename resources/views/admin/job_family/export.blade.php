<table>
    <thead>
        <tr>
            <th><b>No.</b></th>
            <th><b>Nama Tema</b></th>
            <th><b>Deskripsi</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nama_tema}}</td>
            <td>{{$item->deskripsi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>