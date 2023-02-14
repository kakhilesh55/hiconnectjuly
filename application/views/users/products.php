<?php $edit_id = $this->uri->segment(3);?>
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Product Details</h4>
                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <form name="products" method="post" action="<?= base_url('products/product_details') ?>" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo isset($product->product_name)?$product->product_name:'';?>" required="">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="currency">Currency</label>
                        <select id="currency" name="currency" class="form-control">
                            <option>Select currency</option>
                            <option value="AFN">Afghan Afghani - ؋</option>
                            <option value="ALL">Albanian Lek - Lek</option>
                            <option value="DZD">Algerian Dinar - دج</option>
                            <option value="AOA">Angolan Kwanza - Kz</option>
                            <option value="ARS">Argentine Peso - $</option>
                            <option value="AMD">Armenian Dram - ֏</option>
                            <option value="AWG">Aruban Florin - ƒ</option>
                            <option value="AUD">Australian Dollar - $</option>
                            <option value="AZN">Azerbaijani Manat - m</option>
                            <option value="BSD">Bahamian Dollar - B$</option>
                            <option value="BHD">Bahraini Dinar - .د.ب</option>
                            <option value="BDT">Bangladeshi Taka - ৳</option>
                            <option value="BBD">Barbadian Dollar - Bds$</option>
                            <option value="BYR">Belarusian Ruble - Br</option>
                            <option value="BEF">Belgian Franc - fr</option>
                            <option value="BZD">Belize Dollar - $</option>
                            <option value="BMD">Bermudan Dollar - $</option>
                            <option value="BTN">Bhutanese Ngultrum - Nu.</option>
                            <option value="BTC">Bitcoin - ฿</option>
                            <option value="BOB">Bolivian Boliviano - Bs.</option>
                            <option value="BAM">Bosnia-Herzegovina Convertible Mark - KM</option>
                            <option value="BWP">Botswanan Pula - P</option>
                            <option value="BRL">Brazilian Real - R$</option>
                            <option value="GBP">British Pound Sterling - £</option>
                            <option value="BND">Brunei Dollar - B$</option>
                            <option value="BGN">Bulgarian Lev - Лв.</option>
                            <option value="BIF">Burundian Franc - FBu</option>
                            <option value="KHR">Cambodian Riel - KHR</option>
                            <option value="CAD">Canadian Dollar - $</option>
                            <option value="CVE">Cape Verdean Escudo - $</option>
                            <option value="KYD">Cayman Islands Dollar - $</option>
                            <option value="XOF">CFA Franc BCEAO - CFA</option>
                            <option value="XAF">CFA Franc BEAC - FCFA</option>
                            <option value="XPF">CFP Franc - ₣</option>
                            <option value="CLP">Chilean Peso - $</option>
                            <option value="CNY">Chinese Yuan - ¥</option>
                            <option value="COP">Colombian Peso - $</option>
                            <option value="KMF">Comorian Franc - CF</option>
                            <option value="CDF">Congolese Franc - FC</option>
                            <option value="CRC">Costa Rican ColÃ³n - ₡</option>
                            <option value="HRK">Croatian Kuna - kn</option>
                            <option value="CUC">Cuban Convertible Peso - $, CUC</option>
                            <option value="CZK">Czech Republic Koruna - Kč</option>
                            <option value="DKK">Danish Krone - Kr.</option>
                            <option value="DJF">Djiboutian Franc - Fdj</option>
                            <option value="DOP">Dominican Peso - $</option>
                            <option value="XCD">East Caribbean Dollar - $</option>
                            <option value="EGP">Egyptian Pound - ج.م</option>
                            <option value="ERN">Eritrean Nakfa - Nfk</option>
                            <option value="EEK">Estonian Kroon - kr</option>
                            <option value="ETB">Ethiopian Birr - Nkf</option>
                            <option value="EUR">Euro - €</option>
                            <option value="FKP">Falkland Islands Pound - £</option>
                            <option value="FJD">Fijian Dollar - FJ$</option>
                            <option value="GMD">Gambian Dalasi - D</option>
                            <option value="GEL">Georgian Lari - ლ</option>
                            <option value="DEM">German Mark - DM</option>
                            <option value="GHS">Ghanaian Cedi - GH₵</option>
                            <option value="GIP">Gibraltar Pound - £</option>
                            <option value="GRD">Greek Drachma - ₯, Δρχ, Δρ</option>
                            <option value="GTQ">Guatemalan Quetzal - Q</option>
                            <option value="GNF">Guinean Franc - FG</option>
                            <option value="GYD">Guyanaese Dollar - $</option>
                            <option value="HTG">Haitian Gourde - G</option>
                            <option value="HNL">Honduran Lempira - L</option>
                            <option value="HKD">Hong Kong Dollar - $</option>
                            <option value="HUF">Hungarian Forint - Ft</option>
                            <option value="ISK">Icelandic KrÃ³na - kr</option>
                            <option value="INR">Indian Rupee - ₹</option>
                            <option value="IDR">Indonesian Rupiah - Rp</option>
                            <option value="IRR">Iranian Rial - ﷼</option>
                            <option value="IQD">Iraqi Dinar - د.ع</option>
                            <option value="ILS">Israeli New Sheqel - ₪</option>
                            <option value="ITL">Italian Lira - L,£</option>
                            <option value="JMD">Jamaican Dollar - J$</option>
                            <option value="JPY">Japanese Yen - ¥</option>
                            <option value="JOD">Jordanian Dinar - ا.د</option>
                            <option value="KZT">Kazakhstani Tenge - лв</option>
                            <option value="KES">Kenyan Shilling - KSh</option>
                            <option value="KWD">Kuwaiti Dinar - ك.د</option>
                            <option value="KGS">Kyrgystani Som - лв</option>
                            <option value="LAK">Laotian Kip - ₭</option>
                            <option value="LVL">Latvian Lats - Ls</option>
                            <option value="LBP">Lebanese Pound - £</option>
                            <option value="LSL">Lesotho Loti - L</option>
                            <option value="LRD">Liberian Dollar - $</option>
                            <option value="LYD">Libyan Dinar - د.ل</option>
                            <option value="LTL">Lithuanian Litas - Lt</option>
                            <option value="MOP">Macanese Pataca - $</option>
                            <option value="MKD">Macedonian Denar - ден</option>
                            <option value="MGA">Malagasy Ariary - Ar</option>
                            <option value="MWK">Malawian Kwacha - MK</option>
                            <option value="MYR">Malaysian Ringgit - RM</option>
                            <option value="MVR">Maldivian Rufiyaa - Rf</option>
                            <option value="MRO">Mauritanian Ouguiya - MRU</option>
                            <option value="MUR">Mauritian Rupee - ₨</option>
                            <option value="MXN">Mexican Peso - $</option>
                            <option value="MDL">Moldovan Leu - L</option>
                            <option value="MNT">Mongolian Tugrik - ₮</option>
                            <option value="MAD">Moroccan Dirham - MAD</option>
                            <option value="MZM">Mozambican Metical - MT</option>
                            <option value="MMK">Myanmar Kyat - K</option>
                            <option value="NAD">Namibian Dollar - $</option>
                            <option value="NPR">Nepalese Rupee - ₨</option>
                            <option value="ANG">Netherlands Antillean Guilder - ƒ</option>
                            <option value="TWD">New Taiwan Dollar - $</option>
                            <option value="NZD">New Zealand Dollar - $</option>
                            <option value="NIO">Nicaraguan CÃ³rdoba - C$</option>
                            <option value="NGN">Nigerian Naira - ₦</option>
                            <option value="KPW">North Korean Won - ₩</option>
                            <option value="NOK">Norwegian Krone - kr</option>
                            <option value="OMR">Omani Rial - .ع.ر</option>
                            <option value="PKR">Pakistani Rupee - ₨</option>
                            <option value="PAB">Panamanian Balboa - B/.</option>
                            <option value="PGK">Papua New Guinean Kina - K</option>
                            <option value="PYG">Paraguayan Guarani - ₲</option>
                            <option value="PEN">Peruvian Nuevo Sol - S/.</option>
                            <option value="PHP">Philippine Peso - ₱</option>
                            <option value="PLN">Polish Zloty - zł</option>
                            <option value="QAR">Qatari Rial - ق.ر</option>
                            <option value="RON">Romanian Leu - lei</option>
                            <option value="RUB">Russian Ruble - ₽</option>
                            <option value="RWF">Rwandan Franc - FRw</option>
                            <option value="SVC">Salvadoran ColÃ³n - ₡</option>
                            <option value="WST">Samoan Tala - SAT</option>
                            <option value="SAR">Saudi Riyal - ﷼</option>
                            <option value="RSD">Serbian Dinar - din</option>
                            <option value="SCR">Seychellois Rupee - SRe</option>
                            <option value="SLL">Sierra Leonean Leone - Le</option>
                            <option value="SGD">Singapore Dollar - $</option>
                            <option value="SKK">Slovak Koruna - Sk</option>
                            <option value="SBD">Solomon Islands Dollar - Si$</option>
                            <option value="SOS">Somali Shilling - Sh.so.</option>
                            <option value="ZAR">South African Rand - R</option>
                            <option value="KRW">South Korean Won - ₩</option>
                            <option value="XDR">Special Drawing Rights - SDR</option>
                            <option value="LKR">Sri Lankan Rupee - Rs</option>
                            <option value="SHP">St. Helena Pound - £</option>
                            <option value="SDG">Sudanese Pound - .س.ج</option>
                            <option value="SRD">Surinamese Dollar - $</option>
                            <option value="SZL">Swazi Lilangeni - E</option>
                            <option value="SEK">Swedish Krona - kr</option>
                            <option value="CHF">Swiss Franc - CHf</option>
                            <option value="SYP">Syrian Pound - LS</option>
                            <option value="STD">São Tomé and Príncipe Dobra - Db</option>
                            <option value="TJS">Tajikistani Somoni - SM</option>
                            <option value="TZS">Tanzanian Shilling - TSh</option>
                            <option value="THB">Thai Baht - ฿</option>
                            <option value="TOP">Tongan pa'anga - $</option>
                            <option value="TTD">Trinidad & Tobago Dollar - $</option>
                            <option value="TND">Tunisian Dinar - ت.د</option>
                            <option value="TRY">Turkish Lira - ₺</option>
                            <option value="TMT">Turkmenistani Manat - T</option>
                            <option value="UGX">Ugandan Shilling - USh</option>
                            <option value="UAH">Ukrainian Hryvnia - ₴</option>
                            <option value="AED">United Arab Emirates Dirham - إ.د</option>
                            <option value="UYU">Uruguayan Peso - $</option>
                            <option value="USD">US Dollar - $</option>
                            <option value="UZS">Uzbekistan Som - лв</option>
                            <option value="VUV">Vanuatu Vatu - VT</option>
                            <option value="VEF">Venezuelan BolÃ­var - Bs</option>
                            <option value="VND">Vietnamese Dong - ₫</option>
                            <option value="YER">Yemeni Rial - ﷼</option>
                            <option value="ZMK">Zambian Kwacha - ZK</option>
                        </select>
                      </div>
                    <div class="form-group col-md-4">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo isset($product->price)?$product->price:'';?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                      <label for="image">Image</label>
                          <input type="file" name="product_image" id="product_image" class="form-control"/>
                          <div class="img-box" id="image-holder">
                          <?php if(!empty($product->product_image)){ ?>
                            <img src="<?php echo base_url('uploads/product_images/'.$product->product_image); ?>" height="100px" width="100px">
                          <?php } ?>
                        </div>
                    </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-12">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="description" name="description" maxlength="250"><?php echo isset($product->description)?$product->description:'';?></textarea>
                      </div>
                    </div>
                    </div>
                  <div class="card-footer">
                    <?php if(!empty($edit_id)){?>
                          <input type="hidden" name="action" value="<?php echo @$edit_id; ?>" >
                         <?php  } else {?>
                          <input type="hidden" name="action" value="create">
                          <?php } ?>
                   <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo isset($edit_id)?'UPDATE':'ADD';?>">
                  </div>
                </form>
                <div class="row">
              <div class="col-12">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Product Image</th>
                            <th>Name</th>
                            <th>Currency</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                         if(isset($products) && is_array($products) && count($products)): $slno=1; 
                          foreach($products as $product) : 
                          ?>
                          <tr>
                           <td><?php echo $slno;?></td>
                           <td><?php if($product['product_image']!=''){ ?>
                            <img src="<?php echo base_url('uploads/product_images/'.$product['product_image']); ?>" width="100px" height="100px">
                          <?php } else { ?>
                            <img src="<?php echo base_url('uploads/product_images/default_product_image.png'); ?>" width="100px" height="100px" >
                          <?php } ?></td>
                           <td><?php echo $product['product_name'];?></td>
                            <td><?php echo $product['currency'];?></td>
                           <td><?php echo $product['price'];?></td>
                           <td><?php echo $product['description'];?></td>
                            <td><a href="<?php echo site_url('products/product_details/'.$product['product_id'])?>" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a> 
                             <a href="<?php echo site_url('products/delete_product/'.$product['product_id'])?>" class="btn btn-icon btn-danger" title="Delete"><i class="fa fa-times"></i></a></td>
                          </tr>
                           <?php  
                          $slno++;
                        endforeach; 
                        else: ?>
                          <tr>
                              <td colspan="3" align="center" >No Records Found..</td>
                          </tr>
                          <?php
                              endif;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              </div>
              </div>
            </section>
          </div>
          
          <script>
      $(document).ready(function() {
        $("#product_image").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });
    </script>
