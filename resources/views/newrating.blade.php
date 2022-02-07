@extends('layouts.app')
@section('content')

    <br><br>
    <p>
    <h1>{{ $userdata[0] }}</h1>
    </p>
    <br>
    <p>
        <span class="rating__result"></span>
    <div class="rating">
        <i id="1" class="rating__star far fa-star"></i>
        <i id="2" class="rating__star far fa-star"></i>
        <i id="3" class="rating__star far fa-star"></i>
        <i id="4" class="rating__star far fa-star"></i>
        <i id="5" class="rating__star far fa-star"></i>
        <br>
    </div>
    <br>
    <form action="" method="POST">
        @csrf
        <input type="hidden" id=rating name="rating" value="0" />
        <button class=" btn btn-outline-warning my-2 my-sm-0">Submit Rating</button>
    </form>
    </p>
    <script>
        const ratingStars = [...document.getElementsByClassName("rating__star")];
        const ratingResult = document.querySelector(".rating__result");

        printRatingResult(ratingResult);

        function executeRating(stars, result) {
            const starClassActive = "rating__star fas fa-star";
            const starClassUnactive = "rating__star far fa-star";

            const starsLength = stars.length;


            let i;
            stars.map((star) => {
                star.onclick = () => {
                    i = stars.indexOf(star);

                    if (star.className.indexOf(starClassUnactive) !== -1) {
                        printRatingResult(result, i + 1);
                        for (i; i >= 0; --i) stars[i].className = starClassActive;
                    } else {
                        printRatingResult(result, i);
                        for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
                    }
                };
            });
        }

        function printRatingResult(result, num = 0) {
            result.textContent = `${num}/5`;
            console.log('New star rating: ' + num);
            document.getElementById("rating").value = num;

            console.log(document.getElementById("rating").value);
        }

        executeRating(ratingStars, ratingResult);

    </script>

@endsection
