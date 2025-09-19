<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // En son eklenen 5 yazıyı, yazar ve kategori bilgileriyle birlikte çeker.
        $posts = Post::with('author', 'category')->latest()->take(5)->get();

        // Tüm yazarları çeker.
        $authors = Author::all();
        
        // Yazarların kategori bazlı yazı sayılarını hesaplar.
        $authorCategoryCounts = [];
        $allAuthors = Author::with('posts.category')->get();

        foreach ($allAuthors as $author) {
            $categoryCounts = [];
            foreach ($author->posts as $post) {
                // Eğer postun kategorisi varsa sayıyı artırır.
                if ($post->category) {
                    $categoryName = $post->category->name;
                    if (!isset($categoryCounts[$categoryName])) {
                        $categoryCounts[$categoryName] = 0;
                    }
                    $categoryCounts[$categoryName]++;
                }
            }
            // Yazarın yazı sayısı 0'dan büyükse listeye ekler.
            if (count($categoryCounts) > 0) {
                $authorCategoryCounts[$author->name] = $categoryCounts;
            }
        }

        return view('home', compact('authors', 'posts', 'authorCategoryCounts'));
    }
}