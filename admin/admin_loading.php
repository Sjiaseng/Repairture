<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page</title>
</head>
<body>
    <div id="preloader">
        <img src= "http://localhost/repairture/admin/admin_image/logo.png" id="loadinglogo">
        <img src= "http://localhost/repairture/admin/admin_image/loading2.gif" id=thegif>
        <img src= "http://localhost/repairture/admin/admin_image/loading.gif" id="loadinggif">
    </div>

    <style>
        #loading{
            position:absolute;
            border:1px solid;
            background-color: white;
            width:1920px;
            height:1080px;
            top:100px;
            left: 500px;
        }

        #loadinggif{
            position: absolute;
            width: 500px;
        }

        #preloader{
            background-color: #f0f0f0;
            position:fixed;
            height: 100vh;
            width:100%;
            z-index: 100;
            display: block;
            animation: fadeIn 0.1s;
        }

        #loadinglogo{
            position: absolute;
            top:250px;
            left:500px;
        }

        #loadinggif{
            position: absolute;
            width:500px;
            top:500px;
            left:600px;
        }

        #thegif{
            position: absolute;
            top:300px;
            left: 650px;
        }

        @keyframes fadeIn {
            0% { opacity: 0.5; }
            100% { opacity: 1; }
        }
    </style>

    <script>
        function loading(){
            let loading= document.getElementById("preloader");

            window.addEventListener("load", setTimeout(function(){
                loading.style.transform="translateX(2500px)";
                loading.style.transitionDuration= "2s";
                }, 1000));

            window.addEventListener("load",setTimeout(function(){
                loading.style.display="none";
                }, 5000));
            }

            loading()
    </script>

</body>
</html>