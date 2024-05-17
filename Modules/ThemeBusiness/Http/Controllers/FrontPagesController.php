<?php

namespace Modules\ThemeBusiness\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Article\Entities\Page;
use Modules\Article\Entities\Category;
use App\Models\Banner;
use Modules\Service\Entities\Service;
use App\Models\MenuItem;
use App\Models\Faq;

class FrontPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $latestBanner = Banner::inRandomOrder()->first();
        $menuItems = MenuItem::all();
        $mainMenuItems = $menuItems->where('category', 'Menu')->where('status', 'Active');
        $subMenuItems = $menuItems->where('category', 'Sub Menu')->where('status', 'Active');

        if ($mainMenuItems->isEmpty()) {
            $mainMenuItems = null;
        }
    
        if ($subMenuItems->isEmpty()) {
            $subMenuItems = null;
        }
        if ($latestBanner) {
            $bannerImagePath = asset('public/assets/images/banner/' . $latestBanner->image_path);
        } 
        else{
            $bannerImagePath = 'null';
        }
        return view('themebusiness::frontend.pages.index', compact('bannerImagePath','mainMenuItems', 'subMenuItems'));
    }

    public function price()
    {
        return view('themebusiness::frontend.pages.price');
    }

    public function blog()
    {
        return view('themebusiness::frontend.pages.blog');
    }

    public function portfolio()
    {
        return view('themebusiness::frontend.pages.portfolio');
    }

    public function about()
    {
        return view('themebusiness::frontend.pages.about');
    }

    public function contact()
    {
        return view('themebusiness::frontend.pages.contact');
    }
    public function getPageBySlug($category, $slug)
    {
        $page = Page::whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        })
            ->where('slug', $slug)
            ->with('category:id,name,slug')
            ->firstOrFail();

            $randomPages = Page::inRandomOrder()
            ->limit(6)
            ->join('categories', 'pages.category_id', '=', 'categories.id')
            ->select('pages.title', 'pages.slug as page_slug', 'categories.slug as category_slug')
            ->where('pages.status', 1)
            ->get();

        return view('themebusiness::frontend.pages.article_page', compact(['page', 'randomPages']));
    }
    public function search_content(Request $request)
    {
        $query = $request->input('query');
        // Call the function to search and retrieve details
        $result = $this->searchAndGetDetails($query);

        // Return the result
        return response()->json($result);
    }
    public function searchAndGetDetails($query)
    {
        if (empty($query)) {
            return response()->json(['error' => 'Query cannot be empty.'], 400);
        }

        try {
            $pages = Page::where(function ($q) use ($query) {
                $q->whereHas('category', function ($q) use ($query) {
                    $q->where('slug', $query);
                })->orWhere('title', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
            })
                ->with(['category' => function ($q) {
                    $q->select('id', 'name', 'slug');
                }])
                ->select('slug', 'title', 'description', 'category_id')
                ->limit(10)
                ->get();

            if ($pages->isEmpty()) {
                return response()->json(['error' => 'No matching page found.'], 404);
            }

            return $pages;
        } catch (Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    
    public function fetchMenuItems()
    {
        $menuItems = MenuItem::all();
        $mainMenuItems = $menuItems->where('category', 'Menu')->where('status', 'Active')->values();
        $subMenuItems = $menuItems->where('category', 'Sub Menu')->where('status', 'Active')->values();

        return response()->json(['mainMenuItems' => $mainMenuItems, 'subMenuItems' => $subMenuItems]);
    }

    public function show($filename)
    {
        $filePath = public_path('assets/images/faq_pdfs/' . $filename);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->file($filePath);
    }

    public function faq()
    {
        $faqsByCategory = Faq::all()->groupBy('category');

        return view('themebusiness::frontend.pages.faq', compact('faqsByCategory'));
    }


    
}