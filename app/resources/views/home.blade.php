
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicWave - Nghe nhạc trực tuyến</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #101010;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        header {
            min-height: 76px;
            padding: 16px 5%;
            background: #171717;
            border-bottom: 1px solid #292929;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .logo {
            color: #1ed760;
            font-size: 27px;
            font-weight: bold;
            text-decoration: none;
        }

        nav {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        nav a {
            color: #ccc;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            color: #1ed760;
        }

        .search {
            width: 260px;
            max-width: 100%;
            padding: 12px 16px;
            color: white;
            background: #252525;
            border: 1px solid #393939;
            border-radius: 25px;
            outline: none;
        }

        .search:focus {
            border-color: #1ed760;
        }

        main {
            max-width: 1500px;
            margin: auto;
            padding: 35px 5%;
        }

        .hero {
            padding: 15px 0 30px;
        }

        .hero h1 {
            font-size: clamp(30px, 4vw, 46px);
            margin: 0 0 12px;
        }

        .hero h1 span {
            color: #1ed760;
        }

        .hero p {
            color: #aaa;
            font-size: 17px;
            margin: 0;
        }

        .section-title {
            border-left: 5px solid #1ed760;
            padding-left: 14px;
            margin: 18px 0 22px;
            font-size: 25px;
        }

        .filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .filter-btn {
            background: #252525;
            color: white;
            border: 1px solid #393939;
            padding: 9px 16px;
            border-radius: 22px;
            cursor: pointer;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #1ed760;
            border-color: #1ed760;
            color: #111;
        }

        .songs {
            display: grid;
            grid-template-columns: repeat(
                auto-fill,
                minmax(190px, 1fr)
            );
            gap: 20px;
        }

        .song {
            min-width: 0;
            padding: 14px;
            background: #191919;
            border: 1px solid #262626;
            border-radius: 12px;
            transition: background 0.2s, transform 0.2s;
        }

        .song:hover {
            background: #252525;
            transform: translateY(-3px);
        }

        .cover {
            width: 100%;
            aspect-ratio: 1 / 1;
            position: relative;
            overflow: hidden;
            border-radius: 9px;
            background: linear-gradient(
                135deg, #7148e8, #e14eca
            );
        }

        .cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .cover-placeholder {
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            font-size: 48px;
        }

        .play-overlay {
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #1ed760;
            color: #111;
            display: grid;
            place-items: center;
            font-size: 21px;
            opacity: 0;
            transform: translateY(8px);
            transition: 0.2s;
            box-shadow: 0 4px 15px #0008;
            pointer-events: none;
        }

        .song:hover .play-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .song h3 {
            margin: 15px 0 8px;
            font-size: 16px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .artist {
            color: #b3b3b3;
            font-size: 14px;
            margin: 0 0 12px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .genre {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            background: #173e31;
            color: #4de7b0;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .song audio {
            display: block;
            width: 100%;
            height: 40px;
        }

        .empty {
            grid-column: 1 / -1;
            padding: 35px;
            text-align: center;
            color: #aaa;
            background: #191919;
            border-radius: 12px;
        }

        footer {
            padding: 25px;
            text-align: center;
            color: #888;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            header {
                padding: 18px 5%;
            }

            nav {
                gap: 14px;
                font-size: 14px;
            }

            .search {
                width: 100%;
            }

            main {
                padding: 25px 5%;
            }

            .songs {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .song {
                padding: 10px;
            }

            .song h3 {
                font-size: 14px;
            }

            .song audio {
                height: 36px;
            }

            .play-overlay {
                width: 38px;
                height: 38px;
            }
        }
        /* Trình phát nhạc MusicWave */
.music-player {
    margin-top: 14px;
    padding: 12px;
    background: #252525;
    border-radius: 12px;
}

.player-controls {
    display: flex;
    align-items: center;
    gap: 10px;
}

.play-btn {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    border: none;
    border-radius: 50%;
    background: #1ed760;
    color: #111;
    font-size: 19px;
    cursor: pointer;
    display: grid;
    place-items: center;
    transition: transform 0.2s, background 0.2s;
}

.play-btn:hover {
    transform: scale(1.08);
    background: #35f078;
}

.timeline {
    flex: 1;
    min-width: 0;
}

.time-row {
    display: flex;
    justify-content: space-between;
    gap: 8px;
    color: #aaa;
    font-size: 11px;
    margin-bottom: 7px;
}

.seek-bar {
    width: 100%;
    height: 5px;
    accent-color: #1ed760;
    cursor: pointer;
    display: block;
}

.volume-label {
    color: #aaa;
    font-size: 12px;
}
    </style>
</head>

<body>
    <header>
        <a class="logo" href="{{ url('/') }}">♫ MusicWave</a>

        <nav>
            <a href="{{ url('/') }}">⌂ Trang chủ</a>
            <a href="#the-loai">♫ Thể loại</a>
            <a href="{{ route('songs.index') }}">Quản lý</a>
        </nav>

        <input
            type="search"
            class="search"
            id="searchInput"
            placeholder="⌕ Tìm kiếm bài hát..."
            aria-label="Tìm kiếm bài hát"
        >
    </header>

    <main>
        <section class="hero">
            <h1>Khám phá <span>âm nhạc</span></h1>
            <p>Không gian âm nhạc dành riêng cho bạn.</p>
        </section>

        <h2 class="section-title">Bài hát nổi bật</h2>

        <div class="filters" id="the-loai">
            <button class="filter-btn active" data-genre="all">
                Tất cả
            </button>
            @foreach ($songs->pluck('genre')->filter()->unique() as $genre)
                <button
                    class="filter-btn"
                    data-genre="{{ $genre }}"
                >
                    {{ $genre }}
                </button>
            @endforeach
        </div>

        <div class="songs" id="songList">
            @forelse ($songs as $song)
                <article
                    class="song"
                    data-title="{{ strtolower($song->title) }}"
                    data-artist="{{ strtolower($song->artist) }}"
                    data-genre="{{ strtolower($song->genre ?? '') }}"
                >
                    <div class="cover">
                        @if ($song->cover_image)
                            <img
                                src="{{ asset('storage/' . $song->cover_image) }}"
                                alt="Ảnh bìa {{ $song->title }}"
                                loading="lazy"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';"
                            >
                            <div
                                class="cover-placeholder"
                                style="display:none"
                            >♫</div>
                        @else
                            <div class="cover-placeholder">♫</div>
                        @endif

                        
                    </div>

                    <h3 title="{{ $song->title }}">
                        {{ $song->title }}
                    </h3>

                    <p class="artist">{{ $song->artist }}</p>

                    <span class="genre">
                        {{ $song->genre ?? 'Chưa phân loại' }}
                    </span>

                   @if ($song->audio_file)
    <div class="music-player">
        <audio class="audio-file" preload="metadata">
            <source
                src="{{ asset('storage/' . $song->audio_file) }}"
                type="audio/mpeg"
            >
        </audio>

        <div class="player-controls">
            <button
                type="button"
                class="play-btn"
                aria-label="Phát nhạc"
            >▶</button>

            <div class="timeline">
                <div class="time-row">
                    <span class="current-time">0:00</span>
                    <span class="duration">0:00</span>
                </div>

                <input
                    type="range"
                    class="seek-bar"
                    min="0"
                    max="100"
                    value="0"
                    step="0.1"
                    aria-label="Tua bài hát"
                >
            </div>
        </div>
    </div>
@else
    <p class="artist">Chưa có tệp nhạc</p>
@endif
                </article>
            @empty
                <p class="empty">
                    Chưa có bài hát nào. Hãy thêm bài hát đầu tiên!
                </p>
            @endforelse
        </div>

        <p class="empty" id="noResults" style="display:none">
            Không tìm thấy bài hát phù hợp.
        </p>
    </main>

    <footer id="lien-he">
        © 2026 MusicWave - Website nghe nhạc trực tuyến
    </footer>

    <script>
        const searchInput = document.getElementById('searchInput');
        const cards = [...document.querySelectorAll('.song')];
        const filterButtons = [
            ...document.querySelectorAll('.filter-btn')
        ];
        const noResults = document.getElementById('noResults');

        let selectedGenre = 'all';

        function filterSongs() {
            const keyword = searchInput.value.trim().toLowerCase();
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.dataset.title || '';
                const artist = card.dataset.artist || '';
                const genre = card.dataset.genre || '';

                const matchesSearch =
                    title.includes(keyword) ||
                    artist.includes(keyword);

                const matchesGenre =
                    selectedGenre === 'all' ||
                    genre === selectedGenre.toLowerCase();

                const visible = matchesSearch && matchesGenre;

                card.style.display = visible ? '' : 'none';

                if (visible) visibleCount++;
            });

            noResults.style.display =
                visibleCount === 0 ? 'block' : 'none';
        }

        searchInput.addEventListener('input', filterSongs);

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                selectedGenre = button.dataset.genre;

                filterButtons.forEach(item => {
                    item.classList.toggle(
                        'active',
                        item === button
                    );
                });

                filterSongs();
            });
        });
        // Điều khiển trình phát nhạc MusicWave
document.querySelectorAll('.music-player').forEach(player => {
    const audio = player.querySelector('.audio-file');
    const playBtn = player.querySelector('.play-btn');
    const seekBar = player.querySelector('.seek-bar');
    const currentTime = player.querySelector('.current-time');
    const duration = player.querySelector('.duration');

    function formatTime(seconds) {
        if (!Number.isFinite(seconds)) return '0:00';

        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);

        return mins + ':' + String(secs).padStart(2, '0');
    }

    audio.addEventListener('loadedmetadata', () => {
        duration.textContent = formatTime(audio.duration);
    });

    audio.addEventListener('durationchange', () => {
        duration.textContent = formatTime(audio.duration);
    });

    playBtn.addEventListener('click', async () => {
        if (audio.paused) {
            // Dừng bài nhạc khác để chỉ phát một bài tại một thời điểm
            document.querySelectorAll('.audio-file').forEach(otherAudio => {
                if (otherAudio !== audio) {
                    otherAudio.pause();
                }
            });

            try {
                await audio.play();
            } catch (error) {
                console.error('Không thể phát nhạc:', error);
            }
        } else {
            audio.pause();
        }
    });

    audio.addEventListener('play', () => {
        playBtn.textContent = 'Ⅱ';
        playBtn.setAttribute('aria-label', 'Tạm dừng');
    });

    audio.addEventListener('pause', () => {
        playBtn.textContent = '▶';
        playBtn.setAttribute('aria-label', 'Phát nhạc');
    });

    audio.addEventListener('timeupdate', () => {
        currentTime.textContent = formatTime(audio.currentTime);

        if (Number.isFinite(audio.duration) && audio.duration > 0) {
            seekBar.value = (audio.currentTime / audio.duration) * 100;
        }
    });

    seekBar.addEventListener('input', () => {
        if (Number.isFinite(audio.duration) && audio.duration > 0) {
            audio.currentTime =
                (Number(seekBar.value) / 100) * audio.duration;
        }
    });

    audio.addEventListener('ended', () => {
        seekBar.value = 0;
        currentTime.textContent = '0:00';
    });
});
    </script>
</body>
</html>
