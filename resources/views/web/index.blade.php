@extends('web.layout')



@section('content')

<link rel="stylesheet" href="{{ public_path() . '/css/custom.css'  }}" />



<section>

    <div class="container py-5">

        <div class="row">

            <div class="col-md-6 py-3">

                <h1 class="display-3 text-primary text-bold">Venha ser da família Telzir</h1>
                <h5>Conheça os nossos planos e vantagens e fale o quanto quiser pelo menor custo!</h5>

            </div>
            <div class="col-md-6">

                <img id="image-capa" src="{{ url('images/cel.svg') }}" alt="">


            </div>

        </div>

    </div>


</section>

<section class="pricing py-5">
    <div class="container">





        <div class="row">



            @if (count($plans))

            @foreach ($plans as $plan )

            <!-- Pro Tier -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">{{ $plan->name }}</h5>
                        <hr>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong> Fale grátis por
                                    {{ $plan->minutes }}</strong>
                            </li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span> Apenas 10% sobre a taxa depois
                                dos {{ $plan->minutes }} </li>

                        </ul>
                    </div>
                </div>
            </div>



            @endforeach




            @endif



        </div>

    </div>
</section>



<section>

    <div class="container py-5">

        <h1 class="text-center text-primary ">Faça agora a sua simulação</h1>


        <div class="row">



            <div class="col-md-6 py-3">



                <form action="" method="post">

                    <div class="form-group">
                        <label class="text-primary text-uppercase" for="origin">Origem</label>
                        <select class="form-control" name="origin" id="origin">
                            <option value="">01</option>
                            <option value="">01</option>
                            <option value="">01</option>
                            <option value="">01</option>
                        </select>

                    </div>


                    <div class="form-group">
                        <label class="text-primary text-uppercase" for="destiny">Destino</label>
                        <select class="form-control" name="destiny" id="destiny">
                            <option value="">01</option>
                            <option value="">01</option>
                            <option value="">01</option>
                            <option value="">01</option>
                        </select>

                    </div>


                    <div class="form-group">

                        <label for="time">Tempo em minutos</label>
                        <input type="number" id="time" name="time" class="form-control">


                    </div>


                    <div class="form-group">

                        @foreach ($plans as $plan)

                        <input type="radio" name="plan" id="plan">
                        <label class="mr-3" for="plan"> {{ $plan->name }} </label>


                        @endforeach

                    </div>

                    <input type="submit" value="Simular" class="btn btn-lg btn-primary">

                </form>




            </div>
            <div class="col-md-6">

                <div class="ajax_load">
                    <div class="ajax_load_box">
                        <div class="ajax_load_box_circle"></div>
                        <div class="ajax_load_box_title">Aguarde, carrengando...</div>
                    </div>
                </div>


            </div>

        </div>

    </div>


</section>





@endsection




@section('js')

<script>





</script>


@endsection
