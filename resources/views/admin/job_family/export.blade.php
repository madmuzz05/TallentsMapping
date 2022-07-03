<table>
    <thead>
        <tr>
            <th><b>No.</b></th>
            <th><b>Kode</b></th>
            <th><b>Job Family</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->job_family}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
