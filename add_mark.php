<?php
/**
 * Add Marks of Students
 * php version 8.1
 *
 * @category Adfsad
 *
 * @package Adf
 *
 * @author Khan <abc@examp.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link Adfas
 **/
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();
if (isset($_GET['submit'])) {
    $roll_no=$_GET['rollno'];
    /* Urdu */
    $urd_marks=$_GET['urd'];
    /* Arabic */
    $ara_marks=$_GET['ara'];
    /* Science */
    $sci_marks=$_GET['sci'];
    /* Maths */
    $mat_marks=$_GET['mat'];
    /* Islamayat */
    $isl_marks=$_GET['isl'];
    /* Nazira */
    $naz_marks=$_GET['naz'];
    /* English */
    $eng_marks=$_GET['eng'];
    /* HPE */
    $hpe_marks=$_GET['hpe'];
    /* History and Geopraphy */
    $his_marks=$_GET['his'];
    /* Qirat */
    $qir_marks=$_GET['qir'];
    /* Computer Science */
    $csc_marks=$_GET['csc'];
    /* Mutaliq Quran */
    $mqu_marks=$_GET['mqu'];
    /* Drawing */
    $dra_marks=$_GET['dra'];
    /* Social Study */
    $soc_marks=$_GET['soc'];
    /* Pashto */
    $pas_marks=$_GET['pas'];


    $q="INSERT INTO marks (
  Roll_No,
  English_Marks,
  Urdu_Marks,
  Maths_Marks,
  Science_Marks,
  Arabic_Marks,
  Islamyat_Marks,
  Nazira_Marks,
  Hpe_Marks,
  History_Marks,
  Qirat_Marks,
  Computer_Marks,
  Mutalia_Marks,
  Drawing_Marks,
  Social_Marks,
  Pashto_Marks) VALUES
  ('$roll_no',
  '$eng_marks',
  '$urd_marks',
  '$mat_marks',
  '$sci_marks',
  '$ara_marks',
  '$isl_marks',
  '$naz_marks',
  '$hpe_marks',
  '$his_marks',
  '$qir_marks',
  '$csc_marks',
  '$mqu_marks',
  '$dra_marks',
  '$soc_marks',
  '$pas_marks')";
    $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
    if ($exe) {
           echo
           "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>
                 &times;</a>
              <strong>Success!</strong> $roll_no   Added Successfully.
            </div>";
    } else {
        echo 'error in submit';
    }
}
?>
<?php
/* Tab index block  */
$query_index="SELECT * FROM tab_index";
$execute_index=mysqli_query($link, $query_index) or die('error'.mysqli_error($link));
$index_result=mysqli_fetch_assoc($execute_index);
$eng_index=$index_result['English'];
$urd_index=$index_result['Urdu'];
$mat_index=$index_result['Maths'];
$hpe_index=$index_result['Hpe'];
$naz_index=$index_result['Nazira'];
$sci_index=$index_result['Science'];
$ara_index=$index_result['Arabic'];
$isl_index=$index_result['Islamyat'];
$his_index=$index_result['History'];
$com_index=$index_result['Computer'];
$mut_index=$index_result['Mutalia'];
$qir_index=$index_result['Qirat'];
$dra_index=$index_result['Drawing'];
$pas_index=$index_result['Pashto'];
$soc_index=$index_result['Social'];
?>

<?php page_header("Add Marks"); ?>
</head>
<body>
  <div class="bg-warning text-center">
    <h4>Enter Marks</h4>
  </div>
  <?php require_once 'nav.php';?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="" action="#">
        <div class="form-group">
          <p class="p-2 text-primary font-weight-bold">
            Note: Please Enter Roll No, Make sure this Roll No is
            already registered in students page,
            other wise it will not work. </p>
          <label for="rollno">Roll No:</label>
          <span id="aj_result" class="text-danger"></span>
          <input type="number" class="form-control" id="rollno"  min="1"
          name="rollno" tabindex="1" placeholder="type roll no"
          autofocus required onfocusout="check_roll_no_marks()">
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
          <label for="english">English:</label>
          <input type="number" class="form-control" id="english" max="100" min="0" name="eng" value="0" placeholder="type english marks" tabindex="<?php echo $eng_index ?>"  required>
          </div>
          <div class="form-group col-md-3">
            <label for="urdu">Urdu:</label>
            <input type="number" class="form-control" id="urdu" max="100" min="0" name="urd" value="0" placeholder="type urdu marks" tabindex="<?php echo $urd_index ?>" required>
          </div>
            <div class="form-group col-md-3">
              <label for="maths">Maths:</label>
              <input type="text" class="form-control" placeholder="type maths marks" id="maths" max="100" min="0" value="0" name="mat" tabindex="<?php echo $mat_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="hpe">HPE:</label>
              <input type="text" class="form-control" id="hpe" max="100" min="0" name="hpe" value="0" placeholder="type hpe marks" tabindex="<?php echo $hpe_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="nazira">Nazira:</label>
              <input type="text" class="form-control" id="nazira" max="100" min="0" name="naz" value="0" placeholder="type nazira marks" tabindex="<?php echo $naz_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="science">Science:</label>
              <input type="text" class="form-control" id="science" max="100" min="0"  name="sci" value="0" placeholder="type science marks" tabindex="<?php echo $sci_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="arabic">Arabic:</label>
              <input type="text" class="form-control" id="arabic" max="100" min="0" name="ara" value="0" placeholder="type arabic marks" tabindex="<?php echo $ara_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="islamyat">Islamyat:</label>
              <input type="text" class="form-control" id="islamyat" max="100" min="0" name="isl" value="0" placeholder="type islamyat marks" tabindex="<?php echo $isl_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="history">History & Geopraphy:</label>
              <input type="text" class="form-control" id="history" max="100" min="0" name="his" value="0" placeholder="type history and geography marks" tabindex="<?php echo $his_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="cs">Computer Science:</label>
              <input type="text" class="form-control" id="cs" max="100" min="0" name="csc" value="0" placeholder="type computer science marks" tabindex="<?php  echo$com_index ?> "required>
            </div>
            <div class="form-group col-md-3">
              <label for="mutalia">Mutalia Quran:</label>
              <input type="text" class="form-control" id="mutalia" max="100" min="0" name="mqu" value="0" placeholder="type mutalia Quran marks" tabindex="<?php echo $mut_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="qirat">Qirat:</label>
              <input type="text" class="form-control" id="qirat" max="100" min="0" name="qir" value="0" placeholder="type qirat marks" tabindex="<?php echo $qir_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="drawing">Drawing:</label>
              <input type="text" class="form-control" id="drawing" max="100" min="0" name="dra" value="0" placeholder="type drawing marks" tabindex="<?php echo $dra_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="social">Social Study:</label>
              <input type="text" class="form-control" id="social" max="100" min="0" name="soc" value="0" placeholder="type social study marks" tabindex="<?php echo $soc_index ?>" required>
            </div>
            <div class="form-group col-md-3">
              <label for="pashto">Pashto:</label>
              <input type="text" class="form-control" id="pashto" max="100" min="0" name="pas" value="0" placeholder="type pashto marks" tabindex="<?php echo $pas_index ?>" required>
            </div>
        </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <?php
          $start_rollno=300;
          $end_rollno=327;
        ?>
        <caption style="caption-side:top"> <h5> <?php echo  "Showing last Ten Records from Marks Table" ?></h5></caption>
        <tr> <td> Roll No </td> <td> English </td> <td> Urdu </td> <td> Maths </td><td> Hpe </td><td> Nazira </td><td> Science </td><td> Arabic </td>
              <td> Islamyat </td><td> History </td><td> Computer </td><td> Mutalia Quran </td><td> Qirat </td><td> Drawing </td><td> Social Study </td><td> Pashto </td> </tr>
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
                  </tr>';
            }
            ?>
      </table>
    </div>
  </div>
</div>
<?php page_close(); ?>
