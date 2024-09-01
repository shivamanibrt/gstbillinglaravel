<?php

namespace App\Http\Controllers;

use App\Http\Requests\GstBillRequest;
use App\Models\GstBill;
use App\Models\Party;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    # Function to display the view for adding a GST bill
    public function addGstBill()
    {
        $data['parties'] = Party::where('party_type', 'client')->orderBy('full_name', 'desc')->get();
        return view('gst-bill.index', $data);
    }
    #funciton to createGstBill
    public function createGstBill(GstBillRequest $request)
    {
        try {
            DB::beginTransaction();

            //Mannualy assign each input to an array 
            $param = [
                'party_id' => $request->input('party_id'),
                'invoice_date' => $request->input('invoice_date'),
                'invoice_no' => $request->input('invoice_no'),
                'item_description' => $request->input('item_description'),
                'total_amount' => $request->input('total_amount'),
                'cgst_rate' => $request->input('cgst_rate'),
                'sgst_rate' => $request->input('sgst_rate'),
                'igst_rate' => $request->input('igst_rate'),
                'tax_amount' => $request->input('tax_amount'),
                'sgst_amount' => $request->input('sgst_amount'),
                'net_amount' => $request->input('net_amount'),
                'declaration' => $request->input('declaration'),
            ];
            //Remove the token field if present 
            unset($param['token']);

            // Assuming you have a GstBill model to handle the database insert
            GstBill::create($param);

            DB::commit();

            return redirect()->route('gst-bill.index')->with('success', 'GST Bill created successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            //Handle the error, possibly log it 
            return back()->with('error', 'Failed to create GST Bill: ' . $th->getMessage());
        }
    }
    public function manageGst()
    {
        return view('gst-bill.add');
    }
    public function printGst()
    {
        return view('gst-bill.print');
    }
}
