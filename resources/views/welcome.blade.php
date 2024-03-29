  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Página Inicial</title>

      <link rel="shortcut icon" href="/img/icone.png" type="image/x-icon">

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  </head>

  <body>
    <style>
        h1,
        h2,
        h3,
        h4,
        a {
            font-family: "Comfortaa", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
 
    </style>
      <nav class="navbar d-flex justify-content-center" style="background-color: #FEFEFE;">
          <a class="navbar-brand" href="/">
              <div class="container">
               <video class="object-fit-fill" src="/img/logovideo.mp4"
               autoplay
               loop
               muted
               width="200px"></video>   
            </div>
          </a>
      </nav>

      <div class="container p-2">
          <div class="row" id="opcoes-container">
              <div class="col-sm-4 mb-3 mb-sm-0"">
                  <div class="card" style="width: 22rem;">
                      <img src="/img/internet.jpg" class="card-img-top">
                      <div class="card-body">
                          <h5 class="card-title">Planos de Internet</h5>
                          <p class="card-text"> Gerenciar velocidade, valores e locações de equipamentos de todos os
                              seus
                              planos em
                              um só lugar!
                          </p>
                          <a href="plano" class="btn btn-primary">Clique aqui para acessar os planos de
                              <b>INTERNET</b></a>
                      </div>

                  </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0"">
                  <div class="card" style="width: 22rem;">
                      <img src="/img/tv.png" class="card-img-top">
                      <div class="card-body">
                          <h5 class="card-title">Planos de TELEVISÃO</h5>
                          <p class="card-text">Gerenciar tipos de canais, quantidade de telas e valores de
                              todos os
                              seus planos em
                              um só lugar!</p>
                          <a href="planotv" class="btn btn-primary">Clique aqui para acessar os planos de
                              <b>TELEVISÃO</b></a>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4 mb-3 mb-sm-0">
                  <div class="card" style="width: 22rem;">
                      <img src="/img/produtos.jpg" class="card-img-top">
                      <div class="card-body">
                          <h5 class="card-title">Produtos</h5>
                          <p class="card-text">Gerenciar os produtos cadastrados, quantidade em estoque e valor unitário
                              em
                              um só lugar!</p>
                          <a href="/produto" class="btn btn-primary">Clique aqui para acessar a tela de
                              <b>PRODUTOS</b></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <footer class="position-absolute bottom-0 start-50 translate-middle-x">
          <p>FastNet Telecom &copy; 2024</p>
      </footer>

      <!-- Bootstrap javascript-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
      </script>

  </body>

  </html>
