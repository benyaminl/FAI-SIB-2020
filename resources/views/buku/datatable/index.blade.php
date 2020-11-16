@extends("master/index")

@section('title', 'Halaman List Buku')

@section('content')
<div class="container">
    <h1>Master Buku</h1>
    <br/>
    <table id="table" border="1px" class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Nama</th><th>Action</th></tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
@stop

{{-- @see https://laravel.com/docs/7.x/blade#stacks --}}
@push('js')
<script>
$("#table").dataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('/ajax/buku') }}", 
    columns: [
        { data: 'id', name: 'id' },
        { data: 'judul_buku', name: 'judul_buku' }
    ],
});
</script>
@endpush