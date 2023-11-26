<!DOCTYPE html>
<footer>
    <div class="container">
        <div class="row">
            <div class="align-items-center col-6">Liên hệ LET ME COOK: 1900.1616.2727<i class="fa-brands fa-facebook-f ps-3" style="color: #ffffff;"></i><i class="fa-brands fa-youtube ps-3" style="color: #ffffff;"></i></div>
            <div class="nav-group col-6 ">
                <ul class="nav d-flex justify-content-end" >
                    <li class="nav-item"><a class="nav-link " href="view.php">RECIPES</a></li>
                    <li class="nav-item"><a class="nav-link " href="about.php">ABOUT US</a></li>
                    <li class="nav-item"><a class="nav-link " href="store.php">YOUR RECIPES</a></li>
                </ul>
            </div>
        </div>
        <hr></hr>
        <div class="row">
            <div class=" col-6">
                <p>LET ME COOK</p>
                <p>Đ. 3 Tháng 2, Xuân Khánh, Ninh Kiều, Cần Thơ</p>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <img src="img/logo_alt.jpg" id="logof" style="width: 100px; height:100px;"> 
            </div>
            
        </div>
    </div>
</footer>
<style>
    footer{
        background: white;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        /* position: fixed; */
        bottom: 5px;
        padding-top:30px;
        padding-bottom: 50px;
        margin-top: 200px;
        width: 100%;
        height: 1
        0%;
    }
    #logof{
    margin-right:20px;
    width: 55px;
   
  }
</style>
        <script>
            $(document).ready(function(){
                $("#search-btn").on('click',function(){
                    $("#find").trigger("submit");
                })
            })
        </script>
            
</footer>