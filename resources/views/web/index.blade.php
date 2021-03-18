@extends('web.layout')



@section('content')

<link rel="stylesheet" href="{{ public_path() . '/css/custom.css'  }}" />

<section class="pricing py-5">
    <div class="container">
        <div class="row">



            @if (count($plans))

            @foreach ($plans as $plan )

            <!-- Pro Tier -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">{{ $plan->name }}</h5>
                        <hr>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong> Fale grátis por {{ $plan->minutes }}</strong>
                            </li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span> Apenas 10% sobre a taxa depois dos {{ $plan->minutes }} </li>

                        </ul>
                        <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
                    </div>
                </div>
            </div>



            @endforeach




            @endif



        </div>

    </div>
</section>




@endsection
