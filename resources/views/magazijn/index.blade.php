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

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                </div>
                <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
            @endif

            <a href="{{ route('home') }}" class="btn btn-primary mt-3 mb-3 w-25">Terug Naar Home</a>
        
            <table class="table table-striped table-bordered align-middle shadow-sm">
                <thead>
                    <th>Barcode</th>
                    <th>Naam</th>
                    <th>Verpakkings Eenheid</th>
                    <th>Aantal Aanwezig</th>
                    <th>Allergenen info</th>
                    <th>Leverantie Info</th>
                </thead>
                <tbody>
                    @forelse ($producten as $product)
                        <tr>
                            <td>{{ $product->Naam }}</td>
                            <td>{{ $product->Barcode }}</td>
                            <td>{{ $product->VerpakkingsEenheidKG }}</td>
                            <td>
                                @if ($product->AantalAanwezig <= 0)
                                    0
                                @else
                                    {{ $product->AantalAanwezig }}
                                @endif
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="bi bi-info-lg"></i>
                                </button>
                            </td>
                            <td>
                                <a href="{{ route('leverantie.show', $product->Id) }}" class="btn btn-primary w-100">
                                    <i class="bi bi-book"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr colspan='3'>Geen allergenen bekent</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>