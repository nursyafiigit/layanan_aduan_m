@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Peminjaman Buku</h2>

        <!-- Alert untuk menampilkan pesan sukses -->
        <div id="success-message" class="alert alert-success d-none" role="alert">
            Buku berhasil dipinjam!
        </div>

        <form id="loan-form">
            @csrf
            <div class="form-group">
                <label for="member_id">Anggota:</label>
                <select name="member_id" id="member_id" class="form-control" required>
                    <option value="">Pilih Anggota</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="book_id">Buku:</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    <option value="">Pilih Buku</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="loan_date">Tanggal Peminjaman:</label>
                <input type="date" name="loan_date" id="loan_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="return_date">Tanggal Pengembalian:</label>
                <input type="date" name="return_date" id="return_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Pinjam Buku</button>
        </form>

        <h3 class="mt-4">Daftar Peminjaman Buku</h3>
        <table class="table table-bordered mt-3" id="loans-table">
            <thead>
                <tr>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loan->member->name }}</td>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->return_date }}</td>
                        <td>{{ $loan->status }}</td>
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

            // Use AJAX to send form data
            $.ajax({
                url: "{{ route('loans.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        // Show success alert
                        $('#success-message').removeClass('d-none');

                        // Update the table with the new data
                        var loansHtml = '';
                        $.each(response.loans, function (index, loan) {
                            loansHtml += '<tr>';
                            loansHtml += '<td>' + loan.member.name + '</td>';
                            loansHtml += '<td>' + loan.book.title + '</td>';
                            loansHtml += '<td>' + loan.loan_date + '</td>';
                            loansHtml += '<td>' + loan.return_date + '</td>';
                            loansHtml += '<td>' + loan.status + '</td>';
                            loansHtml += '</tr>';
                        });

                        // Append the new rows to the table
                        $('#loans-table tbody').html(loansHtml);

                        // Optionally reset the form
                        $('#loan-form')[0].reset();
                    }
                }
            });
        });
    </script>
@endsection