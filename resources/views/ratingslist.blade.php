@extends('layouts.app')
@section('content')

    <br><br>

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
    <table class="center">
        <tr>
            <th>Name</th>
            <th>Rating</th>
            <th>Action</th>
        </tr>
        @foreach ($ratingslist as $rating)

            <tr>
                <th>{{ $rating[0] }}</th>
                <th>
                    <div id={{ $rating[0] }} class="rating">
                        <span class="rating__result"></span>
                        <i name="onestar" class="rating__star far fa-star"></i>
                        <i name="twostar" class="rating__star far fa-star"></i>
                        <i name="threestar" class="rating__star far fa-star"></i>
                        <i name="fourstar" class="rating__star far fa-star"></i>
                        <i name="fivestar" class="rating__star far fa-star"></i>

                    </div>
                </th>
                <th>
                    <form action="/rateuser/{{ $rating[2] }}">
                        <input class=" btn btn-outline-warning my-2 my-sm-0" type="submit" value="Rate this user!" />
                    </form>
                    <br>
                    <form action="/userprofile/{{ $rating[2] }}">
                        <input class="btn btn-outline-info my-2 my-sm-0" type="submit" value="User stats" />
                    </form>
                </th>
            </tr>


            <script>
                var stars = "<?php echo $rating[1]; ?>";
                console.log(stars);

                var user = "<?php echo $rating[0]; ?>";
                checkstars(user, stars);

            </script>

        @endforeach
    </table>

@endsection
