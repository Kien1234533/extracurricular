<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../resources/css/fonts/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="../resources/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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


  #list-title {
    font-weight: 500;
    font-size: 15px;
    background-color: rgba(0, 0, 0, 0.2);
  }

  .box:hover {
    transform: scale(1.1);
    transition: 0.4s;
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

  .del {
    text-decoration: none;
    color: #333;
  }

  .ti-search {
    color: yellow;
  }
</style>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-0">
        <a href="https://hoangkhang.com.vn/" class="img logo rounded-circle mb-5" style="background-image: url(../public/img/logo.svg); background-size: contain"></a>
        <div class="d-flex" role="search">
          <input id="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="button" id="searchBtn">Search</button>
        </div>
        <div style="position: absolute;
        top: 206px; left: 24px" id="searchSuggestions" class="dropdown-menu" aria-labelledby="keyword">
          <!-- Nơi hiển thị kết quả gợi ý -->

        </div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{url('extracurriculars')}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
          </li>
          <li>
            <a href="#">About</a>
          </li>
          <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
          </li>
          <li>
            <a href="#">Portfolio</a>
          </li>
          <li>
            <a href="#">Contact</a>
          </li>
        </ul>
      </div>



    </nav>
    <!-- Page Content  -->
    <div id="content" class="pt-4">
      {{ $slot }}
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("input.image").change(function() {
        var file = this.files[0];
        var url = URL.createObjectURL(file);
        $(this).closest(".row").find(".preview_img").attr("src", url);
      });
    });

    //jquery
    $(document).ready(function() {
      //filter
      $('#selectFilter').on('click', function() {
        var selectedOption = $(this).val();
        $.ajax({
          url: "{{ route('extracurriculars.sort') }}",
          type: "GET",
          data: {
            sort_by: selectedOption
          },
          dataType: "json",
          success: function(response) {
            var extras = response.extracurriculars;
            var html = "";
            if (extras.length > 0) {
              for (let i = 0; i < extras.length; i++) {
                html += `
              <tr id="list" class="ajax">
              
        <td>
          ` + extras[i]['id'] + ` <br>
        </td>
        <td><img style=" width: 50%;
height: auto;" src="{{URL::asset('img')}}/` + extras[i]['photo'] + `" class="img-fluid box" alt=""></td>
        <td> <a href="">` + extras[i]['name'] + `</a></td>
        <td>
        ` + extras[i]['description'] + `
        </td>
        <td> <input type="date" value="` + extras[i]['start_at'] + `"></td>
        <td>
          <button type="button" class="btn edit btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal` + extras[i]['id'] + `">
            Edit
          </button>
        </td> 
        <td>
          <form action="" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không ?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
          </form>
        </td>
        <td><input class="form-check-input" name="ids[]" type="checkbox" value="` + extras[i]['id'] + `" id="flexCheckDefault"></td>
      </tr>
              `;
              }
            } else {

            }
            $("#tbody").html(html);
          }
        })
      })
      //deleteAll       
      $('#select_all_ids').click(function() {
        $('.checkbox_ids').prop('checked', $(this).prop('checked'));
      });
      $('#deleteAllSelectedRecord').click(function(e) {
        e.preventDefault();
        var selectedIds = $('input:checkbox[name=ids]:checked');

        // Kiểm tra xem đã chọn ít nhất một ô checkbox hay chưa
        if (selectedIds.length === 0) {
          // Hiển thị thông báo khi không có ô nào được chọn
          Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Vui lòng chọn ít nhất một ô !',
            showConfirmButton: false,
            timer: 1500
          })
          return;
        }

        // Hiển thị hộp thoại xác nhận trước khi xóa
        Swal.fire({
          title: 'Bạn có chắc muốn xóa?',
          text: 'Hành động này không thể hoàn tác!',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Xóa',
          cancelButtonText: 'Hủy'
        }).then((result) => {
          if (result.isConfirmed) {
            // Nếu người dùng đồng ý xóa
            var all_ids = [];
            $('input:checkbox[name=ids]:checked').each(function() {
              all_ids.push($(this).val());
            });

            $.ajax({
              url: "{{ route('extracurriculars.delete') }}",
              type: "DELETE",
              data: {
                ids: all_ids,
                _token: '{{ csrf_token() }}'
              },
              success: function(response) {
                $.each(all_ids, function(key, val) {
                  $('#list' + val).remove();
                });

                // Hiển thị thông báo xóa thành công
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Xóa thành công',
                  showConfirmButton: false,
                  timer: 1500
                })
              }
            });
          }
        });
      });


      // Xử lí search
      $("#searchBtn").click(function() {
        performSearch();
      });
      // Xử lí tìm kiếm khi nhập trong input
      $("#keyword").on('keyup', function(event) {
        // 13 là mã ASCII của phím "Enter"
        if (event.keyCode === 13) {
          event.preventDefault();
          performSearch();
        }
      });

      function performSearch() {
        var value = $("#keyword").val();
        $.ajax({
          url: "{{ route('extracurriculars.search') }}",
          type: "GET",
          data: {
            'keyword': value
          },
          success: function(data) {
            var extras = data.extracurriculars;
            var html = "";
            if (extras.length > 0) {
              // Tạo HTML cho kết quả tìm kiếm
              for (let i = 0; i < extras.length; i++) {
                html += `<tr id="list" class="ajax">
             
             <td>
               ` + extras[i]['id'] + ` <br>
             </td>
             <td><img style=" width: 50%;
     height: auto;" src="{{URL::asset('img')}}/` + extras[i]['photo'] + `" class="img-fluid box" alt=""></td>
             <td> <a href="">` + extras[i]['name'] + `</a></td>
             <td>
             ` + extras[i]['description'] + `
             </td>
             <td> <input type="date" value="` + extras[i]['start_at'] + `"></td>
             <td>
               <button type="button" class="btn edit btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal` + extras[i]['id'] + `">
                 Edit
               </button>
             </td> 
             <td>
               <form action="" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không ?')">
                 @csrf
                 @method('DELETE')
                 <button class="btn btn-danger">Delete</button>
               </form>
             </td>
             <td><input class="form-check-input" name="ids[]" type="checkbox" value="` + extras[i]['id'] + `" id="flexCheckDefault"></td>
           </tr>`;
              }
            } else {
              // Hiển thị thông báo không tìm thấy kết quả
              html = "<tr><td colspan='8'>Không tìm thấy kết quả.</td></tr>";
            }
            $("#tbody").html(html);
          }
        });
      }


      //Gợi ý search
      $("#keyword").on('keyup', function() {
        var value = $(this).val();
        if (value !== '') {
          $.ajax({
            url: "{{ route('extracurriculars.search') }}",
            type: "GET",
            data: {
              'keyword': value
            },
            success: function(data) {
              var extras = data.extracurriculars;
              var html = "";
              if (extras.length > 0) {
                for (let i = 0; i < extras.length; i++) {
                  html += '<a class="dropdown-item" href="#">' + extras[i]['name'] + '</a>';
                }
              } else {
                html = '<span class="dropdown-item">Không có kết quả gợi ý</span>';
              }
              $("#searchSuggestions").html(html);
              $("#searchSuggestions").show();
            }
          })
        } else {
          $("#searchSuggestions").html('');
          $("#searchSuggestions").hide();
        }
      })
      $(document).on('click', '#searchSuggestions a', function(event) {
        event.preventDefault();
        var selectedSuggestion = $(this).text();
        $("#keyword").val(selectedSuggestion);
        $("#searchSuggestions").html('');
        $("#searchSuggestions").hide();
      });
    });
  </script>
</body>

</html>