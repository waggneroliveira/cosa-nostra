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
use App\Models\Noticies;
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
        $blogHighlights = Blog::whereHas('category', function($active){
            $active->where('active', 1);
        })->highlightOnly()->active()->sorting()->limit(3)->get();        
        $topics = Topic::active()->sorting()->get();
        $about = About::active()->first();
        $videos = Video::active()->sorting()->get();
        $unionized = Unionized::active()->first();
        $benefitTopics = BenefitTopic::active()->sorting()->get();
        $report = Report::active()->first();
        $contact = Contact::first();
        $directions = Direction::active()->sorting()->get();
        $statute = Statute::active()->first();
        $unionizeds = Unionized::get();
        $depoiments = Depoiment::active()->sorting()->get();
        $reservationHere = ReservationHere::active()->first();
        $openingHours = Noticies::active()->sorting()->get();
        
        return view('client.blades.index', compact(
            'contact', 
            'report',
            'benefitTopics', 
            'unionized', 
            'videos',  
            'about', 
            'slides', 
            'blogHighlights', 
            'directions', 
            'statute', 
            'unionizeds', 
            'depoiments', 
            'reservationHere', 
            'openingHours', 
            'topics')
        );
    }

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
