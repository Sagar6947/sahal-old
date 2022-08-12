<?php
 include('db_connect.php'); 



echo '<option value="">Select Sub category </option>';

if (!empty($_POST["cate_id"])) {

    $cate_id = $_POST["cate_id"];


    $stateResult = mysqli_query($conn, "SELECT * FROM `company_subcategory` JOIN company_category ON `company_category`.`cate_id` = `company_subcategory`.`category_id` WHERE `company_subcategory`.`category_id`='".$cate_id."' AND `company_subcategory`.`status` = '0' ");
    while ($mus = mysqli_fetch_array($stateResult)) 
    {
        ?>
        <option value="<?php echo $mus["subcat_id"]; ?>"><?= $mus["subcategory"]; ?></option>
        <?php
    }
}
?>