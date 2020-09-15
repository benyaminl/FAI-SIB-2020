@if (session()->has("success"))
    {{-- Kita tampilkan alert success nya! --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get("success") }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has("error"))
    {{-- Kita tampilkan alert success nya! --}}
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get("error") }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- APAKAH ADA Error? --}}
@if ($errors->any()) 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
    @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
    @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif