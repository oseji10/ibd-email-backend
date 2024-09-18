<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Nominees;
use App\Mail\NominationEmail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendNominationEmailJob;

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
    
        public function addNominee(Request $request)
        {
            // Validate incoming request
            $validated = $request->validate([
                'first_name' => 'required|string', 
                'othernames' => 'nullable|string', 
                'email' => 'required|string|email', // Ensure valid email
                'phone_number' => 'nullable|string', 
                'address' => 'nullable|string', 
                'nomination_date' => 'nullable|string', // Allow nullable for manual nomination dates
                'title' => 'nullable|string', // Allow nullable for title
            ]);
        
            // Check if nominee already exists by email
            if (Nominees::where('email', $validated['email'])->exists()) {
                return response()->json([
                    'message' => 'A nominee with this email already exists',
                ], 409); // HTTP status code 409: Conflict
            }
        
            // Set additional fields
            $validated['nomination_date'] = Carbon::now(); // Set current date if none provided
            $validated['nominated_by'] = auth()->id(); // Get ID of authenticated user
            $validated['status'] = 'nominated'; // Set initial status
        
            // Create the nominee and get the created nominee object with ID
            $nominee = Nominees::create($validated);
        
            // Dispatch a job to send email asynchronously
            try {
                // Pass the nominee data, including generated ID, to the job
                SendNominationEmailJob::dispatch($nominee);
        
                return response()->json([
                    'message' => 'Nominee added successfully and email will be sent shortly.',
                    'nominee_detail' => $nominee, // Return the nominee details with the generated ID
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Nominee added, but failed to queue email.',
                    'error' => $e->getMessage(),
                ], 500); // HTTP status code 500: Internal Server Error
            }
        }
        
        


// public function updateNomineeStatusToAccepted(Request $request){
//     $update = Nominees::where('id', $request->id)->update();

//     return response()->json([
//         'message' => 'Status updated successfully',
//         'status' => $update
//     ]);
// }


public function updateNomineeStatusToAccepted(Request $request, $id)
{
    // No need to validate 'id' from request as it's in the URL

    $update = Nominees::find($id); // Fetch nominee by ID

    if (!$update) {
        return response()->json(['message' => 'Nominee not found.'], 404);
    }

    // Update the status field
    $update->update(['status' => 'accepted']);

    // return response()->json(['message' => 'Nominee status updated successfully.']);
    return redirect()->away('https://app.ibd.ng/accepted');

}

     
}
