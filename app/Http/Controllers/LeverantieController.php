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
    public function create($id)
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
        if (empty($productleveringinfo)) {
            return view('leverantie.show', [
                'title' => 'Geleverde producten',
                'leverancierinfo' => $leverancierinfo[0],
                'productleveringinfo' => null,
                'error' => 'Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin.'
            ]);
        }
        

        return view('leverantie.show', [
            'title' => 'Geleverde producten',
            'leverancierinfo' => $leverancierinfo[0],
            'productleveringinfo' => $productleveringinfo
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $leverancierinfoArray = $this->leverantieModel->sp_GetLeverancierInfoById($id);
        $productleveringinfo = $this->leverantieModel->sp_GetProductLeveringInfo($id);

        if(empty($leverancierinfoArray)) {
            return redirect()->back()->with('error', 'Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin');
        }

        // pak eerste item
        $leverancierinfo = $leverancierinfoArray[0];
        
        return view('leverantie.edit', [
            'title' => 'Leverancier maken',
            'leverancierinfo' => $leverancierinfo,
            'productleveringinfo' => $productleveringinfo[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $leverantie)
    {
        // Validate
        $data = $request->validate([
            'VerpakkingsEenheidKG', 'required|string|max:255',
            'DatumLevering', 'required'
        ]);
        // Store
        // Redirect
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $leverantie)
    {
        //
    }
}
