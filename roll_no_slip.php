<?php

/**
 * Roll No Slip
 * php version 8.1
 *
 * @category Student
 *
 * @package None
 *
 * @author Waqas Ahmad <waqas@waqaskanju.com>
 *
 * @license http://www.waqaskanju.com/license MIT
 *
 * @link http://www.waqaskanju.com/
 **/

// This file is is printing roll no and exam slip.
require_once 'sand_box.php';
$link=$LINK;
?>
<div class="container-fluid">
    <form action="#" method="GET">
    <div class="row no-print">
        <?php
        $selected_class=$CLASS_NAME;
        $selected_school=$SCHOOL_NAME;
        Select_class($selected_class);
        Select_school($selected_school);
        ?>
    </div>
<button class="no-print btn btn-primary mt-3"  type="submit" name="submit">
  Submit
</button>

</form>
<?php
if (isset($_GET['submit'])) {
    $class=$_GET['class_exam'];
    $class=Validate_input($class);
} else {
    $class=$CLASS_NAME;
}
Page_header("Roll No Slip");
?>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
$q="SELECT * FROM students_info
WHERE Class='$class'
AND Status=1 order by Roll_No ASC";
// Use below if a particular roll no is requred
 //$q="SELECT * FROM students_info where Roll_No=21611";

$qr=mysqli_query($link, $q) or die('Error:'. mysqli_error($link));
while ($qra=mysqli_fetch_assoc($qr)) {
    echo '<div class="same-page">
    <h4>';
    echo  $header_for_roll_no_slip;
    echo '</h4>';
    $Roll_No= $qra['Roll_No'];
    $Name= $qra['Name'];
    $Father_Name=$qra['FName'];
    $Class_Name=$qra['Class'];
    $Dob=$qra['Dob'];
    ?>
<table border="1" class="roll_no_slip">
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
                <td>
                <span class="font-weight-bold"> Dob </span></td>
                <td><?php echo Change_Date_To_Pak_format($Dob);  ?></td>
            </tr>
<tr>
<td><span class="font-weight-bold">
    1st paper Time </span></td>
    <td colspan="2">08:00 AM</td>
 <td> <span class="font-weight-bold">
    2nd Paper Time </span></td>
    <td colspan="2">11:00 AM</td>
    <!-- <td> <span class="font-weight-bold">
    3rd Paper Time </span></td>
    <td colspan="3">01:00 PM</td> -->
</tr>
</table>

<table border="1" class="m-b-4  roll_no_slip">
<tr>
            <th colspan="19">
                Date Sheet Class
                <?php  echo $class; echo $sub_header_for_roll_no_slip ; ?> </th>
        </tr>
<tr>
            <td> Days </td>
            <td colspan="2"> Saturday </td>
            <td colspan="2"> Monday </td>
            <td colspan="2"> Tuesday </td>
            <td colspan="2"> Wednesday </td>
            <td colspan="2"> Thursday </td>
            <td colspan="2"> Friday </td>
            <td colspan="2"> Monday </td>
            <td colspan="2"> Tuesday </td>
            <!-- <td colspan="2"> Saturday </td> -->

</tr>
<tr>
    <td> Date </td>
     <!-- day 1 -->
    <td colspan="2"> 16-03-2023 </td>
     <!-- day 2 -->
    <td colspan="2"> 18-03-2023 </td>
     <!-- day 3 -->
    <td colspan="2"> 19-03-2023 </td>
     <!-- day 4 -->
     <td colspan="2"> 20-03-2023 </td>
     <!-- day 5-->
     <td colspan="2"> 21-03-2023 </td>
     <!-- day 6 -->
     <td colspan="2"> 22-03-2023 </td>
     <!-- day 7-->
     <td colspan="2"> 25-03-2023 </td>
     <!-- day 8-->
     <td colspan="2"> 26-03-2023 </td>
     <!-- day 9 -->
     <!-- day 10 -->
     <!-- <td colspan="2"> 25-03-2023 </td> -->
</tr>
 <tr>
    <td>Class </td>
     <!--day 1  -->
     <td> 1 </td><td> II </td>
    <!-- day 2 -->
   <td> 1 </td>  <td> II </td>
    <!-- day 3 -->
    <td> 1 </td> <td> II </td>
    <!-- day 4 -->
      <td> 1 </td><td> II </td>
      <!-- day 5 -->
     <td> 1 </td> <td> II </td>
     <!-- day 6 -->
     <td> 1 </td> <td> II </td>
     <!-- day 7 -->
     <td> 1 </td> <td> II </td>
     <!-- day 8 -->
      <td> 1 </td> <td> II </td>

</tr>
    <?php
    if ($Class_Name=="6th" || $Class_Name=="6th A" || $Class_Name=="6th B") {
        ?>
    <tr>
         <td> 6th </td>
         <td> History / Geography </td>
         <td> -- </td>
         <td> General Science </td>
         <td>-- </td>
          <td> Computer Science </td>
          <td> --- </td>
           <td> Maths </td>
           <td> ---- </td>
            <td> Pashto </td>
            <td> ---- </td>
            <td> English </td>
            <td> ---- </td>
            <td> Islamiyat </td>
            <td>Mutalia Quran</td>
            <td> Urdu </td>
            <td>-- --</td>
            </tr>
        <?php
    }
    if ($Class_Name=="7th" || $Class_Name=="7th A" || $Class_Name=="7th B") {
        ?>
    <tr>
        <td> 7th </td>
        <td> Islamyat </td>
         <td> -- </td>
         <td> English </td>
         <td> --- </td>
          <td> Mutalia Quran </td>
          <td> --- </td>
           <td> Urdu </td>
           <td> ---- </td>
            <td> G Science </td>
            <td> ---- </td>
            <td> Maths</td>
            <td> --- </td>
            <td> History / Geography </td>
            <td> -- --</td>
            <td>Computer Science</td>
            <td> --- </td>

        </tr>
        <?php
    }
    if ($Class_Name=="8th") {
        ?>
    <tr>
        <td> 8th </td>
        <td> Urdu </td>
         <td>-- </td>
         <td>Maths </td>
         <td>-- -- </td>
          <td>History / Geography </td>
          <td> -- --</td>
           <td>English </td>
           <td> ---- </td>
            <td>Computer Science </td>
            <td> -- </td>
            <td>General Science</td>
            <td>-- --</td>

            <td>Mutalia Quran </td>
            <td>Pashto</td>
            <td>Islamyat </td>
            <td>-- --</td>

           </tr>
        <?php
    }
    if ($Class_Name=="9th" || $Class_Name=="9th A" || $Class_Name=="9th B") {
        ?>
    <tr>
        <td> 9th </td>
        <td> English </td>
        <td> Urdu </td>
         <td> Physics</P> </td>
         <td>Chemistry </td>
         <td> Biology </td>
         <td> Islamiyat </td>
         <td> Pak Studies </td>
          <td> Maths </td>
          <td> Mutalia Quran </td>
            </tr>
        <?php
    }
    if ($Class_Name=="10th" || $Class_Name=="10th A" || $Class_Name=="10th B") {
        ?>
    <tr>
        <td> 10th </td>
        <td> Islamiyat </td>
        <td> English </td>
         <td> Urdu </td>
         <td> Physics </td>
         <td> Chemistry </td>
         <td> Pak Study </td>
          <td> Maths </td>
          <td> Biology </td>
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
