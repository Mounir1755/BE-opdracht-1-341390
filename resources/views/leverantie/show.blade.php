{{-- TO DO:
        FIX DE FOUT WAAR ISOPVOORRAAD ALTIJD JA IS OMDAT HET OUTDATED DATA GEBRUIKT
        MOET EIGENLIJK DATA GEBRUIKEN VAN MAGAZIJN EN NIET PROD PER LEVERANCIER

        IS OPVOORRAAD LOGICA ZIT IN CONTROLLER
 --}}

@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
<div class="container mt-5">
    {{-- Controlleert of er data is --}}
    @if(count($leveringinfo) > 0)
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white"></div>
            <div class="card-body">
                <h1>{{ $title }}</h1>
                <hr style="border: rgb(0, 0, 0) 1px solid;" class="w-90">

                @if($leverancier)
                    <p><strong>Leverancier:</strong> {{ $leverancier->LeverancierNaam }}</p>
                    <p><strong>Contactpersoon:</strong> {{ $leverancier->ContactPersoon }}</p>
                    <p><strong>Leveranciernummer:</strong> {{ $leverancier->LeverancierNummer }}</p>
                    <p><strong>Mobiel:</strong> {{ $leverancier->Mobiel }}</p>
                @endif 

                @if( $isOpVoorraad )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="text-danger">er is op dit moment geen voorraad ik weet de unhappy scenario niet meer maar ja ik heb dit gewoon gedaan :)</p>
                        <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                    </div>
                    <meta http-equiv="refresh" content="3;url={{ route('magazijn.index') }}">
                @else

                    <table class="table table-striped table-bordered align-middle shadow-sm mt-3">
                        <thead>
                            <tr>
                                <th><strong>Naam Product</strong></th>
                                <th><strong>Datum Laatste levering</strong></th>
                                <th><strong>Aantal</strong></th>
                                <th><strong>Eerst volgende levering</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($leveringinfo as $levering)
                                <tr>
                                    <td>{{ $levering->ProductNaam }}</td>
                                    <td>{{ $levering->DatumLevering }}</td>
                                    <td>{{ $levering->GeleverdAantal }}</td>

                                    @if( $levering->VolgendeLevering == null )
                                        <td class="text-danger">GEEN DATUM GEVONDEN</td>
                                    @else
                                        <td>{{ $levering->VolgendeLevering }}</td>
                                    @endif

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                @endif
            </div>
        </div>

    @else
        <div class="alert alert-warning">Geen levering gevonden.</div>
    @endif
    <a href="{{ route('magazijn.index') }}" class="btn btn-primary mt-3 w-25">Terug</a>
</div>
</body>
</html>
