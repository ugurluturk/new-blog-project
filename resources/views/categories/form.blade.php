@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 600px; margin: auto;">
        <h1 style="text-align: center;">{{ isset($category) ? 'Kategori Düzenle' : 'Yeni Kategori Ekle' }}</h1>

        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST" style="background: #f9f9f9; padding: 2rem; border-radius: 8px; border: 1px solid #ddd;">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif

            <div class="form-group" style="margin-bottom: 1rem;">
                <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Kategori Adı:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary" style="padding: 0.75rem 1.5rem; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; background-color: #007bff; color: white;">{{ isset($category) ? 'Güncelle' : 'Ekle' }}</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary" style="padding: 0.75rem 1.5rem; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; text-align: center; background-color: #6c757d; color: white;">İptal</a>
            </div>
        </form>
    </div>
@endsection