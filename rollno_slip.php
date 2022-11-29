<?php

/**
 * Print DMC.
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas Ahmad <waqas@waqaskanju.com>
 *
 * @license http://www.abc.com MIT
 *
 * @link None
 **/

// This file is is printing roll no and exam slip.
require_once 'db_connection.php';
require_once 'sand_box.php';
$link=connect();
?>
<form action="#" method="GET">
<div class="form-row no-print">
<?php
  $selected_class='';
  select_class($selected_class);

  select_school($SCHOOL_SHOW);?>
</div>
<button class="no-print" type="submit" name="submit" class="btn btn-primary">
  Submit
</button>

</form>
<?php
if (isset($_GET['submit'])) {
    $class_name=$_GET['class_exam'];
    $class_name=str_replace('\'', '', $class_name);
}
Page_header("Roll No Slip");
?>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if (isset($_GET['class_exam'])) {
    $class=$_GET['class_exam'];

} else {
    $class='6th';
}

$q="SELECT * FROM students_info WHERE Class='$class' AND Status=1";
// Use below if a particular roll no is requred
 //$q="SELECT * FROM students_info where Roll_No=21611";

$qr=mysqli_query($link, $q) or die('Error:'. mysqli_error($link));
while ($qra=mysqli_fetch_assoc($qr)) {
    echo '<div class="same-page">
    <h4>
    Roll no slip annual examination
    2021-22
    under the auspices of Distt: exam committee Swat
    </h4>';
    $Roll_No= $qra['Roll_No'];
    $Name= $qra['Name'];
    $Father_Name=$qra['FName'];
    $Class_Name=$qra['Class'];
    ?>
<table border="1">
            <tr>
              <td>
                    <span class="font-weight-bold"> Roll No </span>
              </td>
              <td> <?php echo $Roll_No;?> </td>
              <td>
                <span class="font-weight-bold"> Name </span>
                </td>
                <td> <?php echo $Name;  ?> </td>
              <td>
                <span class="font-weight-bold">
                    Father's Name </span></td>
                    <td> <?php echo $Father_Name;  ?></td>
              <td>
                <span class="font-weight-bold"> Class </span></td>
                <td><?php echo $Class_Name;  ?></td>
            </tr>
<tr>
<td><span class="font-weight-bold">
    1st paper Time </span></td>
    <td colspan="3">08:00 AM</td>
<td> <span class="font-weight-bold">
    2nd Paper Time </span></td>
    <td colspan="3">11:00 AM</td>
</tr>
</table>

<table border="1" class="m-b-4">
<tr>
            <th colspan="19">
                Date Sheet Class <?php  echo $class; ?> GHSS CHITOR </th>
        </tr>
<tr>
            <td> Days </td>
            <td colspan="2"> Saturday </td>
            <td colspan="2"> Monday </td>
            <td colspan="2"> Tuesday </td>
            <td colspan="2"> Wednesday </td>
            <td colspan="2"> Thursday </td>
            <td colspan="2"> Friday </td>
            <td colspan="2"> Saturday </td>
            <td colspan="2"> Monday </td>
            <td colspan="2"> Tuesday</td>
</tr>
<tr>
    <td> Date </td>
     <!-- day 1 -->
    <td colspan="2"> 18-06-2022 </td>
     <!-- day 2 -->
    <td colspan="2"> 20-06-2022 </td>
     <!-- day 3 -->
    <td colspan="2"> 21-06-2022 </td>
     <!-- day 4 -->
    <td colspan="2"> 22-06-2022 </td>
     <!-- day 5 -->
    <td colspan="2"> 23-06-2022 </td>
     <!-- day 6 -->
    <td colspan="2"> 24-06-2022 </td>
     <!-- day 7 -->
    <td colspan="2"> 25-06-2022 </td>
     <!-- day 8 -->
    <td colspan="2"> 27-06-2022 </td>
     <!-- day 9-->
    <td colspan="2"> 28-06-2022 </td>
</tr>
<tr>
    <td>Class </td>
     <!--day 1  -->
    <td> 1 </td> <td> II </td>
    <!-- day 2 -->
    <td> 1 </td> <td> II </td>
    <!-- day 3 -->
     <td> 1 </td> <td> II </td>
     <!-- day 4 -->
     <td> 1 </td> <td> II </td>
      <!-- day 5 -->
     <td> 1 </td>
     <td> II </td>
 <!-- day 6 -->
     <td> 1 </td>
     <td> II </td>
 <!-- day 7 -->
     <td> 1 </td>
     <td> II </td>
 <!-- day 8 -->
      <td> 1 </td>
      <td> II </td>
 <!-- day 9 -->
      <td> 1 </td>
      <td> II </td>
</tr>
    <?php
    if ($Class_Name=="6th") {
        ?>
    <tr>
         <td> 6th </td>
         <td> Urdu </td>
         <td> Arabic </td>
         <td> General Science </td>
         <td>--- </td>
          <td> Maths </td>
          <td> --- </td>
           <td> Islamyat </td>
           <td> Nazira </td>
            <td> English </td>
            <td> HPE </td>
             <td> History / Geography </td>
             <td> ---  </td>
              <td> Qirat </td>
              <td> --- </td>
              <td> Computer Science </td>
              <td> Mutalia Quran </td>
               <td> Drawing </td>
               <td> --- </td>
            </tr>
        <?php
    }
    if ($Class_Name=="7th" || $Class_Name=="7th A" || $Class_Name=="7th B") {
        ?>
    <tr>
        <td> 7th </td>
         <td> Islamyat </td>
         <td> Mutalia Quran </td>
          <td> Maths </td>
          <td>Nazira </td>
           <td> English </td>
           <td> HPE </td>
           <td> Urdu </td>
           <td> --- </td>
           <td> Computer Science </td>
           <td> --- </td>
           <td> General Science </td>
           <td> ---  </td>
           <td> History / Geography </td>
           <td> --- </td>
           <td> Arabic </td>
           <td> Drawing </td>
           <td> Qirat </td>
           <td> --- </td>
        </tr>
        <?php
    }
    if ($Class_Name=="8th") {
        ?>
    <tr>
        <td> 8th </td>
        <td> General Science </td>
        <td> HPE </td>
         <td> English </td>
         <td>--- </td>
         <td> Urdu </td>
         <td> Nazira </td>
          <td> Maths </td>
          <td> --- </td>
           <td> History / Geography </td>
           <td> Drawing </td>
            <td> Islamyat </td>
            <td> ---  </td>
             <td> Computer Science </td>
             <td> Arabic </td>
             <td> Qirat </td>
             <td> --- </td>
             <td> Mutalia Quran </td>
             <td> --- </td>
            </tr>
        <?php
    }
    if ($Class_Name=="9th" || $Class_Name=="9th A" || $Class_Name=="9th B") {
        ?>
    <tr>
        <td> 8th </td>
        <td> General Science </td>
        <td> HPE </td>
         <td> English </td>
         <td>--- </td>
         <td> Urdu </td>
         <td> Nazira </td>
          <td> Maths </td>
          <td> --- </td>
           <td> History / Geography </td>
           <td> Drawing </td>
            <td> Islamyat </td>
            <td> ---  </td>
             <td> Computer Science </td>
             <td> Arabic </td>
             <td> Qirat </td>
             <td> --- </td>
             <td> Mutalia Quran </td>
             <td> --- </td>
            </tr>
        <?php
    }
    if ($Class_Name=="10th" || $Class_Name=="10th A" || $Class_Name=="10th B") {
        ?>
    <tr>
        <td> 8th </td>
        <td> General Science </td>
        <td> HPE </td>
         <td> English </td>
         <td>--- </td>
         <td> Urdu </td>
         <td> Nazira </td>
          <td> Maths </td>
          <td> --- </td>
           <td> History / Geography </td>
           <td> Drawing </td>
            <td> Islamyat </td>
            <td> ---  </td>
             <td> Computer Science </td>
             <td> Arabic </td>
             <td> Qirat </td>
             <td> --- </td>
             <td> Mutalia Quran </td>
             <td> --- </td>
            </tr>
        <?php
    }

    ?>
</table>

    <?php
    echo '</div>';
}
?>



</body>
</html>
