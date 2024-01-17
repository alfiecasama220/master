<?php 

    require_once($_SERVER['DOCUMENT_ROOT'] . "\connection.php");

?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- head -->
<?php require_once("../head.php") ?>

<body class="nk-body ui-rounder npc-default has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-sidebar" data-content="sidebarMenu">
            <!-- sidebar -->
            <?php require_once("../sidebar.php") ?>
            <!-- nk-sidebar -->
            <?php require_once("../nk-sidebar.php") ?>
            </div>
        </div>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require_once("../main-header.php") ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Add Laundry</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You can add a medicine by fil these field.</p>
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
                                                        <label class="form-label" for="name">Medicine Name</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Medicine Name" required>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="generic">Generic name</label>
                                                        <input type="number" class="form-control" id="generic" placeholder="Generic Name">
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="sKU">SKU</label>
                                                        <input type="email" class="form-control" id="sKU" placeholder="SKU">
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="weight">Weight</label>
                                                        <input type="text" class="form-control" id="weight" placeholder="Weight">
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Category</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2">
                                                                <option value="default_option">Select</option>
                                                                <option value="option_select_category">Tablet</option>
                                                                <option value="option_select_category">Syrup</option>
                                                                <option value="option_select_category">Vitamin</option>
                                                                <option value="option_select_category">Inhealer</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Manufacturer</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2">
                                                                <option value="default_option">Select</option>
                                                                <option value="option_select_manufacturer">Healthcare</option>
                                                                <option value="option_select_category">Square</option>
                                                                <option value="option_select_category">lupin</option>
                                                                <option value="option_select_category">Sun</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="price">Price</label>
                                                        <input type="number" class="form-control" id="price" placeholder="Price" required>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="manufacturer Price">Manufacturer Price</label>
                                                        <input type="number" class="form-control" id="manufacturer Price" placeholder="Manufacturer Price" required>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Stock(Box)</label>
                                                        <div class="form-control-wrap number-spinner-wrap">
                                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                                            <input type="number" class="form-control number-spinner" value="0">
                                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                                        </div>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Expire Date</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                                        </div>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-xxl-3 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2">
                                                                <option value="default_option">select</option>
                                                                <option value="option_select_status">Active</option>
                                                                <option value="option_select_status">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="bio">Medicine Details</label>
                                                        <div class="form-control-wrap">
                                                            <div class="quill-basic">
                                                                <p>Hello World!</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--col-->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Add Medicine</button>
                                                    </div>
                                                </div><!--col-->
                                            </div><!--row-->
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