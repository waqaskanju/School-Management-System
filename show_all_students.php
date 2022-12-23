<!-- This page should be added as iframe to new student addition page -->
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <caption style="caption-side: top">
              <h4>
                <?php echo "Showing Data of
                      Class:$CLASS_SHOW
                      School: $SCHOOL_SHOW";
                ?>
              </h4>
              </caption>
            <tr>
              <td> Roll No </td>
              <td> Name </td>
              <td> Father Name </td>
              <td> Class </td>
              <td> School</td>
            </tr>
            <?php
              $qs="Select * from students_info WHERE
                    Class='".$CLASS_SHOW."'
                    AND
                    school='".$SCHOOL_SHOW."'
                    AND
                    status=1
                    order by Admission_No ASC";
              $qr=mysqli_query($link, $qs)or die('error:'.mysqli_error($link));
            while ($qfa=mysqli_fetch_assoc($qr)) {
                echo  '<tr>
                            <td>'.$qfa['Roll_No']. '</td>
                            <td>'.$qfa['Name']. '</td>
                            <td>'.$qfa['FName']. '</td>
                            <td>'.$qfa['Class'].'</td>
                            <td>'.$qfa['School']. '</td>
                        </tr>';
            }
            ?>
          </table>
        </div>
      </div>