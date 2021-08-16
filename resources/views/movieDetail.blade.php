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
    $id_value = $_GET['value_id'];
    $api_url1 = 'https://api.themoviedb.org/3/movie/ ' . $id_value . '?api_key=4760a9c0855d055cbda02ccb2ab9d2a6&language=en-US';
    $image_base_url = 'https://image.tmdb.org/t/p/w500';
    $data = json_decode(file_get_contents($api_url1));
    ?>

    <div class="container">
        <div style="margin-top: 1rem;" id="profile">
            <div class="card card-body mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-fluid mb-2" src="{{$image_base_url . $data->poster_path}}">

                        @if (!empty($data->backdrop_path))
                            <img class="img-fluid mb-2" src="{{$image_base_url . $data->backdrop_path}}">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div id="fullName"><strong>{{$data->title}}</strong></div>
                            <hr>
                        <li class="list-group">
                            @if (!empty($data->overview))
                        <li class="list-group-item borderzero">
                            <strong>Movie Overview : </strong><br>
                            <span>{{$data->overview }}</span>
                        </li>
                            @endif
                        <li class="list-group-item borderzero">
                            <strong>Orginal Name : </strong>
                            <span>{{$data->original_title}}</span>
                        </li>
                        <li class="list-group-item borderzero">
                            <strong>IMDB :</strong>
                            <span>{{$data->vote_average}}</span>
                        </li>
                        <li class="list-group-item borderzero">
                            <strong>Vision Date : </strong>
                            <span>{{$data->release_date}}</span>
                        </li>
                        <li class="list-group-item borderzero">
                            <strong>Popularity : </strong>
                            <span>{{$data->popularity}}</span>
                        </li>
                        <li class="list-group-item borderzero">
                            <strong>Movie Revenue : </strong>
                            <span>{{$data->revenue}}</span>
                        </li>
                            @if (!empty($data->homepage))
                        <li class="list-group-item borderzero">
                            <strong>Movie Homepage : </strong>
                            <a href="{{$data->homepage}}">{{$data->homepage}}</a>
                        </li>
                            @endif
                    </div>
                </div>
            </div>
        </div>
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

</body>

</html>
