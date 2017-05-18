<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
          <form action="<?php echo base_url(); ?>caidat/index" method="post" enctype="multipart/form-data">
                <h2 style="margin-left:30px;"><?="Cập nhật thông tin nhà trọ ".$nhatro->TenNT ?></h2>

                <div class="span6">
                    <div class="content clearfix">
                        <div class="field">
                            <label for="diachi"><strong>Địa chỉ</strong></label>
                            <input type="text" id="diachi" name="diachi" required value="<?=$nhatro->DiaChi ?>" maxlength="100" placeholder="Địa chỉ..."/>
                        </div> <!-- /field -->
                        
                        
                        <div class="row">
                                <div class="span3">
                                     <div class="form-group">
                                        <label for="tinh"><strong>Tỉnh/Thành phố</strong></label>
                                        <select class="form-control" id="tinhthanh" name="tinhthanh" required="">
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                        <?
                                            foreach ($tinh as $t) {
                                                ?>
                                                <option value="<?=$t->provinceid?>" <? if($t->provinceid==$nhatro->TinhThanh) { echo "selected"; } ?>><?=$t->name?></option>
                                                <?
                                            }
                                        ?>
                                        </select>
                                    </div> <!-- /field -->
                                </div>
                                <div class="span2">
                                    <div class="form-group">
                                        <label for="quan"><strong>Quận/Huyện</strong></label>
                                        <select class="form-control" id="quanhuyen" name="quanhuyen" required="">
                                            <option value="">Chọn Quận/Huyện</option>
                                        </select>
                                    </div> <!-- /field -->
                                </div>
                            </div>
                        <div class="field">
                            <label for="quan" style="margin-bottom: 10px;margin-top: 20px;"><strong>Chọn vị trí nhà trọ trên bản đồ</strong></label>
                            <div id="map" style="width: 100%; height: 300px"></div>    
                        </div> <!-- /field -->
                        
                        
                    </div>
                </div>
                <div class="span6">
                    <div class="content clearfix">
                            <div class="field">
                                <label for="sdt"><strong>Số điện thoại</strong></label>
                                <input type="text" id="sdt" name="sdt" required value="<?=$nhatro->SDT ?>" maxlength="15" placeholder=""/>
                            </div> <!-- /field -->
                            <div class="row">
                                <div class="span3">
                                     <div class="field">
                                        <label for="soluong"><strong>Số lượng phòng</strong></label>
                                        <input type="text" id="soluong" name="soluong" required value="<?=$nhatro->SoLuongPhong ?>" maxlength="5" placeholder=""/>
                                    </div> <!-- /field -->
                                </div>
                                <div class="span2">
                                    <div class="field">
                                        <label for="dientich"><strong>Diện tích phòng</strong></label>
                                        <input type="text" id="dientich" name="dientich" required value="<?=$nhatro->DienTich ?>" maxlength="5" placeholder="" style="width: 80%;" /> m2
                                    </div> <!-- /field -->
                                </div>
                            </div>
                        <div class="field">
                            <label for="hinhanh"><strong>Hình ảnh</strong></label>
                            <!-- HTML code for form element and preview image element -->
                            <div id="wrapper">
                                  <input type="file" id="userFiles" name="userFiles[]" onchange="preview_image();" multiple/>
                                  <!-- <input type="submit" name='submit_image' value="Upload Image"/> -->
                                 <div id="image_preview">
                                    <?  if(!empty($images))
                                            foreach ($images as $ima) {
                                                ?>
                                                <img src='<?php echo base_url($ima); ?>' class='subimage'>
                                                <?
                                            }
                                        ?>
                                 </div>
                                </div>
                        </div> <!-- /field -->
                        <div class="field" style="margin-top: 20px;">
                            <label for="mota"><strong>Mô tả chi tiết nhà trọ</strong></label>
                            <textarea type="text" id="mota" name="mota" rows="10" maxlength="500" style="width: 100%;" /><?=$nhatro->MoTa ?></textarea>
                        </div> 
                    </div>
                   <div class="login-actions">
                    
                        <button id="luu" class="button btn btn-success btn-large">Lưu</button>
                    
                    </div> <!-- .actions -->
                </div>
                 
                    
            </form>
      </div>
    </div>
  </div>
</div>  
<style type="text/css">
    input{
        width: 100%;
    }
    .wrap{width: 100%;margin-bottom: 20px;}
    .gallery{ width:100%; float:left; margin-top:30px;}
    .gallery ul{ margin:0; padding:0; list-style-type:none;}
    .gallery ul li{ padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}
    .gallery img{ width:250px;}
    .none{ display:none;}
    .upload_div{ margin-bottom:50px;}
    .uploading{ margin-top:15px;}
    .form_box{width:500px; margin:0 auto; margin-top:10px; margin-bottom: 40px; text-align: left;}
    .fileinput{margin-left: 10px;}
    .image_preview{width: 100%;background-position: center center;background-repeat: no-repeat;overflow: hidden;}
    .subimage{width: 100px; height: 100px; padding-left: 10px;}
</style>
<script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      var currentLocation;
      var marker;
      var myLatLng = {lat: <?=$nhatro->ViDo ?>, lng: <?=$nhatro->KinhDo ?>};
      //console.log(<?=$nhatro->ViDo ?>);
        //var myLatLng = {lat: -34.397, lng:150.644};
      function initAutocomplete() {
       
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 15,
          mapTypeId: 'roadmap'
        });
        marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    //draggable: true //make it draggable
                });
        // Create the search box and link it to the UI element.
        var input = document.getElementById('diachi');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          // markers.forEach(function(marker) {
          //   marker.setMap(null);
          // });
          // markers = [];

          
          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            // markers.push(new google.maps.Marker({
            //   map: map,
            //   icon: icon,
            //   title: place.name,
            //   position: place.geometry.location
            // }));
            

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);

        });
        
        //Listen for any clicks on the map.
        google.maps.event.addListener(map, 'click', function(event) {                
            //Get the location that the user clicked.
            var clickedLocation = event.latLng;
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            //console.log( latitude + ', ' + longitude );
            //If the marker hasn't been added.
            if(marker == undefined){
                //Create the marker.
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    //draggable: true //make it draggable
                });
               
            } else{
                //Marker has already been added, so just change its location.
                marker.setPosition(clickedLocation);
            }
            map.setCenter(clickedLocation);
            //Get the marker's location.
            markerLocation();
        });

        function markerLocation(){
            //Get location.
            currentLocation = marker.getPosition();
           
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('caidat/update_toado'); ?>",
                data: {vd: currentLocation.lat(), kd: currentLocation.lng()},
                //dataType: 'json',
                success:function(data){
                    //$('#quanhuyen').html(data);
                    //$('#city').html('<option value="0">Select City</option>');
                    //$('#state').append('<option value="' + id + '">' + name + '</option>');
                    //console.log('Ok: dt');
                    //alert('ok');
                }
                
            });
        };
      }

    </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCWwSV-TU7baMFNVrQolnEmgGbHhXmq-w&libraries=places&callback=initAutocomplete"
         async defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.form.js"></script>
    <script type="text/javascript">
         $(document).ready(function(){
             $('#tinhthanh').on('click', function(){
                 var tinh_id = $(this).val();
                 //console.log(tinh_id);
                 //$("#state > option").remove();
                 $.ajax({
                     type: "POST",
                     url: "<?php echo site_url('caidat/list_quan'); ?>",
                     data: {id: tinh_id},
                     dataType: 'json',
                     success:function(data){
                        $('#quanhuyen').html(data);
                         //$('#city').html('<option value="0">Select City</option>');
                         //$('#state').append('<option value="' + id + '">' + name + '</option>');
                     },
                     error: function(xhr, status, error) {
                      var err = eval("(" + xhr.responseText + ")");
                      alert(err.Message);
                    }
                 });
             });
         });
     </script>
    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $('#luu').on('click', function(){
                var curLoc = currentLocation;
                //console.log();
                //alert(curLoc.lat() + ', ' + curLoc.lng());
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('caidat'); ?>",
                    data: {vd: curLoc.lat(), kd: curLoc.lng()},
                    //dataType: 'json',
                    success:function(data){
                        //$('#quanhuyen').html(data);
                        //$('#city').html('<option value="0">Select City</option>');
                        //$('#state').append('<option value="' + id + '">' + name + '</option>');
                        //console.log('Ok: dt');
                        //alert('ok');
                    }
                });
            });
        });
    </script> -->

    <!-- jQuery read image data and show preview code -->
<!--     <script type="text/javascript">
    $(document).ready(function(){
        //Image file input change event
        $("#image").change(function(){
            readImageData(this);//Call image read and render function
        });
    });

    function readImageData(imgData){
        if (imgData.files && imgData.files[0]) {
            var readerObj = new FileReader();
            
            readerObj.onload = function (element) {
                $('#preview_img').attr('src', element.target.result);
            }
            
            readerObj.readAsDataURL(imgData.files[0]);
        }
    }
    </script>
 -->

<script>
$(document).ready(function() 
{ 
 $('form').ajaxForm(function() 
 {
  alert("Uploaded SuccessFully");
 }); 
});

function preview_image() 
{
 var total_file=document.getElementById("userFiles").files.length;
 $('#image_preview').empty();
 for(var i=0;i<total_file;i++)
 {
    $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' class='subimage'>");
 }
}
</script>