<!DOCTYPE html>
<html lang="en">

<body>

    <?php


    $err1 = "";
    $err2 = "";
    $err3 = "";
    $err4 = "";
    $err5 = "";
    $err6 = "";



    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $status = 0;

        if ($_GET["name"] == "") {
            $err1 = "error";
            $status = 1;
        }

        if ($_GET["email"] == "") {
            $err2 = "error";
            $status = 1;
        }

        if ($_GET["password"] == "") {
            $err3 = "error";
            $status = 1;
        }

        if ($_GET["cpass"] == "") {
            $err4 = "error";
            $status = 1;
        }

        if ($_GET["contact"] == "") {
            $err5 = "error";
            $status = 1;
        }

        if ($_GET["message"] == "") {
            $err6 = "error";
            $status = 1;
        }



        if ($status == 0) {

            $pattern = "/^(?=.+[0-9]).*$/";
            if (preg_match($pattern, $_GET["name"])) {
                $err1 = "number not allowed";
                $status = 2;
            } else {
                $err1 = "";
            }



            $pattern = "/^[a-z]+\.[0-9]{2}[a-z]{3}[0-9]{4}+@vitap.ac.in$/";
            if (preg_match($pattern, $_GET["email"])) {
                $err2 = "";
            } else {
                $err2 = "not valid";
                $status = 2;
            }


            $pattern = "/^[a-z0-9]{8,}$/";
            if (preg_match($pattern, $_GET["password"])) {
                $err3 = "";
            } else {
                $err3 = "not valid";
                $status = 2;
            }


            if ($_GET["password"] == $_GET["cpass"]) {
                $err4 = "";
            } else {
                $err4 = "password not matched";
                $status = 2;
            }


            $pattern = "/^[0-9]{10}$/";
            if(preg_match($pattern,$_GET["contact"])){

                $err5 = "";

            }

            else{
                $err5 = "type correct contact number";
                $status = 2;
            }


            
            
            $pattern = "/^[a-z]{1,50}$/";
            if(preg_match($pattern,$_GET["message"])){

                $err6 = "";

            }

            else{
                $err6 = "message more than 50 characters";
                $status = 2;
            }


        }



        
        
        if($status==0){
            header("Location:p2.php?n= ".$_GET["name"]);
            
        }


    }




    ?>


    <form action="" method="GET">

        Name : <input type="text" class="i" name="name">* <?php echo $err1; ?>

        <br>

        e-mail : <input type="text" class="i" name="email">* <?php echo $err2; ?>

        <br>

        password : <input type="text" class="i" name="password">* <?php echo $err3; ?>
        <br>

        cpass : <input type="text" class="i" name="cpass">* <?php echo $err4; ?>
        <br>

        contact : <input type="text" class="i" name="contact"> <?php echo $err5; ?>
        <br>

        message : <textarea name="message" id="" cols="30" rows="10" class="i"></textarea> <?php echo $err6; ?>

        <br>


        <input type="submit" name="" id="" value="submit">


        <button id="reset">reset</button>


    </form>







    <script>
        document.getElementById("reset").addEventListener("click", function() {

            let input = document.getElementsByClassName("i")

            for (i = 0; i < input.length; i++) {

                input[i].value = "";

            }


        })
    </script>


</body>

</html>