<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $this->title;?></title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/aionGRP/style.css">
</head>
<body>
  <script
  			  src="https://code.jquery.com/jquery-3.3.1.js"
  			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  			  crossorigin="anonymous"></script>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bar bg-dark">
        <a class="navbar-brand" href="#">AionGRP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/aionGRP/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aionGRP/index.php?w=online">Who's online ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aionGRP/index.php?w=sheet">Character sheets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aionGRP/index.php?w=map">Server Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://elineda.ovh/forum/">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Discord</a>
                </li>

            </ul>

        </div>
    </nav>



</header>



<div class="container">
    <main>
        <div class="row titre">
            <div class="col-lg-12">
                <h1>Welcome in Aion giant roleplay !</h1>
            </div>
        </div>
        <div class="row acc">
            <div class="col-lg-8 " style="min-height:1000px;">
    <?= $this->body;?>
            </div>

            <div class="col-lg-3 ml-auto leftcol">
                <div class="patcher">
                    <img src="/aionGRP/images/patcher.png" style="width: 240px;">
                   <a href="/aionGRP/launcher.zip"><button style="margin: 1em auto; display: block;"  "button" class="btn btn-map">Download Game</button></a>
                </div>
                <div class="disc">
                    <iframe src="https://discordapp.com/widget?id=251027355764523020&theme=dark" width="237" height="400" allowtransparency="true" frameborder="0"></iframe>
                </div>
            </div>

        </div>
    </main>
</div>
<footer>

</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
