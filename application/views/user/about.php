<head>
  <style type="text/css">
    .row {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .card img {
      object-fit: cover;
      padding-bottom: 10px;
    }

    .card {
      width: 20rem;
      margin: 3rem;
      background-color: #3a3a3a;
      padding: 2rem;
      box-shadow: 2rem 3rem 5rem rgb(171, 171, 171);
      float: left;
      align-items: center;
      align-content: center;
    }

    .about-section {
      padding: 50px;
      text-align: center;
      background-color: #ffcc00;
      color: white;
    }

    .title {
      color: grey;
    }



    .button:hover {
      background-color: #555;
    }

    .app-about {
      flex-direction: column;
      align-items: center;
      padding-top: 5px;
      text-align: center;
      padding-left: 50px;
    }

    .container {
      display: grid;
      align-content: center;
      align-items: center;
      justify-content: center;
      color: rgb(179, 179, 179);
    }

    .autoContainer {
      position: absolute;
      border-width: 0px 1px 1px 1px;
      border-style: solid;
      border-color: rgb(0, 0, 0);
      background-color: whitesmoke;
      right: 10px;
      top: 52px;
      width: 520px;
    }

    .option {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 500px;
      padding: 5px;
    }

    font-family: 'Segoe UI',
    'Sora',
    Tahoma,
    Geneva,
    Verdana,
    sans-serif;
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style-type: none;
    outline: none;
    }

    html {
      font-size: 62.5%;
      box-sizing: border-box;
      background-color: rgb(44, 44, 44);
    }

    h1 {
      font-size: 8rem;
      letter-spacing: 0.1rem;
      font-style: italic;
      color: #40b48e;
      text-shadow: 0 0.2rem 5rem rgb(119, 115, 115);
      text-transform: uppercase;
      margin: 4rem 0;
    }
  </style>
  <div class="container">
    <div class="app-about">
      <div class="card">
        <img src="<?= base_url() . 'assets/profile/1585550232656.jpg' ?>" width='100%%' height='300px' alt="" />
        <div class="container">
          <h2>Juan Tanandi</h2>
          <p class="title">Informatika 2019</p>
          <p>NIM: 00000033728</p>
          <p>Back End Developer</p>
        </div>
      </div>
      <div class="card">
        <img src="<?= base_url() . 'assets/profile/nelson.jpg' ?>" width='100%' height='300px' alt="" />
        <div class="container">
          <h2>Nelson</h2>
          <p class="title">Informatika 2019</p>
          <p>NIM: 00000033960</p>
          <p>Full Stack Developer</p>
        </div>
      </div>
      <div class="card">
        <img src="<?= base_url() . 'assets/profile/hindra.jpg' ?>" width='100%' height='300px' alt="" />
        <div class="container">
          <h2>Hindra Pangadi</h2>
          <p class="title">Informatika 2019</p>
          <p>NIM: 00000034587</p>
          <p>Full Stack Developer</p>
        </div>
      </div>
      <div class="card">
        <img src='<?= base_url() . 'assets/profile/Kevin_Bebas.jpg' ?>' width='100%' height='300px' alt="" />
        <div class="container">
          <h2>Kevin Hindra Jaya</h2>
          <p class="title">Informatika 2019</p>
          <p>NIM:00000033631</p>
          <p>Front End Developer</p>
        </div>
      </div>
    </div>
  </div>