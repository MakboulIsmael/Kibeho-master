<?php
include "api/config.php";
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
                <form action="" method="post">
                    <h3>KIBEHO SANCTUARY N.J <br> Attendee Registration</h3>
                    <div class="form-group" style="display: none;">
                        *<i class="zmdi zmdi-account-circle"></i>
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control" disabled value="<?php echo $username; ?>">
                        <i class="zmdi zmdi-key"></i>*
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control" disabled value="<?php echo ""; ?>">
                    </div>
                    <div class="form-group">
                        *<i class="zmdi zmdi-account"></i>
                        <input id="nameFirst" name="nameFirst" type="text" placeholder="First Name (Izina rya mbere)" class="form-control" value="<?php echo $nameFirst; ?>">
                        <i class="zmdi zmdi-account"></i>*
                        <input id="nameLast" name="nameLast" type="text" placeholder="Last Name (Izina rya kabiri)" class="form-control" value="<?php echo $nameLast; ?>">
                    </div>
                    <div class="form-wrapper" style="display: none;">
                        *<i class="zmdi zmdi-account"></i>
                        <input id="name" name="name" type="text" placeholder="Name" class="form-control" disabled value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        *<i class="zmdi zmdi-phone"></i>
                        <input id="phone" name="phone" type="tel" placeholder="Phone Number (Telefone)" class="form-control" value="<?php echo $phone; ?>">
                        <i class="zmdi zmdi-email"></i>
                        <input id="email" name="email" type="email" placeholder="Email Address (Imeli)" class="form-control" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        *<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <select name="gender" id="gender" class="form-control" style="width: 50%;">
                            <option value="" disabled <?php echo $gender == "" ? "selected" : ""; ?>>Gender (Igitsina)</option>
                            <option value="Male" <?php echo $gender == "Male (Gabo)" ? "selected" : ""; ?>>Male (Gabo)</option>
                            <option value="Female" <?php echo $gender == "Female (Gore)" ? "selected" : ""; ?>>Female (Gore)</option>
                            <option value="Other" <?php echo $gender == "Preffer-not (Sinshaka kubitangaza)" ? "selected" : ""; ?>>Preffer-not (Sinshaka kubitangaza)</option>
                        </select>
                        <i class="zmdi zmdi-calendar" style="font-size: 17px"></i>*
                        <input name="date" placeholder="Select Date (Itariki)" class="form-control" type="text" id="datepicker" value="<?php echo $date ?>">
                    </div>
                    <div class="form-group">
                        *<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <select name="service" id="service" class="form-control" onclick="serviceForm();">
                            <option value="" disabled <?php echo $service == "" ? "selected" : ""; ?>>Service (Hitamo Misa)</option>
                            <option id="service-8" value="" <?php echo $service == '7:00 AM' || $service=='8:00 AM' ? "selected" : ""; ?>></option>
                            <option id="service-11" value="" <?php echo $service == '11:00 AM' || $service == '10:00 AM' ? "selected" : ""; ?>></option>
                            <option id="service-16" value="" <?php echo $service == '4:00 PM' || $service == '1:00 PM' ? "selected" : ""; ?>></option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>*
                        <select name="country" id="country" class="form-control">
                            <option value="" disabled <?php echo ($country == "") ? "selected" : ""; ?>>Country (Igihugu)</option>
                            <?php echo !empty($country) ? "<option value='$country' selected>$country</option>" : ""; ?>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor-leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>
                    <div class="form-group" id="form-group-4" style="display: none;">
                        *<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <select name="diocese" id="diocese" class="form-control">
                            <option value="" disabled <?php echo $diocese == "" ? "selected" : ""; ?>>Dioceses (Diyoseze)</option>
                            <option value="Diocese of Butare" <?php echo $diocese == "Diocese of Butare" ? "selected" : ""; ?>>Diocese of Butare</option>
                            <option value="Diocese of Cyangugu" <?php echo $diocese == "Diocese of Cyangugu" ? "selected" : ""; ?>>Diocese of Cyangugu</option>
                            <option value="Diocese of Gikongoro" <?php echo $diocese == "Diocese of Gikongoro" ? "selected" : ""; ?>>Diocese of Gikongoro</option>
                            <option value="Diocese of Kabgayi" <?php echo $diocese == "Diocese of Kabgayi" ? "selected" : ""; ?>>Diocese of Kabgayi</option>
                            <option value="Diocese of Kibungo" <?php echo $diocese == "Diocese of Kibungo" ? "selected" : ""; ?>>Diocese of Kibungo</option>
                            <option value="Diocese of Kigali" <?php echo $diocese == "Diocese of Kigali" ? "selected" : ""; ?>>Diocese of Kigali</option>
                            <option value="Diocese of Ruhengeri" <?php echo $diocese == "Diocese of Ruhengeri" ? "selected" : ""; ?>>Diocese of Ruhengeri</option>
                            <option value="Diocese of Nyundo" <?php echo $diocese == "Diocese of Nyundo" ? "selected" : ""; ?>>Diocese of Nyundo</option>
                            <option value="Diocese of Byumba" <?php echo $diocese == "Diocese of Byumba" ? "selected" : ""; ?>>Diocese of Byumba</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>*
                        <select name="province" id="province" class="form-control">
                            <option value="" disabled <?php echo $province == "" ? "selected" : ""; ?>>Province (Intara)</option>
                            <?php echo !empty($province) ? "<option value='$province' selected>$province</option>" : ""; ?>
                        </select>
                    </div>
                    <div class="form-group" id="form-group-5" style="display: none;">
                        *<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <select name="district" id="district" class="form-control">
                            <option value="" disabled <?php echo $district == "" ? "selected" : ""; ?>>District (Akarere)</option>
                            <?php echo !empty($district) ? "<option value='$district' selected>$district</option>" : ""; ?>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>*
                        <select name="sector" id="sector" class="form-control">
                            <option value="" disabled <?php echo $sector == "" ? "selected" : ""; ?>>Sector (Umurenge)</option>
                            <?php echo !empty($sector) ? "<option value='$sector' selected>$sector</option>" : ""; ?>
                        </select>
                    </div>
                    <div class="form-group" id="form-group-6" style="display: none;">
                        *<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        <select name="cell" id="cell" class="form-control">
                            <option value="" disabled <?php echo $cell == "" ? "selected" : ""; ?>>Cell (Akagari)</option>
                            <?php echo !empty($cell) ? "<option value='$cell' selected>$cell</option>" : ""; ?>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>*
                        <select name="village" id="village" class="form-control">
                            <option value="" disabled <?php echo $village == "" ? "selected" : ""; ?>>Village (Umudugudu)</option>
                            <?php echo !empty($village) ? "<option value='$village' selected>$village</option>" : ""; ?>
                        </select>
                    </div>
                    <div class="text-center" style="color: #FFFFFF; background-color: <?php echo $resultCode === 0 ? '#cc0000' : '#03a40b'; ?>; text-align: center; font-size: 20px; border-radius: 10px;"><?php echo $response; ?></div>
                    <button id="submit" name="submit" value="<?php echo $resultCode; ?>" type="submit" style="width: 200px; padding: 5px;"> <?php echo ($resultCode === 1 ? "Request your Attendance Card" : $resultCode === 2) ? "Register Another" : "Register as Attendee"; ?>
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                </form>

                <div class="form-group">
                    <?php  ?>
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