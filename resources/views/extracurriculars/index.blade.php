<x-layout>
  <!-- sidebar -->
  <div class="content-second">
    @if($success=Session::get('success'))
    <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: '{{$success}}',
        showConfirmButton: false,
        timer: 1500
      })
    </script>
  </div>
  @endif
  <div class="container">
    <ul class="filter">
      <li>
        <select id="selectFilter" class="dropbtn">
          <option value="all">Tất cả</option>
          <option value="new">Gần đây nhất</option>
          <option value="old">Cũ nhất</option>
        </select>
      </li>
      <li><button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" class="dropbtn add"><i class="ti-plus"></i>Add</button> </li>
      <li><button id="deleteAllSelectedRecord" class="dropbtn del">Delete All Selected</button></li>
      <!-- Modal button Add -->

    </ul>
    <table class="table">
      <thead id="list-title">
       
        <td>Id</td>
        <td style="width: 150px;">Photo</td>
        <td>Name</td>
        <td>Description</td>
        <td>Start</td>
        <td>Edit Extra</td>
        <td>Delete Extra</td>
        <td><input class="form-check-input" type="checkbox" name="" id="select_all_ids"></td>
      </thead>
      <tbody id="tbody">
        @foreach($extracurriculars as $extracurricular)
        <tr id="list{{ $extracurricular->id }}" class="ajax">
          
          <td>
            {{$extracurricular->id}} <br>
           
          </td>
          
          <td><img style=" width: 50%;
  height: auto;" src="{{URL::asset('img')}}/{{$extracurricular->photo}}" class="img-fluid box" alt=""></td>
          <td> <a href="">{{$extracurricular->name}}</a></td>
          <td>
            {{$extracurricular->description}}
          </td>
          <td> <input type="date" value="{{$extracurricular->start_at}}"></td>
          <td>
            <button type="button" class="btn edit btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$extracurricular->id}}">
              Edit
            </button>
            <!-- Modal edit -->
            @include('extracurriculars.edit')
          </td>
          <td>
            <form action="{{ route('extracurriculars.destroy', $extracurricular->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa không ?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Delete</button>
            </form>
          </td>
          <td> <input class="form-check-input checkbox_ids" name="ids" type="checkbox" value="{{ $extracurricular->id}}" id="flexCheckDefault"></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div style="margin-left: 50%; transform: translateX(-50px)">
    {{$extracurriculars->links() }}
  </div>
  </div>
  @include('extracurriculars.add')
</x-layout>