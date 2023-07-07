<x-layout>
<div class="content">
<div class="container">
    <ul class="filter">
        <li>    <div class="dropdown">
  <button class="dropbtn"><i class="ti-filter"></i>Filter</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div></li>

        <li><button class="dropbtn add"><i class="ti-plus"></i>Add</button> </li>
    </ul>
<table class="table">
            <thead id="list-title">
                <td>Id</td>
                <td style="width: 200px;">Photo</td>
                <td>Name</td>
                <td>Description</td>
                <td>Edit Extra</td>
                <td>Delete Extra</td>
            </thead>
            @foreach($extracurriculars as $extracurricular)
            <tr id="list">
                <td>{{$extracurricular->id}}</td>
                <td style="max-width: 100%;
  height: auto;"><img style=" width: 100%;
  height: auto;" src="{{URL::asset('img')}}/{{$extracurricular->photo}}" class="img-fluid box" alt=""></td>
                <td> <a href="">{{$extracurricular->name}}</a></td>
                <td>
                    
                </td>
                <td>
                    <a href="" class="btn btn-info">Edit</a>             
                </td>
                <td>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
</div>
</div>
</x-layout>