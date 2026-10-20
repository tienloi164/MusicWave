<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài hát - MusicWave</title>
</head>
<body style="font-family:Arial;background:#121212;color:white;padding:30px">

    <h1>🎵 Thêm bài hát mới</h1>

    @if ($errors->any())
        <ul style="color:#ff7777">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('songs.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <p>Tên bài hát</p>
        <input type="text" name="title"
               value="{{ old('title') }}" required>

        <p>Ca sĩ</p>
        <input type="text" name="artist"
               value="{{ old('artist') }}" required>

        <p>Thể loại</p>
        <input type="text" name="genre"
               value="{{ old('genre') }}">

        <p>Chọn ảnh bìa (không bắt buộc)</p>
        <input type="file" name="cover_image"
               accept="image/jpeg,image/png,image/webp">

        <p>Chọn tệp nhạc MP3 (không bắt buộc)</p>
        <input type="file" name="audio_file"
               accept=".mp3,audio/mpeg">

        <p style="margin-top:25px">
            <button type="submit">Lưu bài hát</button>
            <a href="{{ route('songs.index') }}"
               style="color:#1ed760;margin-left:10px">
                Quay lại
            </a>
        </p>

    </form>

</body>
</html>