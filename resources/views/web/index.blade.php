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


                <div class="callback">
                </div>

                <form action="{{ route('web.post') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label class="text-primary text-uppercase" for="origin">Origem</label>
                        <select class="form-control" name="origin" id="origin">

                            @foreach ($control as $controlItem)
                            <option value="{{ $controlItem->origin }}"> {{ $controlItem->origin }} </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="form-group">
                        <label class="text-primary text-uppercase" for="destiny">Destino</label>
                        <select class="form-control" name="destiny" id="destiny">

                            @foreach ($control as $controlItem)
                            <option value="{{ $controlItem->destiny }}"> {{ $controlItem->destiny }} </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="form-group">

                        <label for="time">Tempo em minutos</label>
                        <input type="number" id="time" name="time" class="form-control">


                    </div>

                    <div class="form-group">

                        @foreach ($plans as $plan)

                        <input type="radio" name="plan" value="{{ $plan->id }}" id="plan">
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

                if (su.redirect) {
                    window.location.href = su.redirect.url;
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
