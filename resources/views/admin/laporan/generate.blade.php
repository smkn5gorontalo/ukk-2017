<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    {!! Html::style('assets/plugins/bower_components/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/plugins/bower_components/select2/dist/css/select2.min.css') !!}
    {!! Html::style('assets/plugins/bower_components/select2-bootstrap-theme/dist/select2-bootstrap.min.css') !!}
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <h1 class="text-center">Laporan Penjualan</h1>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul Buku</th>
                                    <th>Harga Jual</th>
                                    <th>Diskon</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($penjualans as $key=>$item)
                                @php
                                    $total[] = $item->total;
                                @endphp
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>Rp. {{ number_format($item->buku->harga_jual) }}</td>
                                    <td>{{ $item->buku->diskon }}%</td>
                                    <td>Rp. {{ number_format($item->jumlah) }}</td>
                                    <td>Rp. {{ number_format($item->total) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="6" class="text-right">Jumlah</th>
                                    <th>Rp. {{ number_format(array_sum($total)) }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    {!! Html::script('assets/plugins/bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('assets/plugins/bower_components/select2/dist/js/select2.min.js') !!}

    <script>
        jQuery(document).ready(function($) {
            window.print();
        });
    </script>
</body>
</html>
