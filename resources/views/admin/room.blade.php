@extends('admin.admin_template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center text-primary mb-3">All Rooms</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addroomModal">
                    Add Room
                  </button>
                <div class="table-responsive">
                    <table class="table table-sm align-middle table-bordered border-primary text-center table-striped text-dark">
                      <thead>
                        <tr>
                            <th scope="col">Title </th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Wifi</th>
                            <th scope="col">Room Type</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($view_rooms as $view_room)
                            <tr>
                                <td style="vertical-align: middle;">{{$view_room->room_title}}</td>
                                <td><img src="{{asset($view_room->image)}}" alt="image" style="height: 150px;width:200px"></td>
                                <td style="vertical-align: middle;">{{$view_room->price}}</td>
                                <td style="vertical-align: middle;">{{$view_room->wifi}}</td>
                                <td style="vertical-align: middle;">{{$view_room->room_type}}</td>
                                <td style="vertical-align: middle;">
                                    <a href="" class="btn btn-warning btn-sm edit_rom"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editroomModal"
                                        data-room_id="{{$view_room->id}}"
                                        data-room_name="{{$view_room->room_title}}"
                                        data-room_picture="{{asset($view_room->image)}}"
                                        data-room_description="{{$view_room->description}}"
                                        data-room_prices="{{$view_room->price}}"
                                        data-room_wifi="{{$view_room->wifi}}"
                                        data-rooms_types="{{$view_room->room_type}}"
                                    >
                                        Edit
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="" class="btn btn-success btn-sm"> View</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
        </div>

        {{-- data insert modal  --}}
        <div class="row">
            <div class="col-12">
                <div class="modal fade" id="addroomModal" tabindex="-1" aria-labelledby="addroomModalLabel" aria-hidden="true">
                    <form action="" method="post" class="addroomform">
                        @csrf
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addroomModalLabel">Add Room</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="error_show my-4">

                                    </div>
                                    <input type="text" name="room_title" class="form-control mb-3" id="room_title" placeholder="Enter The Room Name">
                                    <input type="file" name="room_image" class="form-control mb-3" id="room_image">
                                    <textarea name="room_description" id="room_description"  class="form-control mb-2" cols="5" rows="7" placeholder="Write Something About The Room"></textarea>
                                    <input type="number" name="room_price" class="form-control mb-3" id="room_price" placeholder="Enter The Room Price">
                                    <label>WiFi Available?</label>
                                        <div class="d-flex mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="wifi" value="yes" checked>
                                                <label class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check ms-3">
                                                <input class="form-check-input" type="radio" name="wifi" value="no">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                    <label>Room Type</label>
                                    <select class="form-select" aria-label="select" name="room_select" id="slt_room">
                                        <option selected disabled>Select a Room Type</option>
                                        <option value="regular">Regular</option>
                                        <option value="premium">Premium</option>
                                        <option value="delux">Delux</option>
                                        <option value="super delux">Super Delux</option>
                                    </select>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary add_rooms">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- data update modal  --}}
        <div class="row">
            <div class="col-12">
                <div class="modal fade" id="editroomModal" tabindex="-1" aria-labelledby="editroomModalLabel" aria-hidden="true">
                    <form action="" method="post" class="editroomform">
                        @csrf
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editroomModalLabel">Edit Room</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="editerror_show my-4">

                                    </div>
                                    <input type="hidden" id="edit_room_id" name="edit_room_id">
                                    <input type="text" name="edit_room_title" class="form-control mb-3" id="edit_room_title">
                                    <label for="current image">Current Image</label><br>
                                    <img src="" alt="" id="edit_room_image" class="mb-3" style="width: 300px;height:250px"><br>
                                    <label for="update_image">Update Image</label><br>
                                    <input type="file" name="new_room_image" class="form-control mb-3" id="new_room_image">
                                    <textarea name="edit_room_description" id="edit_room_description"  class="form-control mb-2" cols="5" rows="7" placeholder="Write Something About The Room"></textarea>
                                    <label for="room price">Room Price</label><br>
                                    <input type="number" name="edit_room_price" class="form-control mb-3" id="edit_room_price">
                                    <label>WiFi Available?</label>
                                        <div class="d-flex mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input edit_wifi" type="radio" name="edit_wifi" value="yes">
                                                <label class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check ms-3">
                                                <input class="form-check-input edit_wifi" type="radio" name="edit_wifi" value="no">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                    <label>Room Type</label>
                                    <select class="form-select" aria-label="select" name="slt_edit_room" id="slt_edit_room">
                                        <option selected disabled>Select a Room Type</option>
                                        <option value="regular">Regular</option>
                                        <option value="premium">Premium</option>
                                        <option value="delux">Delux</option>
                                        <option value="super delux">Super Delux</option>
                                    </select>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary updates_rooms">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.room_script')