<!DOCTYPE html>
<?php
    include('db.php');

    $query = "SELECT * FROM provinces";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
?>
<html lang="en">
<head>
  <title>Form Validation</title>
  <meta charset="utf-8">
   
  
</head>
<BODY >
<style type="text/css">
  
</style> 
    



   <h3>แบบฟอร์มลงทะเบียน</h3>
   <table>
<form action="dopost.php" method="post" class="a">
    ชื่อ-นามสกุล: <br/>
    <input type="text" class="text" name="name" id="name" /> <br/>
    อีเมล: <br/>
    <input type="email" class="text" name="email" id="email" /> <br/>
    เพศ: <br/>
    <input type="radio" class="radio" name="sex" id="sex1" value="ชาย" /> ชาย
    <input type="radio" class="radio" name="sex" id="sex2" value="หญิง" /> หญิง
    <br/>
    ความสนใจ: <br/>
    <input type="checkbox" class="checkbox" name="intr1" id="intr1" value="เรียน"/> เรียน
    <input type="checkbox" class="checkbox" name="intr2" id="intr2" value="เกมส์"/> เกมส์
    <br/>
    ที่อยู่: <br/>
    <textarea class="text" name="address" id="address" rows="4" cols="50" ></textarea>
    <br/>
    จังหวัด: <br/>
    <select name="province" id="province">
        <option value="">---เลือกจังหวัด---</option>
    <?php
    while ($row = $result->fetch_array()) { ?>
        <option value="<?php echo $row['PROVINCE_ID']; ?>"><?php echo $row['PROVINCE_NAME']; ?></option>

    <?php } ?>
    </select><br/>

    <br/><br/>
    <input type="submit" id="submit" value="Submit" name="submit" />
</form>
</table><br><br>

<table border="0" align="left" width="1350" height="50">
        <tr bgcolor="#33FF66">
            </td>
            <td colspan="3" align="center">
               <a href="58160188.png">
                    <font color="#000000"><FONT FACE = "TH SarabunPSK " SIZE ="3" COLOR= "BLACK">ER Diagram</font>
            </td>
                        <td colspan="3" align="center">
                <a href="https://github.com/Puwanartt/lab07/blob/master/register_form.php">
                    <font color="#000000"><FONT FACE = "TH SarabunPSK " SIZE ="3" COLOR= "BLACK">Source Code <br>register_form.php</font>
            </td>
                        <td colspan="3" align="center">
                <a href="https://github.com/Puwanartt/lab07/blob/master/dopost.php">
                    <font color="#000000"><FONT FACE = "TH SarabunPSK " SIZE ="3" COLOR= "BLACK">Source Code <br>dopost.php</font>
            </td>
            <td colspan="3" align="center">
                <a href="https://github.com/Puwanartt/lab07/blob/master/show_register.php">
                    <font color="#000000"><FONT FACE = "TH SarabunPSK " SIZE ="3" COLOR= "BLACK">Source Code <br>show_register.php</font>
            </td>
            </tr>    
        </table><br><br><br>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
$('#submit').on('click',function(event){
    var valid = true;
    errorMessage = "";

    if ($('#name').val() == '') {
        errorMessage = "โปรดป้อนชื่อ-นามสกุล \n";
        valid = false;
    }

    if ($('#email').val() == '') {
        errorMessage += "โปรดป้อน email\n";
        valid = false;
    }else if (!(($('#email').val().indexOf(".") > 0) && ($('#email').val().indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test($('#email').val())) {
        errorMessage+="โปรดป้อน email ให้ถูกต้อง\n";
        valid=false;
    }

    if($('#sex1').prop("checked") == false && $('#sex2').prop("checked") == false){
        errorMessage += "โปรดเลือก เพศ \n";
        valid = false;
    }

    if($('#intr1').prop("checked") == false && $('#intr2').prop("checked") == false){
        errorMessage += "โปรดเลือกความสนใจอย่างน้อย 1 อย่าง \n";
        valid = false;
    }

    if ($('#address').val() == '') { 
        errorMessage += "โปรดป้อนที่อยู่\n";
        valid = false;
    }

    if($('#province').val() == ''){
        errorMessage += "โปรดเลือกจังหวัด \n";
        valid = false;
    }

    if ( !valid && errorMessage.length > 0) {
        alert(errorMessage);
        event.preventDefault();
    }
});


</script>
</body>
</html>