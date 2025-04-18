<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{   
    public function __construct(public SubscriptionService $subscriptionService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeSubscriptions = $this->subscriptionService->handleGetActiveSubscriptions();

        $inActiveSubscriptions = $this->subscriptionService->handleGetInActiveSubscriptions();

        return view('admin.subscriptions.index', compact('activeSubscriptions', 'inActiveSubscriptions'));
    }


    public function getParentSubscriptions()
    {    
        $activeSubscriptions = $this->subscriptionService->handleGetParentActiveSubscriptions();

        $inActiveSubscriptions = $this->subscriptionService->handleGetParentInActiveSubscriptions();

        return view('pages.parents.subscriptions', compact('activeSubscriptions', 'inActiveSubscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
