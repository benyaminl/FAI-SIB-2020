@extends("master/index")

@section('title', 'Edit Buku')

@section("content")
<div class="container">
    <h1>Edit Buku</h1>
    <form method='post'>
        @method("PATCH")
        @csrf
        <div class="form-group">
            <label>Nama Buku</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input name='nama_buku' value="{{ $data->judul_buku }}" class="form-control" required><br/>
        </div>
        <div class="form-group">
            <label>Genre</label>
            <select id="select2" name="genre_buku[]" class="form-control select2" multiple="yes">
                {{-- <option>Chicken Soup</option>
                <option>History</option>
                <option>Biografi</option> --}}
                @foreach ($genre as $item)
                <option value="{{ $item->id }}">{{ $item->nama_genre }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success" type='submit'>Edit</button>
    </form>
</div>
@stop

@push('js')
<script>
var selected = JSON.parse('{!! json_encode($genreBuku) !!}');
$("#select2").select2();
$("#select2").val(selected);
// supaya berubah tampilan 
$("#select2").trigger("change");
</script>
@endpush