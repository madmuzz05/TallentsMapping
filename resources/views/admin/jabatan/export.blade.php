<table>
    <thead>
        <tr>
            <th><b>No.</b></th>
            <th><b>Jabatan</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->kategori_jabatan}}</td>
        </tr>
        @endforeach
    </tbody>
</table>