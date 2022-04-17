<?php
include "api/configer.php";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>KIBEHO SANCTUARY N.J | E-Rinde</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/kibeho-1.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">

    <!-- integrating datepicker -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">


</head>

<body>

    <div class="wrapper" style="background-image: url('assets/images/kibeho-3.jpg'); background-position: center; background-size: cover;">
        <div class="wrapper" style="background-color: #0a5a9780; width: 100%; height: 100%;">
            <div class="inner">
                <div class="image-holder">
                    <img src="assets/images/kibeho-1.jpg" alt="" style="width: 100%;">

                    <div style="text-align: center; font-weight: bold; font-size: 30px; background-color: #0A5A97;">
                        <span style="font-weight: bold; font-size: 25px; background-color: #0A5A97; color: #FFFFFF;">ATTENDEES:</span> <span style="font-weight: bold; font-size: 30px; background-color: #0A5A97; color: #FFFFFF;"> <?php echo $countUsers; ?> </span>
                    </div>
                    <span style="font-size: 11px;">

                        Powered by<a href="http://calmgeeks.com"> Calmgeeks </a>&copy; 2021
                    </span>

                </div>
                <div style="margin-top: -12px; width: 700px; border-radius: 12px" class="container">
                    <div class="row">
                        <form action="insert-christian.php" method="post" enctype="multipart/form-data">
                            <h3>Create Account</h3>
                            *<i class="zmdi zmdi-phone"></i>
                            <input type="tel" id="phone" name="phone" placeholder="Phone Number (Telefone)" class="form-control" value="<?php echo $phone; ?>"><br>
                            *<i class="zmdi zmdi-email"></i>
                            <input type="email" id="email" name="email" placeholder="Email Address (Imeli)" class="form-control" value="<?php echo $email; ?>"><br>
                            <input type="file" name="anyfile" id="anyfile"> <br>
                            <button type="submit" name="save">Save Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<!-- <script src="assets/js/json_database.js"></script> -->
<script src="assets/js/json_rwanda.js"></script>
<script src="assets/js/jquery-1.12.4.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script>
    document.getElementById("country").addEventListener('change', function(e) {
        onSelectCountry();
    });
    onSelectCountry();

    function onSelectCountry() {
        const country = $("#country :selected").text();
        if (country === "Rwanda") {
            document.getElementById("form-group-4").style.display = "";
            document.getElementById("form-group-5").style.display = "";
            document.getElementById("form-group-6").style.display = "";

            getProvinces("province", "<?php echo $province ?>");
            getDistricts("<?php echo $province ?>", "district", "<?php echo $district ?>");
            getSectors("<?php echo $province ?>", "<?php echo $district ?>", "sector", "<?php echo $sector ?>");
            getCells("<?php echo $province ?>", "<?php echo $district ?>", "<?php echo $sector ?>", "cell", "<?php echo $cell ?>");
            getVillages("<?php echo $province ?>", "<?php echo $district ?>", "<?php echo $sector ?>", "<?php echo $cell ?>", "village", "<?php echo $village ?>");

        } else {
            document.getElementById("form-group-4").style.display = "none";
            document.getElementById("form-group-5").style.display = "none";
            document.getElementById("form-group-6").style.display = "none";
        }
    }


    function validateCustomerName(idInput) {
        var validatedName = "";
        var restrictedCharactersArray = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "+", "=", "{", "}", "[", "]", ":", ";", "'", "<", ">", ",", ".", "?", "/", "/\/", "|"];
        var customerName = document.getElementById(idInput).value;
        validatedName = "";
        var customerNameArray = customerName.split("");
        for (var i = 0; i < restrictedCharactersArray.length; i++) {
            var restrictedCharacter = restrictedCharactersArray[i];
            if (customerNameArray.indexOf(restrictedCharacter) !== -1) {
                for (var j = 0; j < customerNameArray.length; j++) {
                    var customerNameCharacter = customerNameArray[j];
                    if (customerNameCharacter !== restrictedCharacter) {
                        validatedName = validatedName + customerNameCharacter;
                    }
                }
            }
        }
        for (var i = 0; i < customerNameArray.length; j++) {
            var customerNameCharacter = customerNameArray[i];
            if (!restrictedCharactersArray.includes(customerNameCharacter)) {
                validatedName = validatedName + customerNameCharacter;
            }
        }
        document.getElementById(idInput).value = validatedName;
    }


    $(document).ready(function() {
        var SelectedDates = {};
        SelectedDates[new Date('11/28/2021')] = new Date('11/28/2021').toString();
        SelectedDates[new Date('11/29/2021')] = new Date('11/29/2021').toString();
        $("#datepicker").datepicker({
            dateFormat: 'yy/mm/dd',
            beforeShowDay: nonWorkingDates,
            numberOfMonths: 1,
            minDate: 0,
            maxDate: '+3M',
            firstDay: 1,
        });

        function nonWorkingDates(date) {
            var Highlight = SelectedDates[date];
            if (Highlight) {
                return [true, "Highlighted", Highlight];
            } else {
                return [true, '', ''];
            }
        }
        // return [true];


    });

    function serviceForm() {
        var item = document.getElementById('datepicker').value;
        if (item == '2021/11/28') {
            misa1 = '8:00 AM';
            misa2 = '11:00 AM';
            misa3 = '4:00 PM';
        } else if (item == '2021/11/29') {
            misa1 = '7:00 AM';
            misa2 = '10:00 AM';
            misa3 = '1:00 PM';
        } else {
            misa1 = '7:00 AM';
            misa2 = '10:00 AM';
            misa3 = '4:00 PM'
        }
        document.getElementById('service-8').innerHTML = misa1;
        document.getElementById('service-11').innerHTML = misa2;
        document.getElementById('service-16').innerHTML = misa3;
        document.getElementById('service-8').value = misa1;
        document.getElementById('service-11').value = misa2;
        document.getElementById('service-16').value = misa3;


    }
</script>

</html>