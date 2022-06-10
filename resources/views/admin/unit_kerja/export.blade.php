<table>
    <thead>
        <tr>
            <th><b>No.</b></th>
            <th><b>Nama Unit Kerja</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nama_unit_kerja}}</td>
        </tr>
        @endforeach
    </tbody>
</table>