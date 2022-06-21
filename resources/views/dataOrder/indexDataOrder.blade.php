@extends('index')
@section('title', __('Integration Laravel - Mobilepulsa | Data Order'))

@section('content')
<div class="container-fluid">
    <a href="/data-order/delete-all" class="btn btn-sm btn-danger mb-3">Delete All</a>

    <table class="table table-bordered">
        <tr class="text-center">
            <th>Ref ID</th>
            <th>Nomor Tujuan</th>
            <th>Provider/Payment Channel</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Success At</th>
            <th>Sign</th>
            <th>Opsi</th>
        </tr>
        @if (count($order) < 1)
            <tr class="text-center">
                <td colspan="8"><b>Data Kosong!</b></td>
            </tr>
        @else
            @foreach ($order as $data)
                <tr>
                    <td>{{ $data->ref_id }}</td>
                    <td>{{ $data->no_telp }}</td>
                    <td>{{ $data->provider }}</td>
                    <td>@rupiah($data->price)</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->success_at }}</td>
                    <td>{{ $data->sign }}</td>
                    <td class="text-center">
                        <a href="/data-order/delete/{{ $data->ref_id }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
@endsection

@section('script')
    
@endsection

@section('modal')
    
@endsection 