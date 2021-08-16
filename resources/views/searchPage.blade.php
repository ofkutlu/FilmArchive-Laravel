<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="clapperboard.ico" type="image/x-icon">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    <?php
    $error = "Lütfen aramak istediğiniz filmin adını yazınız.";
    $search_value = $_GET['search'];
    ?>

    @if (!empty($search_value))
    <?php
    $api_url = 'https://api.themoviedb.org/3/search/movie?api_key=4760a9c0855d055cbda02ccb2ab9d2a6&language=en-US&query=' . $search_value . '&page=1&include_adult=false';
    $image_base_url = 'https://image.tmdb.org/t/p/w500';
    $data = json_decode(file_get_contents($api_url));
    $movies = $data->results;
    ?>
    @foreach ($movies as $movie)
    <div class="container">
        <div id="profile" style="margin-top: 1rem;">
            <div class="card card-body mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <a href="/movieDetail?value_id={{$movie->id}}">
                            <img class="img-fluid mb-2" alt="{{$movie->title}}" src="{{$image_base_url . $movie->poster_path}}">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <li class="list-group">
                            <div id="fullName"><strong>{{$movie->title}}</strong></div>
                            <li class="list-group-item borderzero">
                                <span> <strong>IMDB : </strong>{{$movie->vote_average}}</span>
                            </li>
                            @if (!empty($movie->release_date))
                            <li class="list-group-item borderzero">
                                <span><strong>Vision Date : </strong>{{$movie->release_date}}</span>
                            </li>
                            @endif
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <?php
    echo "<script>alert('" . $error . "');</script>";
        header("Refresh:0; url=/"); ?>
    @endif
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
</body>

</html>
