<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Trade Project</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap JavaScript and dependencies via CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
</head>

<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}
    
</body>
<style>
    .custom-login{
        height: 500px;
        padding-top:100px;
        
    }

    .custom-caption h3,
    .custom-caption p {
        color: black; /* Set the text color to black */
    }


.trending-img {
    height: 200px;
    object-fit: cover;
}

.trending-products {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-around;
}

.trending-items {
    flex: 1 1 calc(33.333% - 20px); /* Three items per row */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s;
}

.trending-items:hover {
    transform: translateY(-5px);
}

.trending-items .card-body {
    text-align: center;
}

@media (max-width: 768px) {
    .trending-items {
        flex: 1 1 calc(50% - 20px); /* Two items per row on smaller screens */
    }
}

@media (max-width: 576px) {
    .trending-items {
        flex: 1 1 100%; /* One item per row on extra small screens */
    }
}
detail-img {
        max-width: 100%;
        height: auto;
    }
    .custom-product {
        padding-top: 20px;
    }
    .search-box {
        width: 500px;
    }
</style>

</html>