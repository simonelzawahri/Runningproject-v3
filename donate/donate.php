<?php
    // create account verify username is unique
    if (isset($_POST["usernameC"])) {
        $usernameC = $_POST["usernameC"];
        $passwordC = $_POST["passwordC"];
        $taken = false;
        // read user.txt line by line, check if taken
        $file = fopen("user.txt", "r");
        while (($line = fgets($file)) !== false) {
            if (strpos($line, $usernameC) !== false) {
                $taken = true;
                break;
            }
        }
        fclose($file);
        if ($taken) {
            // if username is found in user.txt, display error message
            echo '                        
            <script> 
                window.onload = function(){
                    const fail = document.querySelector("#create-form #fail");
                    fail.style.display = "block";
                }
            </script>
            ';
        } else {
            // if username is not found in user.txt, display account created
            echo '                        
            <script>
                window.onload = function(){
                    const success = document.querySelector("#create-form #success");
                    success.style.display = "block";
                }
            </script>
            ';
            // write username and password to user.txt
            if(isset($_POST["usernameC"])){
                $file = fopen("user.txt", "a");
                fwrite($file, $usernameC.":".$passwordC."\n");
                fclose($file);
            }
        }
    }

    // authenticate user 
    if (isset($_POST["usernameL"]) && isset($_POST["passwordL"])) {
        $usernameL = $_POST["usernameL"];
        $passwordL = $_POST["passwordL"];
        $match = false;
        // read file line by line, check for match
        $file = fopen("user.txt", "r");
        while (($line = fgets($file)) !== false) {
            if (strpos($line, $usernameL.":".$passwordL) !== false) {
                $match = true;
                break;
            }
        }
        fclose($file);
        if ($match) {
            session_start();
            // echo new innerHTML -- donate form
            echo '
                <script> 
                    window.onload = function(){
                        const main = document.querySelector(".main");
                        const pain = document.querySelector("#pain");
                        main.innerHTML = pain.innerHTML;
                        var logoutbtn = document.querySelector("#logout");
                        logoutbtn.style.display = "block";
                        logoutbtn.style.width = "100px";
                    }
                </script>
            ';
        } else {
            // if user not found in user.txt -- output fail message
            echo '                        
            <script> 
                window.onload = function(){
                    const loginfail = document.querySelector("#login-form #loginfail");
                    loginfail.style.display = "block";
                }
            </script>
            ';
        }
    }


    // get pet info and write to petinfo.txt
    if(isset($_POST["usernameL"])){
        // count entries in petinfo.txt
        $count = 1;
        $file = fopen("petinfo.txt", "r");
        while (($line = fgets($file)) !== false) {
            $count++;
        }
        fclose($file);
        $user = $_POST["usernameL"];
        $file = fopen("petinfo.txt", "a");
        fwrite($file, $count.":".$user.":");
        fclose($file);
    }
    if(isset($_POST["catordog"])){
        $catordog = $_POST["catordog"];
        $file = fopen("petinfo.txt", "a");
        fwrite($file, $catordog.":");
        fclose($file);
    }
    if(isset($_POST["breed"])){
        $breed = $_POST["breed"];
        $file = fopen("petinfo.txt", "a");
        fwrite($file, $breed.":");
        fclose($file);
    }
    if(isset($_POST["age"])){
        $age = $_POST["age"];
        $file = fopen("petinfo.txt", "a");
        fwrite($file, $age.":");
        fclose($file);
    }
    if(isset($_POST["gender"])){
        $gender = $_POST["gender"];
        $file = fopen("petinfo.txt", "a");
        fwrite($file, $gender.":");
        fclose($file);
    }
    if(isset($_POST["friendly"])){
        $friendly = $_POST["friendly"];
        $file = fopen("petinfo.txt", "a");
        fwrite($file, $friendly."\n");
        fclose($file);
    }
?>



<?php
    include $_SERVER["DOCUMENT_ROOT"]."/home/header.php";
?>



<div class="main2">

</div>

<div class="main">
    <section>
        If you would like to donate a furry friend, please create an account or log in.
    </section>

    <form method="POST" id="login-form">
        <section>Log in</section>
        <label for="usernameL">Username</label>
        <input type="text" name="usernameL" id="usernameL">
        <label for="passwordL">Password</label>
        <input type="password" name="passwordL" id="passwordL">
        <br>
        <button type="submit" id="loginbtn">Log in</button>
        <p id="loginfail" style="color: red; font-size: 13px; display: none;">User not found.<br>Verify credentials or create an account</p>
        <br>
    </form>

    <form method="POST" id="create-form">
        <section>Create account</section>
        <label for="usernameC">Username</label>
        <input type="text" name="usernameC" id="usernameC">
        <p id="usernameError" style="color: red; font-size: 13px; display: none;">username must be 5-12 characters <br> with letters or numbers</p>
        <label for="passwordC">Password</label>
        <input type="password" name="passwordC" id="passwordC">
        <p id="passwordError" style="color: red; font-size: 13px; display: none;">password must be >4 characters <br> with at least 1 letter and 1 number</p>
        <br>
        <button type="submit">Create account</button>
        <p id="success" style="color: green; font-size: 13px; display: none;">Account created!<br>You may now log in.</p>
        <p id="fail" style="color: red; font-size: 13px; display: none;">Username already taken!<br>Please try again.</p>
        <br>
    </form>
</div>



<!-- create account form validation -->
<script>
    // username validation
        const cusername = document.querySelector("#create-form #usernameC");
        const usernameError = document.querySelector("#create-form #usernameError");
        cusername.addEventListener('input', function(e){
            var upattern = /^[\w]{5,12}$/;
            var currentValue = e.target.value;
            var valid = upattern.test(currentValue);
            if(valid){
                usernameError.style.display = "none"
            } else {
                usernameError.style.display = "block"
            }
        });
    // password validation
        const cpassword = document.querySelector("#create-form #passwordC");
        const passwordError = document.querySelector("#create-form #passwordError");
        cpassword.addEventListener('input', function(e){
            var passpattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;
            var currentValue2 = e.target.value;
            var valid2 = passpattern.test(currentValue2);
            if(valid2){
                passwordError.style.display = "none";
            } else {
                passwordError.style.display = "block";
            }
        });
</script>



<!-- donate form -->
<div id="pain" style="display: none;">
    <form method="POST" id="donate-form" onsubmit="change()" name="donate-form">
        <!-- personal info -->
        <br>
        <label for="fname">First Name:</label>
        <input type="text" name="fname">
        <label for="lname">Last Name:</label>
        <input type="text" name="lname">
        <label for="email">Email:</label>
        <input type="email" name="email">
        <label for="phone">Phone:</label>
        <input type="text" name="phone">
        <br>

        <!-- pet info -->
        <label>Cat or Dog?</label>
        <div>
            <label for="cat">Cat</label>
            <input type="radio" name="catordog" id="catordog" value="cat" >
        </div>
        <div>
            <label for="dog">Dog</label>
            <input type="radio" name="catordog" id="catordog" value="dog" >
        </div>
        <div>
            <label for="any">Any</label>
            <input type="radio" name="catordog" id="catordog" value="any" >
        </div>
        <br>
        <label for="breed">Preferred Breed:</label>
        <input type="text" name="breed" id="breed">
        <br>
        <div>
            <label for="age">Preferred age:</label>
            <select name="age" id="age" required>
                <option name="age" value="any">Select one...</option>
                <option name="age" value="0-1">0-1</option>
                <option name="age" value="2-3">2-3</option>
                <option name="age" value="4-5">4-5</option>
                <option name="age" value="6+">6+</option>
                <option name="age" value="any">Any</option>
            </select>
        </div>
        <br>

        <div>
            <label for="gender">Preferred Gender:</label>
            <div>
                <label for="male">Male</label>
                <input type="radio" name="gender" id="male" value="male" >
            </div>
            <div>
                <label for="female">Female</label>
                <input type="radio" name="gender" id="female" value="female" >
            </div>
            <div>
                <label for="any">Any</label>
                <input type="radio" name="gender" id="any" value="any" >
            </div>
        </div>
        <br>

        <label for="">Friendly with:</label>
        <div>
            <label for="">Dogs</label>
            <input type="checkbox" name="friendly" id="dogs" value="dogs" >
            <label for="">Cats</label>
            <input type="checkbox" name="friendly" id="cats" value="cats" >
            <label for="">Children</label>
            <input type="checkbox" name="friendly" id="children" value="children" >
        </div>
        <br>

        <label for="description">Your story:</label>
        <input type="text" style="width: 300px; height: 100px;" name="" id="description">
        <br>
        <div>
            <button type="submit" name="donatebtn" onclick="ValidateEmail(document.donate-form.email)">Submit</button>
            <button type="reset">Clear</button>
        </div>
        <br>
        <br>
    </form>

</div>



<script>
    // pet info saved successfully on form submit
    function change(){
        var main = document.querySelector(".main");
        main.innerHTML = "<h1 style= 'color: green;'>Pet info saved!</h1>";
    }
</script>



<?php
    include $_SERVER["DOCUMENT_ROOT"]."/home/footer.php"
?>



