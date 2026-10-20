<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::latest()->get();

        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'audio_file' => 'nullable|file|mimes:mp3|max:20480',
        ]);

        // Lưu ảnh bìa
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')
                ->store('covers', 'public');
        } else {
            unset($data['cover_image']);
        }

        // Lưu tệp nhạc
        if ($request->hasFile('audio_file')) {
            $data['audio_file'] = $request->file('audio_file')
                ->store('songs', 'public');
        } else {
            unset($data['audio_file']);
        }

        Song::create($data);

        return redirect()->route('songs.index')
            ->with('success', 'Thêm bài hát thành công!');
    }

    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'audio_file' => 'nullable|file|mimes:mp3|max:20480',
        ]);

        // Chỉ thay ảnh nếu người dùng chọn ảnh mới
        if ($request->hasFile('cover_image')) {
            if ($song->cover_image) {
                Storage::disk('public')->delete($song->cover_image);
            }

            $data['cover_image'] = $request->file('cover_image')
                ->store('covers', 'public');
        } else {
            unset($data['cover_image']);
        }

        // Chỉ thay nhạc nếu người dùng chọn tệp mới
        if ($request->hasFile('audio_file')) {
            if ($song->audio_file) {
                Storage::disk('public')->delete($song->audio_file);
            }

            $data['audio_file'] = $request->file('audio_file')
                ->store('songs', 'public');
        } else {
            unset($data['audio_file']);
        }

        $song->update($data);

        return redirect()->route('songs.index')
            ->with('success', 'Cập nhật bài hát thành công!');
    }

    public function destroy(Song $song)
    {
        if ($song->cover_image) {
            Storage::disk('public')->delete($song->cover_image);
        }

        if ($song->audio_file) {
            Storage::disk('public')->delete($song->audio_file);
        }

        $song->delete();

        return redirect()->route('songs.index')
            ->with('success', 'Xóa bài hát thành công!');
    }
}