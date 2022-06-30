<table>
    <thead>
        <tr>
            <th><b>No.</b></th>
            <th><b>Pernyataan</b></th>
            <th><b>Tema Bakat</b></th>
            <th><b>Bobot Nilai</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->pernyataan}}</td>
            <td>{{$item->tema_bakat->nama_tema}}</td>
            <td>{{$item->bobot_nilai}}</td>
        </tr>
        @endforeach
    </tbody>
</table>