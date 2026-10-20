<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý bài hát - MusicWave</title>
    <style>
        body { font-family: Arial; background: #121212; color: white; padding: 30px; }
        a, button { padding: 9px 14px; border: 0; border-radius: 6px; cursor: pointer; text-decoration: none; }
        a { background: #1ed760; color: black; }
        table { width: 100%; margin-top: 25px; border-collapse: collapse; background: #222; }
        th, td { padding: 14px; border-bottom: 1px solid #444; text-align: left; }
        .delete { background: #e74c3c; color: white; }
        .edit { background: #f1c40f; color: black; }
    </style>
</head>
<body>
    <h1>MusicWave - Quản lý bài hát</h1>

    <a href="{{ route('songs.create') }}">+ Thêm bài hát</a>
    <a href="{{ url('/') }}">Trang chủ</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên bài hát</th>
                <th>Ca sĩ</th>
                <th>Thể loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($songs as $song)
                <tr>
                    <td>{{ $song->id }}</td>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->artist }}</td>
                    <td>{{ $song->genre ?? 'Chưa phân loại' }}</td>
                    <td>
                        <a class="edit" href="{{ route('songs.edit', $song) }}">Sửa</a>

                        <form action="{{ route('songs.destroy', $song) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="delete" type="submit"
                                onclick="return confirm('Bạn có chắc muốn xóa bài hát này?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Chưa có bài hát nào. Hãy thêm bài hát đầu tiên!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>