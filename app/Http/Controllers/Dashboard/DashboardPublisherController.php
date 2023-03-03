<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Publisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPublisherController extends Controller
{
    // make function to show all data
    public function index()
    {
        return view('dashboard.publisher.all', [
            'publishers' => Publisher::all(),
        ]);
    }

    // make function to show detail data
    public function show(Publisher $publisher)
    {
        return view('dashboard.publisher.detail', [
            'publisher' => $publisher
        ]);
    }

    
}
