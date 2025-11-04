<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeverantieModel;

class LeverantieController extends Controller
{
    private $leverantieModel;

    public function __construct()
    {
        $this->leverantieModel = new LeverantieModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leveranciers = $this->leverantieModel->sp_GetAllLeveringInfo();
        // dd($leveranciers);
        return view('leverantie.index', [
            'title' => 'Overzicht Leveranciers',
            'leveringeninfo' => $leveranciers
        ]);
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
    public function show($id)
    {
        $leverancierinfo = $this->leverantieModel->sp_GetLeverancierInfoById($id);
        $productleveringinfo = $this->leverantieModel->sp_GetProductLeveringInfo($id);
        
        // dd($productleveringinfo);

        return view('leverantie.show', [
            'title' => 'Geleverde producten',
            'leverancierinfo' => $leverancierinfo[0],
            'productleveringinfo' => $productleveringinfo
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $leverantie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $leverantie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $leverantie)
    {
        //
    }
}
