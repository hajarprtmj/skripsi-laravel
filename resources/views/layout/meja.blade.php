@extends('template.template')
@section('content')
    <section id="contact" class="contact">
        <div class="container " data-aos="fade-up">
            <div class="p-3 p-md-4">
                {{-- PESAN --}}
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong><i class="bi bi-check2-all"></i>&nbsp;{{ session('pesan') }}.</strong>
                    </div>
                @endif
                <a href="{{ route('meja.create') }}" class="btn btn-danger btn-sm">Tambah Meja</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">No Meja</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($meja as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->no_meja }}</td>
                            <td>
                                <form action="{{ route('meja.destroy', $item->id_meja) }}" method="post">
                                    <a href="{{ route('meja.edit', $item->id_meja) }}" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
