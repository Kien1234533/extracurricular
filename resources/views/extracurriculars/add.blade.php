
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Extra</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form id="form-add" data-url="{{route('extracurriculars.store')}}" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Start</label>
                    <input type="date" class="form-control" id="start_at" name="start_at">
                </div>
                <div class="row mb-3">
                    <label for="" class="form-label">Upload Image</label>
                    <div class="col-2">
                        <img src="{{URL::asset('img')}}/default_user.png" alt="" class="preview_img">
                    </div>
                    <div class="col-10">
                        <div class="file-upload text-secondary">
                            <input type="file" name="photo" id="photo" class="image" accept="image/*">
                            <span  class="">Choose file...</span>
                            <span style="font-size: 10px;">Kéo thả ảnh vào đây</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 end-box">
                    <button type="submit" class="btn btn-primary me-1" id="inputBtn">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </div>
            </form>
        </div>
    </div>
