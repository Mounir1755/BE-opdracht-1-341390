{{-- TO DO:
        view aanpassen
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
        <div class="card shadow-sm">
            <div class="card-header bg-danger text-white"></div>
            <div class="card-body">
                <h1>{{ $title }}</h1>
                <hr style="border: rgb(0, 0, 0) 1px solid;" class="w-90">

                @if($productinfo)
                    <p><strong>Product naam:</strong> {{ $productinfo->ProductNaam }}</p>
                    <p><strong>Barcode:</strong> {{ $productinfo->Barcode }}</p>
                @endif 

                @if (count($allergeneninfo) > 0)
                    <table class="table table-striped table-bordered align-middle shadow-sm mt-3">
                        <thead>
                            <tr>
                                <th><strong>Allergeen Naam</strong></th>
                                <th><strong>Omschrijving</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($allergeneninfo as $allergeen)
                                <tr>
                                    <td>{{ $allergeen->AllergeenNaam }}</td>
                                    <td>{{ $allergeen->Omschrijving }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="text-danger">In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken</p>
                        <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
                    </div>
                    <meta http-equiv="refresh" content="3;url={{ route('magazijn.index') }}">
                @endif
            </div>
        </div>
    <a href="{{ route('magazijn.index') }}" class="btn btn-danger mt-3 w-25">Terug</a>
</div>
</body>
</html>
