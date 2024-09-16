@extends('layout')
@section('content')
    @include('components.header')
    @include('components.banner')
    <section class="container -card">
        <div class="section-header">
            <h4>Explore a Wide Range of Premium Furniture</h4>
        </div>
        <div class="grid padding-side-lg">
            <div class="card">
                <div class="cover-img">
                    <img src="https://as1.ftcdn.net/v2/jpg/06/63/55/84/1000_F_663558400_q69vcYmtvZOI4x68ztxCs8AdwFJ2JW1X.jpg" alt="">
                </div>
                <div class="card-title">
                    <p>New Arrivals</p>
                </div>
            </div>
            <div class="card">
                <div class="cover-img">
                    <img src="https://as1.ftcdn.net/v2/jpg/08/22/62/22/1000_F_822622206_b03CiggFrZwfFpHhhYOqYzbCffdj3Ax1.jpg" alt="">
                </div>
                <div class="card-title">
                    <p>Trending Now</p>
                </div>
            </div>
            <div class="card">
                <div class="cover-img">
                    <img src="https://as1.ftcdn.net/v2/jpg/06/10/68/82/1000_F_610688266_tlMLVoPnIcUmr51fSSBlE9mvrT8qaE3P.jpg" alt="">
                </div>
                <div class="card-title">
                    <p>Special Offers</p>
                </div>
            </div>
            <div class="card">
                <div class="cover-img">
                    <img src="https://as2.ftcdn.net/v2/jpg/08/44/39/01/1000_F_844390120_X72EQ55XWo6rw9pE4oO1a97iQk4dONte.jpg" alt="">
                </div>
                <div class="card-title">
                    <p>Editor's Choice</p>
                </div>
            </div>
            <div class="card">
                <div class="cover-img">
                    <img src="https://as1.ftcdn.net/v2/jpg/05/93/98/30/1000_F_593983054_txkihUWsLtGz0VFYHxhm7IFKhs1zdbEG.jpg" alt="">
                </div>
                <div class="card-title">
                    <p>Living Room</p>
                </div>
            </div>
            <div class="card">
                <div class="cover-img">
                    <img src="https://as2.ftcdn.net/v2/jpg/06/50/59/35/1000_F_650593500_lFock9DBLk5qSRb74yZqjSSN0q9rsupk.jpg" alt="">
                </div>
                <div class="card-title">
                    <p>Bedroom</p>
                </div>
            </div>
            <div class="card">
                <div class="cover-img">
                    <img src="https://as1.ftcdn.net/v2/jpg/01/93/81/48/1000_F_193814834_Mj2ym41Gt5ArQPcADcyfuIiwQngaHDlU.jpg" alt="">
                </div>
                <div class="card-title">
                    <p>Kitchen</p>
                </div>
            </div>
            <div class="card">
                <div class="cover-img">
                    <img src="https://as2.ftcdn.net/v2/jpg/06/03/39/81/1000_F_603398110_PqVHQliYUAQnxXrB4Lz2ligknnpmS6aN.jpg" alt="">
                </div>
                <div class="card-title">
                    <p>Bathroom</p>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
