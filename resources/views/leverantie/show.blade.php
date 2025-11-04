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
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white"></div>
            <div class="card-body">
                <h1>{{ $title }}</h1>
                <hr style="border: rgb(0, 0, 0) 1px solid;" class="w-90">

                @if($leverancierinfo)
                    <p><strong>Leverancier:</strong> {{ $leverancierinfo->LeverancierNaam }}</p>
                    <p><strong>Contactpersoon:</strong> {{ $leverancierinfo->ContactPersoon }}</p>
                    <p><strong>Leveranciernummer:</strong> {{ $leverancierinfo->LeverancierNummer }}</p>
                    <p><strong>Mobiel:</strong> {{ $leverancierinfo->Mobiel }}</p>
                @endif 

                {{-- @if( $isNietOpVoorraad )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="text-danger">Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: {{ $VolgendeLevering }}</p>
                        <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                    </div>
                    <meta http-equiv="refresh" content="4;url={{ route('magazijn.index') }}">
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

                @endif --}}
            </div>
        </div>
    <a href="{{ route('magazijn.index') }}" class="btn btn-primary mt-3 w-25">Terug</a>
</div>
</body>
</html>
