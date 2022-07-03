<table>
    <thead>
        <tr>
            <th><b>No.</b></th>
            <th><b>Kode</b></th>
            <th><b>Job Family</b></th>
            <th><b>Nama Unit Kerja</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->job_family->kode}}</td>
            <td>{{$item->job_family->job_family}}</td>
            <td>{{$item->departemen}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
