<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlogController extends Controller {

    public function categories_show(Request $request) {

        $blogs = Blog::query()->orderByDesc('created_at')->paginate(3);
        $best_blogs = Blog::query()->orderByDesc('created_at')->where('is_best' , true)->paginate(3);
        $categories = BlogCategory::all();
        if ($request->has('search')) {
            $blogs = Blog::query()->where('title', 'LIKE', "%" . $request->search . "%")
                ->orWhere('content', 'LIKE', "%" . $request->search . "%")->paginate(12);

            $best_blogs = Blog::query()->where('title', 'LIKE', "%" . $request->search . "%")
               ->where('is_best' , true)->paginate(3);
        }

        return view('blog.categories.list', compact('blogs', 'categories' , 'best_blogs'));
    }

    public function single_category_show(Request $request, $slug) {
        $categories = BlogCategory::all();
        $category = BlogCategory::query()->where('title', str_replace("_", " ", $slug))->firstOrFail();
        $blogs = Blog::query()->orderByDesc('created_at');

        $blogs->whereHas('categories', function(Builder $query) use ($category) {
            $query->where('category_id', '=', $category->id);
        });

        $blogs = $blogs->paginate(5);
        return view('blog.categories.single', compact('categories', 'category', 'blogs'));
    }

    public function single_show($slug) {
        $categories = BlogCategory::all();

        $blog = Blog::query()->where('title', str_replace("_", " ", $slug))->firstOrFail();

        return view('blog.single' , compact('categories' , 'blog'));
    }

}
