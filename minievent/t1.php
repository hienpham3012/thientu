<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Mini Game Thiên Tú</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
  <script type="text/javascript" src="js/jquery.slotmachine.js"></script>
  <script type="text/javascript" src="js/webserver.js"></script>




<!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
  <![endif]-->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->


</head>
<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <img src="TTU-logo.jpg" class="logo" />
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 midd-div">
                    <div>
                        <h3 class="text-center cl-red slogan">THIENTU TELECOMMUNICATION SERVICES TRADING COMPANY</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div id="btn2" class="slotMachineButton"><p>btn2</p></div>
                    <div id="slotMachineButton1" class="slotMachineButton"><p>START</p></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row result">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <ul id="machine1" class="slotMachine">
                    <li class="slot parent"><p class="slot0">0</p></li>
                    <li class="slot  parent" ><p class="slot1">1</p></li>
                    <li class="slot  parent"><p class="slot2">2</p></li>
                    <li class="slot  parent"><p class="slot3">3</p></li>
                    <li class="slot  parent"><p class="slot4">4</p></li>
                    <li class="slot  parent"><p class="slot5">5</p></li>
                    <li class="slot  parent"><p class="slot6">6</p></li>
                    <li class="slot  parent"><p class="slot7">7</p></li>
                    <li class="slot  parent"><p class="slot8">8</p></li>
                    <li class="slot  parent"><p class="slot9">9</p></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <ul id="machine2" class="slotMachine">
                    <li class="slot parent"><p class="slot0">0</p></li>
                    <li class="slot parent" ><p class="slot1">1</p></li>
                    <li class="slot parent"><p class="slot2">2</p></li>
                    <li class="slot parent"><p class="slot3">3</p></li>
                    <li class="slot parent"><p class="slot4">4</p></li>
                    <li class="slot parent"><p class="slot5">5</p></li>
                    <li class="slot parent"><p class="slot6">6</p></li>
                    <li class="slot parent"><p class="slot7">7</p></li>
                    <li class="slot parent"><p class="slot8">8</p></li>
                    <li class="slot parent"><p class="slot9">9</p></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <ul id="machine3" class="slotMachine">
                    <li class="slot parent"><p class="slot0">0</p></li>
                    <li class="slot parent" ><p class="slot1">1</p></li>
                    <li class="slot parent"><p class="slot2">2</p></li>
                    <li class="slot parent"><p class="slot3">3</p></li>
                    <li class="slot parent"><p class="slot4">4</p></li>
                    <li class="slot parent"><p class="slot5">5</p></li>
                    <li class="slot parent"><p class="slot6">6</p></li>
                    <li class="slot parent"><p class="slot7">7</p></li>
                    <li class="slot parent"><p class="slot8">8</p></li>
                    <li class="slot parent"><p class="slot9">9</p></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 midd-div">
                
                <div class="col-md-4 col-sm-4 col-xs-12 "><h2 class="title">Lucky Number: </h2></div>
                <div class="col-md-8 col-sm-8 col-xs-12 show-result">
                    <h2><span id="machineResult"></span></h2>

                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 copyright">
                <h6>COPYRIGHT @ THIEN TU COMPANY</h6>
            </div>
        </div>
    </div>

</footer>
 

<script>
        $(document).ready(function(){

            var machine1 = $("#machine1").slotMachine({
                active  : 0,
                delay   : 1000
            });
            
            var machine2 = $("#machine2").slotMachine({
                active  : 1,
                delay   : 1000
            });
            
            var machine3 = $("#machine3").slotMachine({
                active  : 2,
                delay   : 1000
            });
            var str = "  "; 
            
            function onComplete(active){
                switch(this.element[0].id){
                    case 'machine1':                        
                        $("#machine1Result").text("First Number: "+this.active);    
                        str = str + this.active ; 
                        $("#machineResult").text(str);
                        break;
                    case 'machine2':
                        $("#machine2Result").text("Second Number: "+this.active);
                        str = str + this.active ; 
                        $("#machineResult").text(str);
                        break;
                    case 'machine3':
                        $("#machine3Result").text("Third Number: "+this.active);
                        str = str + this.active + "/ "; 
                        $("#machineResult").text(str);
                        break;

                    $("#machineResult").text(str);

                }
            }
            
                $("#machineResult").text(" ");
                machine1.shuffle(5, onComplete);
                
                setTimeout(function(){
                    machine2.shuffle(5, onComplete);
                }, 500);
                
                setTimeout(function(){
                    machine3.shuffle(5, onComplete);
                }, 1000);
                
            
        });
    </script>
</body>
</html>