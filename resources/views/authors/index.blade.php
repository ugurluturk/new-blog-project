@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h1>Yazarlar</h1>
            <a href="{{ route('authors.create') }}" class="btn btn-primary">Yeni Yazar Ekle</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        
        @if (session('warning'))
            <div class="alert alert-danger">
                {{ session('warning') }}
            </div>
        @endif
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adı</th>
                    <th style="text-align: right; padding-right: 5rem;">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td style="text-align: right;">
                        <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary">Düzenle</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bu yazarı silmek istediğinizden emin misiniz?');" data-post-count="{{ $author->posts()->count() }}">Sil</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('form[action*="authors"]');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    const button = form.querySelector('.btn-danger');
                    const postCount = parseInt(button.dataset.postCount);
                    
                    if (postCount > 0) {
                        const message = `Bu yazarın ${postCount} adet yazısı var. Silerseniz bu yazılar yazarsız kalacaktır. Yine de silmek istediğinizden emin misiniz?`;
                        
                        if (!confirm(message)) {
                            event.preventDefault();
                        }
                    }
                });
            });
        });
    </script>
@endsection