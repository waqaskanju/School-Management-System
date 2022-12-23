<!-- This page show be added as iframe to all subject marks page. -->
<div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <?php
          $start_rollno=300;
          $end_rollno=327;
        ?>
        <caption style="caption-side:top">
          <h5>
            <?php echo  "Showing last Ten Records from Marks Table" ?>
          </h5>
        </caption>
        <tr>
          <td>Roll No</td>
          <td>English</td>
          <td>Urdu</td>
          <td>Maths</td>
          <td>Hpe</td>
          <td>Nazira</td>
          <td>Science</td>
          <td>Arabic</td>
          <td>Islamyat</td>
          <td>History</td>
          <td>Computer</td>
          <td>Mutalia Quran</td>
          <td>Qirat</td>
          <td>Drawing</td>
          <td>Social Study</td>
          <td>Pashto</td>
          <td>Biology</td>
          <td>Chemistry</td>
          <td>Physics</td>
        </tr>
         <?php
            $qs="Select * from marks order by Serial_No DESC LIMIT 10";
            $qr=mysqli_query($link, $qs) or die('error:'.mysqli_error($link));
            while ($qfa=mysqli_fetch_assoc($qr)) {
                 echo
                  '<tr>
                    <td>'.$qfa['Roll_No'].'</td>
                    <td>'.$qfa['English_Marks'].'</td>
                    <td>'.$qfa['Urdu_Marks'].'</td>
                    <td>'.$qfa['Maths_Marks'].'</td>
                    <td>'.$qfa['Hpe_Marks'].'</td>
                    <td>'.$qfa['Nazira_Marks'].'</td>
                    <td>'.$qfa['Science_Marks'].'</td>
                    <td>'.$qfa['Arabic_Marks'].'</td>
                    <td>'.$qfa['Islamyat_Marks'].'</td>
                    <td>'.$qfa['History_Marks'].'</td>
                    <td>'.$qfa['Computer_Marks'].'</td>
                    <td>'.$qfa['Mutalia_Marks'].'</td>
                    <td>'.$qfa['Qirat_Marks'].'</td>
                    <td>'.$qfa['Drawing_Marks'].'</td>
                    <td>'.$qfa['Social_Marks'].'</td>
                    <td>'.$qfa['Pashto_Marks'].'</td>
                    <td>'.$qfa['Biology_Marks'].'</td>
                    <td>'.$qfa['Chemistry_Marks'].'</td>
                    <td>'.$qfa['Physics_Marks'].'</td>
                  </tr>';
            }
            ?>
      </table>
    </div>
  </div>