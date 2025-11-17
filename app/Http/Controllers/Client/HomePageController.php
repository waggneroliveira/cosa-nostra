<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\About;
use App\Models\Event;
use App\Models\Slide;
use App\Models\Stack;
use App\Models\Topic;
use App\Models\Video;
use App\Models\Report;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Statute;
use App\Models\Depoiment;
use App\Models\Direction;
use App\Models\Unionized;
use App\Models\Reservation;
use App\Models\Announcement;
use App\Models\BenefitTopic;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\ReservationHere;
use App\Models\StackSessionTitle;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        $slides = Slide::active()->sorting()->get();
        $blogSuperHighlights = Blog::whereHas('category', function($active){
            $active->where('active', 1);
        })->superHighlightOnly()->active()->sorting()->limit(6)->get();

        $blogHighlights = Blog::whereHas('category', function($active){
            $active->where('active', 1);
        })->highlightOnly()->active()->sorting()->limit(3)->get();
        
        $announcements = Announcement::select(
            'link',
            'exhibition',
            'path_image',
            'active',
            'sorting',
        )
        ->where('exhibition', '=', 'mobile')
        ->orWhere('exhibition', '=', 'horizontal')
        ->active()
        ->sorting()
        ->get();
        $topics = Topic::active()->sorting()->get();
        $about = About::active()->first();
        $partners = Partner::active()->sorting()->get();
        $videos = Video::active()->sorting()->get();
        $unionized = Unionized::active()->first();
        $benefitTopics = BenefitTopic::active()->sorting()->get();
        $report = Report::active()->first();
        $contact = Contact::first();
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY); // começa no domingo
        $endOfWeek   = Carbon::now()->endOfWeek(Carbon::SATURDAY); // termina no sábado
        $events = Event::active()
        ->whereBetween('date', [$startOfWeek, $endOfWeek])
        ->orderBy('date', 'asc')
        ->get();
        // Obter a notícia mais recente (destaque)
        $featuredNews = Blog::whereHas('category', function($active) {
            $active->where('active', 1);
        })
        ->with(['category' => function($query) {
            $query->select('id', 'title', 'slug');
        }])
        ->orderBy('date', 'DESC')
        ->active()
        ->first();

        // Obter as próximas 9 notícias (excluindo o destaque)
        $latestNews = Blog::whereHas('category', function($active) {
            $active->where('active', 1);
        })
        ->with(['category' => function($query) {
            $query->select('id', 'title', 'slug');
        }])
        ->where('id', '!=', $featuredNews->id ?? null)
        ->orderBy('created_at', 'DESC')
        ->active()
        ->take(9)
        ->get();

        // Obter as 3 categorias mais recentes das últimas notícias
        $recentCategories = BlogCategory::whereHas('blogs', function($query) {
            $query->active()->whereHas('category', function($active) {
                $active->where('active', 1);
            });
        })
        ->withCount(['blogs' => function($query) {
            $query->active();
        }])
        ->where('active', 1)
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();

        $trendingCategories  = BlogCategory::whereHas('blogs')
        ->active()
        ->withCount('blogs')
        ->orderBy('blogs_count', 'DESC')
        ->sorting()
        ->limit(6)
        ->get();

        $directions = Direction::active()->sorting()->get();
        $statute = Statute::active()->first();
        $unionizeds = Unionized::get();
        $depoiments = Depoiment::active()->sorting()->get();
        $reservationHere = ReservationHere::active()->first();
        
        return view('client.blades.index', compact(
            'featuredNews',
            'trendingCategories',
            'latestNews', 
            'recentCategories', 
            'events', 
            'contact', 
            'report',
            'benefitTopics', 
            'unionized', 
            'videos', 
            'partners', 
            'about', 
            'slides', 
            'blogSuperHighlights', 
            'blogHighlights', 
            'announcements', 
            'directions', 
            'statute', 
            'unionizeds', 
            'depoiments', 
            'reservationHere', 
            'topics')
        );
    }

    // public function filterByCategory($categorySlug = null)
    // {
    //     try {
    //         $query = Blog::whereHas('category', function($active) {
    //             $active->where('active', 1);
    //         })
    //         ->with(['category'])
    //         ->active();

    //         // Se uma categoria específica for selecionada
    //         if ($categorySlug && $categorySlug !== 'todas') {
    //             $query->whereHas('category', function($q) use ($categorySlug) {
    //                 $q->where('slug', $categorySlug);
    //             });
    //         }

    //         // Obter TODAS as notícias ordenadas por data
    //         $allNews = $query->orderBy('created_at', 'DESC')->get();

    //         // Separar featured news (primeira) e latest news (restantes)
    //         $featuredNews = $allNews->first();
            
    //         // Pegar as próximas notícias (excluindo a primeira)
    //         $latestNews = $allNews->slice(1)->take(10);

    //         $html = view('client.ajax.filter-blog-homePage', [
    //             'featuredNews' => $featuredNews,
    //             'latestNews' => $latestNews
    //         ])->render();

    //         return response()->json([
    //             'success' => true,
    //             'html' => $html,
    //             'count' => $allNews->count(),
    //             'featured_id' => $featuredNews ? $featuredNews->id : null,
    //             'latest_count' => $latestNews->count()
    //         ]);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Erro ao filtrar notícias: ' . $e->getMessage()
    //         ]);
    //     }
    // }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'hours' => 'required|string',
            'location_area' => 'required|string|in:interna,varanda',
        ]);

        // Capacidade por área
        $capacities = [
            'varanda' => 16,
            'interna' => 60,
        ];

        $capacity = $capacities[$request->location_area];

        // Pessoas confirmadas
        $confirmed = Reservation::where('date', $request->date)
            ->where('hours', $request->hours)
            ->where('location_area', $request->location_area)
            ->where('status', 'confirmed')
            ->sum('number_of_people');

        // Pessoas em stand-by
        $standby = Reservation::where('date', $request->date)
            ->where('hours', $request->hours)
            ->where('location_area', $request->location_area)
            ->where('status', 'stand_by')
            ->sum('number_of_people');

        $remaining = max($capacity - ($confirmed + $standby), 0);

        return response()->json([
            'capacity'   => $capacity,
            'confirmed'  => $confirmed,
            'standby'    => $standby,
            'remaining'  => $remaining
        ]);
    }
    public function checkAreasAvailability(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'hours' => 'required|string',
        ]);

        // capacidades
        $capacities = [
            'interna' => 60,
            'varanda' => 16,
        ];

        $result = [];

        foreach ($capacities as $area => $cap) {

            $confirmed = Reservation::where('date', $request->date)
                ->where('hours', $request->hours)
                ->where('location_area', $area)
                ->where('status', 'confirmed')
                ->sum('number_of_people');

            $standby = Reservation::where('date', $request->date)
                ->where('hours', $request->hours)
                ->where('location_area', $area)
                ->where('status', 'stand_by')
                ->sum('number_of_people');

            $remaining = max($cap - ($confirmed + $standby), 0);

            $result[$area] = [
                'capacity'   => $cap,
                'confirmed'  => $confirmed,
                'standby'    => $standby,
                'remaining'  => $remaining
            ];
        }

        return response()->json($result);
    }

}
