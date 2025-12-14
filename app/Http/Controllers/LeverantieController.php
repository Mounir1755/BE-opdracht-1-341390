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
    public function create(Request $request)
    {

        $productId = $request->route('productid');
        $leverancierId = $request->route('leverancierid');

        // Maak nieuwe sp aan want wat er nu gebeurd is dat hij gaat checken of de leverancier id bestaat maar hij moet checken op product id
        $productleveringinfo = $this->leverantieModel->sp_GetProductLeveringInfo($productId);
        $leverancierinfoArray = $this->leverantieModel->sp_GetLeverancierInfoById($leverancierId);
        

        if(empty($leverancierinfoArray)) {
            return redirect()->back()->with('error', 'Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin');
        }

        // pak eerste item
        $leverancierinfo = $leverancierinfoArray[0];
        
        return view('leverantie.create', [
            'title' => 'Leverancier maken',
            'leverancierinfo' => $leverancierinfo,
            'productleveringinfo' => $productleveringinfo[0]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $data = $request->validate([
            'LeverancierId'              =>     'required',
            'ProductId'                  =>     'required',
            'ProductNaam'                =>     'required',
            'LeverancierNaam'            =>     'required',
            'IsActief'                   =>     'required',
            'AantalAanwezig'             =>     'required|integer',
            'DatumEerstVolgendeLevering' =>     'required'
        ]);
        // Store
        $datum = date_create($data['DatumEerstVolgendeLevering']);
        $data['DatumEerstVolgendeLevering'] = date_format($datum, "Y-m-d");

        if ($data['IsActief'] == 0) {
            return redirect()->back()->withErrors([
                'product' => 'Het product ' . $data['ProductNaam'] . ' van de leverancier ' . $data['LeverancierNaam'] . ' wordt niet meer geproduceerd.'
            ]);
        }

        // dd($data);
        $this->leverantieModel->sp_CreateNewLevering($data);
        // Redirect
        return redirect()->route('leverantie.index')
                        ->with('success', 'Levering succesvol opgeslagen');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $leverancierinfo = $this->leverantieModel->sp_GetLeverancierInfoById($id);
        $productleveringinfo = $this->leverantieModel->sp_GetProductenPerLeverancier($id);
        
        // dd($productleveringinfo);
        if (empty($productleveringinfo)) {
            return view('leverantie.show', [
                'title' => 'Geleverde producten',
                'leverancierinfo' => null,
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
