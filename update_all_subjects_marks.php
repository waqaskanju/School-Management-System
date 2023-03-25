<?php

/**
 * Update all Subjects Marks
 * php version 8.1
 *
 * @category Exam
 *
 * @package None
 *
 * @author Waqas <waqaskanju@gmail.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/
session_start();
require_once 'db_connection.php';
require_once 'sand_box.php';
require_once 'config.php';
$link=connect();
$mode=$MODE;
if (isset($_GET['submit'])) {
    $roll_no = $_GET['rollno'];
    $q="Select * from marks WHERE Roll_No=$roll_no";
    $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
    $record=mysqli_num_rows($exe);
    if ($record==0) {
        echo 'Roll No Not Found!!';
        exit();
    }

    $exea=mysqli_fetch_assoc($exe);

    $eng_marks=$exea['English_Marks'];
    $urd_marks=$exea['Urdu_Marks'];
    $mat_marks=$exea['Maths_Marks'];
    $hpe_marks=$exea['Hpe_Marks'];
    $naz_marks=$exea['Nazira_Marks'];
    $sci_marks=$exea['Science_Marks'];
    $ara_marks=$exea['Arabic_Marks'];
    $isl_marks=$exea['Islamyat_Marks'];
    $his_marks=$exea['History_Marks'];
    $com_marks=$exea['Computer_Marks'];
    $mut_marks=$exea['Mutalia_Marks'];
    $qir_marks=$exea['Qirat_Marks'];
    $dra_marks=$exea['Drawing_Marks'];
    $soc_marks=$exea['Social_Marks'];
    $pas_marks=$exea['Pashto_Marks'];
    $bio_marks=$exea['Biology_Marks'];
    $che_marks=$exea['Chemistry_Marks'];
    $phy_marks=$exea['Physics_Marks'];
    $roll_no=$exea['Roll_No'];

    $q2="Select * from students_info where Roll_No=$roll_no";
    $exe2=mysqli_query($link, $q2) or die('error'.mysqli_error($link));
    $exea2=mysqli_fetch_assoc($exe2);
    $name=$exea2['Name'];
    $fname=$exea2['FName'];
}

if (isset($_POST['update'])) {
    $roll_no=$_POST['rollno'];
    $eng_marks=$_POST['eng'];
    $urd_marks=$_POST['urd'];
    $mat_marks=$_POST['mat'];
    $hpe_marks=$_POST['hpe'];
    $naz_marks=$_POST['naz'];
    $sci_marks=$_POST['sci'];
    $ara_marks=$_POST['ara'];
    $isl_marks=$_POST['isl'];
    $his_marks=$_POST['his'];
    $com_marks=$_POST['com'];
    $mut_marks=$_POST['mut'];
    $qir_marks=$_POST['qir'];
    $dra_marks=$_POST['dra'];
    $soc_marks=$_POST['soc'];
    $pas_marks=$_POST['pas'];
    $bio_marks=$_POST['bio'];
    $che_marks=$_POST['che'];
    $phy_marks=$_POST['phy'];

    $q="UPDATE marks SET English_Marks = $eng_marks,
                        Urdu_Marks = $urd_marks,
                        Maths_Marks=$mat_marks,
                        Hpe_Marks=$hpe_marks,
                        Nazira_Marks=$naz_marks,
                        Science_Marks=$sci_marks,
                        Arabic_Marks=$ara_marks,
                        Islamyat_Marks=$isl_marks,
                        History_Marks=$his_marks,
                        Computer_Marks=$com_marks,
                        Mutalia_Marks=$mut_marks,
                        Qirat_Marks=$qir_marks,
                        Pashto_Marks=$pas_marks,
                        Social_Marks=$soc_marks,
                        Drawing_Marks=$dra_marks,
                        Biology_Marks=$bio_marks,
                        Chemistry_Marks=$che_marks,
                        Physics_Marks=$phy_marks WHERE Roll_No=$roll_no";

    if ($designation=="SST-IT") {
        $exe=mysqli_query($link, $q) or die('error'.mysqli_error($link));
        if ($exe) {
            echo "$roll_no"." Updated  Successfully";
        } else {
            echo 'error in submit';
        }
    } else {
              echo '<div class="bg-danger text-center"> 
              Not allowed!! Require Permission. 
              </div>';
    }

}
?>

<?php Page_header("Update Marks"); ?>
</head>
<body>
  <div class="text-center bg-warning">
    <h4>Update Marks</h4>
  </div>
  <?php // require_once 'nav.html' ?>
  <small class="container"> Here we have a two step Process 
    <ul>
      <li>Step 1: First type roll no and click on "Load Data" Button.</li>
      <li>Step 2: After marks are show in text boxes ,
        update it to required number, then click on "Update" Button </li>
    </ul>
  </small>
  <p class="text-info font-weight-bold container-fluid">
      Note:Please Enter Roll No To Load Data
  </p>
  <div class="container-fluid">
    <form class="" action="#">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="rollno" class="form-label">Roll No:</label>
          <input type="number" class="form-control" id="rollno"  min="1"
                name="rollno" placeholder="Type roll number" tabindex="1" autofocus
                required>
        </div>
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary btn-md mt-4"
          name="submit" value="Search Roll No">Load Data</button>
      </div>
    </div> <!-- end of row -->
      </form>
    </div> <!-- Container -->

<?php

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
$bio_index=$index_result['Biology'];
$che_index=$index_result['Chemistry'];
$phy_index=$index_result['Physics'];
?>

<div class="container-fluid">
  <form class="" action="#" method="POST">
    <div class="row mt-3">
      <div class="col-md-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" value="
            <?php if (isset($name)) {
                 echo $name;
            } else {
                echo "";
            }  ?>"readonly>
      </div>
      <div class="col-md-3">
        <label for="fname" class="form-label">Father Name:</label>
        <input type="text" value="
            <?php if (isset($fname)) {
                echo $fname;
            } else {
                echo "";
            }
            ?> " readonly>
      </div>
          </div> <!-- End of row -->
      <div class="row mt-3">
        <div class="form-group col-md-3">
          <label for="english" class="form-label">English:</label>
          <input type="number" class="form-control" id="eng" max="100" min="-1"
                value="<?php
                if (isset($eng_marks)) {
                    echo $eng_marks;
                } else {
                    echo "";
                }?>" placeholder="Type english marks" name="eng"
                tabindex="<?php echo $eng_index ?>" required>
        </div>
        <div class="form-group col-md-3">
          <label for="urdu" class="form-label">Urdu:</label>
          <input type="number" class="form-control" id="urd"
          max="100" min="-1" name="urd"
                value="<?php
                if (isset($urd_marks)) {
                    echo $urd_marks;
                } else {
                    echo "";
                } ?>"
                placeholder="type urdu marks" tabindex="<?php echo $urd_index ?>"
                required>
        </div>
          <div class="form-group col-md-3">
            <label for="maths" class="form-label">Maths:</label>
            <input type="number" class="form-control" placeholder="Type maths marks"
            id="mat"
            value="<?php
            if (isset($mat_marks)) {
                echo $mat_marks;
            } else {
                echo "";
            }
            ?>"
                max="100" min="-1" name="mat"
                tabindex="<?php echo $mat_index ?>"  required>
          </div>
          <div class="form-group col-md-3">
            <label for="hpe" class="form-label">HPE:</label>
            <input type="number" class="form-control"
            placeholder="type hpe marks" id="hpe"
                value="<?php
                if (isset($hpe_marks)) {
                    echo $hpe_marks;
                } else {
                    echo "";
                }
                ?>" max="100" min="-1" name="hpe"
                tabindex="<?php echo $hpe_index ?>"  required>
          </div>
        <div> <!-- end of row -->
        <div class="row mt-3"> <!-- -->
          <div class="form-group col-md-3">
            <label for="nazira" class="form-label">Nazira:</label>
            <input type="text" class="form-control"
                   placeholder="type nazira marks" id="nazira"
                value="<?php
                if (isset($naz_marks)) {
                    echo $naz_marks;
                } else {
                    echo "";
                }  ?>"
                max="100" min="-1" name="naz"
                tabindex="<?php echo $naz_index ?> " required>
          </div>
          <div class="form-group col-md-3">
            <label for="science" class="form-label">Science:</label>
            <input type="text" class="form-control"
            placeholder="type science marks"  id="science"
                value="<?php
                if (isset($sci_marks)) {
                    echo $sci_marks;
                } else {
                    echo "";
                }
                ?>"
                max="100" min="-1" name="sci"
                tabindex="<?php echo $sci_index ?>"  required>
          </div>
          <div class="form-group col-md-3">
            <label for="arabic" class="form-label">Arabic:</label>
            <input type="text" class="form-control"
            placeholder="type arabic marks" id="ara"
                value="<?php
                if (isset($ara_marks)) {
                    echo $ara_marks;
                } else {
                    echo "";
                }  ?>"
                max="100" min="-1" name="ara"
                tabindex="<?php echo $ara_index ?>"  required>
          </div>
          <div class="form-group col-md-3">
            <label for="islam" class="form-label">Islamayat:</label>
            <input type="text" class="form-control"
            placeholder="type islam marks" id="islam"
                  value="<?php
                    if (isset($isl_marks)) {
                        echo $isl_marks;
                    } else {
                         echo "";
                    }  ?>"
                  max="100" min="-1" name="isl"
                  tabindex="<?php echo $isl_index ?> " required>
          </div>
        <div> <!-- end of row -->
        <div class="row mt-3">
          <div class="form-group col-md-3">
            <label for="history" class="form-label">History & Geopraphy:</label>
            <input type="text" class="form-control"
            placeholder="type history marks" id="history"
                  value="<?php
                    if (isset($his_marks)) {
                        echo $his_marks;
                    } else {
                        echo "";
                    }  ?>"
                  max="100" min="-1" name="his"
                  tabindex="<?php echo $his_index ?>"
                  required>
          </div>
          <div class="form-group col-md-3">
            <label for="computer" class="form-label">Computer Science:</label>
            <input type="text" class="form-control"
            placeholder="type computer marks" id="computer"
                  value="<?php
                    if (isset($com_marks)) {
                        echo $com_marks;
                    } else {
                        echo "";
                    }  ?>"
                  max="100" min="-1" name="com"
                  tabindex="<?php echo $com_index ?>"  required>
          </div>
          <div class="form-group col-md-3">
            <label for="mutalia" class="form-label">Mutalia Quram:</label>
            <input type="text" class="form-control"
            placeholder="type mutalia quran marks" id="mutalia"
                  value="<?php
                    if (isset($mut_marks)) {
                        echo $mut_marks;
                    } else {
                        echo "";
                    }
                    ?>"
                  max="100" min="-1" name="mut"
                  tabindex="<?php echo $mut_index ?> " required>
          </div>
          <div class="form-group col-md-3">
            <label for="qirat" class="form-label">Qirat:</label>
            <input type="text" class="form-control"
            placeholder="type qirat marks" id="qirat"
                  value="<?php
                    if (isset($qir_marks)) {
                        echo $qir_marks;
                    } else {
                        echo "";
                    }  ?>"
                   max="100" min="-1" name="qir"
                   tabindex="<?php echo $qir_index ?> " required>
          </div>
                  </div> <!-- end of row -->
                  <div class="row mt-3">
          <div class="form-group col-md-3">
            <label for="drawing" class="form-label">Drawing:</label>
            <input type="text" class="form-control"
            placeholder="type drawing marks" id="dra"
                value="<?php
                if (isset($dra_marks)) {
                    echo $dra_marks;
                } else {
                    echo "";
                }  ?>"
                max="100" min="-1" name="dra"
                tabindex="<?php echo $dra_index ?> " required>
          </div>
          <div class="form-group col-md-3">
            <label for="social" class="form-label">Social Study:</label>
            <input type="text" class="form-control"
            placeholder="type social study marks" id="soc"
                value="<?php
                if (isset($soc_marks)) {
                    echo $soc_marks;
                } else {
                    echo "";
                }  ?>"
                max="100" min="-1" name="soc"
                tabindex="<?php echo $soc_index ?> " required>
          </div>
          <div class="form-group col-md-3">
            <label for="pashto" class="form-label">Pashto:</label>
            <input type="text" class="form-control"
             placeholder="type pashto marks" id="pas"
                value="<?php
                if (isset($pas_marks)) {
                    echo $pas_marks;
                } else {
                    echo "";
                }
                ?>"
                max="100" min="-1" name="pas"
                tabindex="<?php echo $pas_index ?> " required>
          </div>
          <div class="form-group col-md-3">
            <label for="bio" class="form-label">Biology:</label>
            <input type="text" class="form-control"
            placeholder="type biology marks" id="bio"
                value="<?php
                if (isset($bio_marks)) {
                    echo $bio_marks;
                } else {
                    echo "";
                }
                ?>"
                max="100" min="-1" name="bio"
                tabindex="<?php echo $bio_index ?> " required>
          </div>
              </div> <!-- end of row -->
          <div class="row mt-3">
          <div class="form-group col-md-3">
            <label for="che" class="form-label">Chemistry:</label>
            <input type="text" class="form-control"
            placeholder="type chemistry marks" id="che"
                value="<?php
                if (isset($che_marks)) {
                    echo $che_marks;
                } else {
                    echo "";
                }  ?>"
                max="100" min="-1" name="che"
                tabindex="<?php echo $che_index ?> " required>
          </div>

          <div class="form-group col-md-3">
            <label for="phy" class="form-label">Physics:</label>
            <input type="text" class="form-control"
            placeholder="type physics marks" id="phy"
                value="<?php
                if (isset($phy_marks)) {
                    echo $phy_marks;
                } else {
                    echo "";
                }
                ?>"
                max="100" min="-1" name="phy"
                tabindex="<?php echo $phy_index ?> " required>
          </div>
      <div> <!-- end of row -->
        </div>
          <input type="hidden" name="rollno"
          value="<?php
            if (isset($roll_no)) {
                echo $roll_no;
            } else {
                echo "";
            }
            ?>">
          <button type="submit" name="update" 
          class="btn btn-primary mt-3 col-sm-2 container">
            Update Marks
          </button>
      </form>


    </div>
  </div>

</div>

<?php

Page_close();



?>
