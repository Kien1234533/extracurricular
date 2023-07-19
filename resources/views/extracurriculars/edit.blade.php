
    <div class="modal fade" id="exampleModal{{$extracurricular->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Extra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('extracurriculars.update', $extracurricular->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="Name" value="{{$extracurricular->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="...">{{$extracurricular->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Start</label>
                            <input type="date" class="form-control" id="start_at" name="start_at" value="{{$extracurricular->start_at}}">
                        </div>
                        <div class="row mb-3">
                            <label for="" class="form-label">Upload Image</label>
                            <div class="col-2">
                                <img src="{{URL::asset('img')}}/{{$extracurricular->photo}}" alt="" class="preview_img">
                            </div>
                            <div class="col-10">
                                <div class="file-upload clone text-secondary">
                                    <input type="file" name="photo" id="photo" class="image" accept="image/*" value="{{$extracurricular->photo}}">
                                    <span class="fs-4 fw-2">{{$extracurricular->photo}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>      
                </div>
            </div>
        </div>
    </div>
