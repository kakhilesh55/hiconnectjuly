
 <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card l-bg-cyan">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">TOTAL VIEWS</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($views_count)?$views_count:'0';?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card l-bg-cyan">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">TOTAL VIEWS</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($views_count)?$views_count:'0';?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card l-bg-cyan">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">TOTAL VIEWS</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($views_count)?$views_count:'0';?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--<div class="col-xl-9 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card l-bg-green">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-3 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Digital Card Link</h5>
                         	<div class="form-group">
                        		<input type="text" class="form-control" value="<?php echo $this->config->item("front_end_url").$this->session->userdata('card_id')?>" id="myInput">
                      		</div>
	                        <div class="buttons">
                            <button class="btn btn-primary pull-right" onclick="myFunction()">Copy Link</button>
	                  		  </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
        </div>
        </section>
      <div class="row ">
       <div class="col-md-4"></div>
        <div class="col-md-6">
                        <select name="yearr" id="yearr" class="form-control">
                            <option value="">Select Month</option>
                       <option value="01">01</option>
                       <option value="02">02</option>
                       <option value="03">03</option>
                       <option value="04">04</option>
                       <option value="05">05</option>
                       <option value="06">06</option>
                       <option value="07">07</option>
                       <option value="08">08</option>
                       <option value="09">09</option>
                       <option value="10">10</option>
                       <option value="11">11</option>
                       <option value="12">12</option>
                        </select>
                   
        <div class="panel-body">
                <div id="chart_areaa" style="width: 500; height: 420px;"></div>
            </div>
        </div>
        </div>
        
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

google.charts.load('current', {packages:['corechart', 'bar']});
google.charts.setOnLoadCallback();

    
$(document).ready(function(){
    
 const d = new Date();
var yearr = d.getMonth()+1;


     load_monthwise_dataa(yearr, 'Month Wise Orders Data For');
    $('#year').change(function(){
        var year = $(this).val();
        if(year != '')
        {
            load_monthwise_data(year, 'Month Wise Orders Data For');
        }
    });
    $('#yearr').change(function(){
        var yearr = $(this).val();
        if(yearr != '')
        {
            load_monthwise_dataa(yearr, 'Month Wise Users Data For');
        }
    });
});
function load_monthwise_dataa(yearr, title)
{
    alert(yearr);
    var temp_title = title + ' ' + yearr;

    $.ajax({
        url:"<?php echo base_url(); ?>Manage_orders/fetch_dataa1",
        method:"POST",
        data:{yearr:yearr},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChartt(data, temp_title);
        }
    })
}
function drawMonthwiseChartt(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Days');
    data.addColumn('number', 'Count');

    $.each(jsonData, function(i, jsonData){
        var month = jsonData.month;
        var profit = parseFloat($.trim(jsonData.profit));
        data.addRows([[month, profit]]);
    });

    var options = {
        title:chart_main_title,
        hAxis: {
            title: "Days"
        },
        vAxis: {
            title: 'Count'
        },
        chartArea:{width:'80%',height:'85%'}
    }

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_areaa'));

    chart.draw(data, options);
}
</script>
      </div>
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  swal('Copied the text: ' , copyText.value, 'success');
}
</script>