
 <div class="main-content">
        <section class="section">
              <!-- <div class="card-body">
                    <div class="pretty p-default p-curve p-toggle">
                    <div class="pretty p-icon p-toggle p-plain">
                      <input type="checkbox" />
                      <div class="state p-on">
                        <i class="icon material-icons">business</i>
                        <label>Business</label>
                      </div>
                      <div class="state p-off">
                        <i class="icon material-icons">person</i>
                        <label>Personal</label>
                      </div>
                    </div>
                  </div>
              </div> -->
          <div class="row ">
          <div class="col-xl-7 col-lg-7 col-md-12 col-sm-7 col-xs-12">
          <div class="row" style="padding:0 10px;">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-eq">
              <div class="card l-bg-cyan">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Views</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($views_count)?$views_count:'0';?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <p class="mb-0 pd-10"><span class="col-green">10%</span> Increase</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-eq">
              <div class="card l-bg-cyan">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Leads</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($lead_count)?$lead_count:'0';?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <p class="mb-0 pd-10"><span class="col-orange">09%</span> Decrease</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12 pad-eq">
              <div class="card l-bg-cyan">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Enquiries</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($enq_count)?$enq_count:'0';?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <p class="mb-0 pd-10"><span class="col-green">10%</span> Increase</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<div class="col-12 col-md-12 col-lg-12 p-0">
     
                      
        
                <div class="card">
                  <div class="card-header">
                    <h4></h4>
                  </div>
                  <div class="card-body">
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
<div class="col-xl-5 col-lg-5 col-md-12 col-sm-5 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="d-inline">Tasks</h4>
                    <div class="card-header-action">
                      <a href="https://hiconnect.co.in/enquiries/lead_list" class="btn btn-primary">View All</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <?php 
                        foreach($new_activiti as $new)
                        {
                            if($new['type']==2)
                           {
                               $stat="Call";
                           }
                            else if($new['type']==3)
                            {
                              $stat= "Meeting";
                            }
                            else if($new['type']==4)
                            {
                            $stat= "Email";
                            }
                            else if($new['type']==5) 
                            {
                           $stat= "Chat";
                            }
                        ?>
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="<?php echo base_url(); ?>assets/img/users/user-5.png">
                        <div class="media-body">
                          <div class="badge badge-pill badge-danger mb-1 float-right"><?php echo $stat ;?></div>
                          <h6 class="media-title"><a href="#"><?php echo $new['comment'];?></a></h6>
                          <div class="text-small text-muted">Cara Stevens <div class="bullet"></div> <span
                              class="text-primary">Now</span></div>
                        </div>
                      </li>
                     <?php
                        }?>
                     
                    </ul>
                  </div>
                </div>
              </div>	   
          </div>

        </section>
		
     
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
<script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chart-chartjs.js"></script>