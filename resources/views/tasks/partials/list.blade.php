<section class="space-y-6">
        <table id="tasks-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>NIM</th>
                    <th>Project</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->deadline }}</td>
                    <td>{{ $item->user_nim }}</td>
                    <td>{{ $item->project->judul }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</section>