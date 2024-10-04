$(document).ready(function(){
    console.log("test ok");
    builddsGroup();//gọi hàm trong javascript
    builddsMenuGroup();
   
     $(".addNhomVaMatHang").on('click','.click_nhom',function () {
      
        //hàm này dùng để lấy giá trị của nhóm mình click vào
        var ma=($(this).attr("data-manhom"));
        var vt=($(this).attr("data-vt"));
        var dataSend={
            manhom:ma,
            vt:vt
        };
        queryData_GET("php/api_get_mat_hang.php",dataSend,function (res) {
            console.log("ok");
            console.log(res.items);
            buildHTMLMenuSPTheoNhom(res,vt);
         });
     });
     //click vào menu xem nhóm các sản phẩm
     $(".addList").on('click','.click_nhom',function () {
        var ma=($(this).attr("data-manhom"));
        console.log("click: "+ma);
        var dataSend={
            manhom:ma,
            vt:0
        };
        queryData_GET("php/api_get_mat_hang.php",dataSend,function (res) {
            console.log(res);
            showmathang(res);
         });
     });
});

//xây dựng 1 hàm lấy dữ liệu từ server php để đổ dữ liệu ra web html
function builddsGroup() 
{
	//dữ liệu gửi lên server
     var dataSend={}
     //dữ liệu lấy từ server gửi về
     queryData_GET("php/api_get_mat_hang.php",dataSend,function (res) {
            
        console.log(res);
        //lấy dữ liệu đỗ ra trang web
        buildHTMLGROUP(res);
     });
 }
 
 function buildHTMLGROUP(res) 
 {
     var data = res.items;
     var html='';
     
     for (item in data) 
    {
        var list=data[item];
        html=html + '<a href="#showmathang" class="dropdown-item click_nhom" data_manhom= "<i class="fas fa-arrow-circle-right"></i> '+list.TenNhom+'"</a>'; 
    }
     $(".addList").html(html)
 }

function builddsMenuGroup() 
{
	//dữ liệu gửi lên server
     var dataSend={}
     //dữ liệu lấy từ server gửi về
     queryData_GET("php/api_get_nhom.php",dataSend,function (res) {
        console.log(res.items);
        //lấy dữ liệu đỗ ra trang web
        buildHTMLMenuGROUP(res);
     });
}
function buildHTMLMenuGROUP(res) {
    
    var data = res.items;
        
   
    var html='';
    var i=1;
    for (item in data) {
       var list=data[item];
        html=html + ' <div class="nav-item dropdown">'+
                           '<a href="#" class="nav-link click_nhom" data-vt="'+i+'" data-manhom="'+list.MaNhom+'" data-toggle="dropdown"><i class="fas fa-arrow-circle-right"></i> '+list.TenNhom+' <i class="fa fa-angle-down float-right mt-1"></i></a>'+
                          ' <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0 addmenusub'+i+'">'+
                          '</div>'+
                       '</div>'; 
                       i++;
    }
    $(".addNhomVaMatHang").html(html)
  
}
function buildHTMLMenuSPTheoNhom(res, vt) {
    console.log(res); // Thêm log để kiểm tra
    var data = res.items;
    var html = '';

    if (data && data.length > 0) {
        for (item in data) {
            var list=data[item];
             html=html +' <a href="" class="dropdown-item text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-circle"></i>'+list.TenMH+'</a>';
               
         }
       
         $(".admenusub"+list.vt).html(html)
}
}

//Show Mặt Hàng
function showMatHang(res) {
   
    var data = res.items;
        
   
    var html='';
    $(".addITemMH").html("");
    for (item in data) {
        var list=data[item]; 
        html=html + '<div class="col-lg-4 col-md-6 pb-1">'+
                    '<div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">'+
                        '<p class="text-right">15 Kg</p>'+
                        '<a href="" class="cat-img position-relative overflow-hidden mb-3">'+
                        '<img class="img-fluid" src="img/Rau xa lach tim.jpeg" alt="">'+
                        '</a>'+
                        '<h5 class="font-weight-semi-bold m-0">Xà Lách Tím</h5>'+
                        '</div>'+
                    '</div>';
            $(".addITemMH").append(html)
    }
  
}