 <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card l-bg-purple">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                       <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pr-0 pt-2">
                        <div class="card-content">
                          <h5 class="font-15">Total Users</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($user_count)?$user_count:'0';?></h2>
                        </div>
                      </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pl-0 pt-1">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card l-bg-orange">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pr-0 pt-2">
                        <div class="card-content">
                          <h5 class="font-15">Total Active Users</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($active_user_count)?$active_user_count:'0';?></h2>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pl-0 pt-1">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card l-bg-purple">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                       <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pr-0 pt-2">
                        <div class="card-content">
                          <h5 class="font-15">Total Orders</h5>
                          <h2 class="mb-3 font-18"><?php echo isset($orders)?$orders:'0';?></h2>
                        </div>
                      </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pl-0 pt-1">
                        <div class="banner-img">
                          <img src="<?php echo base_url(); ?>assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="row ">
         <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <a href="<?php echo base_url(); ?>admin/user" class="btn btn-icon icon-left btn-primary"><i class="far fa-user"></i> Create New User</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>
</div>
        <div class="row ">
        <div class="col-md-6">
                        <select name="year" id="year" class="form-control">
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
                <div id="chart_area" style="width: 500; height: 420px;"></div>
            </div>
        </div>
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
        
        </section>
 
      </div>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

google.charts.load('current', {packages:['corechart', 'bar']});
google.charts.setOnLoadCallback();

function load_monthwise_data(year, title)
{
    alert(year);
    var temp_title = title + ' ' + year;
    $.ajax({
        url:"<?php echo base_url(); ?>Manage_orders/fetch_data",
        method:"POST",
        data:{year:year},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart(data, temp_title);
        }
    })
}

function drawMonthwiseChart(chart_data, chart_main_title)
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

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));

    chart.draw(data, options);
}

</script>

<script>
    
$(document).ready(function(){
   
 const d = new Date();
var year = d.getMonth()+1;

var yearr = d.getMonth()+1;
     load_monthwise_data(year, 'Month Wise Orders Data For');
     load_monthwise_dataa(yearr, 'Month Wise Users Data For');
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
        url:"<?php echo base_url(); ?>Manage_orders/fetch_dataa",
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
