<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/print.css">
  <title>Doctor's Biometric</title>

</head>

<body>

  <div class="btn-container">
    <button class="form__btn" id="print">Print</button>
    <a href="<?php echo URLROOT;?>" class="form__btn back">Back</a>
  </div>
  

    
    <?php foreach($data['dtr'] as $userID => $userData):?>
        
        
    <div class="print-container">

      <div class="card dtr">
        <div class="content">
          <div class="img-holder">
            <img src="<?php echo URLROOT; ?>/public/img/eac.png" alt="">
          </div>

        </div>
        <div class="align-text-center">
          <h3>Emilio Aguinaldo College Medical Center - Cavite</h3>
        </div>
        <div class="center">
          <p>Automated Monitoring System</p>
          <h4>EMPLOYEE DETAILED TIME IN/OUT TRAILS</h4>

        </div>


        <div class="space-round">
          <p>Period</p>
          <?php $dateFormatted = formatDate($data['startDate'], $data['endDate']); ?>

          <p><?php echo $dateFormatted; ?></p>
        </div>

        <table class="tbl-class" border="1" style="width:460px;">
          <tr>
            <th class="th-head">EMPLOYEE NAME</th>
            <th class="th-head">EMPLOYEE ID</th>
            <th class="th-head">POSITION</th>
            <th class="th-head">REG. SCHEDULE</th>
          </tr>
          
          <tr>
            
            <td class="td-class" data-cell="EMPLOYEE NAME"><?php echo $userData['doctorName'][0]->EMPNAME; ?></td>
            <td class="td-class" data-cell="EMPLOYEE ID"><?php echo $userData['doctorName'][0]->BNo; ?></td>
            <td class="td-class" data-cell="POSITION"><?php echo $userData['doctorName'][0]->POSITION; ?></td>
            <td class="td-class" data-cell="REG. SCHEDULE"></td>
            
          </tr>
          
        </table>
        

        <table border="1">
          <tr>
            <th rowspan="2">Day</th>
            <th colspan="2">Morning</th>
            <th colspan="2">Afternoon</th>
            <th colspan="2">Evening</th>
          </tr>
          <tr>
            <th>IN</th>
            <th>OUT</th>
            <th>IN</th>
            <th>OUT</th>
            <th>IN</th>
            <th>OUT</th>
          </tr>
          <tr>
            <?php 
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['16']['in'])? $userData['checkInOutTimes']['16']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['16']['out'])? $userData['checkInOutTimes']['16']['out']:'');
                        $in_period = '';
                        $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
                    }
                    
            
            ?>
                <th>16</th>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['16']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['16']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['16']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['16']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['16']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['16']['out']:''; ?></td>
          </tr>
          <tr>
            <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['01']['in'])? $userData['checkInOutTimes']['01']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['01']['out'])? $userData['checkInOutTimes']['01']['out']:'');
                    }
                    
                
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['17']['in'])? $userData['checkInOutTimes']['17']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['17']['out'])? $userData['checkInOutTimes']['17']['out']:'');
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>


                <th>1/17</th>
                <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['01']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['01']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['01']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['01']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['01']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['01']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['17']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['17']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['17']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['17']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['17']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['17']['out']:''; ?></td>
                <?php endif;?>
                
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['02']['in'])? $userData['checkInOutTimes']['02']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['02']['out'])? $userData['checkInOutTimes']['02']['out']:'');
                    }
                    
                
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['18']['in'])? $userData['checkInOutTimes']['18']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['18']['out'])? $userData['checkInOutTimes']['18']['out']:'');
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>





                <th>2/18</th>
                <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['02']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['02']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['02']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['02']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['02']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['02']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['18']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['18']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['18']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['18']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['18']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['18']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['03']['in'])? $userData['checkInOutTimes']['03']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['03']['out'])? $userData['checkInOutTimes']['03']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['19']['in'])? $userData['checkInOutTimes']['19']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['19']['out'])? $userData['checkInOutTimes']['19']['out']:'');
                        
                    }
                    
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                      if (date('a', $in) == 'am') {
                          $in_period = 'morning';
                      } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                          $in_period = 'afternoon';
                      } else {
                          $in_period = 'evening';
                      }
                      
                    }
                    if ($out) {
                        if (date('a', $out) == 'am') {
                            $out_period = 'morning';
                        } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                            $out_period = 'afternoon';
                        } else {
                            $out_period = 'evening';
                        }
                    }
              
              
              ?>


                

                <th>3/19</th>
                <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['03']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['03']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['03']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['03']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['03']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['03']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['19']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['19']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['19']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['19']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['19']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['19']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['04']['in'])? $userData['checkInOutTimes']['04']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['04']['out'])? $userData['checkInOutTimes']['04']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['20']['in'])? $userData['checkInOutTimes']['20']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['20']['out'])? $userData['checkInOutTimes']['20']['out']:'');
                        
                    }
                    
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              ?>





            <th>4/20</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['04']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['04']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['04']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['04']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['04']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['04']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['20']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['20']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['20']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['20']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['20']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['20']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['05']['in'])? $userData['checkInOutTimes']['05']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['05']['out'])? $userData['checkInOutTimes']['05']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['21']['in'])? $userData['checkInOutTimes']['21']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['21']['out'])? $userData['checkInOutTimes']['21']['out']:'');
                        
                    }
                    
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              ?>



            <th>5/21</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['05']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['05']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['05']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['05']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['05']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['05']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['21']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['21']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['21']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['21']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['21']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['21']['out']:''; ?></td>
                <?php endif;?>
          </tr>

          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['06']['in'])? $userData['checkInOutTimes']['06']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['06']['out'])? $userData['checkInOutTimes']['06']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['22']['in'])? $userData['checkInOutTimes']['22']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['22']['out'])? $userData['checkInOutTimes']['22']['out']:'');
                        
                    }
                    
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>
          <tr>
            <th>6/22</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['06']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['06']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['06']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['06']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['06']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['06']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['22']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['22']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['22']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['22']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['22']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['22']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['07']['in'])? $userData['checkInOutTimes']['07']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['07']['out'])? $userData['checkInOutTimes']['07']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['23']['in'])? $userData['checkInOutTimes']['23']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['23']['out'])? $userData['checkInOutTimes']['23']['out']:'');
                        
                    }
                    
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>

            <th>7/23</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['07']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['07']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['07']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['07']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['07']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['07']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['23']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['23']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['23']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['23']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['23']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['23']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['08']['in'])? $userData['checkInOutTimes']['08']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['08']['out'])? $userData['checkInOutTimes']['08']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['24']['in'])? $userData['checkInOutTimes']['24']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['24']['out'])? $userData['checkInOutTimes']['24']['out']:'');
                        
                    }
                    
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>




            <th>8/24</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['08']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['08']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['08']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['08']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['08']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['08']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['24']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['24']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['24']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['24']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['24']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['24']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['09']['in'])? $userData['checkInOutTimes']['09']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['09']['out'])? $userData['checkInOutTimes']['09']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['25']['in'])? $userData['checkInOutTimes']['25']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['25']['out'])? $userData['checkInOutTimes']['25']['out']:'');
                        
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>

            <th>9/25</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['09']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['09']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['09']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['09']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['09']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['09']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['25']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['25']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['25']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['25']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['25']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['25']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['10']['in'])? $userData['checkInOutTimes']['10']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['10']['out'])? $userData['checkInOutTimes']['10']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['26']['in'])? $userData['checkInOutTimes']['26']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['26']['out'])? $userData['checkInOutTimes']['26']['out']:'');
                        
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>


            <th>10/26</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['10']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['10']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['10']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['10']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['10']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['10']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['26']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['26']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['26']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['26']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['26']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['26']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['11']['in'])? $userData['checkInOutTimes']['11']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['11']['out'])? $userData['checkInOutTimes']['11']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['27']['in'])? $userData['checkInOutTimes']['27']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['27']['out'])? $userData['checkInOutTimes']['27']['out']:'');
                        
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>


            <th>11/27</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['11']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['11']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['11']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['11']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['11']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['11']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['27']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['27']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['27']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['27']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['27']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['27']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['12']['in'])? $userData['checkInOutTimes']['12']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['12']['out'])? $userData['checkInOutTimes']['12']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['28']['in'])? $userData['checkInOutTimes']['28']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['28']['out'])? $userData['checkInOutTimes']['28']['out']:'');
                        
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>
            <th>12/28</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['12']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['12']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['12']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['12']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['12']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['12']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['28']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['28']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['28']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['28']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['28']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['28']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['13']['in'])? $userData['checkInOutTimes']['13']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['13']['out'])? $userData['checkInOutTimes']['13']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['29']['in'])? $userData['checkInOutTimes']['29']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['29']['out'])? $userData['checkInOutTimes']['29']['out']:'');
                        
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>
            <th>13/29</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['13']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['13']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['13']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['13']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['13']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['13']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['29']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['29']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['29']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['29']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['29']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['29']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['14']['in'])? $userData['checkInOutTimes']['14']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['14']['out'])? $userData['checkInOutTimes']['14']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['30']['in'])? $userData['checkInOutTimes']['30']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['30']['out'])? $userData['checkInOutTimes']['30']['out']:'');
                        
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>
            <th>14/30</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['14']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['14']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['14']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['14']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['14']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['14']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['30']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['30']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['30']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['30']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['30']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['30']['out']:''; ?></td>
                <?php endif;?>
          </tr>
          <tr>
          <?php 
                    
                    if(formatDateToDay($data['startDate']) == 01){
                        $in = strtotime(isset($userData['checkInOutTimes']['15']['in'])? $userData['checkInOutTimes']['15']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['15']['out'])? $userData['checkInOutTimes']['15']['out']:'');
                    }
                    
                    
                    if(formatDateToDay($data['startDate']) == 16){
                        $in = strtotime(isset($userData['checkInOutTimes']['31']['in'])? $userData['checkInOutTimes']['31']['in']:'');
                        $out = strtotime(isset($userData['checkInOutTimes']['31']['out'])? $userData['checkInOutTimes']['31']['out']:'');
                        
                    }
                    $in_period = '';
                    $out_period = '';
                    if ($in) {
                        if (date('a', $in) == 'am') {
                            $in_period = 'morning';
                        } elseif (date('a', $in) == 'pm' && (date('h', $in) < 6 || (date('h', $in) === 6 && date('i', $in) === '00'))) {
                            $in_period = 'afternoon';
                        } else {
                            $in_period = 'evening';
                        }
                        
                      }
                      if ($out) {
                          if (date('a', $out) == 'am') {
                              $out_period = 'morning';
                          } elseif (date('a', $out) == 'pm' && (date('h', $out) < 6 || (date('h', $out) === 6 && date('i', $out) === '00'))) {
                              $out_period = 'afternoon';
                          } else {
                              $out_period = 'evening';
                          }
                      }
              
              
              ?>
            <th>15/31</th>
            <?php if(formatDateToDay($data['startDate']) == 01):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['15']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['15']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['15']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['15']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['15']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['15']['out']:''; ?></td>
                <?php endif;?>
                <?php if(formatDateToDay($data['startDate']) == 16):?>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='morning' ? $userData['checkInOutTimes']['31']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period == 'morning' ? $userData['checkInOutTimes']['31']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='afternoon' ? $userData['checkInOutTimes']['31']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='afternoon' ? $userData['checkInOutTimes']['31']['out']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($in) && $in_period =='evening' ? $userData['checkInOutTimes']['31']['in']:''; ?></td>
                <td style="width: 16.67%;"><?php echo isset($out) && $out_period =='evening' ? $userData['checkInOutTimes']['31']['out']:''; ?></td>
                <?php endif;?>
          </tr>

          <!-- Repeat for other rows -->
        </table>
        <div class="sometext">
                <div class="signature">
                    <div class="wrap">
                        <input type="text" class="form_input">
                        <p>Department Head</p>
                    </div>
                    <div class="wrap">
                        <input type="text" class="form_input">
                        <p>Employee Signature</p>
                    </div>
                </div>
        </div>

      </div>

      
    </div>
 
    
    <div class="breaker"></div>

    <?php endforeach;?>
   
    






  <script src="<?php echo URLROOT; ?>/public/javascript/html2canvas.js"></script>
  <script src="<?php echo URLROOT; ?>/public/javascript/print.js"></script>

</body>

</html>