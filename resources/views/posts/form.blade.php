@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px; margin: auto;">
        <h1 style="text-align: center;">{{ isset($post) ? 'Yazı Düzenle' : 'Yeni Yazı Ekle' }}</h1>

        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" style="background: #f9f9f9; padding: 2rem; border-radius: 8px; border: 1px solid #ddd;">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif

            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="title" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Başlık:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="content" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">İçerik:</label>
                <textarea name="content" id="content" rows="10" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">{{ old('content', $post->content ?? '') }}</textarea>
            </div>

            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="author_id" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Yazar:</label>
                <select name="author_id" id="author_id" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id', $post->author_id ?? '') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="category_id" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Kategori:</label>
                <select name="category_id" id="category_id" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary" style="padding: 0.75rem 1.5rem; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; background-color: #007bff; color: white;">{{ isset($post) ? 'Güncelle' : 'Ekle' }}</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary" style="padding: 0.75rem 1.5rem; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; text-align: center; background-color: #6c757d; color: white;">İptal</a>
            </div>
        </form>
    </div>
@endsection