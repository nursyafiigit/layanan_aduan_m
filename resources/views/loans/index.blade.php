@foreach ($loans as $loan)
    <tr>
        <td>{{ $loan->member->name }}</td>
        <td>{{ $loan->book->title }}</td>
        <td>{{ $loan->status }}</td>
        <td>
            @if($loan->status == 'borrowed')
                <!-- Tombol untuk mengarahkan ke halaman return -->
                <a href="{{ route('loans.returnForm', $loan->id) }}" class="btn btn-primary">Kembalikan Buku sek</a>
            @endif
        </td>
    </tr>
@endforeach