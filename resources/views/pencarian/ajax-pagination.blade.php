@extends("master/index")

@section('title', 'Cari Buku')

@section('content')
<div class="container">
    <h1>Cari Buku Ajax Pagination</h1>
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
    <div id="pagination">

    </div>
    {{-- Ini Die Dump! --}}
    {{-- {{ dd($data) }} --}}
</div>
@stop

@push('js')
<script>
$(function() {
    page = 1;
    $("#search-form").submit(function(e) {
        e.preventDefault();
        var nama = $("input[name='nama']").val();
        // @see https://api.jquery.com/jQuery.get/
        $.get('{{ url("pencarian/pagination-ajax") }}',{nama : nama, page: page}, function(response) {
            console.log(response);
            var dom = "";
            response.data.forEach(el => {
                dom += "<tr><td>"+el.nama+" - "+el.tahun+"<br/>"+el.penerbit+"<td></tr>";
            });
            
            if (response.data.length <= 0) {
                dom += "<tr><td>Tidak ada data ditemukan dengan kata kunci "+nama+"</td></tr>";
            } else {
                var paginationDom = "";
                paginationDom += "<a href='#' class='pagination' page='"+(response.meta.current_page+1)+"'>Next</a>";
                paginationDom += "<span>Total Halaman : "+response.meta.total+"<span>";
                paginationDom += "<a href='#' class='pagination' page='"+(response.meta.current_page-1)+"'>Prev</a>";
                $("#pagination").html(paginationDom);
                $(".pagination").click(function(){
                    var selectedPage = $(this).attr("page");
                    page = selectedPage; $("#search-form").submit();
                });
            }

            $("#table tbody").html(dom);
        });
    });
});
</script>
@endpush
