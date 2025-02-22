<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"  crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
$(document).ready(function(){
    //insert data
    $(document).on('click','.add_rooms',function(e){
        e.preventDefault();

        let roomData = new FormData();

        roomData.append('room_title',$('#room_title').val());
        roomData.append('room_image',$('#room_image')[0].files[0]);
        roomData.append('room_description',$('#room_description').val());
        roomData.append('room_price',$('#room_price').val());
        roomData.append('wifi',$('input[name="wifi"]:checked').val());
        roomData.append('room_select',$('select[name="room_select"]').val());
        roomData.append('_token',$('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url:"{{route('add.room')}}",
            method:"POST",
            data:roomData,
            contentType:false,
            processData:false,
            success:function(res){
                if(res.status == 'success'){
                    $('.addroomform')[0].reset();
                    $('#addroomModal').modal('hide');
                    $('.table').load(location.herf+' .table');
                }
            },
            error:function(err){
                let error = err.responseJSON;
                $('.error_show').html('');
                $.each(error.errors,function(index,value){
                    $('.error_show').append('<span class="text-danger">'+ value +'</span>'+'<br>');
                });
            }
        });
    });

    //show data in update form
    $(document).on('click','.edit_rom',function(e){
        e.preventDefault();

        let house_id = $(this).data('room_id');
        let house_title = $(this).data('room_name');
        let house_image = $(this).data('room_picture');
        let house_description = $(this).data('room_description');
        let house_price = $(this).data('room_prices');
        let house_wifi = $(this).data('room_wifi');
        let house_types = $(this).data('rooms_types');

        $('#edit_room_id').val(house_id);
        $('#edit_room_title').val(house_title);
        $('#edit_room_image').attr('src',house_image);
        $('#edit_room_description').val(house_description);
        $('#edit_room_price').val(house_price);

        $('input[name="edit_wifi"][value="' + house_wifi + '"]').prop('checked', true);

        $('#slt_edit_room option').each(function(){
            if($(this).val() == house_types){
                $(this).prop('selected',true);
            }else{
                $(this).prop('selected',false);
            }
        })
        
    });

    //update data
    $(document).on('click','.updates_rooms',function(e){
        e.preventDefault();

        let roomUpdateData = new FormData();
        roomUpdateData.append('edit_room_id',$('#edit_room_id').val());
        roomUpdateData.append('edit_room_title',$('#edit_room_title').val());

        // roomUpdateData.append('new_room_image',$('#new_room_image')[0].files[0]);
        // Append new_room_image ONLY if a file is selected
        let newRoomImage = $('#new_room_image')[0].files[0];
        if (newRoomImage) {
            roomUpdateData.append('new_room_image', newRoomImage);
        }

        roomUpdateData.append('edit_room_description',$('#edit_room_description').val());
        roomUpdateData.append('edit_room_price',$('#edit_room_price').val());
        roomUpdateData.append('edit_wifi',$('input[name="edit_wifi"]:checked').val());
        roomUpdateData.append('slt_edit_room',$('select[name="slt_edit_room"]').val());
        roomUpdateData.append('_token',$('meta[name="csrf-token"]').attr('content'));


        $.ajax({
            url:"{{route('update.room')}}",
            method:"POST",
            data:roomUpdateData,
            contentType:false,
            processData:false,
            success:function(res){
                if(res.status == 'success'){
                    $('#editroomModal').modal('hide');
                    $('.table').load(location.href+' .table');
                }
            },
            error:function(err){
                let error = err.responseJSON;
                $('.editerror_show').html('');
                $.each(error.errors,function(index,value){
                    $('.editerror_show').append('<span class="text-danger">'+ value +'</span>'+'<br>');
                });
            }
        });


    });
});
</script>