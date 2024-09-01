<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartyRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Party;
use Illuminate\Support\Facades\DB;

class PartyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        #<------- get all parties ------->
        // $parties = Party::all();
        #<------- get all parties with specific columns and order by ascending------->
        $parties = Party::select(
            'id',
            'party_type',
            'full_name',
            'phone_no',
            'address',
            'account_holder_name',
            'account_no',
            'bank_name',
            'ifcs_code',
            'branch_address'
        )->orderBy('full_name', 'asc')->get();

        return view("party.index", compact('parties'));
    }
    #funciton to show party view 
    public function addParty()
    {
        return view("party.add");
    }
    #Funciton to create/store party
    public function createParty(PartyRequest $request)
    {
        //validation 
        $param = $request->all();

        //Remove token from post data before inserting
        unset($param['_token']);
        Party::create($param);

        //Redirect to create party page
        return redirect()->route('add-party')->withStatus("Party Created succesfully");
        // OR but above one is better method
        // return redirect()->route('add-party')->with("success", "Party Created succesfully");
    }
    #function to edit parties
    public function editParty($party_id)
    {

        // $parties = Party::find($party_id);
        // return view("party.edit", compact('parties'));
        // <----------- OR smae usecase ------------ > 
        $data['party'] = Party::find($party_id);
        return view("party.edit", $data);
    }
    #funciton to update party
    public function updateParty(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            //Mannually assign each input to an array
            $param = [
                'party_type' => $request->input('party_type'),
                'full_name' => $request->input('full_name'),
                'phone_no' => $request->input('phone_no'),
                'address' => $request->input('address'),
                'account_holder_name' => $request->input('account_holder_name'),
                'account_no' => $request->input('account_no'),
                'bank_name' => $request->input('bank_name'),
                'ifcs_code' => $request->input('ifcs_code'),
                'branch_address' => $request->input('branch_address'),
            ];
            //Remove the _token field it present
            unset($param['token']);

            // Retrieve the existing party record by ID
            $party = Party::findOrFail($id);

            // Update the party record with the new data
            $party->update($param);

            // Commit the transaction
            DB::commit();

            // Redirect back to the create party page with a success message
            return redirect()->route('manage-parties')->with('status', 'Party updated successfully!');
        } catch (\Throwable $th) {
            // Rollback the transaction if any error occurs
            DB::rollBack();
            // Optionally, log the error or handle it accordingly
            // Log::error('Failed to create party: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('add-party')->with('error', 'Failed to create party. Please try again.');
        }
    }
    #function to delete party
    public function deleteParty(Party $party)
    {
        $party->delete();
        // Redirect back to the create party page with a success message
        return redirect()->route('manage-parties')->with('status', 'Party updated successfully!');
    }
}
