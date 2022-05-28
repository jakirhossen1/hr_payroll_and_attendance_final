      <?php 
    require "connect.php";
     $name=$_REQUEST['dailyAtt'];
    $a="SELECT * FROM employee Where employee_name='$name'";
    $b=mysqli_query($conn, $a);
    while($c=mysqli_fetch_array($b)){
                            
                        ?>
   

      <tr>
    
              <input class="form-control" type="hidden" name="n" id="" value="<?php echo $c['employee_name'];?>">
              <td>
                  <input class="form-control" type="text" name="n" id="" value="<?php echo $c['employee_name'];?>" disabled>

              </td>
              <td>
                  <input class="form-control timepickers" type="time" name="signi" id="">
              </td>
              <td>
                  <input class="form-control timepickers" type="time" name="sinut" id="">
              </td>
              <td>
                  <input class="form-control timepickers" type="time" name="lateCount" id="">
              </td>
              <td>
                  <select class="form-select" name="status" id="">
                      <option value="Present">Present</option>
                      <option value="Absent">Absent</option>
                      <option value="On Leave">On Leave</option>
                  </select>
              </td>

              <td> <input class="btn btn-primary" type="submit" name="attendance" id="" value="Submit"></td>

       

      </tr>
       <?php }?>
       
       
