<?php include_once("header.php");?>
          <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Referral Registration</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Referral Registration</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small> </small>
                                <h4 class="text-primary m-b-0 font-medium"><?php echo $_SESSION['User']['MemberName'];?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                            <!-- Column -->
                            <div class="col-sm-12 col-md-4">
                                <div class="card border-left border-primary bg-primary text-bg bg-image bg-overlay-primary p-0">
                                    <div class="card-body text-bg">
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center display-6"><i class="ti-user"></i></div>
                                            <div class="p-10 align-self-center">
                                                <h4 class="m-b-0">Sponsor Username</h4>
                                            </div>
                                            <div class="ml-auto align-self-center">
                                                <h5 class="font-medium m-b-0"><?php echo $_SESSION['User']['MemberName'];?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-sm-12 col-md-4">
                                <div class="card border-left border-success bg-success text-bg bg-image bg-overlay-success p-0">
                                    <div class="card-body text-bg">
                                        <div class="d-flex flex-row">
                                            <div class="display-6 align-self-center"><i class="ti-user"></i></div>
                                            <div class="p-10 align-self-center">
                                                <h4 class="m-b-0">Sponsor Fullname</h4>
                                            </div>
                                            <div class="ml-auto align-self-center">
                                                <h5 class="font-medium m-b-0"><?php echo $_SESSION['User']['MemberName'];?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-sm-12 col-md-4">
                                <div class="card border-left border-warning bg-warning text-bg bg-image bg-overlay-warning p-0">
                                    <div class="card-body text-bg p-15" style="padding: 7px;">
                                        <div class="d-flex flex-row">
                                            <div class="display-6 align-self-center"><i class="mdi mdi-account-multiple-plus"></i></div>
                                            <div class="p-10 m-r-40 align-self-center">
                                                <h4> </h4>
                                                <h6 class="m-b-0 font-normal"> </h6>
                                            </div>
                                            <div class="display-6 m-l-40 ml-auto align-self-center"><i class="mdi mdi-account-multiple-plus"></i></div>
<div class="p-10 align-self-center">
                                                <h4> </h4>
                                                <h6 class="m-b-5 font-normal"> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            
                        </div>

<div class="row">
  <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-light-green">
                                        <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Enter Follower Details</h4></div>
                                        <div class="form-body">
          <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">
            <input type="hidden" name="sponsorid" id="sponsorid" value="AJAI7">
            <input type="hidden" name="uplin_name" id="uplin_name" value="N kumar">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Username</label>
                                                    <input type="text" name="username" id="username" placeholder="User Name" value="" class="form-control" required aria-invalid="true" data-validation-required-message="Please enter Username">
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fullname</label>
                                                    <input type="text" name="fullname" placeholder="Full Name"  id="fullname" value="" class="form-control" required aria-invalid="true" data-validation-required-message="Please enter Fullname">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" id="email-exists">
                                                    <label>Email</label>
                                                    <input type="text" name="emailid" id="emailid" placeholder="Email" value="" class="form-control" required aria-invalid="true" data-validation-required-message="Please enter Email ID">
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="emailid-exists"></p></div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="pass" id="pass" placeholder="Password" value="" class="form-control" required aria-invalid="true" data-validation-required-message="Please enter Password">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="repass" id="repass" placeholder="Confirm Password" value="" class="form-control" required aria-invalid="true" data-validation-required-message="Please enter Confirm Password">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control custom-select" required name="country" id="country" aria-invalid="true" data-validation-required-message="Please Select Your Country">
                                                        <option value="">-- Select Country --</option>
                              <option value="Afghanistan">Afghanistan</option>
                              <option value="Aland Islands">Aland Islands</option>
                              <option value="Albania">Albania</option>
                              <option value="Algeria">Algeria</option>
                              <option value="American Samoa">American Samoa</option>
                              <option value="Andorra">Andorra</option>
                              <option value="Angola">Angola</option>
                              <option value="Anguilla">Anguilla</option>
                              <option value="Antarctica">Antarctica</option>
                              <option value="Antigua">Antigua</option>
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
                              <option value="Barbuda">Barbuda</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Belgium">Belgium</option>
                              <option value="Belize">Belize</option>
                              <option value="Benin">Benin</option>
                              <option value="Bermuda">Bermuda</option>
                              <option value="Bhutan">Bhutan</option>
                              <option value="Bolivia">Bolivia</option>
                              <option value="Bosnia">Bosnia</option>
                              <option value="Botswana">Botswana</option>
                              <option value="Bouvet Island">Bouvet Island</option>
                              <option value="Brazil">Brazil</option>
                              <option value="British Indian Ocean Trty.">British Indian Ocean Trty.</option>
                              <option value="Brunei Darussalam">Brunei Darussalam</option>
                              <option value="Bulgaria">Bulgaria</option>
                              <option value="Burkina Faso">Burkina Faso</option>
                              <option value="Burundi">Burundi</option>
                              <option value="Caicos Islands">Caicos Islands</option>
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
                              <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                              <option value="Cook Islands">Cook Islands</option>
                              <option value="Costa Rica">Costa Rica</option>
                              <option value="Cote d'Ivoire">Cote d'Ivoire</option>
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
                              <option value="Futuna Islands">Futuna Islands</option>
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
                              <option value="Guinea-Bissau">Guinea-Bissau</option>
                              <option value="Guyana">Guyana</option>
                              <option value="Haiti">Haiti</option>
                              <option value="Heard">Heard</option>
                              <option value="Herzegovina">Herzegovina</option>
                              <option value="Holy See">Holy See</option>
                              <option value="Honduras">Honduras</option>
                              <option value="Hong Kong">Hong Kong</option>
                              <option value="Hungary">Hungary</option>
                              <option value="Iceland">Iceland</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                              <option value="Iraq">Iraq</option>
                              <option value="Ireland">Ireland</option>
                              <option value="Isle of Man">Isle of Man</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Jamaica">Jamaica</option>
                              <option value="Jan Mayen Islands">Jan Mayen Islands</option>
                              <option value="Japan">Japan</option>
                              <option value="Jersey">Jersey</option>
                              <option value="Jordan">Jordan</option>
                              <option value="Kazakhstan">Kazakhstan</option>
                              <option value="Kenya">Kenya</option>
                              <option value="Kiribati">Kiribati</option>
                              <option value="Korea">Korea</option>
                              <option value="Korea (Democratic)">Korea (Democratic)</option>
                              <option value="Kuwait">Kuwait</option>
                              <option value="Kyrgyzstan">Kyrgyzstan</option>
                              <option value="Lao">Lao</option>
                              <option value="Latvia">Latvia</option>
                              <option value="Lebanon">Lebanon</option>
                              <option value="Lesotho">Lesotho</option>
                              <option value="Liberia">Liberia</option>
                              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                              <option value="Liechtenstein">Liechtenstein</option>
                              <option value="Lithuania">Lithuania</option>
                              <option value="Luxembourg">Luxembourg</option>
                              <option value="Macao">Macao</option>
                              <option value="Macedonia">Macedonia</option>
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
                              <option value="McDonald Islands">McDonald Islands</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Micronesia">Micronesia</option>
                              <option value="Miquelon">Miquelon</option>
                              <option value="Moldova">Moldova</option>
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
                              <option value="Nevis">Nevis</option>
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
                              <option value="Principe">Principe</option>
                              <option value="Puerto Rico">Puerto Rico</option>
                              <option value="Qatar">Qatar</option>
                              <option value="Reunion">Reunion</option>
                              <option value="Romania">Romania</option>
                              <option value="Russian Federation">Russian Federation</option>
                              <option value="Rwanda">Rwanda</option>
                              <option value="Saint Barthelemy">Saint Barthelemy</option>
                              <option value="Saint Helena">Saint Helena</option>
                              <option value="Saint Kitts">Saint Kitts</option>
                              <option value="Saint Lucia">Saint Lucia</option>
                              <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                              <option value="Saint Pierre">Saint Pierre</option>
                              <option value="Saint Vincent">Saint Vincent</option>
                              <option value="Samoa">Samoa</option>
                              <option value="San Marino">San Marino</option>
                              <option value="Sao Tome">Sao Tome</option>
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
                              <option value="South Georgia">South Georgia</option>
                              <option value="South Sandwich Islands">South Sandwich Islands</option>
                              <option value="Spain">Spain</option>
                              <option value="Sri Lanka">Sri Lanka</option>
                              <option value="Sudan">Sudan</option>
                              <option value="Suriname">Suriname</option>
                              <option value="Svalbard">Svalbard</option>
                              <option value="Swaziland">Swaziland</option>
                              <option value="Sweden">Sweden</option>
                              <option value="Switzerland">Switzerland</option>
                              <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                              <option value="Taiwan">Taiwan</option>
                              <option value="Tajikistan">Tajikistan</option>
                              <option value="Tanzania">Tanzania</option>
                              <option value="Thailand">Thailand</option>
                              <option value="The Grenadines">The Grenadines</option>
                              <option value="Timor-Leste">Timor-Leste</option>
                              <option value="Tobago">Tobago</option>
                              <option value="Togo">Togo</option>
                              <option value="Tokelau">Tokelau</option>
                              <option value="Tonga">Tonga</option>
                              <option value="Trinidad">Trinidad</option>
                              <option value="Tunisia">Tunisia</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Turkmenistan">Turkmenistan</option>
                              <option value="Turks Islands">Turks Islands</option>
                              <option value="Tuvalu">Tuvalu</option>
                              <option value="Uganda">Uganda</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                              <option value="Uruguay">Uruguay</option>
                              <option value="US Minor Outlying Islands">US Minor Outlying Islands</option>
                              <option value="Uzbekistan">Uzbekistan</option>
                              <option value="Vanuatu">Vanuatu</option>
                              <option value="Vatican City State">Vatican City State</option>
                              <option value="Venezuela">Venezuela</option>
                              <option value="Vietnam">Vietnam</option>
                              <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                              <option value="Virgin Islands (US)">Virgin Islands (US)</option>
                              <option value="Wallis">Wallis</option>
                              <option value="Western Sahara">Western Sahara</option>
                              <option value="Yemen">Yemen</option>
                              <option value="Zambia">Zambia</option>
                              <option value="Zimbabwe">Zimbabwe</option>
                                                                  </select>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <!--/span-->
                                                                                        <div class="col-md-6 p-t-20">
                                            <div class="form-group row">
                                                    <label class="control-label col-sm-2">Position</label>
                                                    <div class="custom-control custom-radio m-r-20">
                                                        <input type="radio" name="pos" value="L" checked required  class="custom-control-input" id="customRadio11">
                                                        <label class="custom-control-label" for="customRadio11">Left</label>
                                                        <div class="help-block"></div>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" name="pos" value="R"  required  class="custom-control-input" id="customRadio22">
                                                        <label class="custom-control-label" for="customRadio22">Right</label>
                                                    </div>
                                                </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-xs-12">
                                                    <label>Date of Birth</label>
                                                    <select class="form-control custom-select" required name="birth_date" id="birth_date" aria-invalid="true" data-validation-required-message="Please select birth date">
                                                        <option value="">-- Select Day --</option>
                                                                                                                   <option value="1">1</option>
                                                                                                         <option value="2">2</option>
                                                                                                         <option value="3">3</option>
                                                                                                         <option value="4">4</option>
                                                                                                         <option value="5">5</option>
                                                                                                         <option value="6">6</option>
                                                                                                         <option value="7">7</option>
                                                                                                         <option value="8">8</option>
                                                                                                         <option value="9">9</option>
                                                                                                         <option value="10">10</option>
                                                                                                         <option value="11">11</option>
                                                                                                         <option value="12">12</option>
                                                                                                         <option value="13">13</option>
                                                                                                         <option value="14">14</option>
                                                                                                         <option value="15">15</option>
                                                                                                         <option value="16">16</option>
                                                                                                         <option value="17">17</option>
                                                                                                         <option value="18">18</option>
                                                                                                         <option value="19">19</option>
                                                                                                         <option value="20">20</option>
                                                                                                         <option value="21">21</option>
                                                                                                         <option value="22">22</option>
                                                                                                         <option value="23">23</option>
                                                                                                         <option value="24">24</option>
                                                                                                         <option value="25">25</option>
                                                                                                         <option value="26">26</option>
                                                                                                         <option value="27">27</option>
                                                                                                         <option value="28">28</option>
                                                                                                         <option value="29">29</option>
                                                                                                         <option value="30">30</option>
                                                                                                         <option value="31">31</option>
                                                                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 col-xs-12 p-t-30">
                                                    <select class="form-control custom-select" required name="birth_month" id="birth_month" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                        <option value="">-- Select Month --</option>
                                                                                                            <option value="1">January</option>
                                                                                                  <option value="2">February</option>
                                                                                                  <option value="3">March</option>
                                                                                                  <option value="4">April</option>
                                                                                                  <option value="5">May</option>
                                                                                                  <option value="6">June</option>
                                                                                                  <option value="7">July</option>
                                                                                                  <option value="8">August</option>
                                                                                                  <option value="9">September</option>
                                                                                                  <option value="10">October</option>
                                                                                                  <option value="11">November</option>
                                                                                                  <option value="12">December</option>
                                                                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 col-xs-12 p-t-30">
                                                    <select class="form-control custom-select" required name="birth_year" id="birth_year" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                        <option value="">-- Select Year --</option>
                                                                                                            <option value="1939">1939</option>
                                                                                                  <option value="1940">1940</option>
                                                                                                  <option value="1941">1941</option>
                                                                                                  <option value="1942">1942</option>
                                                                                                  <option value="1943">1943</option>
                                                                                                  <option value="1944">1944</option>
                                                                                                  <option value="1945">1945</option>
                                                                                                  <option value="1946">1946</option>
                                                                                                  <option value="1947">1947</option>
                                                                                                  <option value="1948">1948</option>
                                                                                                  <option value="1949">1949</option>
                                                                                                  <option value="1950">1950</option>
                                                                                                  <option value="1951">1951</option>
                                                                                                  <option value="1952">1952</option>
                                                                                                  <option value="1953">1953</option>
                                                                                                  <option value="1954">1954</option>
                                                                                                  <option value="1955">1955</option>
                                                                                                  <option value="1956">1956</option>
                                                                                                  <option value="1957">1957</option>
                                                                                                  <option value="1958">1958</option>
                                                                                                  <option value="1959">1959</option>
                                                                                                  <option value="1960">1960</option>
                                                                                                  <option value="1961">1961</option>
                                                                                                  <option value="1962">1962</option>
                                                                                                  <option value="1963">1963</option>
                                                                                                  <option value="1964">1964</option>
                                                                                                  <option value="1965">1965</option>
                                                                                                  <option value="1966">1966</option>
                                                                                                  <option value="1967">1967</option>
                                                                                                  <option value="1968">1968</option>
                                                                                                  <option value="1969">1969</option>
                                                                                                  <option value="1970">1970</option>
                                                                                                  <option value="1971">1971</option>
                                                                                                  <option value="1972">1972</option>
                                                                                                  <option value="1973">1973</option>
                                                                                                  <option value="1974">1974</option>
                                                                                                  <option value="1975">1975</option>
                                                                                                  <option value="1976">1976</option>
                                                                                                  <option value="1977">1977</option>
                                                                                                  <option value="1978">1978</option>
                                                                                                  <option value="1979">1979</option>
                                                                                                  <option value="1980">1980</option>
                                                                                                  <option value="1981">1981</option>
                                                                                                  <option value="1982">1982</option>
                                                                                                  <option value="1983">1983</option>
                                                                                                  <option value="1984">1984</option>
                                                                                                  <option value="1985">1985</option>
                                                                                                  <option value="1986">1986</option>
                                                                                                  <option value="1987">1987</option>
                                                                                                  <option value="1988">1988</option>
                                                                                                  <option value="1989">1989</option>
                                                                                                  <option value="1990">1990</option>
                                                                                                  <option value="1991">1991</option>
                                                                                                  <option value="1992">1992</option>
                                                                                                  <option value="1993">1993</option>
                                                                                                  <option value="1994">1994</option>
                                                                                                  <option value="1995">1995</option>
                                                                                                  <option value="1996">1996</option>
                                                                                                  <option value="1997">1997</option>
                                                                                                  <option value="1998">1998</option>
                                                                                                  <option value="1999">1999</option>
                                                                                                  <option value="2000">2000</option>
                                                                                                  <option value="2001">2001</option>
                                                                                                        </select>
                                                    </div>
                                                <div class="help-block"></div>
                                                </div>
                                            </div>
                                            </div>
                                                                                        <!--/span-->
                                        <div class="col-12 p-b-20"><hr></div>
                                        <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                            <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input" required data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">I have read and understood the  <a target="_blank" href="Policy">Terms and Conditions</a></label>
                                        <div class="help-block"></div>
                                    </div>
                                          </div>
                                          <input type="hidden" name="uplineid" id="uplineid" value="" >
               <input type="hidden" name="page" id="page" value="refer"> 
                                        </div>
                                        <div class="card-body"><div class="form-group m-b-0 text-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Register</button>
                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Cancel</button>
                                    </div></div>
                                    </div>
                                </form></div>
                                </div>
                            </div>
</div>
<script type="text/javascript">
    $( "#username" ).change(function() {
  var baseURL = 'https://gcchub.org/';
  var username = $("#username").val();
  $.ajax(
        {
            type: 'POST',
            url: baseURL+'panel/User/checkUsernameExists',
            data:{"username":username},
            success: function(data) 
            {
                if(data == 1){
                    $('#user-exists').removeClass('validate');
                $('#user-exists').addClass('error-field');
                $("#username-exists").html("Username Already Exists");
                $("#username-exists").fadeIn();

                }
            }
            
        });
});
    $( "#emailid" ).change(function() {
  var baseURL = 'https://gcchub.org/';
  var emailid = $("#emailid").val();
  $.ajax(
        {
            type: 'POST',
            url: baseURL+'panel/User/checkEmailExists',
            data:{"email":emailid},
            success: function(data) 
            {
                if(data == 1){
                $('#email-exists').removeClass('validate');
                $('#email-exists').addClass('error-field');
                $("#emailid-exists").html("Email ID Already Exists");
                $("#emailid-exists").fadeIn();

                }
            }
            
        });
});
$(document).on("keyup", "#username", function(){
    $('#user-exists').removeClass('error-field');
    $("#username-exists").fadeOut();
});
$(document).on("keyup", "#emailid", function(){
    $('#emailid-exists').removeClass('error-field');
    $("#emailid-exists").fadeOut();
});
</script>
<style type="text/css">
#username-exists{
    color: #f00;
}
#emailid-exists{
    color: #f00;
}
.error-field #username{
    border-color: #f00 !important;
}
.error-field #emailid{
    border-color: #f00 !important;
}
</style>            </div>
            




         <?php include_once("footer.php"); ?>



 
