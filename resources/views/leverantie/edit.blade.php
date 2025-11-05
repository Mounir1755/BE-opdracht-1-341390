@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamin</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white"></div>
            <div class="card-body">
            
                <h1>{{ $title }}</h1>
                <hr style="border: rgb(0, 0, 0) 1px solid;" class="w-90">
                @if($leverancierinfo)
                    <p><strong>Productnaam:</strong> {{ $productleveringinfo->ProductNaam }}</p>
                    <p><strong>Leverancier:</strong> {{ $leverancierinfo->LeverancierNaam }}</p>
                    <p><strong>Contactpersoon:</strong> {{ $leverancierinfo->ContactPersoon }}</p>
                    <p><strong>Mobiel:</strong> {{ $leverancierinfo->Mobiel }}</p>
                @endif 
                <form id="storelevering" method="POST" action="{{ route('leverantie.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="VerpakkingsEenheidKG" class="form-label"><strong>Aantal Producteenheden</strong></label>
                        <input type="number" class="form-control" id="VerpakkingsEenheidKG">
                    </div>
                    <div class="mb-3">
                        <label for="DatumLevering" class="form-label"><strong>Datum Eerstvolgende Levering</strong></label>
                        <input type="date" class="form-control" id="DatumLevering">
                    </div>   
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 d-flex">
                {{-- links --}}
                <button form="storelevering" type="submit" class="btn btn-primary w-25">Sla op</button>

                {{-- rechts --}}
                <a href="{{ route('home') }}" class="btn btn-primary ms-auto">Home</a>
                <a href="{{ url()->previous() }}" class="btn btn-primary ms-1">Terug</a>
            </div>
        </div>
    </div> 
</body>
</html>