    <!-- <h3>My Google Maps Demo</h3> -->
    <div class="main">
      <div class="main-inner">
        <div class="container-fluid" >
          <div class="row">
            <div class="span4">
              <div>
              <br>
                <h2 style="text-align: center;"><i class="icon-search"></i> Tìm kiếm nhà trọ</h2>
                <br>
              </div>
              <h4> Chọn địa điểm</h4>
              <hr style="margin:0 0 10px 0;width: 100%; color: #b3b3b3; height: 1px; background-color:#b3b3b3;">
              <div class="row">
                <div class="span2">
                     <div class="form-group">
                        <label for="tinh"><strong>Tỉnh/Thành phố</strong></label>
                        <select class="form-control" id="tinhthanh" name="tinhthanh">
                        <option value="">Chọn Tỉnh/Thành phố</option>
                        <?
                            foreach ($tinh as $t) {
                                ?>
                                <option value="<?=$t->provinceid?>" ><?=$t->name?></option>
                                <?
                            }
                        ?>
                        </select>
                    </div> <!-- /field -->
                </div>
                <div class="span2">
                    <div class="form-group">
                        <label for="quan"><strong>Quận/Huyện</strong></label>
                        <select class="form-control" id="quanhuyen" name="quanhuyen">
                            <option value="">Chọn Quận/Huyện</option>
                        </select>
                    </div> <!-- /field -->
                </div>
            </div>
            <h4 style="margin-top: 30px;"> Kết quả tìm kiếm</h4>
            <hr style="margin:0 0 10px 0;width: 100%; color: #b3b3b3; height: 1px; background-color:#b3b3b3;">
            <div id="contentTimkiem" class="pre-scrollable">
              
            </div>
            </div>
            <div class="span11">
              <div id="map"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      function initMap() {
        var uluru = {lat: 10.849228, lng: 106.773315};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: uluru
        });
        var geocoder= new google.maps.Geocoder();
        $('#quanhuyen').on('change', function(){
                var quan_id = $('#quanhuyen').val();
                //console.log(quan_id);
                //$("#state > option").remove();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('home/get_khuvuc'); ?>",
                    global:false,
                    data: {quanid: quan_id},
                    dataType: 'json',
                    success:function(data){
                        var address = data.Type + ' ' + data.Quan + ", " + data.Tinh;
                        console.log(address);
                        geocoder.geocode({
                            'address': address
                        }, function (results, status) {

                            if (status == google.maps.GeocoderStatus.OK) {

                                // Center map on location
                                map.setCenter(results[0].geometry.location);

                                // // Add marker on location
                                // var marker = new google.maps.Marker({
                                //     map: map,
                                //     position: results[0].geometry.location
                                // });

                            } else {

                                alert("Geocode was not successful for the following reason: " + status);
                            }
                        });
                        //$( "#contentTimkiem" ).append( '<div id="content" style="width: 300px; height:100px;">' );
                        $( "#contentTimkiem" ).empty();
                        $.ajax({
                          type: "POST",
                          url: "<?php echo site_url('home/get_nhatro_quan'); ?>",
                          global:false,
                          data: {quanid: quan_id},
                          dataType: 'json',
                          success:function(data2){
                              //$('#quanhuyen').html(data);
                              //console.log(data);
                              $.each( data2, function( key, value ) {
                                if(value.Count)
                                  var tinhtrang = "Số phòng trống: "+value.Count;
                                else
                                  var tinhtrang = "Hết phòng";
                                              if(value.HinhAnh!=null){
                                  var images = (value.HinhAnh).split(',');
                                  var path = "<?php echo base_url(); ?>" + images[0];
                                  $( "#contentTimkiem" ).append("<div id='content' onclick='detail("+value.maso+")' style='cursor: pointer;margin-top:20px; border: 1px solid #bfbfbf;background-color:#fff;'>\
                                      <img src="+ path +" style='width:100%;height:150px'>\
                                      <div id='bodyContent' style='padding:10px;'>\
                                      <h3 style='color:#22a5f8;'>Nhà trọ "+value.TenNT+"</h3>\
                                      <p>" +value.DiaChi+"</p>\
                                      <p>Số điện thoại:  <strong>" +value.SDT+"</strong></p>\
                                      <span class='label label-warning' style='font-size:13px;'>"+tinhtrang+"</span>\
                                      <span class='label label-success text-right' style='font-size:13px; text-align:right;'>Giá phòng: "+value.GiaPhong+"</span>\
                                      </div>\
                                      </div>");
                                } else{
                                  $( "#contentTimkiem" ).append("<div id='content' onclick='detail("+value.maso+")' style='cursor: pointer;margin-top:20px; border: 1px solid #bfbfbf;background-color:#fff;'>\
                                      <div id='bodyContent' style='padding:10px;'>\
                                       <h3 style='color:#22a5f8;'>Nhà trọ "+value.TenNT+"</h3>\
                                      <p>" +value.DiaChi+"</p>\
                                      <p>Số điện thoại:  <strong>" +value.SDT+"</strong></p>\
                                      <span class='label label-warning' style='font-size:13px;'>"+tinhtrang+"</span>\
                                      <span class='label label-success text-right' style='font-size:13px;text-align:right;'>Giá phòng: "+value.GiaPhong+"</span>\
                                      </div>\
                                      </div>");
                                }

                              });
                              //$('#city').html('<option value="0">Select City</option>');
                              //$('#state').append('<option value="' + id + '">' + name + '</option>');
                          }
                      });

                    }
                });
            });
        var marker;
        var infowindow = new google.maps.InfoWindow();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('home/get_nhatro'); ?>",
            data: {},
            dataType: 'json',
            success:function(data){
                //$('#quanhuyen').html(data);
                //console.log(data);
                $.each( data, function( key, value ) {
                  marker = new google.maps.Marker({
                    position: new google.maps.LatLng(value.ViDo, value.KinhDo),
                    map: map
                  });
                  console.log(value.ViDo);
                  
                  if(value.HinhAnh!=null){
                    var images = (value.HinhAnh).split(',');
                    var path = "<?php echo base_url(); ?>" + images[0];
                    var contentString =  '<div id="content" style="width: 300px; height:250px;">'+
                        '<img src='+ path +' style="width:300px;height:150px">'+
                        '<h3>Nhà trọ '+value.TenNT+'</h3>'+
                        '<div id="bodyContent" >'+
                        '<p>' +value.DiaChi+'</p>'+
                        '<span class="label label-success" style="font-size:13px;">Giá phòng: '+value.GiaPhong+' </span>'+
                        '</div>'+
                        '</div>';
                  } else{
                    var contentString =  '<div id="content" style="width: 300px; height:100px;">'+
                        '<h3>Nhà trọ '+value.TenNT+'</h3>'+
                        '<div id="bodyContent" >'+
                        '<p>' +value.DiaChi+'</p>'+
                        '<span class="label label-success" style="font-size:13px;">Giá phòng: '+value.GiaPhong+' </span>'+
                        '</div>'+
                        '</div>';
                  }
                  
                  

                  
                  google.maps.event.addListener(marker,'click', (function(marker,contentString){ 
                      return function() {
                          //infowindow.close(map, marker);
                          infowindow.setContent(contentString);
                          infowindow.open(map,marker);
                      };
                  })(marker,contentString));  
                });
                //$('#city').html('<option value="0">Select City</option>');
                //$('#state').append('<option value="' + id + '">' + name + '</option>');
            }
        });
        google.maps.event.addListener(map, 'click', function(){
            infowindow.close(map, marker);
        });
        
        //console.log(<?=sizeof($nhatro) ?>);
        
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYreqTTvSObBcRGEgqhvhfq0uBE_ON2aI&libraries=places&callback=initMap"
         async defer></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tinhthanh').on('click', function(){
                var tinh_id = $(this).val();
                //console.log(tinh_id);
                //$("#state > option").remove();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('home/list_quan'); ?>",
                    data: {id: tinh_id},
                    dataType: 'json',
                    success:function(data){
                        $('#quanhuyen').html(data);
                        //$('#city').html('<option value="0">Select City</option>');
                        //$('#state').append('<option value="' + id + '">' + name + '</option>');
                    }
                });
            });
        });
        function detail(mant)
        {
          $.ajax({
              url : "<?php echo site_url('home/get_detail/')?>/" + mant,
              type: "GET",
              dataType: "JSON",
              success: function(data)
              {
                  $( ".carousel-inner" ).empty();
                  if(data.HinhAnh!=null){
                    var images = (data.HinhAnh).split(',');
                    for(var i=0; i<images.length; i++)
                    {
                      var path = "<?php echo base_url(); ?>"+images[i];
                      if(i == 0)
                        $(".carousel-inner").append("<div class='item active'>\
                            <img src="+path+" alt='' style='width:100%; height:300px;'>\
                            <div class='carousel-caption'>Địa chỉ: "+data.DiaChi+"</div>\
                          </div>");
                      else
                        $(".carousel-inner").append("<div class='item'>\
                            <img src="+path+" alt='' style='width:100%; height:300px;'>\
                            <div class='carousel-caption'>Địa chỉ: "+data.DiaChi+"</div>\
                          </div>");
                    }
                  }
                  $( "#chitiet" ).empty();
                  $( "#mota" ).empty();
                  if(value.Count)
                    var tinhtrang = "Số phòng trống: "+value.Count;
                  else
                    var tinhtrang = "Hết phòng";
                  $( "#chitiet" ).append("<p>Số điện thoại: <strong>" +data.SDT+"</strong></p>\
                                      <p>Diện tích phòng: <strong>"+data.DienTich+" m2</strong></p>\
                                      <span class='label label-warning' style='font-size:13px;'>"+tinhtrang+"</span>\
                                      <span class='label label-success text-right' style='font-size:13px; text-align:right;'>Giá phòng: "+data.GiaPhong+"</span>");
                  $( "#mota" ).append("<p>" +data.MoTa+"</p>");
                  $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                  $('.modal-title').text('Thông tin Nhà trọ '+data.TenNT); // Set title to Bootstrap modal title
                  //console.log(data.TenNT);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error get data from ajax');
              }
          });
        }
    </script>
    <style>
       #map {
        height: 650px;
        /*width: 100%;
        float:right;*/
       }
       select {
        width: 100%;
       }

    </style>
  <!-- Modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="icon-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="icon-angle-right"></span>
                </a>
              </div>
              <div class="row">
                  <div class="span3">
                    <h4> Chi tiết</h4>
                    <hr style="margin:0 0 10px 0;width: 100%; color: #b3b3b3; height: 1px; background-color:#b3b3b3;">
                    <div id="chitiet" style="width: 100%">
                      
                    </div>
                  </div>
                  <div class="span3">
                    <h4> Mô tả</h4>
                    <hr style="margin:0 0 10px 0;width: 100%; color: #b3b3b3; height: 1px; background-color:#b3b3b3;">
                    <div id="mota" style="width: 100%">
                      
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Đặt phòng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->