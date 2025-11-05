<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContactController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Contact::class);

        $contacts = Contact::all();

        if ($contacts->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Contacts in JSON format
        return response()->json(ContactResource::collection($contacts), 200);
    }

    public function store(ContactRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Contact::class);

        // Create a new Contact using the validated data from the request
        $newContact = Contact::create($request->validated());

        // Return the newly created Contact in JSON format with 201 status code
        return response()->json(ContactResource::make($newContact), 201);
    }

    public function show(Contact $contact)
    {
        //$this->authorize('view', $contact);

        return response()->json(ContactResource::make($contact), 200);
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        //$this->authorize('update', $contact);

        $status = $contact->update($request->validated());

        return response()->json(ContactResource::make($contact), $status ? 200 : 201);
    }

    public function destroy(Contact $contact)
    {
        //$this->authorize('delete', $contact);

        $contact->delete();

        return response()->json([], 200);
    }
}
