<?php

namespace App\Http\Controllers;

use App\Model\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BukuDatatable extends Controller
{
    public function view() {
        return \view("buku/datatable/index");
    }

    public function DatatableAjax() {
        $query = Buku::query();

        return DataTables::of($query)->make(true);
    }
}
