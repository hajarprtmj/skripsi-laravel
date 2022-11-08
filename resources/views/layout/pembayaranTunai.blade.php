@extends('template.template')
@section('content')
    <section id="contact" class="contact">
        <div class="container " data-aos="fade-up">
            <div class="p-3 p-md-4">
            </div>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="tab-header text-center">
                        <h3><strong>Pesanan sudah kami terima</strong></h3>
                        <img src="{{ asset('picture') }}/centanghijau.png" height="200" width="200" alt="" srcset="">
                        <h5>Silahkan lakukan pemabayaran dikasir.</h5>
                        <h6>Terimakasih atas pesanan anda, pesanan akan kami konfirmasi dan akan diproses.</h6>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
