<table>
    <thead>
        <tr>
            <th><b>No.</b></th>
            <th><b>Pernyataan</b></th>
            <th><b>Tema Bakat</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->pernyataan}}</td>
            <td>{{$item->tema_bakat->nama_tema}}</td>
        </tr>
        @endforeach
    </tbody>
</table>