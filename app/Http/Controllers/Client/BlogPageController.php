<?php

namespace App\Http\Controllers\Client;

use App\Models\Blog;
use App\Models\Announcement;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPageController extends Controller
{
    public function index(Request $request, $category = null)
    {
        $search = $request->input('search');
        $blogCategories = BlogCategory::whereHas('blogs')->active()->sorting()->get();
        $blogSuperHighlights = Blog::whereHas('category', function($active){
            $active->where('active', 1);
        })->superHighlightOnly()->active()->sorting()->limit(6)->get();
        $blogHighlights = Blog::whereHas('category', function($active){
            $active->where('active', 1);
        })->highlightOnly()->active()->sorting()->limit(4)->get();

        $superHighlightIds = $blogSuperHighlights->pluck('id');
        $highlightIds = $blogHighlights->pluck('id');        

        $excludedIds = $superHighlightIds->merge($highlightIds);

        $blogAll = Blog::with('category')
        ->whereHas('category', function($active){
            $active->where('active', 1);
        })
        ->whereNotIn('id', $excludedIds);

        if ($category) {
            $blogAll = $blogAll->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        }

        if ($search) {
            $blogAll = $blogAll->whereHas('category')->where('title', 'like', '%' . $search . '%');
        }

        $blogAll = $blogAll->active()->sorting()->paginate(3);
        
        $blogSeeAlso = Blog::with('category')
        ->whereHas('category', function($active){
            $active->where('active', 1);
        })
        ->whereNotIn('id', $excludedIds->merge($blogAll->pluck('id')))
        ->active()
        ->inRandomOrder()
        ->limit(4)
        ->get();

        $announcements = Announcement::active()->sorting()->get();

        return view('client.blades.blog', compact(
            'blogCategories',
            'blogSuperHighlights',
            'blogHighlights',
            'blogAll',
            'blogSeeAlso',
            'announcements',
        ));
    }

    public function blogInner($slug = null)
    {
        if (!$slug) {
            abort(404);
        }

        $blogInner = Blog::with('category')
        ->whereHas('category')
        ->where('slug', $slug)
        ->active()
        ->sorting()
        ->first();

        if (!$blogInner) {
            abort(404);
        }

        // Buscar relacionados da mesma categoria
        $blogRelacionados = Blog::whereHas('category', function ($query) use ($blogInner) {
            $query->where('id', $blogInner->category->id);
        })
        ->where('id', '!=', $blogInner->id)
        ->active()
        ->sorting()
        ->take(4)
        ->get();

        $blogCategories = BlogCategory::whereHas('blogs')->active()->sorting()->get();
        $announcements = Announcement::active()->sorting()->get();

        // Compartilha a variável globalmente (para menu/header)
        view()->share('blogInner', $blogInner);

        return view('client.blades.blog-inner', compact('announcements','blogInner', 'slug', 'blogCategories', 'blogRelacionados'));
    }

}
