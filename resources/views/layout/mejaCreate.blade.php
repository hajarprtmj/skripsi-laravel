@extends('template.template')
@section('content')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <form action="{{ route('meja.store') }}" method="POST" role="form" class="p-3 p-md-4">
                @csrf

                <div class="form-group">
                    <label for="no_meja"><strong>No Meja</strong></label>
                    <input type="text" class="form-control" name="no_meja" id="no_meja" placeholder="No Meja">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
