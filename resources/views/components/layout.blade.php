<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../resources/css/fonts/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="../resources/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-xxxxx" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</head>

<style>
  .col-end {
    float: right;
  }

  table {
    border: 1px solid #333;
  }

  body {
    font-family: "Odibee Sans", cursive;
  }

  .content {
    margin-top: 100px;
  }

  #list-title {
    font-weight: 500;
    font-size: larger;
    background-color: rgba(0, 0, 0, 0.2);
  }

  .box:hover {
    transform: scale(1.1);
    transition: 0.4s;
  }

  .edit,
  .delete {
    width: 75px;
  }

  .filter {
    float: right;

  }

  .filter li {
    margin: 0 50px;
    display: inline-block;
    list-style-type: none;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropbtn {
    padding: 5px 10px;
    border: none;
    background-color: rgba(0, 0, 0, 0.2);
    box-shadow: 2px 2px 2px gray;
  }

  .add:hover {
    background-color: dodgerblue;
    color: #fff;
  }

  .del:hover {
    background-color: #DD0000;
    color: #fff;
  }
  .del{
    text-decoration: none;
    color:#333;
  }
  .ti-search {
    color: yellow;
  }
</style>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class=" container navbar-brand" href="#">Extra Curricular</a>
      <button style="border: none;" class=" navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <i class="ti-search"></i>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Search box</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <form method="get" action="{{ route('extracurriculars.search') }}" class="d-flex mt-3" role="search">
            <input name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </nav>
  {{ $slot }}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../resources/js/script.js"></script>
</body>

</html>
<!-- tao danh sach category bằng 
ket noi 2 bảng trong categories.php và product.php -->