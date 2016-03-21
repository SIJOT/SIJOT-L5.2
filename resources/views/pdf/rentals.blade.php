<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <style type="text/css">
            table {
                border-collapse: collapse;
                border: 1px solid black;
            }
            td, th {
                padding-left: 15px;
                padding-right: 15px;
                border-collapse: collapse;
                border: 1px solid black;
            }
            th {
                background-color: #e0e0e0;
            }
        </style>
    </head>

    <body>
        <h3>Verhuringen (overzicht).</h3>

        <table>
            <thead>
                <tr>
                    <th width="20">#</th>
                    <th width="100">Status:</th>
                    <th width="150">Periode:</th>
                    <th width="175">Groep:</th>
                    <th width="175">Email:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td><code>#{!! $rental->id !!}</code></td>

                        <td>
                            @if($rental->Status == 0)
                                Nieuwe aanvraag
                            @elseif($rental->Status == 1)
                                Optie
                            @elseif($rental->Status == 2)
                                Bevestigd
                            @endif
                        </td>

                        <td>{!! $rental->Start_date !!} - {!! $rental->End_date !!}</td>
                        <td>{!! $rental->Group !!}</td>
                        <td>{!! $rental->Email !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>