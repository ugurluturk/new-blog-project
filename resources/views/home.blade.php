@extends('layouts.app')

@section('content')
    <div style="background-color: #ffffff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h1 style="font-size: 2.5rem; font-weight: 700; text-align: center; color: #333; margin-bottom: 2rem;">Hoş Geldiniz</h1>
        <p style="text-align: center; color: #666; font-size: 1.125rem;">Bu panel üzerinden yazarları, kategorileri ve yazıları kolayca görüntüleyip yönetebilirsiniz.</p>
    </div>
    
    <div style="margin-top: 3rem;">
        <h2 style="font-size: 1.75rem; font-weight: 600; color: #333; margin-bottom: 1.5rem;">En Son Yazılar</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 25%;">Başlık</th>
                        <th style="width: 45%;">İçerik</th>
                        <th style="width: 15%;">Yazar</th>
                        <th style="width: 15%;">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->content, 500) }}</td>
                            <td class="whitespace-nowrap">{{ $post->author ? $post->author->name : 'Yazar Yok' }}</td>
                            <td class="whitespace-nowrap">{{ $post->category ? $post->category->name : 'Kategori Yok' }}</td>  
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 3rem;">
        <h2 style="font-size: 1.75rem; font-weight: 600; color: #333; margin-bottom: 1.5rem;">Tüm Yazarlar</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Adı</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 3rem;">
        <h2 style="font-size: 1.75rem; font-weight: 600; color: #333; margin-bottom: 1.5rem;">Yazarların Kategori Bazlı Yazı Sayıları</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 20%;">Yazar Adı</th>
                        <th>Kategori ve Yazı Sayısı</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authorCategoryCounts as $authorName => $categoryCounts)
                    <tr>
                        <td style="font-weight: 600;">{{ $authorName }}</td>
                        <td>
                            @foreach($categoryCounts as $categoryName => $count)
                                <span style="display: inline-block; background-color: #e9ecef; padding: 0.25rem 0.75rem; border-radius: 4px; margin-right: 0.5rem; margin-bottom: 0.5rem; font-size: 0.9rem;">
                                    {{ $categoryName }} ({{ $count }})
                                </span>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection