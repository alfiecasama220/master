<?php 

    require_once($_SERVER['DOCUMENT_ROOT'] . "\connection.php");
    session_start();
    $getID = $_GET['ID'];

    if(isset($_POST['edit'])) {
        
        echo "HELLO";
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];


        $database = mysqli_query($connection, "UPDATE services SET Title = '$name', Description ='$description', Price = '$price' WHERE id = '$getID'");
        if($database) {
            header("Location: service-list.php?success=true");
        }
    }

    $name = "";
    $category = "";
    $description = "";
    $Price = "";

    $data = mysqli_query($connection, "SELECT * FROM services WHERE id = '$getID'");
    while($rows = mysqli_fetch_assoc($data)) {
        $name = $rows['Title'];
        $category = $rows['Category'];
        $description = $rows['Description'];
        $price = $rows['Price'];
    }

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- head -->
<?php require_once("head.php") ?>

<body class="nk-body ui-rounder npc-default has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-sidebar" data-content="sidebarMenu">
            <!-- sidebar -->
            <?php require_once("sidebar.php") ?>
            <!-- nk-sidebar -->
            <?php require_once("nk-sidebar.php") ?>
            </div>
        </div>
        <!-- main @s -->
        <form method="POST" enctype="multipart/form-data">
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require_once("main-header.php") ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Edit Packages</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You can edit a package by fill these field.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row gy-4">
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="name">Package name</label>
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Package name" value="<?php echo $name; ?>" required>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-md-12">
                                                <!-- <div class="form-group">
                                                    <label class="form-label" for="regular-price">Regular Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="regular-price">
                                                    </div>
                                                </div> -->
                                                <div class="form-group">    <label class="form-label" for="default-02">Description</label>    <div class="form-control-wrap">        <textarea name="description" class="form-control" id="default-textarea" value="<?php echo $description; ?>">Large text area content</textarea>    </div></div> 
                                                </div> 
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="sKU">Price</label>
                                                        <input type="text" class="form-control" name="price" id="sKU" placeholder="Price" value="<?php echo $price; ?>">
                                                    </div>
                                                </div><!--col-->  
                                                <div class="col-xxl-3">
                                                <!-- <div class="upload-zone small bg-lighter my-2">
                                                    <div class="dz-message">
                                                        <span class="dz-message-text">Drag and drop file</span>
                                                    </div>
                                                </div> -->
      
 

                                                
                                            </div><!--row-->
                                            <div class="col-xxl-12 col-md-3">
                                                    <div class="form-group">
                                                        <button name="edit" class="btn btn-primary">Edit Package</button>
                                                    </div>
                                                </div><!--col-->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        </form>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.3"></script>
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>
    <link rel="stylesheet" href="./assets/css/editors/quill.css?ver=3.1.3">
    <script src="./assets/js/libs/editors/quill.js?ver=3.1.3"></script>
    <script src="./assets/js/editors.js?ver=3.1.3"></script>
</body>

</html>