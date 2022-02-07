@extends('layouts.app')
@section('content')
    <script>
        window.onload = function() {

            var onestar = document.getElementById("onestar").value;
            var twostars = document.getElementById("twostars").value;
            var threestars = document.getElementById("threestars").value;
            var fourstars = document.getElementById("fourstars").value;
            var fivestars = document.getElementById("fivestars").value;

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "User Statistics",
                    horizontalAlign: "left"
                },
                data: [{
                    type: "doughnut",
                    startAngle: 60,
                    //innerRadius: 60,
                    indexLabelFontSize: 17,
                    // indexLabel: "{label} - #percent%", 
                    toolTipContent: "<b>{label}:</b> {y} ",
                    dataPoints: [{
                            y: onestar,
                            label: "1★"
                        },
                        {
                            y: twostars,
                            label: "2★"
                        },
                        {
                            y: threestars,
                            label: "3★"
                        },
                        {
                            y: fourstars,
                            label: "4★"
                        },
                        {
                            y: fivestars,
                            label: "5★"
                        }
                    ]
                }]
            });
            chart.render();

        }

    </script>
    <script>
        function checkstars(user, stars) {

            var list = document.getElementById(user).getElementsByTagName("i");
            console.log(list[0]);
            if (stars == 1) {
                list[0].className = "rating__star fas fa-star";

            } else if (stars == 2) {
                list[0].className = "rating__star fas fa-star";
                list[1].className = "rating__star fas fa-star";
            } else if (stars == 3) {
                list[0].className = "rating__star fas fa-star";
                list[1].className = "rating__star fas fa-star";
                list[2].className = "rating__star fas fa-star";

            } else if (stars == 4) {
                list[0].className = "rating__star fas fa-star";
                list[1].className = "rating__star fas fa-star";
                list[2].className = "rating__star fas fa-star";
                list[3].className = "rating__star fas fa-star";


            } else if (stars == 5) {
                list[0].className = "rating__star fas fa-star";
                list[1].className = "rating__star fas fa-star";
                list[2].className = "rating__star fas fa-star";
                list[3].className = "rating__star fas fa-star";
                list[4].className = "rating__star fas fa-star";

            }

        }

    </script>

    <input type="hidden" id="onestar" value={{ $user_stats[1] }}>
    <input type="hidden" id="twostars" value={{ $user_stats[2] }}>
    <input type="hidden" id="threestars" value={{ $user_stats[3] }}>
    <input type="hidden" id="fourstars" value={{ $user_stats[4] }}>
    <input type="hidden" id="fivestars" value={{ $user_stats[5] }}>

    <p>
    <h1>{{ $user_stats[0] }}</h1>
    </p>
    <div id={{ $user_stats[0] }} class="rating">
        <span class="rating__result"></span>
        <i name="onestar" class="rating__star far fa-star"></i>
        <i name="twostar" class="rating__star far fa-star"></i>
        <i name="threestar" class="rating__star far fa-star"></i>
        <i name="fourstar" class="rating__star far fa-star"></i>
        <i name="fivestar" class="rating__star far fa-star"></i>

    </div>
    <p>
    <h2>{{ $user_stats[7] }} Avarage Out of {{ $user_stats[6] }} Reviews</h2>
    </p>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        var stars = "<?php echo $user_stats[7]; ?>";
        console.log(stars);

        var user = "<?php echo $user_stats[0]; ?>";
        checkstars(user, stars);

    </script>
@endsection
