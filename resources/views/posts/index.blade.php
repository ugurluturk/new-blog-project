@extends('layouts.app')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 style="font-size: 2.5rem; font-weight: 700; text-align: center; color: #333; margin-bottom: 2rem;">Yazılar</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-danger">
                {{ session('warning') }}
            </div>
        @endif

        <div style="display: flex; justify-content: flex-end; margin-bottom: 1rem;">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Yeni Yazı Ekle</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th style="width: 15%;">Başlık</th>
                        <th style="width: 35%;">İçerik</th>
                        <th style="width: 15%;">Yazar</th>
                        <th style="width: 15%;">Kategori</th>
                        <th style="width: 15%;">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 100) }}</td>
                        <td class="whitespace-nowrap">{{ $post->author ? $post->author->name : 'Yazar Silindi' }}</td>
                        <td class="whitespace-nowrap">{{ $post->category ? $post->category->name : 'Kategori Silindi' }}</td>
                        <td class="action-links">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Düzenle</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bu yazıyı silmek istediğinizden emin misiniz?');">Sil</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection