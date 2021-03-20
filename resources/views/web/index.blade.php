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
                                    {{ $plan->minutes }} minutos</strong>
                            </li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span> Apenas 10% sobre a taxa depois
                                dos {{ $plan->minutes }} minutos </li>

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

        <h1 class="text-center text-primary">Faça agora a sua simulação</h1>


        <div class="row">



            <div class="col-md-6 py-3">


                <div class="callback">
                </div>

                <form action="{{ route('web.post') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <h5 class="text-primary text-bold text-uppercase" for="origin">Origem</h5>
                        <select class="form-control" name="origin" id="origin">

                            @foreach ($control as $controlItem)
                            <option value="{{ $controlItem->origin }}"> {{ $controlItem->origin }} </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="form-group">
                        <h5 class="text-primary text-uppercase" for="destiny">Destino</h5>
                        <select class="form-control" name="destiny" id="destiny">

                            @foreach ($control as $controlItem)
                            <option value="{{ $controlItem->destiny }}"> {{ $controlItem->destiny }} </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="form-group">

                        <h5 class="text-primary text-uppercase" for="time">Tempo em minutos</h5>
                        <input type="number" id="time" name="time" class="form-control">


                    </div>

                    <div class="form-group">

                        @foreach ($plans as $plan)

                        <input type="radio" name="plan" value="{{ $plan->id }}" id="plan">
                        <label  class="mr-4 text-primary"  for="plan"> {{ $plan->name }} </label>


                        @endforeach

                    </div>


                    <button type="submit" class="btn btn-lg btn-primary">  <i class="fas fa-arrow-right"></i>  Simular </button>

                </form>




            </div>


            <div class="ajax_load">
                <div class="ajax_load_box">
                    <div class="ajax_load_box_circle"></div>
                    <div class="ajax_load_box_title">Aguarde, carrengando...</div>
                </div>
            </div>

            <div class="col-md-6" id="result">




            </div>

        </div>

    </div>


</section>





@endsection


@section('js')

<script>
    $(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var action = form.attr("action");
        var data = form.serialize();

        $.ajax({
            url: action,
            data: data,
            type: "post",
            dataType: "json",
            beforeSend: function (load) {
                ajax_load("open");
            },
            success: function (su) {
                ajax_load("close");

                if (su.message) {
                    var view = '<div class="message ' + su.message.type + '">' + su.message.message + '</div>';
                    $(".callback").html(view);
                    $(".message").effect("bounce");
                    return;
                }

                if (su.data) {



                    let card1 = `<div class="card">  <div class="card-body">  <h5 class="card-title text-muted text-uppercase text-center"> Com o  ${su.data.plan}  </h5>  <h2 class="text-center text-success"> $ ${su.data.withPlan.toFixed(2)} </h2>   </div>   </div> `;
                    let card2 = `<div class="card">  <div class="card-body">  <h5 class="card-title text-muted text-uppercase text-center"> Sem o  ${su.data.plan}  </h5>  <h2 class="text-center text-success"> $ ${su.data.withOutPlan.toFixed(2)} </h2>   </div>   </div> `;

                    let cards = card1 + card2;

                    $("#result").html(cards);
                    $("#result").effect("bounce");




                }
            }
        });

        function ajax_load(action) {
            ajax_load_div = $(".ajax_load");

            if (action === "open") {
                ajax_load_div.fadeIn(300).css("display", "flex");
            }

            if (action === "close") {
                ajax_load_div.fadeOut(300);
            }
        }
    });
});


</script>


@endsection
