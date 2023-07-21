<div class="hic-tab-data">
                   <?php 
                 /* if($this->session->flashdacontact_detailsta('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } */
                  //print_r($contact_details);
                  ?>
                  <form name="contact" method="post" action="<?= base_url('Contact/contact_details') ?>">
                  <div class="card-body">
                    <div class="form-group">
                      <div class="appending_email">
                        <div class="form-floating emaildiv">
                          <input type="text" class="form-control" id="email1" name="email1" required="" placeholder="Email 1" value="<?php echo isset($contact_details->email1)?$contact_details->email1:'';?>">
                          <input type="hidden" name="email_count" id="email_count" value="1">
                          <label for="name">Email 1</label>
                          <span class="fa fa-plus addemail"></span>
                         </div>
                        </div>
                      </div>
                      <?php if(isset($contact_details->email2)) { ?>
                      <div class="form-group">
                        <div class="form-floating emaildiv">
                          <input type="text" class="form-control" id="email2" name="email2" required="" placeholder="Email 2" value="<?php echo isset($contact_details->email2)?$contact_details->email2:'';?>">
                          <label for="name">Email 2</label>
                         </div>
                        </div>
                      <?php } ?>
                       <?php if(isset($contact_details->email3)) { ?>
                      <div class="form-group">
                        <div class="form-floating emaildiv">
                          <input type="text" class="form-control" id="email3" name="email3" required="" placeholder="Email 3" value="<?php echo isset($contact_details->email3)?$contact_details->email3:'';?>">
                          <label for="name">Email 3</label>
                         </div>
                        </div>
                      <?php } ?>
                    <div class="form-group">
                      <div class="appending_phone">
                        <div class="form-floating phonediv">
                          <input type="text" class="form-control" id="phone1" name="phone1" required="" placeholder="Phone 1" value="<?php echo isset($contact_details->phone1)?$contact_details->phone1:'';?>">
                          <input type="hidden" name="phone_count" id="phone_count" value="1">
                          <label for="name">Phone 1</label>
                          <span class="fa fa-plus addphone"></span>
                         </div>
                        </div>
                    </div>
                    <?php if(isset($contact_details->phone2)) { ?>
                    <div class="form-group">
                        <div class="form-floating phonediv">
                          <input type="text" class="form-control" id="phone2" name="phone2" required="" placeholder="Phone 2" value="<?php echo isset($contact_details->phone2)?$contact_details->phone2:'';?>">
                          <label for="name">Phone 2</label>
                        </div>
                    </div>
                    <?php } 
                    if(isset($contact_details->phone3)) { ?>
                    <div class="form-group">
                      <div class="form-floating phonediv">
                        <input type="text" class="form-control" id="phone3" name="phone3" required="" placeholder="Phone 3" value="<?php echo isset($contact_details->phone3)?$contact_details->phone3:'';?>">
                        <label for="name">Phone 3</label>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                          <h6>Address</h6>
                        <div class="form-floating">
                          <input type="text" class="form-control" id="address1" name="address1" required="" placeholder="Address Line 1" value="<?php echo isset($contact_details->address1)?$contact_details->address1:'';?>">
                          <label for="name">Address Line 1</label>
                         </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="address2" name="address2" required="" placeholder="Address Line 2" value="<?php echo isset($contact_details->address2)?$contact_details->address2:'';?>">
                          <label for="name">Address Line 2</label>
                         </div>
                    </div>
                    <div class="form-group">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="city" name="city" required="" placeholder="City" value="<?php echo isset($contact_details->city)?$contact_details->city:'';?>">
                          <label for="name">City</label>
                         </div>
                    </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo isset($contact_details->state)?$contact_details->state:'';?>">
                        <label for="Company">State</label>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code" value="<?php echo isset($contact_details->zipcode)?$contact_details->zipcode:'';?>">
                        <label for="JobTitle">Zip Code</label>
                      </div>
                    </div>
                  </div>

            <div class="form-group">
              <div class="form-floating">
                <select id="country" name="country" class="form-control" required="">
                  <option value="">Select Country</option>
                  <option value="Afghanistan" <?php echo ($contact_details->country=='Afghanistan')?'selected':'';?>>Afghanistan</option>
                  <option value="Albania" <?php echo ($contact_details->country=='Albania')?'selected':'';?>>Albania</option>
                  <option value="Algeria" <?php echo ($contact_details->country=='Algeria')?'selected':'';?>>Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antartica">Antarctica</option>
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
                  <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
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
                  <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Congo">Congo, the Democratic Republic of the</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                  <option value="Croatia">Croatia (Hrvatska)</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="East Timor">East Timor</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="France Metropolitan">France, Metropolitan</option>
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
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-Bissau">Guinea-Bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                  <option value="Holy See">Holy See (Vatican City State)</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong">Hong Kong</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India" <?php echo ($contact_details->country=='India')?'selected':'';?>>India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran">Iran (Islamic Republic of)</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                  <option value="Korea">Korea, Republic of</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Lao">Lao People's Democratic Republic</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon" >Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macau">Macau</option>
                  <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
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
                  <option value="Micronesia">Micronesia, Federated States of</option>
                  <option value="Moldova">Moldova, Republic of</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
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
                  <option value="Russia">Russian Federation</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                  <option value="Saint LUCIA">Saint LUCIA</option>
                  <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia (Slovak Republic)</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                  <option value="Span">Spain</option>
                  <option value="SriLanka">Sri Lanka</option>
                  <option value="St. Helena">St. Helena</option>
                  <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syrian Arab Republic</option>
                  <option value="Taiwan">Taiwan, Province of China</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania, United Republic of</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks and Caicos">Turks and Caicos Islands</option>
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
                  <option value="Vietnam">Viet Nam</option>
                  <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                  <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                  <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                  <option value="Western Sahara">Western Sahara</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </div>
          </div> 
                  </div>
                  <div class="card-footer text-right">
                    <?php if(!empty($contact_details)){?>
                          <input type="hidden" name="action" value="<?php echo $contact_details->contact_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                    <input type="submit" name="submit" id="submit" class="btn btn-lbl" value="Save Changes">
                  </div>
                </form>
</div>

<script>
  $(document).ready(function() {
     $.ajax({
            url:"<?php echo site_url() ?>Contact/view_contact",  
            method: 'post',
            dataType:"json", 
            success: function(data) {
               $('#email_count').val(data.email_count);
               $('#phone_count').val(data.phone_count);
            }
        })

    $('.addemail').on('click', function() {
      var i = $('#email_count').val();
      if(i<1)
        i = 1;
      if(i<3)
      {
        i++;
        var field = '<br><div class="form-floating"><input type="text" class="form-control" id="email'+i+'" name="email'+i+'" required="" placeholder="Email '+i+'" ><label for="name">Email '+i+'</label></div>';
        $('.appending_email').append(field);
        $('#email_count').val(i);
      }
  })

  $('.addphone').on('click', function() {
    var x = $('#phone_count').val();
    if(x<1)
        x = 1;
    if(x<3)
    {
      x++;
      var field = '<br><div class="form-floating"><input type="text" class="form-control" id="phone'+x+'" name="phone'+x+'" required="" placeholder="Phone '+x+'" ><label for="phone">Phone '+x+'</label></div>';
      $('.appending_phone').append(field);
      $('#phone_count').val(x);
    }
  });
})
  </script>