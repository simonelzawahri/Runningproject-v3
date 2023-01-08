<?php
    // get pet info string
    $catordog;
    $breed;
    $age;
    $gender;
    $friendly;
    $str = "";
    if(isset($_POST["catordog"])){
        $catordog = $_POST["catordog"];
        $str .= $catordog.":";
    }
    if(isset($_POST["breed"])){
        $breed = $_POST["breed"];
        $str .= $breed.":";
    }
    if(isset($_POST["preferredAge"])){
        $age = $_POST["preferredAge"];
        $str .= $age.":";
    }
    if(isset($_POST["preferredGender"])){
        $gender = $_POST["preferredGender"];
        $str .= $gender.":";
    }
    if(isset($_POST["friendly"])){
        $friendly = $_POST["friendly"];
        $str .= $friendly;
    }



    // store pet info in petinfo array
    $petinfo = explode(":", $str);
    foreach($petinfo as $key => $value){
        // echo $value . "<br>";
    }


    // read each line in file and store in lines array
    $lines = file('../donate/petinfo.txt');
    foreach($lines as $line_num => $line){
        // echo "$line_num: $line<br>";
    }


    if(isset($_POST["catordog"]) ){
        $words;
        $count = 0;
        $foundresults = false;
        // each line, explode and store in array of words
        // compare petinfo index 0 to words index 2, if match save line, this pet meets criteria, store in $_POST variable;
        // $results = "";

        echo '
                <div id="notfound" style="display: none;">
                    <h2 style="color: red;">No pets found.</h2>
                </div>        
        ';

        echo '
            <div id="results" style="display: none;">
                <div>
                    <h2 style="color: green;">The following pets were found:</h2>
                </div>
        ';

        foreach($lines as $key => $value){
            $words = explode(":", $value);
            if($petinfo[0] == $words[2] &&
                $petinfo[1] == $words[3] &&
                $petinfo[2] == $words[4] &&
                $petinfo[3] == $words[5] ){

                // print matching results 
                $arr = explode(":", $value);
                foreach ($arr as $key => $val ){
                    echo $val."<br>";
                }
                echo'<br><br><br>';
                $count++;
                $foundresults = true;
            }
        }
        echo '</div>';

        if($foundresults){
            echo '
                <script>
                    window.onload = function(){
                        var main = document.querySelector(".main");
                        const found = document.querySelector("#results");
                        main.innerHTML = found.innerHTML;
                    }
                </script>
            ';
        } else {
            echo '
                <script>
                    window.onload = function(){
                        var main = document.querySelector(".main");
                        var notfound = document.querySelector("#notfound");
                        main.innerHTML = notfound.innerHTML;
                    }
                </script>
            ';
        }  
    }

?>




<?php
    include $_SERVER["DOCUMENT_ROOT"]."/home/header.php";
?>




    <div class="main2">

    </div>


    <div class="main">
        <section>
            If you would like to adopt a furry friend, fill out this form.
        </section>

        <form method="POST" name="pets-form">
            <!-- personal info -->
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" >
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" >
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" >
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" >
            <br>

            <!-- pet info -->
            <label for="">Cat or Dog?</label>
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
                <label for="preferredAge">Preferred age:</label>
                <select name="preferredAge" id="preferredAge" required>
                    <option name="preferredAge" value="any">Select one...</option>
                    <option name="preferredAge" value="0-1">0-1</option>
                    <option name="preferredAge" value="2-3">2-3</option>
                    <option name="preferredAge" value="4-5">4-5</option>
                    <option name="preferredAge" value="6+">6+</option>
                    <option name="preferredAge" value="any">Any</option>
                </select>
            </div>
            <br>

            <div>
                <label for="preferredGender">Preferred Gender:</label>
                <div>
                    <label for="male">Male</label>
                    <input type="radio" name="preferredGender" id="male" value="male" >
                </div>
                <div>
                    <label for="female">Female</label>
                    <input type="radio" name="preferredGender" id="female" value="female" >
                </div>
                <div>
                    <label for="any">Any</label>
                    <input type="radio" name="preferredGender" id="any" value="any" >
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

            <div>
                <button type="submit" id="submit">Submit</button>
                <button type="reset">Clear</button>
            </div>
            <br>
            <br>
        </form>
    </div>


<?php
    include $_SERVER["DOCUMENT_ROOT"]."/home/footer.php"
?>