@extends("master/index")

@section('title', 'Cari Buku')

@section('content')
<div class="container">
    <h1>Cari Buku</h1>
    <br/>
    <form method="get" id="search-form">
        <div class="form-group">
        <label>Kata kunci</label>
        <input type="text" class="form-control" name="nama"> 
        <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <table id="table" border="1px" class="table table-bordered">
        <thead>
            <tr><th>Nama</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>Silahkan masukan kata kunci</td>
            </tr>
        </tbody>
    </table>
    {{-- Ini Die Dump! --}}
    {{-- {{ dd($data) }} --}}
</div>
@stop

@push('js')
<script>
$(function() {
    $("#search-form").submit(function(e) {
        e.preventDefault();
        console.log(e);
        var nama = $("input[name='nama']").val();
        // @see https://api.jquery.com/jQuery.get/
        $.get('{{ url("pencarian/buku") }}',{nama : nama}, function(response) {
            console.log(response);
            var dom = "";
            response.data.forEach(el => {
                dom += "<tr><td>"+el.nama+" - "+el.tahun+"<br/>"+el.penerbit+"<td></tr>";
            });
            
            if (response.data.length <= 0) {
                dom += "<tr><td>Tidak ada data ditemukan dengan kata kunci "+nama+"</td></tr>";
            }

            $("#table tbody").html(dom);
        });
    });
});
</script>
@endpush
