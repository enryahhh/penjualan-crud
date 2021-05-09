<p>Dibuat Pada {{ date('Y-m-d') }}</p>
<table style="border: 1px solid black;">
    <thead>
    <tr>
        <th style="background-color:#f2f2f2;border: 1px solid black;" scope="col">No</th>
        <th style="background-color:#f2f2f2;border: 1px solid black;" scope="col">Kode</th>
        <th style="background-color:#f2f2f2;border: 1px solid black;" scope="col">Nama</th>
        <th style="background-color:#f2f2f2;border: 1px solid black;" scope="col">Harga</th>
        <th style="background-color:#f2f2f2;border: 1px solid black;" scope="col">Stok</th>
    </tr>
    </thead>
    <tbody>
    @foreach($barang as $item)
        <tr>
            <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid black;">{{ $item->id_barang }}</td>
            <td style="border: 1px solid black;">{{ $item->nama_barang }}</td>
            <td style="border: 1px solid black;">{{ number_format($item->harga,0,'.','') }}</td>
            <td style="border: 1px solid black;">{{ $item->stok }}</td>
        </tr>
    @endforeach
    </tbody>
</table>