<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <style>
        table.static{
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Hp</title>
</head>
<body>
        <div>
            <p align="center"><b>Laporan Data Handphone</b></p>
            <table class="static" align="center" rules"all" border="1px" style="width: 95%">
                <tr>
                    <th>No</th>
                    <th>Gambar Hp</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    
                
                </tr>  
                @php
                $nomor=1;
            @endphp
                @foreach ($hp as $hp)

                <tr>
                    <td scope="row">
                             {{$nomor++}}    
                    </td>
                    <td>
                        <img src="{{$hp -> gambar}}" height="80px" width="100px" alt="" srcset="">
                    </td>
                    <td>{{$hp -> merk}}</td>
                    <td>{{$hp -> tipe}}</td>
                    <td>{{$hp -> tahun}}</td>
                </tr>   

                @endforeach      
            
            </table>
        
        
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    
</body>
</html>