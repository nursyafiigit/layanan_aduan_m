@foreach ($loans as $index => $loan)
    <tr>
        <!-- Menambahkan nomor urut menggunakan index -->
        <td>{{ $index + 1 }}</td>
        <td>{{ $loan->member->name }}</td>
        <td>{{ $loan->book->title }}</td>
        <td>{{ $loan->status }}</td>
        <td>
            @if($loan->status == 'borrowed')
                <!-- Tombol untuk mengarahkan ke halaman return dengan styling Bootstrap -->
                <a href="{{ route('loans.returnForm', $loan->id) }}" class="btn btn-warning btn-sm">Atur Pengembalian</a>
            @endif
        </td>
    </tr> 
@endforeach