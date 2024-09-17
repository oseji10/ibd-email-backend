<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Nominees;
use App\Mail\NominationEmail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class NomineesController extends Controller
{
    public function showNominees(){
        // $nominees = Nominees::all()->orderBy('created_at')->asc();
        $nominees = Nominees::orderBy('created_at', 'desc')->get();
    
        return response()->json([
            'message' => 'Nominees retrieved successfuly',
            'nominees' => $nominees
        ]);
        }
    
        public function addNominee(Request $request){
            $validated = $request->validate([
                'first_name' => 'required|string', 
                'othernames' => 'nullable|string', 
                'email' => 'required|string', 
                'phone_number' => 'nullable|string', 
                'address' => 'nullable|string', 
                'nomination_date' => 'string',
                'title' => 'string'
            ]);
        
            $nomination_date = Carbon::now();
            if (Nominees::where('email', $validated['email'])->exists()) {
                return response()->json([
                    'message' => 'A nominee with this email already exists',
                ], 409); // HTTP status code 409: Conflict
            }
        
            // Add the created_by field with the authenticated user's ID
            $validated['nomination_date'] = $nomination_date;
            $validated['nominated_by'] = auth()->id();
            $validated['status'] = 'nominated';
        
            try {
                // Try sending the email first
                Mail::to($request->email)->send(new NominationEmail($validated));
        
                // If email is sent successfully, store the nominee in the database
                $add_nominee = Nominees::create($validated);
        
                return response()->json([
                    'message' => 'Nomination sent successfully and nominee added to the database',
                    'nominee_detail' => $validated
                ], 200);
        
            } catch (\Exception $e) {
                // If email sending fails, catch the exception and don't save to the database
                return response()->json([
                    'message' => 'Failed to send email. Nominee was not added.',
                    'error' => $e->getMessage(),
                ], 500); // HTTP status code 500: Internal Server Error
            }
        }
        



     
}
