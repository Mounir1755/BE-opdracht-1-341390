<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MagazijnModel;

class MagazijnController extends Controller
{
    private $magazijnModel;

    public function __construct()
    {
        $this->magazijnModel = new MagazijnModel();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producten = $this->magazijnModel->sp_GetAllProducts();


        return view('magazijn.index', [
            'title' => 'Overzicht Magazijn Jamin',
            'producten' => $producten
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
    public function show(string $id)
    {
        $leveringinfo = $this->magazijnModel->sp_GetLeveringInfoById($id);
        
        
        /*
        * Standaardwaarden instellen
        * 
        * $VolgendeLevering -> voorkomt undefined variabele fouten
        * $isOpVoorraad -> wordt later aangepast op basis van databasegegevens
        */
        $VolgendeLevering = null;
        $isNietOpVoorraad = false;

        // Checkt of $leveringinfo niet leeg is
        if (!empty($leveringinfo)) {

            /*
            * Stopt info van de eerste record in $levering
            * om dat later te gebruiken voor de voorraad check
            */
            $levering = $leveringinfo[0];

            // Stopt leverancier info van de eerste record in $leverancier
            $leverancier = $leveringinfo[0] ?? ''; // ?? checkt of de 1ste veld niet null is ander gebruikt hij de 2de veld

            /*
            * Voorraad checken
            *   
            * $isNietOpVoorraad checkt of het aantal aanwezig in de magazijn null
            * als $isNietOpVoorraad null is zal de if statement in de show view true zijn en wordt de functie uitgevoerd
            */
            $isNietOpVoorraad = $levering->MagazijnAantal === null; // === checkt of het PRECIES hetzelfde is
                                                                    // eigenlijk niet goed maar voor nu goed genoeg want kan ook 0 zijn en niet null
            
            // Als $isNietOpVoorraad true is als dat zo is word volgende levering opgeslagen in $VolgendeLevering
            if ($isNietOpVoorraad) {
                $VolgendeLevering = $levering->VolgendeLevering;
            }

        } else {
            return "Er is iets fout gegaan!";
        }

        return view('magazijn.show', [
            'title' => 'Leverings Informatie',
            'leveringinfo' => $leveringinfo,
            'leverancier' => $leverancier,
            'isNietOpVoorraad' => $isNietOpVoorraad,
            'VolgendeLevering' => $VolgendeLevering
        ]);

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
