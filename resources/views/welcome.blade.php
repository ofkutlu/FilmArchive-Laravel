<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="clapperboard.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/app.css">
    <link rel="stylesheet" href="/app1.css">
    <title>Movie Archive</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a style="margin-left: 1rem;" class="navbar-brand" href="/">Movie Archive</a>
        <form style="margin-right: 1rem;" method="get" class="d-flex" action="{{route('search')}}">
            @csrf
            <input class="form-control me-2" name="search" type="search" placeholder="Search">
            <input class="btn btn-outline-light" name="send" type="submit" value="Send">
        </form>
    </nav>
    <h3 style="margin-top: 1rem; ">Films Now Showing</h3>
    <div class="slider owl-carousel">
        <?php
        $api_url_now_playing = 'https://api.themoviedb.org/3/movie/now_playing?api_key=4760a9c0855d055cbda02ccb2ab9d2a6&language=en-US&page=1';
        $api_url_popular = 'https://api.themoviedb.org/3/movie/popular?api_key=4760a9c0855d055cbda02ccb2ab9d2a6&language=en-US&page=1';
        $api_url_upcoming = 'https://api.themoviedb.org/3/movie/upcoming?api_key=4760a9c0855d055cbda02ccb2ab9d2a6&language=en-US&page=1';
        $image_base_url = 'https://image.tmdb.org/t/p/w500';
        $data_now_playing = json_decode(file_get_contents($api_url_now_playing));
        $data_popular = json_decode(file_get_contents($api_url_popular));
        $data_upcoming = json_decode(file_get_contents($api_url_upcoming));
        $movies_now_playing = $data_now_playing->results;
        $movies_popular = $data_popular->results;
        $movies_upcoming = $data_upcoming->results;
        ?>
        @foreach ( $movies_now_playing as $movie )
            <div class="card">
                <div class="img">
                    <a href="/movieDetail?value_id={{$movie->id}}">
                        <img src="{{$image_base_url . $movie->poster_path }}" alt="">
                    </a>
                </div>
                <div class="content">
                    <div class="title">{{$movie->title}}</div>
                    <div class="sub-title"> IMDB:{{$movie->vote_average}}</div>
                </div>
            </div>
        @endforeach
    </div>
    <h3>Popular Films</h3>
    <div class="slider owl-carousel">
          @foreach ( $movies_popular as $movie )
            <div class="card">
                <div class="img">
                    <a href="/movieDetail?value_id={{$movie->id}}">
                        <img src="{{$image_base_url . $movie->poster_path }}" alt="">
                    </a>
                </div>
                <div class="content">
                    <div class="title">{{$movie->title}}</div>
                    <div class="sub-title"> IMDB:{{$movie->vote_average}}</div>
                </div>
            </div>
        @endforeach
    </div>
    <h3>Up Coming Films</h3>
    <div class="slider owl-carousel" style="margin-bottom: 2rem;">
          @foreach ( $movies_upcoming as $movie )
            <div class="card">
                <div class="img">
                    <a href="/movieDetail?value_id={{$movie->id}}">
                        <img src="{{$image_base_url . $movie->poster_path }}" alt="">
                    </a>
                </div>
                <div class="content">
                    <div class="title">{{$movie->title}}</div>
                    <div class="sub-title"> IMDB:{{$movie->vote_average}}</div>
                </div>
            </div>
        @endforeach
    </div>

    <footer class="bg-dark text-center text-white">
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-google"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"><i class="fab fa-github"></i></a>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: #212529;">
            © 2020 Copyright:
            <a class="text-white" href="/">movielaravel.test</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        $(".slider").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000, //2000ms = 2s;
            autoplayHoverPause: true,
        });
    </script>
</body>
</html>
