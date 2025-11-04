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
    <div class="container d-flex justify-content-center">

        <div class="col-md-12">

            <h1>{{ $title }}</h1>
        <div class="container">
            <div class="row">
                <table class="table table-striped table-bordered align-middle shadow-sm">
                    <thead>
                        <th>Naam</th>
                        <th>Contact persoon</th>
                        <th>Leverancier nummer</th>
                        <th>Mobiel</th>
                        <th>Aantal verschillende producten</th>
                        <th>Toon producten</th>
                    </thead>
                    <tbody>
                        @forelse ($leveringeninfo as $info)
                            <tr>
                                <td>{{ $info->LeverancierNaam }}</td>
                                <td>{{ $info->ContactPersoon }}</td>
                                <td>{{ $info->LeverancierNummer }}</td>
                                <td>{{ $info->Mobiel }}</td>
                                <td>{{ $info->TotaalProducten}}</td>
                                <td>
                                    {{-- Maak function in controller en model die sp aanroept zodat info opgehaald kan worden op product naam --}}
                                    <a href="{{ route('leverantie.show', $info->id) }}"class="btn btn-primary w-100">
                                        <i class="bi bi-box"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr colspan='3'>Geen allergenen bekent</tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3 mb-3 w-25">Terug Naar Home</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>