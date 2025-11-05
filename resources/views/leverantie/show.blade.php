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
                <table class="table table-striped table-bordered align-middle shadow-sm mt-3">
                    <thead>
                        <tr>
                            <th><strong>Naam Product</strong></th>
                            <th><strong>Aantal in magazijn</strong></th>
                            <th><strong>Verpakkingseenheid</strong></th>
                            <th><strong>Laatste levering</strong></th>
                            <th><strong>Nieuwe levering</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($error)) 
                            <tr>
                                <td colspan="5" style="text-align: center;">{{ $error }}</td>
                                <meta http-equiv="refresh" content="3;url={{ route('leverantie.index') }}">
                            </tr>
                        @else
                            @foreach($productleveringinfo as $productinfo)
                                <tr>
                                    <td>{{ $productinfo->ProductNaam }}</td>
                                    <td>{{ $productinfo->AantalAanwezig }}</td>
                                    <td>{{ $productinfo->VerpakkingsEenheidKG }}</td>
                                    <td>{{ date('d-m-Y', strtotime($productinfo->LaatsteLevering)); }}</td>
                                    <td>
                                        <a href="{{ route('leverantie.edit', ['id' => $leverancierinfo->id]) }}">
                                            <i class="bi bi-plus-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('leverantie.index') }}" class="btn btn-primary me-2 mt-3">Terug</a>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Home</a>
            </div>
        </div>
    </div>

</body>
</html>
