<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactFormRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function __construct(public ContactService $contactService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.contact_us');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactFormRequest $request)
    {
        try {


            $this->contactService->handleContactForm(validatedData: $request->validated());

            ToastMagic::success('Your request has been sent successfully');
            return back();

        } catch (Exception $e) {

            Log::error(message: 'Error occured while storing contact form' . $e->getMessage());

            ToastMagic::error('An error occured while processing your request');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
