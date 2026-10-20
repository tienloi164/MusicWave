<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài hát - MusicWave</title>
</head>
<body style="font-family:Arial;background:#121212;color:white;padding:30px">

    <h1>🎵 Cập nhật bài hát</h1>

    @if ($errors->any())
        <ul style="color:#ff7777">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('songs.update', $song) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <p>Tên bài hát</p>
        <input type="text" name="title"
               value="{{ old('title', $song->title) }}" required>

        <p>Ca sĩ</p>
        <input type="text" name="artist"
               value="{{ old('artist', $song->artist) }}" required>

        <p>Thể loại</p>
        <input type="text" name="genre"
               value="{{ old('genre', $song->genre) }}">

        <p>Ảnh bìa hiện tại</p>
        @if ($song->cover_image)
            <img src="{{ asset('storage/' . $song->cover_image) }}"
                 alt="Ảnh bìa hiện tại"
                 style="width:150px;display:block;margin-bottom:10px">
        @else
            <p>Chưa có ảnh bìa</p>
        @endif

        <p>Chọn ảnh bìa mới (không bắt buộc)</p>
        <input type="file" name="cover_image"
               accept="image/jpeg,image/png,image/webp">

        <p>Chọn tệp nhạc MP3 mới (không bắt buộc)</p>
        <input type="file" name="audio_file"
               accept=".mp3,audio/mpeg">

        <p style="margin-top:25px">
            <button type="submit">Cập nhật</button>
            <a href="{{ route('songs.index') }}"
               style="color:#1ed760;margin-left:10px">
                Quay lại
            </a>
        </p>

    </form>
</body>
</html>