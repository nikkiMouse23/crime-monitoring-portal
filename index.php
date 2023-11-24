<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>

        <meta name="description" content="Crime Monitoring Portal for Police Station of Binangonan">
        <meta name="keywords" content="Crime Monitoring Portal, Police Station, Binangonan, Crime Monitoring, monitoring Portal">
        <meta name="author" content="Clover Leaf">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body id="bg" style = "font-family: Verdana, Geneva, Tahoma, sans-serif;">

        <h1 id = "CMP">Crime Monitoring Portal</h1>
        <img src="pic/pnpLogo.png" alt="PNP Logo" id = "pnpLogo">

        <!--log in using form-->
        <div id = "lForm">
            <form action = "login.php" method="POST" enctype="multipart/form-data">
                <br>
                <br>
                <label id="LI">Log in</label>
                <label style="position:absolute; left: 42px; top: 157px;" id="loginLbl">username:</label>
                <input style="position:absolute; left: 153px; top: 153px;" type="text" id="txtb" name="uname"  placeholder=" Input Username" required>

                <label style="position:absolute; left: 42px; top: 229px;" id="loginLbl">password:</label>
                <input style="position:absolute; left: 153px; top: 225px;" type="password" id="txtb" name="pass"  placeholder=" Input Password" required>

                <br>
                <label><b></b></label>
                <br>
                <input style="position:absolute; left: 129px; top: 422px;" id="btnform" type="submit" value="Login">
                <button style="position:absolute; left: 129px; top: 512px;" id = "btnform">Continue as Guest</button>

                </div>
            </form>

        </div>


        <!-- registration modals-->
         <button onclick="openModal(1)" style="position:absolute; right:192px; top: 602px; color: #FFF; font-size: 13px; font-style: normal; font-weight: 400; line-height: normal; text-decoration-line: underline; background-color: transparent; color: white; border: transparent;" >Register</button>
                

                <div id="modal1" class="modal">
                            <div class="modal-content">
                            <span  onclick="closeModal(1)" style="float:right;" class="close">&times;</span>
                            <p>Sign up now!</p>
                            <img src="pic/pnpLogo.png" alt="PNP Logo" style="width: 104px; height: 143px;">
                            <br>
                            <br>
                            <br>
                            <!-- trigger -->
                            <button id = "btnReg" onclick="closeModal(1),openModal(6)">Register</button>

                </div>
        </div>

        <!-- OTP modal-->
        <div id="modal2" class="modals">
        
            <div class="modal-content">
            <span  onclick="openModal(4)" style="float:right;" class="close">&times;</span>
                <img src="pic/pnpLogo.png" alt="PNP Logo" style="width: 27px;height: 37px; position: absolute; top:29px; left: 23px;">
                <p class= "mHeader">Crime Monitoring Portal</p>

                <form>

                </form>
                <div id="sender">
                    
                    <p class= "mP">Phone Number</p>
                   
                        <input style = "position: absolute; top:175px; left:96px;" name = "phone" type="text" id="number" placeholder="+639..." value = "<?php echo isset($_SESSION['stored_phone_number']) ? $_SESSION['stored_phone_number'] : ''; ?>" >
                        <div id="recaptcha-container"></div>
                              
                        <input type="button" id="send" value="Send OTP" onClick="phoneAuth()">
                     

                </div>
                <div id="verifier" style="display: none">
                    
                    <label>OTP was sent to</label>
                    <input type="text" id="verificationcode" placeholder="OTP Code">
                    <input type="button" id="verify" value="Verify" onClick="codeverify()">
                    <div class="p-conf">Number Verified</div>
                    <div class="n-conf">OTP ERROR</div>
                </div>

                <button style = "position:absolute; bottom: 0px; right: 20px;" id = "btnReg" onclick="closeModal(2),openModal(3)">next</button>
            </div>
        </div>


        <!--registatiion-->

        <div id="modal3" class="modals">
            <div class="modal-content">
            <span  onclick="openModal(4)" style="float:right;" class="close">&times;</span>
                <img src="pic/pnpLogo.png" alt="PNP Logo" style="width: 27px;height: 37px; position: absolute; top:29px; left: 23px;">
                <p class= "mHeader">Crime Monitoring Portal</p>
                <form method = "POST" action = "registration.php" id = "formId">
                <label style="position: absolute; top: 122px; right:436px;" id="lbluname">Set username:</label>
                <input style="position: absolute; top: 156px; right:436px;" type="text" id="uname" name="uname" placeholder="Username" required>
                <label style="position: absolute; top: 215px; right:436px;" id="lbluname">Set password:</label>
                <input style="position: absolute; top: 249px; right:436px;" type="password" id="pass" name="pass" placeholder="Password" required>
                <label style="position: absolute; top: 302px; right:400px;" id="lbluname">Confirm password:</label>
                <input style="position: absolute; top: 336px; right:436px;" type="password" id="cpass" name="cpass" placeholder="Re-write password" required><label id="error" style="color: red; position: absolute; top: 385px; right: 400px; display: none;">Passwords do not match</label>
                <button id="sub" style="width: 465px; height: 57px;position: absolute; bottom: 10px; right:75px" type="button">Continue</button>
                </form>
              
            </div>
        </div>

        
        <script>
        document.getElementById('sub').addEventListener('click', function() {
            var pass = document.getElementById('pass').value;
            var cpass = document.getElementById('cpass').value;

            if (pass === cpass) {
                document.getElementById('error').style.display = 'none';
                document.getElementById('formId').submit(); // Change 'formId' to the actual ID of your form
            } else {
                document.getElementById('error').style.display = 'block';
            }
        });
        </script>


        <div id="modal4" class="modal">
            <div class="modal-content">
            <span  onclick="closeModal(4)" style="float:right;" class="close">&times;</span>
            <pre style = "text-align: center; color: #000; font-size: 20px; font-style: normal; font-weight: 400; line-height: normal; position: absolute; top: 113px; right:80px;">
            All data will be deleted.
         Are you sure you want to close?
            </pre>
            <button  id = "btnReg" onclick="closeModal(2),closeModal(3),closeModal(4),clearAllCookies()" style = "width: 465px; height: 57px;position: absolute; bottom: 10px; right:20px" >Continue</button>
            </div>
        </div>

        <div id="modal6" class="modal">
            <div class="modal-content">
                <span  onclick="closeModal(6)" style="float:right;" class="close">&times;</span>
                <form id="phoneNumberForm">
                    <img src="pic/pnpLogo.png" alt="PNP Logo" style="width: 104px; height: 143px;">
                    <label>Phone Number:</label>    
                    <input id = "pnum" type = "text" name = "pnum" required placeholder = "+63">
    
                    <button type = "button" id = "btnRe" onclick="checkEmpty()">Continue</button>

                </form>
               
            </div>
        </div>

        <script>
            function checkEmpty() {
            var textboxValue = document.getElementById("pnum").value;
            if (textboxValue.trim() === '') {
                alert("Please enter your phone number");
               
            }
            else{
                closeModal(6);
                openModal(2);
            }
            
            }
        </script>

        <script>
    // JavaScript to handle form submission without page reload
    document.getElementById('btnRe').addEventListener('click', function() {
        var form = document.getElementById('phoneNumberForm');
        var formData = new FormData(form);
        var textboxValue = document.getElementById("pnum").value;

        // Perform an asynchronous request (e.g., AJAX) to handle form submission
        // For example:
        // Replace this with your AJAX code to handle form submission
        // Here, preventDefault() is used to stop the default form submission behavior
        // and prevent the page from reloading
        event.preventDefault(); // Prevents the default form submission behavior
        
        // Example AJAX code
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {


            console.log(data); // Log the response from PHP (if needed)
        
            

        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
        </script>

<?php
// PHP code to handle form data sent by JavaScript
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pnum'])) {
    $phoneNumber = $_POST['pnum'];

    // Use $phoneNumber as needed (e.g., store it in a PHP variable or session)
    // For example:
    // Store $phoneNumber in a session variable

    $_SESSION['stored_phone_number'] = $phoneNumber;

    // Send a response back to JavaScript (optional)

}
?>

        <!--java scripts-->
        <script>

            function openModal(modalNumber) {
            var modal = document.getElementById("modal" + modalNumber);
            modal.style.display = "block";
            }

            function closeModal(modalNumber) {
            var modal = document.getElementById("modal" + modalNumber);
            modal.style.display = "none";
            }

            function clearAllCookies() {
            var cookies = document.cookie.split(";");
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].split("=");
                var name = cookie[0].trim();
                clearCookie(name);
                
            }


        }
        </script>

            

                <!--	add firebase SDK-->
        <script src="https://www.gstatic.com/firebasejs/9.12.1/firebase-app-compat.js"></script>
        <script src="https://www.gstatic.com/firebasejs/9.12.1/firebase-auth-compat.js"></script>
        <script>
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
        apiKey: "AIzaSyDooYaIfK_5Dr3kuI67VWI_LJDmAU8nPmM",
        authDomain: "otps-b829c.firebaseapp.com",
        projectId: "otps-b829c",
        storageBucket: "otps-b829c.appspot.com",
        messagingSenderId: "488936987891",
        appId: "1:488936987891:web:7f35274868f937a9d1ab86",
        measurementId: "G-EYKBV0V981"
        };
            firebase.initializeApp(firebaseConfig);
        render();
        function render(){
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
            // function for send message
        function phoneAuth(){
            var number = document.getElementById('number').value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "registration.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("number=" + number);

            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult){
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                document.getElementById('sender').style.display = 'none';
                document.getElementById('verifier').style.display = 'block';
            }).catch(function(error){
                alert(error.message);
            });

        }
            // function for code verify
        function codeverify(){
            var code = document.getElementById('verificationcode').value;
            coderesult.confirm(code).then(function(){
            openModal(3);
            closeModal(2);
            }).catch(function(){

                document.getElementsByClassName('p-conf')[0].style.display = 'none';
                document.getElementsByClassName('n-conf')[0].style.display = 'block';
                        
            })
        }

       
        </script>

    </body>
</html>