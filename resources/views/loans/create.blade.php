@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Peminjaman Buku</h2>

        <!-- Alert untuk menampilkan pesan sukses -->
        <div id="success-message" class="alert alert-success d-none" role="alert">
            Buku berhasil dipinjam!
        </div>

        <!-- The form for creating loan -->
        <form id="loan-form">
            @csrf
            <div class="form-group">
                <label for="member_id">Anggota:</label>
                <input type="text" name="member_id" placeholder="Pilih" id="member_id" list="member" class="form-control"
                    required>
                <datalist id="member">
                    @foreach($members as $member)
                        <option value="{{ $member->name }}">{{ $member->name }}</option>
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label for="book_id">Buku:</label>
                <input type="text" name="book_id" placeholder="Cari Buku" list="buku" id="book_id" class="form-control"
                    required>
                <datalist id="buku">
                    @foreach($books as $book)
                        <option value="{{ $book->title }}">{{ $book->title }}</option>
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label for="loan_date">Tanggal Peminjaman:</label>
                <input type="date" name="loan_date" id="loan_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="return_date">Tanggal Pengembalian:</label>
                <input type="date" name="return_date" id="return_date" class="form-control" required>
            </div>
            <a href="{{ route('loans.store') }}">
                <!-- Submit button -->
                <button  type="submit" class="btn btn-primary">Pinjam Buku</button>
            </a>
        </form>

        <!-- Table to display loans -->
        <h3 class="mt-4">Daftar Peminjaman Buku</h3>
        <table class="table table-bordered mt-3" id="loans-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $index => $loan)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Nomor urut -->
                        <td>{{ $loan->member->name }}</td>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->return_date }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>
                            @if($loan->status == 'borrowed')
                                <a href="{{ route('loans.returnForm', $loan->id) }}" class="btn btn-warning">Atur Pengembalian</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include jQuery and AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Handle the form submission
        $('#loan-form').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('loans.store') }}",  // ensure the URL is correct
                method: "POST",
                data: $(this).serialize(),  // serializes the form data
                success: function (response) {
                    if (response.status == 'success') {
                        // Show success message
                        $('#success-message').removeClass('d-none');

                        // Update table with new data
                        var loansHtml = '';
                        $.each(response.loans, function (index, loan) {
                            loansHtml += '<tr>';
                            loansHtml += '<td>' + (index + 1) + '</td>';
                            loansHtml += '<td>' + loan.member.name + '</td>';
                            loansHtml += '<td>' + loan.book.title + '</td>';
                            loansHtml += '<td>' + loan.loan_date + '</td>';
                            loansHtml += '<td>' + loan.return_date + '</td>';
                            loansHtml += '<td>' + loan.status + '</td>';
                            loansHtml += '<td><a href="/loans/' + loan.id + '/return" class="btn btn-warning">Atur Pengembalian</a></td>';
                            loansHtml += '</tr>';
                        });

                        // Refresh table
                        $('#loans-table tbody').html(loansHtml);

                        // Reset the form
                        $('#loan-form')[0].reset();

                        // Hide success message after a few seconds
                        setTimeout(function () {
                            $('#success-message').addClass('d-none');
                        }, 5000);
                    }
                }
            });
        });

    </script>
@endsection